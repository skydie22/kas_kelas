<?php

namespace App\Http\Controllers;

use App\Models\KasPemasukan;
use Illuminate\Http\Request;

class KasPemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = KasPemasukan::get();
        return view('kas-pemasukan.index' , compact('datas'));
        
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
    public function storePemasukan(Request $request)
    {
        $this->validate($request , [
            'tanggal'=>'required',
            'uraian'=>'required',
            'kas_pemasukan'=>'required'
        ]);

        $datas = new KasPemasukan();
        $datas->tanggal = $request->tanggal;
        $datas->uraian = $request->uraian;
        $datas->kas_pemasukan = $request->kas_pemasukan;

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

     //edit 
    public function update(Request $request, $id)
    {
        $datas = KasPemasukan::where('id', $id)->firstOrFail();

        $this->validate($request , [
            'tanggal'=>'required',
            'uraian'=>'required',
            'kas_pemasukan'=>'required'
        ]);

        $datas->tanggal = $request->tanggal;
        $datas->uraian = $request->uraian;
        $datas->kas_pemasukan = $request->kas_pemasukan;
        // dd($datas);
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
        $datas = KasPemasukan::find($id);
        $datas->delete();
        
        return redirect()->back();
        
    }
}
