<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Data;
use App\Models\Jurusan;
use DB;

class AkunController extends Controller
{
    public function admin()
    {
        $data = Data::join("jurusan", "data.jurusan_id", "=", "jurusan.id")
            ->select("data.*", "jurusan.nama as jurusan")
            ->orderBy("id")
            ->paginate(5);

        $totalAdmin = Akun::where("peran", "admin")->count();

        $totalAlumni = Data::count();
        $tahunAwal = Data::select("tahun_lulus")->orderBy("tahun_lulus")->first();
        $tahunTerbaru = Data::select("tahun_lulus")->orderBy("tahun_lulus", "desc")->first();
        $alumniPerTahun = Data::select("tahun_lulus", DB::raw("COUNT(*) as jumlah"))
            ->groupBy("tahun_lulus")
            ->orderBy("tahun_lulus", "ASC")
            ->get();
        $header = "Dashboard";

        return view("akun.admin", compact("data", "totalAdmin", "totalAlumni", "tahunAwal", "tahunTerbaru", "alumniPerTahun", "header"));
    }

    public function profilAkunAdmin()
    {
        $akun = Akun::find(session("id"));
        $header = "Profil Akun";
        return view("akun.profil-akun", compact("akun", "header"));
    }

    public function editAkunAdmin($id)
    {
        // Validasi input
        $validator = validator(request()->all(), [
            "nama_pengguna" => "required",
            "nis" => "required",
            "kata_sandi" => "nullable", // Kata sandi bersifat opsional
            "peran" => "required"
        ]);

        if ($validator->fails())
            return redirect()->route("profil-akun-admin")->with("validator_fails", $validator->errors());

        $akun = Akun::find($id);
        if (!$akun)
            return redirect()->route("profil-akun-admin")->with("edit_gagal", "Akun tidak ditemukan");

        $akun->nama_pengguna = request("nama_pengguna");
        $akun->nis = request("nis");
        $akun->peran = request("peran");

        if (request()->filled('kata_sandi'))
            $akun->kata_sandi = password_hash(request('kata_sandi'), PASSWORD_ARGON2I);

        $akun->save();

        // Redirect dengan pesan sukses
        return redirect()->route("profil-akun")->with("edit_berhasil", "Berhasil mengedit akun admin");
    }

    public function dataAlumni()
    {
        $search = request('search');

        $query = Data::join('jurusan', 'data.jurusan_id', '=', 'jurusan.id')
            ->select('data.*', 'jurusan.nama as jurusan')
            ->orderBy('data.id');

        $data = $search ?
            $query->where('data.nama_lengkap', 'LIKE', "%{$search}%")->get() :
            $query->get();

        $jurusan = Jurusan::all();
        $tahunLulus = Data::select('tahun_lulus')->distinct()->orderBy('tahun_lulus', 'desc')->get();
        $header = "Data Alumni";

        return view('akun.data-alumni', compact('data', 'jurusan', 'tahunLulus', 'header'));
    }

    public function dataAlumniDetail($id)
    {
        $data = Data::join("jurusan", "data.jurusan_id", "=", "jurusan.id")
            ->select("data.*", "jurusan.nama as jurusan")
            ->find($id);

        $jurusan = Jurusan::all();
        $header = "Detail Data Alumni";

        return view("akun.detail-data-alumni", compact("data", "jurusan", "header"));
    }

