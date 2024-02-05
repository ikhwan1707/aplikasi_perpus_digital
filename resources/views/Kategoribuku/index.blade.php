@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Kategori Buku</h5>
        <div class="d-flex ">
            <a href="{{ route('kategoribuku.create')}}" class="btn btn-dark btn-sm me-2">Tambah Kategori Buku</a>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert" id="notification">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-primary btn-sm" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori Buku</th>
                    <th>Tanggal di input</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($dataKategoriBuku as $kategoribuku)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategoribuku->NamaKategori}}</td>
                    <td>{{ $kategoribuku->created_at}}</td>
                    <td>

                        <form action="{{ route('kategoribuku.destroy', $kategoribuku->KategoriID) }}" method="POST"
                            class="d-inline">
                            <input type="hidden" name="_method" value="delete" />
                            {{ csrf_field() }}
                            <a href="{{ route('kategoribuku.edit', $kategoribuku->KategoriID) }}"
                                class="btn btn-primary btn-sm">Ubah</a>
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Apakah anda yakin ingin menghapus kategori ini !!!?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Data Kategori Buku Kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">
            {{ $dataKategoriBuku->links() }}
        </div>
    </div>

</div>
@endsection