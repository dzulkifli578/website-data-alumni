<?php

namespace App\Http\Controllers;

use App\Models\Data;
use DB;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function rpl()
    {
        $jurusan = "Rekayasa Perangkat Lunak";

        $jenisKelamin = Data::select("jenis_kelamin", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("jenis_kelamin")
            ->where("jurusan_id", 1)
            ->get();

        $tahunLulus = Data::select("tahun_lulus", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("tahun_lulus")
            ->where("jurusan_id", 1)
            ->get();

        return view("jurusan.rpl", compact("jurusan", "jenisKelamin", "tahunLulus"));
    }

    public function tkj()
    {
        $jurusan = "Teknik Komputer dan Jaringan";

        $jenisKelamin = Data::select("jenis_kelamin", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("jenis_kelamin")
            ->where("jurusan_id", 2)
            ->get();

        $tahunLulus = Data::select("tahun_lulus", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("tahun_lulus")
            ->where("jurusan_id", 2)
            ->get();

        return view("jurusan.tkj", compact("jurusan", "jenisKelamin", "tahunLulus"));
    }

    public function titl()
    {
        $jurusan = "Teknik Instalasi Tenaga Listrik";

        $jenisKelamin = Data::select("jenis_kelamin", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("jenis_kelamin")
            ->where("jurusan_id", 3)
            ->get();

        $tahunLulus = Data::select("tahun_lulus", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("tahun_lulus")
            ->where("jurusan_id", 3)
            ->get();

        return view("jurusan.titl", compact("jurusan", "jenisKelamin", "tahunLulus"));
    }

    public function tkr()
    {
        $jurusan = "Teknik Kendaraan Ringan";

        $jenisKelamin = Data::select("jenis_kelamin", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("jenis_kelamin")
            ->where("jurusan_id", 4)
            ->get();

        $tahunLulus = Data::select("tahun_lulus", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("tahun_lulus")
            ->where("jurusan_id", 4)
            ->get();

        return view("jurusan.tkr", compact("jurusan", "jenisKelamin", "tahunLulus"));
    }

    public function tbsm()
    {
        $jurusan = "Teknik Bisnis dan Sepeda Motor";

        $jenisKelamin = Data::select("jenis_kelamin", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("jenis_kelamin")
            ->where("jurusan_id", 5)
            ->get();

        $tahunLulus = Data::select("tahun_lulus", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("tahun_lulus")
            ->where("jurusan_id", 5)
            ->get();

        return view("jurusan.tbsm", compact("jurusan", "jenisKelamin", "tahunLulus"));
    }

}