    public function chart()
    {
        $totalAlumni = Data::count();

        $alumniTerbanyakTahun = Data::select("tahun_lulus", DB::raw("COUNT(*) as jumlah"))
            ->groupBy("tahun_lulus")
            ->orderBy("jumlah", "desc")
            ->first();

        $alumniTersedikitTahun = Data::select("tahun_lulus", DB::raw("COUNT(*) as jumlah"))
            ->groupBy("tahun_lulus")
            ->orderBy("jumlah")
            ->first();

        $alumniTerbanyakJurusan = Data::join("jurusan", "data.jurusan_id", "=", "jurusan.id")
            ->select("jurusan.nama as jurusan", DB::raw("COUNT(*) as jumlah"))
            ->groupBy("jurusan.nama")
            ->orderBy("jumlah", "desc")
            ->first();

        $alumniTersedikitJurusan = Data::join("jurusan", "data.jurusan_id", "=", "jurusan.id")
            ->select("jurusan.nama as jurusan", DB::raw("COUNT(*) as jumlah"))
            ->groupBy("jurusan.nama")
            ->orderBy("jumlah", "asc")
            ->first();

        $alumniPerJurusan = Data::join("jurusan", "data.jurusan_id", "=", "jurusan.id")
            ->select("jurusan.nama as jurusan", DB::raw("COUNT(*) as jumlah"))
            ->groupBy("jurusan.nama")
            ->orderBy("jurusan.nama")
            ->get();

        $header = "Chart";
        return view('akun.chart', compact('totalAlumni', 'alumniTerbanyakTahun', 'alumniTersedikitTahun', 'alumniTerbanyakJurusan', 'alumniTersedikitJurusan', 'alumniPerJurusan', 'header'));
    }

    public function tambahDataAlumni()
    {
        $jurusan = Jurusan::all();
        return view("akun.tambah-data-alumni", compact("jurusan"));
    }

    public function prosesTambahDataAlumni()
    {
        $validator = validator(request()->all([
            "nama_lengkap" => "required",
            "tahun_lulus" => "required",
            "jurusan_id" => "required"
        ]));

        if ($validator->fails())
            return redirect()->route("tambah-data-alumni")->with("validator_fails", $validator->errors());

        $data = Data::create(request()->all());

        if (!$data)
            return redirect()->route("tambah-data-alumni")->with("gagal_tambah", "Gagal menambahkan data alumni");

        return redirect()->route("admin-data-alumni")->with("berhasil", "Berhasil menambahkan data alumni");
    }

    public function editDataAlumni()
    {
        $validator = validator(request()->all([
            "nama_lengkap" => "required",
            "tahun_lulus" => "required",
            "jurusan_id" => "required"
        ]));

        if ($validator->fails())
            return redirect()->route("edit-data-alumni")->with("validator_fails", $validator->errors());

        $data = Data::where("id", request()->id)->update([
            "nama_lengkap" => request("nama_lengkap"),
            "tahun_lulus" => request("tahun_lulus"),
            "jurusan_id" => request("jurusan_id")
        ]);

        if (!$data)
            return redirect()->route("edit-data-alumni")->with("gagal_edit", "Gagal mengedit data alumni");

        return redirect()->route("admin-data-alumni")->with("berhasil_edit", "Berhasil mengedit data alumni");
    }

    public function hapusDataAlumni($id)
    {
        $data = Data::where("id", $id)->delete();

        if (!$data)
            return redirect()->route("admin-data-alumni")->with("gagal_hapus", "Gagal menghapus data alumni");

        return redirect()->route("admin-data-alumni")->with("berhasil", "Berhasil menghapus data alumni");
    }

    public function importCsv()
    {
        $validator = validator(request([
            "csv_file" => "required|mimes:csv"
        ]));

        // Ambil file CSV
        $file = request()->file('csv_file');

        // Baca file dan proses
        $path = $file->getRealPath();
        $data = array_map('str_getcsv', file($path));

        // Ambil header dari baris pertama (jika ada)
        $header = array_shift($data);

        // Konversi data ke format yang sesuai untuk bulk insert
        $importData = [];
        foreach ($data as $row)
            $importData[] = array_combine($header, $row);

        // Bulk insert ke database
        DB::table("data")->insert($importData);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function logout()
    {
        $cookie = cookie('jwt', '', -1);
        return redirect()->route("index")->with("logout", "Anda berhasil logout")->withCookie($cookie);
    }
}
