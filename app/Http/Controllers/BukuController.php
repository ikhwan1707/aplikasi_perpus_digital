<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Kategoribuku;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataBuku = Buku::with(['Kategoribuku'])->orderBy('created_at', 'desc')->paginate(10);
        return view('Buku.index', compact('dataBuku'));
    }

    public function indexReport()
    {
        $dataBuku = Buku::with(['Kategoribuku'])->orderBy('created_at', 'desc')->paginate(10);
        return view('Buku.laporanbuku', compact('dataBuku'));
    }

    public function generatebukuPdf()
    {
        $buku = Buku::all();
        //dd($buku); 
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);

        // Set paper size and orientation (landscape)
        $dompdf->setPaper('A4', 'landscape');

        // Load HTML content
        $html = view('Buku.laporanpdf', compact('buku'))->render();
        $dompdf->loadHtml($html);

        // Render the PDF
        $dompdf->render();

        // Output the generated PDF (inline or attachment)
        return $dompdf->stream('Laporanbuku.pdf'); // Inline display

        // $pdf = PDF::loadView('Buku.laporanpdf', compact('buku'));
        // return $pdf->stream();
        //return $pdf->download('laporan_buku.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataKategoribuku = Kategoribuku::all();
        return view('Buku.create', compact('dataKategoribuku'));
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
        $message = [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
                'file' => 'File :attribute tidak boleh lebih dari :max kilobita.',
            ],
        ];

        $rules = [
            'KodeBuku'  => 'required',
            'KategoriID' => 'required',
            'Judul' => 'required|string',
            'Deskripsi' => 'required',
            'Penulis' => 'required|string',
            'Penerbit' => 'required|string',
            'TahunTerbit' => 'required',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Stock' => 'required|integer',
        ];

        $this->validate($request, $rules, $message);

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $filename = time() . Str::slug($request->Judul) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploadbukus', $filename);

            Buku::create([
                'KategoriID' => $request->KategoriID,
                'KodeBuku'  => $request->KodeBuku,
                'Judul' => $request->Judul,
                'Deskripsi' => $request->Deskripsi,
                'Penulis' => $request->Penulis,
                'Penerbit' => $request->Penerbit,
                'TahunTerbit' => $request->TahunTerbit,
                'Image' => $filename,
                'Stock' => $request->Stock,
                'Status' => "Tersedia"
            ]);

            return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showbuku = Buku::findOrFail($id);
        return response()->json(['buku' => $showbuku]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataKategoribuku = Kategoribuku::all();
        $updatebuku = Buku::findOrFail($id);
        return view('Buku.edit', compact('dataKategoribuku', 'updatebuku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'max' => [
                'string' => 'Kolom :attribute tidak boleh lebih dari :max karakter.',
                'file' => 'File :attribute tidak boleh lebih dari :max kilobita.',
            ],
        ];

        $rules = [
            'KategoriID' => 'required',
            'KodeBuku' => 'required',
            'Judul' => 'required|string',
            'Deskripsi' => 'required',
            'Penulis' => 'required|string',
            'Penerbit' => 'required|string',
            'TahunTerbit' => 'required',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Stock' => 'required|integer',
        ];

        $this->validate($request, $rules, $message);
        $buku = Buku::find($id);
        $filename = $buku->Image;

        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $filename = time() . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploadbukus', $filename);
            File::delete(storage_path('app/public/uploadbukus/' . $buku->Image));
        }

        $buku->update([
            'KategoriID' => $request->KategoriID,
            'KodeBuku'  => $request->KodeBuku,
            'Judul' => $request->Judul,
            'Deskripsi' => $request->Deskripsi,
            'Penulis' => $request->Penulis,
            'Penerbit' => $request->Penerbit,
            'TahunTerbit' => $request->TahunTerbit,
            'Image' => $filename,
            'Stock' => $request->Stock,
        ]);

        return redirect(route('buku.index'))->with(['success' => 'Data Buku berhasil diperbaharui.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletebuku = Buku::find($id);
        File::delete(storage_path('app/public/uploadbukus/' . $deletebuku->Image));
        $deletebuku->delete();
        return redirect(route('buku.index'))->with(['success' => 'Data Buku berhasil dihapus.']);
    }
}
