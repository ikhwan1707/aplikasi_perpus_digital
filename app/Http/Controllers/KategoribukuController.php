<?php

namespace App\Http\Controllers;

use App\Kategoribuku;
use Illuminate\Http\Request;

class KategoribukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKategoriBuku = Kategoribuku::orderBy('created_at', 'desc')->paginate(10);
        return view('Kategoribuku.index', compact('dataKategoriBuku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Kategoribuku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'NamaKategori'  => 'required|unique:tb_kategoribuku',
        ];

        $this->validate($request, $rules);
        Kategoribuku::create(
            $request->all()
        );

        return redirect(route('kategoribuku.index'))->with('success', 'Kategori Buku Berhasil ditambah');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategoribuku  $kategoribuku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataeditkategori = Kategoribuku::findOrFail($id);
        return view('Kategoribuku.edit', compact('dataeditkategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategoribuku  $kategoribuku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'NamaKategori'  => 'required',
        ];

        $this->validate($request, $rules);
        $updateKategoriBuku = Kategoribuku::findOrFail($id);
        $updateKategoriBuku->update($request->all());

        return redirect(route('kategoribuku.index'))->with('success', 'Kategori Buku Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategoribuku  $kategoribuku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteKategoriBuku = Kategoribuku::findOrFail($id);
        $deleteKategoriBuku->delete();

        return redirect(route('kategoribuku.index'))->with('success', 'Kategori Buku Berhasil dihapus');
    }
}
