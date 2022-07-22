<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasPemasukan extends Model
{
    use HasFactory;
    protected $table = "kas_pemasukans";

    protected $fillable = [
        "tanggal",
        "uraian",
        "kas_pemasukan"
    ];
}
