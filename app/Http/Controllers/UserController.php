<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::role('bendahara')->get();
        return view('users.index', compact('datas'));
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
        $this->validate($request, [
            "name" => 'required|string',
            "email" => 'required|string|unique:users,email',
            "password" => 'required|max:40'
        ]);
        // dd($request()->all());
        $data = new User();
        // dd($da]ta);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->assignRole('bendahara');

        $data->save();

        return redirect()->route('users.index');
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



    public function editProfile(Request $request)
    {

        $this->validate($request, [
            "name" => 'required|string',
            "email" => 'required|string|email',
            "password" => 'required|max:40'
        ]);
        $id = Auth::user()->id;

        $data = User::find($id);

        $password_old  = $request->password_old;


        // Validating Password
        if (Hash::check($password_old, $data->password)) {
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password =  Hash::make($request->password);

            $data->update();
            $data->assignRole('bendahara');

            return redirect()->route('users.profile')->with(['success' => "Berhasil Mengedit Profile!"]);
        }

        return redirect()->route('users.profile')->with(['error' => "Gagal Mengedit Profile"]);
    }

    public function showProfile()
    {
        $data = Auth::user();

        return view('users.profile', compact("data"));
    }
    public function destroy($id)
    {
        $data = User::findOrFail($id);

        $data->delete();

        return redirect()->route('users.index');
    }
}
