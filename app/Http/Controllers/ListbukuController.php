<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Buku;
use App\Kategoribuku;
use App\User;
use App\KoleksiPribadi;

class ListbukuController extends Controller
{
    public function index()
    {
        $Kategoribuku = Kategoribuku::all();
        $Buku = Buku::with('Koleksipribadi')->get();
        $userID = Auth::id();
        //dd($KoleksiPribadi);
        //$Buku = Buku::all();

        return view('RentBuku.index', compact('Kategoribuku', 'Buku', 'userID'));
    }

    public function favorite(Request $request, Buku $buku)
    {
        
        $request->validate([
            'UserID' => 'required',
            'BukuID' => 'required',
        ]);

        $user = User::find($request->UserID);
        $buku = Buku::find($request->BukuID);

        if (!$user || !$buku) {
            return redirect()->route('listbuku')->with('error', 'User atau buku tidak valid.');
        }

        // Cek apakah buku sudah ada di koleksi pribadi user
        $existingKoleksi = KoleksiPribadi::where('UserID', $user->UserID)->where('BukuID', $buku->BukuID)->first();

        if ($existingKoleksi) {
            $existingKoleksi->delete();
            return redirect()->route('listbuku')->with('warning', 'Buku dihapus dari koleksi.');
           // return redirect()->route('listbuku')->with('warning', 'Buku sudah ada dalam koleksi pribadi.');
        }

        Koleksipribadi::create([
            'UserID'    => $request->UserID,
            'BukuID' => $request->BukuID,
            'Status' => '1'
        ]);

        return redirect(route('listbuku'))->with('success', 'Buku berhasil ditambahkan ke koleksi pribadi.');;
    }
}