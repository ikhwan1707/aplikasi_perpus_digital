@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Riwayat Pengembalian</h5>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Tanggal Pengembalian Aktual</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($datapengembalian as $pengembalian)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengembalian->user->Username }}</td>
                    <td>{{ $pengembalian->buku->Judul }}</td>
                    <td>{{ $pengembalian->TanggalPeminjaman }}</td>
                    <td>{{ $pengembalian->TanggalPengembalian }}</td>
                    <td>{{ $pengembalian->Tanggalpengembalianaktual }}</td>
                    <td>{{ $pengembalian->StatusPeminjaman }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Data Pengembalian Kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">
            {{ $datapengembalian->links() }}
        </div>
    </div>
</div>
@endsection