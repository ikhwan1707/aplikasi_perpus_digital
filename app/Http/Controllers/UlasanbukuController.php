<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ulasanbuku;
use App\Buku;
use App\Peminjaman;
use Illuminate\Support\Facades\Auth;

class UlasanbukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserID = Auth::id();
        $datapeminjam = Peminjaman::where('UserID', $UserID)->get();



        return view('ulasanbuku.index', compact('datapeminjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $buku = Buku::findOrFail($id);

        return view('ulasanbuku.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'Ulasan' => 'required',
            'Rating' => 'required|integer|min:1|max:5', // Rating harus di antara 1 dan 5
        ]);

        // Cek apakah user sudah membrikan ulasan atau belum
        // $peminjaman = Peminjaman::where('UserID', $request->UserID)
        // ->where('BukuID', $request->BukuID)
        // ->where('StatusPeminjaman', 'dikembalikan')
        // ->first();

        // if (!$peminjaman) {
        //     return redirect()->back()->with('error', 'Anda belum meminjam buku ini atau belum mengembalikannya.');
        // }

        // Cek apakah user sudah memberikan ulasan sebelumnya
        $ulasanSudahAda = UlasanBuku::where('UserID', $request->UserID)
            ->where('BukuID', $request->BukuID)
            ->exists();

        if ($ulasanSudahAda) {
            return redirect()->back()->with('error', 'Anda sudah memberikan ulasan untuk buku ini sebelumnya.');
        }

        // Simpan ulasan
        UlasanBuku::create([
            'UserID' => $request->UserID,
            'BukuID' => $request->BukuID,
            'Ulasan' => $request->Ulasan,
            'Rating' => $request->Rating,
        ]);

        return redirect(route('listbuku'))->with('success', 'Ulasan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ulasanbuku  $ulasanbuku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bukuShow = Buku::findOrFail($id);
        $jumlahPeminjaman = Peminjaman::where('BukuID', $id)->count();
        $jumlahUlasan = Ulasanbuku::where('BukuID', $id)->count();
        return view('ulasanbuku.show', compact('bukuShow', 'jumlahPeminjaman', 'jumlahUlasan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ulasanbuku  $ulasanbuku
     * @return \Illuminate\Http\Response
     */
    public function edit(Ulasanbuku $ulasanbuku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ulasanbuku  $ulasanbuku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ulasanbuku $ulasanbuku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ulasanbuku  $ulasanbuku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ulasanbuku $ulasanbuku)
    {
        //
    }
}
