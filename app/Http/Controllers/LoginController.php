<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Firebase\JWT\JWT;

class LoginController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function loginProses()
    {
        $validator = validator([
            "nis" => "required",
            "kata_sandi" => "required"
        ]);

        if ($validator->fails()) {
            return redirect()->route("login")->with(['validator_fails' => 'Semua input harus diisi!']);
        }

        $akun = Akun::where("nis", request("nis"))->first();

        if (!$akun) {
            return redirect()->route("login")->with(['nis_tidak_ditemukan' => 'NIS tidak ditemukan.']);
        }

        // Verifikasi password menggunakan Argon2i
        if (!password_verify(request("kata_sandi"), $akun->kata_sandi)) {
            return redirect()->route('login')->with(['password_tidak_cocok' => 'Password tidak cocok!']);
        }

        $payload = [
            'id' => $akun->id,
            'nama_pengguna' => $akun->nama_pengguna,
            'nis' => $akun->nis,
            'peran' => $akun->peran
        ];

        $jwt = JWT::encode($payload, env("APP_KEY"), 'HS256');

        $cookie = cookie('jwt', $jwt);

        return redirect()->route("akun-admin")->withCookie($cookie)->with('login_berhasil', 'Anda berhasil login! Arahkan ke dashboard atau halaman berikutnya.');
    }
}
