<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataUser = User::all();
        return view('User.index', compact('dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $rules = [
            'Username' => ['required', 'string', 'max:255'],
            'Namalengkap' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:tb_user'],
            'Password' => ['required', 'string', 'min:8'],
            'Alamat' => ['required'],
        ];

        $this->validate($request, $rules);
        User::create([
            'Username' => $request->Username,
            'Namalengkap' => $request->Namalengkap,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Alamat' => $request->Alamat,
            'Role'  => $request->Role == "" ? 'user' : $request->Role,
        ]);

        return redirect(route('user.index'))->with('success', 'Data berhasil disimpan.');
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
        $datauseredit = User::findOrFail($id);
        return view('User.edit', compact('datauseredit'));
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
        $rules = [
            'Username' => ['required', 'string', 'max:255'],
            'Namalengkap' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255'],
            'Password' => ['required', 'string', 'min:8'],
            'Alamat' => ['required'],
        ];

        $this->validate($request, $rules);
        $updateuser= User::findOrFail($id);
        $updateuser->update([
            'Username' => $request->Username,
            'Namalengkap' => $request->Namalengkap,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Alamat' => $request->Alamat,
            'Role'  => $request->Role,
        ]);

        return redirect(route('user.index'))->with('success', 'Data berhasil diubah.');
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