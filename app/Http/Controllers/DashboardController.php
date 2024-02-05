<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Kategoribuku;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Peminjaman;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::User());
        $countBuku = Buku::count();
        $countKategori =  Kategoribuku::count();
        $countPeminjam = User::where('Role', 'user')->count();
        $countAdmin = User::where('Role', 'admin')->count();
        $countPetugas = User::where('Role', 'petugas')->count();
        $countdipinjam = Peminjaman::where('StatusPeminjaman', 'dipinjam')->count();
        $countdikembalikan = Peminjaman::where('StatusPeminjaman', 'dikembalikan')->count();

        $datapeminjam = Peminjaman::with(['user', 'buku'])->orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard', compact('countBuku', 'countKategori', 'countPeminjam', 'countAdmin', 'countPetugas', 'datapeminjam', 'countdipinjam', 'countdikembalikan'));
    }
}
