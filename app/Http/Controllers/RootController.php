<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Jurusan;
use DB;

class RootController extends Controller
{
    public function index()
    {
        $data = Data::join("jurusan", "data.jurusan_id", "=", "jurusan.id")
            ->select("data.*", "jurusan.nama as jurusan")
            ->get();

        $jumlahAlumni = Data::count("nama_lengkap");

        $AlumniTerbanyakTahun = Data::select("tahun_lulus", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("tahun_lulus")
            ->orderBy("jumlah", "desc")
            ->first();

        $AlumniTerbanyakJurusan = Data::join("jurusan", "data.jurusan_id", "jurusan.id")
            ->select("jurusan.nama as jurusan", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("jurusan")
            ->orderBy("jumlah", "desc")
            ->first();

        return view("index", compact("data", "jumlahAlumni", "AlumniTerbanyakTahun", "AlumniTerbanyakJurusan"));
    }

    public function dataAlumni()
    {
        $perPage = request('per_page', 10);
        $search = request('search');

        $query = Data::join('jurusan', 'data.jurusan_id', '=', 'jurusan.id')
            ->select('data.*', 'jurusan.nama as jurusan')
            ->orderBy('data.id');

        if ($search) {
            $searchedData = $query->where('data.nama_lengkap', 'LIKE', "%{$search}%")->get();
            return view('data-alumni', compact('searchedData'));
        } else
            $searchedData = null;

        $data = $query->get();
        $jurusan = Jurusan::all();
        $tahunLulus = Data::select('tahun_lulus as tahun')->distinct()->orderBy('tahun_lulus', 'desc')->get();
        $alumniPerTahun = Data::select('tahun_lulus as tahun', DB::raw('COUNT(nama_lengkap) as jumlah'))
            ->groupBy('tahun_lulus')
            ->orderBy('tahun_lulus', 'desc')
            ->get();
        $alumniPerJurusan = Data::join('jurusan', 'data.jurusan_id', '=', 'jurusan.id')
            ->select('jurusan.nama as jurusan', DB::raw('COUNT(data.nama_lengkap) as jumlah'))
            ->groupBy('jurusan.nama')
            ->get();

        return view('data-alumni', compact('data', 'jurusan', 'tahunLulus', 'alumniPerTahun', 'alumniPerJurusan'));
    }

    public function statistikDataAlumni()
    {
        $data = Data::join("jurusan", "data.jurusan_id", "=", "jurusan.id")
            ->select("data.*", "jurusan.nama as jurusan")
            ->orderBy("id")
            ->get();
        $jurusan = Jurusan::all();
        $tahunLulus = Data::select("tahun_lulus as tahun")->distinct()->orderBy("tahun_lulus", "desc")->get();
        $alumniPerTahun = Data::select("tahun_lulus as tahun", DB::raw("COUNT(nama_lengkap) as jumlah"))
            ->groupBy("tahun_lulus")
            ->orderBy("tahun_lulus", "desc")
            ->get();
        $alumniPerJurusan = Data::join("jurusan", "data.jurusan_id", "=", "jurusan.id")
            ->select("jurusan.nama as jurusan", DB::raw("COUNT(data.nama_lengkap) as jumlah"))
            ->groupBy("jurusan.nama")
            ->get();

        return view("statistik-data-alumni", compact("data", "jurusan", "tahunLulus", "alumniPerTahun", "alumniPerJurusan"));
    }

    public function kontributor()
    {
        return view("kontributor");
    }
}
