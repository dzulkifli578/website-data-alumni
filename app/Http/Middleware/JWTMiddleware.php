<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Cookie;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Ambil cookie 'jwt' dari request
        $jwt = Cookie::get('jwt');

        if ($jwt) {
            try {
                // Mendekode JWT menggunakan APP_KEY
                $decoded = JWT::decode($jwt, new Key(env('APP_KEY'), 'HS256'));
                // Menyimpan data pengguna ke session
                session(['id' => $decoded->id]);
                session(['nama_pengguna' => $decoded->nama_pengguna]);
            } catch (\Exception $e) {
                // Jika terjadi kesalahan pada JWT (misal token invalid atau expired)
                return redirect()->route('login')->withErrors('Sesi Anda telah kedaluwarsa, silakan login kembali.');
            }
        }

        return $next($request);
    }
}
