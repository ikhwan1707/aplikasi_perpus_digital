<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Buku;
use App\Peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $buku = Buku::where('BukuID', $id)->first();
        return view('Peminjaman.index', compact('buku'));
    }

    public function riwayatPeminjaman()
    {
        $datapeminjam = Peminjaman::where('StatusPeminjaman', 'dipinjam')->get();

        return view('Peminjaman.riwayat', compact('datapeminjam'));
    }

    public function riwayatPengembalian()
    {
        $datapengembalian = Peminjaman::where('StatusPeminjaman', 'dikembalikan')->orderBy('created_at', 'desc')->paginate(10);
        return view('Peminjaman.pengembalian', compact('datapengembalian'));
    }
    public function pinjamBuku(Request $request)
    {
        //dd($request);
        $request->validate([
            'UserID' => 'required',
            'BukuID' => 'required',
        ]);

        $buku = Buku::find($request->BukuID);
        if ($buku->Stock <= 0) {
            return redirect()->back()->with('error', 'Stok buku habis.');
        }

        // Cek apakah user sudah meminjam buku yang sama
        $userAlreadyBorrowedBook = Peminjaman::where('UserID', $request->UserID)
            ->where('BukuID', $request->BukuID)
            ->where('StatusPeminjaman', 'dipinjam')
            ->exists();

        if ($userAlreadyBorrowedBook) {
            return redirect()->back()->with('error', 'User sudah meminjam buku ini.');
        }

        // Validasi aturan khusus (contoh: tidak boleh meminjam lebih dari 3 buku yang berbeda)
        $userBorrowedBooksCount = Peminjaman::where('UserID', $request->UserID)
            ->where('StatusPeminjaman', 'dipinjam')
            ->count();

        if ($userBorrowedBooksCount >= 3) {
            return redirect()->back()->with('error', 'User tidak dapat meminjam lebih dari 3 buku.');
        }

        // Tentukan tanggal pengembalian
        $tanggalPengembalian = Carbon::now()->addDays(7);

        // Simpan peminjaman
        Peminjaman::create([
            'UserID' => $request->UserID,
            'BukuID' => $request->BukuID,
            'TanggalPeminjaman' => now(),
            'TanggalPengembalian' => $tanggalPengembalian,
            'StatusPeminjaman' => 'dipinjam',
        ]);

        // Kurangi stok buku
        $buku->decrement('Stock');
        // Periksa apakah stok sekarang 0
        if ($buku->Stock == 0) {
            // Jika stok habis, ubah status buku menjadi tidak tersedia
            $buku->update(['Status' => 'Tidak tersedia']);
        }

        return redirect(route('ulasan.index'))->with('success', 'Buku berhasil dipinjam.');
    }

    public function kembalikanBuku(Request $request)
    {
        // Validasi request
        $request->validate([
            'PeminjamanID' => 'required',
        ]);

        // Cari peminjaman
        $peminjaman = Peminjaman::findOrFail($request->PeminjamanID);

        // Periksa apakah buku sudah dikembalikan
        if ($peminjaman->StatusPeminjaman == 'dikembalikan') {
            return redirect()->back()->with('error', 'Buku sudah dikembalikan sebelumnya.');
        }

        // Update status peminjaman menjadi 'kembali' dan Update tanggal
        $tanggalPengembalianAktual = Carbon::now();
        $peminjaman->update([
            'StatusPeminjaman' => 'dikembalikan',
            'Tanggalpengembalianaktual' => $tanggalPengembalianAktual
        ]);

        // Tambahkan stok buku
        $buku = Buku::find($peminjaman->BukuID);
        $buku->increment('Stock');

        // Update tanggal pengembalian aktual

        // $peminjaman->update(['Tanggalpengembalianaktual' => $tanggalPengembalianAktual]);

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }
}
