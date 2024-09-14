<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RootController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\JWTMiddleware;
use Illuminate\Support\Facades\Route;

// root
Route::prefix("/")->group(function () {
    Route::get("", [RootController::class, "index"])->name("index");
    Route::get("/data-alumni", [RootController::class, "dataAlumni"])->name("data-alumni");
    Route::get("/data-alumni/statistik", [RootController::class, "statistikDataAlumni"])->name("statistik-data-alumni");
    Route::get("kontributor", [RootController::class, "kontributor"])->name("kontributor");
});

// login
Route::prefix("/login")->middleware(GuestMiddleware::class)->group(function () {
    Route::get("", [LoginController::class, "login"])->name("login");
    Route::post("/proses", [LoginController::class, "loginProses"])->name("proses-login");
});

// akun
Route::prefix("/akun")->middleware([AdminMiddleware::class, JWTMiddleware::class])->group(function () {
    Route::get("/", [AkunController::class, "admin"])->name("akun-admin");
    Route::get("/profil", [AkunController::class, "profilAkunAdmin"])->name("profil-akun");
    Route::put("/profil/edit/{id}", [AkunController::class, "editAkunAdmin"])->name("edit-akun");
    Route::get("/data-alumni", [AkunController::class, "dataAlumni"])->name("admin-data-alumni");
    Route::get("/data-alumni/tambah", [AkunController::class, "tambahDataAlumni"])->name("tambah-data-alumni");
    Route::post("/data-alumni/tambah/proses", [AkunController::class, "prosesTambahDataAlumni"])->name("proses-tambah-data-alumni");
    Route::get("/data-alumni/detail/{id}", [AkunController::class, "dataAlumniDetail"])->name("detail-data-alumni");
    Route::put("/data-alumni/edit/{id}", [AkunController::class, "editDataAlumni"])->name("edit-data-alumni");
    Route::delete("/data-alumni/hapus/{id}", [AkunController::class, "hapusDataAlumni"])->name("hapus-data-alumni");
    Route::post("/data-alumni/import-csv", [AkunController::class, "importCsv"])->name("import-csv");
    Route::get("/chart", [AkunController::class, "chart"])->name("chart");
    Route::get("/logout", [AkunController::class, "logout"])->name("logout");
});

// jurusan
Route::prefix("/jurusan")->group(function () {
    Route::get("/rekayasa-perangkat-lunak", [JurusanController::class, "rpl"])->name("rpl");
    Route::get("/teknik-komputer-dan-jaringan", [JurusanController::class, "tkj"])->name("tkj");
    Route::get("/teknik-instalasi-tenaga-listirk", [JurusanController::class, "titl"])->name("titl");
    Route::get("/teknik-kendaraan-ringan", [JurusanController::class, "tkr"])->name("tkr");
    Route::get("/teknik-bisnis-dan-sepeda-motor", [JurusanController::class, "tbsm"])->name("tbsm");
});