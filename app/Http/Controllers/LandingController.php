<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $kasMasuk = Kas::where('type', 'MASUK')->sum('kas');
        $kasPengeluaran = Kas::where('type', 'KELUAR')->sum('kas');
        $kas = $kasMasuk - $kasPengeluaran;


        return view('welcome' , compact('kasMasuk', 'kasPengeluaran', 'kas'));
    }
}
