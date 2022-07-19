<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasPemasukan extends Model
{
    use HasFactory;
    protected $table = "kas_pemasukan";

    protected $fillable = [
        "tanggal",
        "uraian",
        "masuk"
    ];
}
