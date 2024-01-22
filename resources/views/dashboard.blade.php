@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang di Aplikasi Perpustakaan Digital</h5>
                        <p class="mb-4">
                            Pusat Kontrol Perpustakaan Digital
                        </p>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-12 col-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Data Administrator</span>
                <h3 class="card-title mb-2">{{$countAdmin}}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Data Petugas</span>
                <h3 class="card-title text-nowrap mb-1">{{$countPetugas}}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Data User</span>
                <h3 class="card-title text-nowrap mb-2">{{$countPeminjam}}</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-12 col-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Data Kategori Buku</span>
                <h3 class="card-title text-nowrap mb-1">{{$countKategori}}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Data Buku</span>
                <h3 class="card-title mb-2">{{$countBuku}}</h3>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12 col-4 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                    </div>
    
                </div>
                <span class="fw-semibold d-block mb-1">Data Peminjaman dan Pengembalian</span>
                <h3 class="card-title mb-2">$14,857</h3>
            </div>
        </div>
    </div>
</div>
@endsection