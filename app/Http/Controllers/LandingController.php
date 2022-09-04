<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Kelas;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index($slug)
    {

        $kelas = Kelas::all();


        // dd($Kelas);
        foreach ($kelas as $k) {

            if ($slug == $k->slug) {

                $kelas = $k->kelas;
                $kasMasuk = Kas::where('type', 'MASUK')->sum('kas');
                $kasPengeluaran = Kas::where('type', 'KELUAR')->sum('kas');
                $kas = $kasMasuk - $kasPengeluaran;


                return view('welcome', compact('kasMasuk', 'kasPengeluaran', 'kas', 'kelas'));
            }
        }

        abort('404');
    }
}
