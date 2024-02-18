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
                    <th>Username</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse($datapeminjam as $peminjaman)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peminjaman->user->Username }}</td>
                    <td>{{ $peminjaman->buku->Judul }}</td>
                    <td>{{ $peminjaman->TanggalPeminjaman }}</td>
                    <td>
                        @if(\Carbon\Carbon::now()->toDateString() >= $peminjaman->TanggalPengembalian)
                        {{ $peminjaman->TanggalPengembalian}} <span class="badge bg-white text-danger">Terlambat</span>
                        @else
                        {{ $peminjaman->TanggalPengembalian}}
                        @endif
                        {{-- {{ $peminjaman->TanggalPengembalian }} {{ \Carbon\Carbon::now()->toDateString() }} --}}
                    </td>
                    <td>{{ $peminjaman->StatusPeminjaman }}</td>
                    <td>
                        @if($peminjaman->StatusPeminjaman == 'dipinjam')
                        <form action="{{ route('peminjaman.kembalikanBuku') }}" method="post">
                            @csrf
                            <input type="hidden" name="PeminjamanID" value="{{ $peminjaman->PeminjamanID }}">
                            <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
                        </form>
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