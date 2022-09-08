<?php

namespace App\Http\Controllers;

use App\Models\Kas;
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
        $datas = Kas::where('type', 'KELUAR')->get();

        return view('kas-pengeluaran.index', compact("datas"));
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
            'kas' => 'required'
        ]);

        $datas = new Kas();
        
        $datasKeluar = Kas::where('type', 'KELUAR')->sum('kas')
        $datasMasuk = Kas::where('type', 'MASUK')->sum('kas');
        $total = $datasMasuk -$datasKeluar;

        $datas->tanggal = $request->tanggal;
        $datas->uraian = $request->uraian;
        $datas->type = 'KELUAR';
        $datas->kas = $request->kas;

        // dd($datas);

        if ($datas->kas >= $total) {
            return redirect()->back()->with(['fail' => "gagal Menambahkan Data!"]);
        } else {
            $datas->save();
            return redirect()->back()->with(['success' => "Berhasil Menambahkan Data!"]);
            
        }
        
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
        $datas = Kas::where('id', $id)->firstOrFail();

        $this->validate($request, [
            'tanggal' => 'required',
            'uraian' => 'required',
            'kas' => 'required'
        ]);

        $datas->tanggal = $request->tanggal;
        $datas->uraian = $request->uraian;
        $datas->kas = $request->kas;
        $datas->update();

        return redirect()->back()->with(['success' => "Berhasil Mengedit Data!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datas = Kas::find($id);
        $datas->delete();


        return redirect()->back()->with(['success' => "Berhasil Delete Data!"]);
    }
}
