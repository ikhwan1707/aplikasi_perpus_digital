<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Buku;
use App\Peminjaman;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDF;

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

    public function indexLaporan()
    {
        $startDate = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $endDate = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

        if (request()->date != '') {

            $date = explode(' - ', request()->date);
            $startDate = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $endDate = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }

        $peminjaman = Peminjaman::with(['user', 'buku'])->whereBetween('created_at', [$startDate, $endDate])->get();

        return view('Peminjaman.laporanindex', compact('peminjaman', 'startDate', 'endDate'));
    }

    public function filter(Request $request)
    {
        $dateRange = $request->input('date_range');
        $date = explode(' - ', $dateRange);

        $startDate = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $endDate = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        $peminjaman = Peminjaman::with(['user', 'buku'])->whereBetween('created_at', [$startDate, $endDate])->get();

        return view('Peminjaman.laporanindex', compact('peminjaman', 'startDate', 'endDate'));
    }

    public function peminjamanReportPdf(Request $request)
    {

        // $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
        // //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
        // $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        // $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $tanggalBulanTahunawal = date("Y-m-d", strtotime($startDate));
        $tanggalBulanTahunakhir = date("Y-m-d", strtotime($endDate));

        $peminjaman = Peminjaman::with(['user', 'buku'])->whereBetween('created_at', [$startDate, $endDate])->get();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);

        // Set paper size and orientation (landscape)
        $dompdf->setPaper('A4', 'landscape');

        $html = view('peminjaman.peminjamanpdf', compact('peminjaman', 'tanggalBulanTahunawal', 'tanggalBulanTahunakhir'))->render();
        $dompdf->loadHtml($html);

        // Render the PDF
        $dompdf->render();

        // Output the generated PDF (inline or attachment)
        $namaFile = 'LaporanPeminjamanPeriode_' . $tanggalBulanTahunawal . '_' . $tanggalBulanTahunakhir . '.pdf';
        return $dompdf->stream($namaFile); // Inline display

        //dd($peminjaman);
    }

    public function riwayatPeminjaman()
    {
        $datapeminjam = Peminjaman::where('StatusPeminjaman', 'dipinjam')->orderBy('created_at','desc')->get();
        
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
        $tglkembali = Carbon::parse($tanggalPengembalian)->format('d-m-Y');
        //dd($tglkembali);
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

        return redirect(route('ulasan.index'))->with('success', 'Buku berhasil dipinjam, Silahkan Kembalikan Buku Pada Tanggal ' . $tglkembali);
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
        if ($buku->Stock >= 0) {
            // Jika stok habis, ubah status buku menjadi tidak tersedia
            $buku->update(['Status' => 'Tersedia']);
        }
        // Update tanggal pengembalian aktual

        // $peminjaman->update(['Tanggalpengembalianaktual' => $tanggalPengembalianAktual]);

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }
}