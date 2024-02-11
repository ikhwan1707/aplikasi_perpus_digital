@extends('layouts.main')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Data Buku</h5>
        <div class="d-flex ">
            <a href="{{ route('laporanbuku.pdf')}}" class="btn btn-dark btn-sm me-2" target="blink">Cetak Laporan Buku
                Pdf</a>
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Kategori Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ( $dataBuku as $buku)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$buku->KodeBuku}}</td>
                    <td>{{$buku->Judul}}</td>
                    <td>{{$buku->Kategoribuku->NamaKategori}}</td>
                    <td>{{$buku->Penulis}}</td>
                    <td>{{$buku->Penerbit}}</td>
                    <td>{{$buku->TahunTerbit}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="11">Data Buku Kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">
            {{ $dataBuku->links() }}
        </div>

    </div>
</div>
@endsection