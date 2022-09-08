<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class rekapController extends Controller
{
    public function index()
    {

        $datas = Kas::all();
        return view('rekap', compact('datas'));
    }

    public function exportData()
    {
        $datasExport = Kas::all();
        $datasMasuk = Kas::where('type', 'MASUK')->sum('kas');
        $datasKeluar = Kas::where('type', 'KELUAR')->sum('kas');
        $datasSisa = $datasMasuk - $datasKeluar;

        $user = Auth::user()->foto;
        $pdf = PDF::loadview('export-pdf', ['datasExport' => $datasExport, 'datasSisa' => $datasSisa, 'datasMasuk' => $datasMasuk, 'user_foto' => $user]);

        return $pdf->download('laporan-kas.pdf');
    }
}
