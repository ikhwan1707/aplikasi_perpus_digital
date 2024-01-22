@extends('layouts.main')
@section('content')
<div class="col-12">
    <a href="{{ route('user.create')}}" class="btn btn-primary">Tambah Data User</a>
</div>
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
                <a href="{{route('user.edit',$user->UserID)}}" class="btn btn-primary">Ubah</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8">Data User Kosong.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection