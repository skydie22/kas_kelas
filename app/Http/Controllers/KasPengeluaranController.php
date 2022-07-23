<?php

namespace App\Http\Controllers;

use App\Models\KasPengeluaran;
use Illuminate\Http\Request;

class KasPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kas_pengeluaran = KasPengeluaran::get();
        return view('kas-pengeluaran.index', ["datas" => $kas_pengeluaran]);
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
    public function storePengeluaran(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'uraian' => 'required',
            'kas_pengeluaran' => 'required'
        ]);

        $datas = new KasPengeluaran();
        $datas->tanggal = $request->tanggal;
        $datas->uraian = $request->uraian;
        $datas->kas_pengeluaran = $request->kas_pengeluaran;

        // dd($datas);

        $datas->save();

        return redirect()->back();
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
        $datas = KasPengeluaran::where('id', $id)->firstOrFail();

        $this->validate($request, [
            'tanggal' => 'required',
            'uraian' => 'required',
            'kas_pengeluaran' => 'required'
        ]);

        $datas->tanggal = $request->tanggal;
        $datas->uraian = $request->uraian;
        $datas->kas_pengeluaran = $request->kas_pengeluaran;
        $datas->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = KasPengeluaran::find($id);
        $datas->delete();


        return redirect()->back();
    }
}
