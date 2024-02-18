@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Data User</h5>
        <div class="d-flex ">
            <a href="{{ route('laporanuser.pdf')}}" class="btn btn-dark btn-sm me-2">Cetak Laporan User Pdf</a>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert" id="notification">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse ( $dataUser as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->Username}}</td>
                    <td>{{ $user->Namalengkap }}</td>
                    <td>{{ $user->Email}}</td>
                    <td>{{ $user->Alamat }}</td>
                    <td>{{ $user->Role}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">Data User Kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">
            @if ($dataUser->hasPages())
            @include('pagination', ['paginator' => $dataUser])
            @endif
        </div>
    </div>

    {{-- {{ $dataUser->links() }} --}}
</div>
@endsection