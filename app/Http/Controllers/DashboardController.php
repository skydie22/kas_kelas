<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $kasMasuk = Kas::where('type', 'MASUK')->sum('kas');
        $kasPengeluaran = Kas::where('type', 'KELUAR')->sum('kas');
        $kas = $kasMasuk - $kasPengeluaran;

        //chart
        $this_year = Carbon::now()->format('Y');
        $chart_pemasukan = Kas::where('type', 'MASUK')->where('tanggal' , 'like' , $this_year . '%')->get();
        $chart_pengeluaran = Kas::where('type', 'KELUAR')->where('tanggal' , 'like' , $this_year . '%')->get();

        for ($i = 1; $i <= 12; $i++) {
            $data_pemasukan[(int)$i] = 0;
        }
        foreach ($chart_pemasukan as $pemasukan) {
            $check = explode('-', $pemasukan->tanggal)[1];
            $data_pemasukan[(int)$check] += $pemasukan->where('type', 'MASUK')->where('tanggal', $pemasukan->tanggal)->sum('kas');
        }

        for ($i = 1; $i <= 12; $i++) {
            $data_pengeluaran[(int)$i] = 0;
        }
        foreach ($chart_pengeluaran as $pengeluaran) {
            $check = explode('-', $pengeluaran->tanggal)[1];
            $data_pengeluaran[(int)$check] += $pengeluaran->where('type', 'KELUAR')->where('tanggal', $pengeluaran->tanggal)->sum('kas');

        }

        // dd($data_pemasukan);

        $data_pemasukan = (object)$data_pemasukan;
        
        return view('dashboard' , compact('kasMasuk', 'kasPengeluaran', 'kas'))
        ->with('data_pemasukan')
        ->with('data_pengeluaran')
        ;

    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
