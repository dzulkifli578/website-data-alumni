<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = "data";

    protected $fillable = [
        "nama_lengkap",
        "tahun_lulus",
        "jurusan_id",
        "pekerjaan",
        "foto"
    ];

    public $timestamps = true;

    protected $dates = [
        "created_at",
        "updated_at"
    ];
}
