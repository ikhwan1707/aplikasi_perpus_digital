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
    <div class="d-flex align-items-end row">
        <div class="col-sm-7">
            <div class="card-body">
                <h5 class="card-title text-primary">Apakah kamu yakin ingin mengajukan pinjaman untuk buku ini?</h5>
                <p class="mb-4">
                    {{$buku->Judul}}
                </p>
                <p class="color-red">Rules:</p>
                <ol>
                    <li>Satu Peminjam hanya dapat meminjam satu buku yang sama</li>
                    <li>Batas peminjaman buku adalah 7 hari</li>
                    <li>Siap bertanggung jawab atas buku</li>
                    <li>Mengembalikan buku kepada pengawas tepat waktu</li>
                </ol>

                <form action="{{route('peminjaman.pinjamBuku')}}" method="POST">
                    @csrf
                    <input type="hidden" name="UserID" value="{{Auth::user()->UserID}}">
                    <input type="hidden" name="BukuID" value="{{$buku->BukuID}}">
                    <button type="submit" class="btn btn-sm btn-outline-primary">Ajukan Pinjaman</button>

                    <a href="{{route('listbuku')}}" class="btn btn-sm btn-outline-danger">Batal</a>
                </form>

            </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png">
            </div>
        </div>
    </div>
</div>
@endsection