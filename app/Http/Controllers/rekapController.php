<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class rekapController extends Controller
{
    public function index() {

        $datas = Kas::all();
        return view('rekap', compact('datas'));

    }

    public function exportData() {
        $datasExport = Kas::all();
        return view('export-pdf' , compact('datasExport'));
    }
}
