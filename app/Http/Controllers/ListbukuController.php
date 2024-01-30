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
    public function index(Request $request)
    {
        $query = Buku::query();

        // Filter berdasarkan judul buku jika search term diberikan
        if ($request->has('title')) {

            $query->where('Judul', 'like', '%' . $request->input('title') . '%');
        }

        // Filter berdasarkan kategori buku jika dipilih
        if ($request->has('Kategoribuku')) {
            $query->where('KategoriID', 'like', '%' . $request->input('Kategoribuku'));
        }

        $Kategoribuku = Kategoribuku::all();

        $Buku = $query->with('Koleksipribadi')->get();
        $userID = Auth::id();


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