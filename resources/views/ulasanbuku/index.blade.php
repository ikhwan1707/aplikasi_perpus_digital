@extends('layouts.main')
@section('content')
@if (session('success'))
<div class="alert alert-success alert-dismissible" role="alert" id="notification">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible" role="alert" id="notification">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('warning'))
<div class="alert alert-warning alert-dismissible" role="alert" id="notification">
    {{ session('warning') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Riwayat Peminjaman</h5>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Tanggal Pengembalian Aktual</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($datapeminjam as $peminjaman)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peminjaman->buku->Judul }}</td>
                    <td>{{ $peminjaman->TanggalPeminjaman }}</td>
                    <td>{{ $peminjaman->TanggalPengembalian }}</td>
                    <td>{{ $peminjaman->Tanggalpengembalianaktual }}</td>
                    <td>{{ $peminjaman->StatusPeminjaman }}</td>
                    <td>
                        {{-- Tombol Ulasan --}}
                        @if ($peminjaman->StatusPeminjaman == 'dikembalikan')
                        @if ($peminjaman->ulasan)
                        {{-- Jika sudah diberi ulasan --}}
                        <a href="{{ route('ulasan.show', $peminjaman->BukuID) }}"
                            class="btn btn-outline-warning btn-sm">
                            Lihat Ulasan
                        </a>
                        @else
                        {{-- Jika belum diberi ulasan --}}
                        <a href="{{ route('ulasan.create', $peminjaman->BukuID) }}"
                            class="btn btn-outline-warning btn-sm">
                            Beri Ulasan
                        </a>
                        @endif
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Data Peminjaman Kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection