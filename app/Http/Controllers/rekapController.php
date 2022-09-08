<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class rekapController extends Controller
{
    public function index() {

        $datas = Kas::all();
        return view('rekap', compact('datas'));

    }

    public function exportData() {
        $datasExport = Kas::all();
        $datasMasuk = Kas::where('type' , 'MASUK')->sum('kas');
        $datasKeluar = Kas::where('type' , 'KELUAR')->sum('kas');
        $datasSisa = $datasMasuk - $datasKeluar;

        $pdf = PDF::loadview('export-pdf',['datasExport'=>$datasExport , 'datasSisa'=>$datasSisa , 'datasMasuk'=>$datasMasuk]);

        return $pdf->download('laporan-kas.pdf');
    }
}
