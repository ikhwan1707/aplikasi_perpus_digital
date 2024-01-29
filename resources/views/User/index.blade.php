@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Data User</h5>
        <div class="d-flex ">
            <a href="{{ route('user.create')}}" class="btn btn-dark btn-sm me-2">Tambah Data User</a>
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
                    <th>Aksi</th>
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
                    <td>
                        <form action="{{route('user.destroy', $user->UserID)}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE" />
                            <a href="{{route('user.edit',$user->UserID)}}" class="btn btn-primary btn-sm">Ubah</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus user ini !!!?')">Hapus</button>
                        </form>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">Data User Kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if ($dataUser->hasPages())
    @include('pagination', ['paginator' => $dataUser])
@endif
    </div>
    
    {{-- {{ $dataUser->links() }} --}}
</div>
@endsection