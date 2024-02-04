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
<form action="{{ route('listbuku') }}" method="GET" id="searchForm">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 ">
            <div class="input-group mb-3">
                <select name="Kategoribuku" id="kategoriSelect" class="form-select ">
                    <option value="" selected disabled>Pilih Kategori</option>
                    <option value="">All</option>
                    @foreach ($Kategoribuku as $buku)
                    <option value="{{$buku->KategoriID}}">{{$buku->NamaKategori}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-8 ">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" name="title" />
                <button type="submit" class="btn btn-primary">Pindai</button>
            </div>
        </div>
    </div>
</form>
@if ($Buku->isEmpty())

<div class="container-fluid">
    <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">Kategori Buku tidak tersedia!</h2>
        <p class="mb-4 mx-2">Maaf Kategori Buku yang anda cari tidak tersedia</p>
        <a href="{{route('listbuku')}}" class="btn btn-primary">Kembali ke data buku</a>
        <div class="mt-4">
            <img src="{{ asset('assets/img/illustrations/girl-doing-yoga-light.png')}}" alt="girl-doing-yoga-light"
                width="500" class="img-fluid" data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                data-app-light-img="illustrations/girl-doing-yoga-light.png" />
        </div>
    </div>
</div>
@else
<div class="row">
    @foreach ($Buku as $buku)
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card card-square">
            <div class="card-img-container" style="width: 100%; padding-top: 100%; position: relative;">
                <img draggable="false" class="card-img-top" @if ($buku->Image != '')
                src="{{ asset('storage/uploadbukus/'.$buku->Image) }}"
                @else
                src="{{asset('assets/img/icons/brands/image-not-found.jpg')}}"
                @endif
                alt="Card image cap" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit:
                cover;">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$buku->Judul}}</h5>
                @if ($buku->ulasan->isNotEmpty())
                <div class="rating">
                    @php
                    $averageRating = $buku->ulasan->avg('Rating');
                    $roundedRating = round($averageRating * 2) / 2;
                    @endphp
                    @for ($i = 1; $i <= 5; $i++) @if ($i <=$averageRating) <i class="fas fa-star"></i>
                        @elseif ($i - 0.5 <= $averageRating) <i class="fas fa-star-half-alt"></i>
                            @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                    <span style="font-size: 12px;">{{ $averageRating }}</span>
                </div>
                @endif
                <span class="card-text"> Kode Buku: {{$buku->KodeBuku}}</span>
                <p class="card-text"> Status: <span
                        class="{{$buku->Status == 'Tersedia' ? 'text-success' : 'text-danger'}}">
                        {{$buku->Status}}</span></p>

                <div class="demo-inline-spacing">
                    @if (Auth::user() == '')
                    <a href="{{route('login')}}" class="btn btn-outline-primary btn-sm">Login</a>
                    @else
                    <form action="{{ route('listbuku.favorite') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="BukuID" value="{{$buku->BukuID}}" />
                        <input type="hidden" name="UserID" value="{{auth::user()->UserID}}" />

                        @if ($buku->Koleksipribadi->contains('UserID', $userID))
                        <button class="btn btn-icon btn-danger btn-sm">
                            <span class="tf-icons bx bx-heart"></span>
                        </button>
                        @else
                        <button class="btn btn-icon btn-outline-danger btn-sm">
                            <span class="tf-icons bx bx-heart"></span>
                        </button>

                        @endif


                        <a href="{{route('peminjaman.index',$buku->BukuID)}}"
                            class="{{$buku->Stock == 0 ? 'btn btn-outline-danger btn-sm disabled' : 'btn btn-outline-primary btn-sm'}} ">Pinjam</a>

                        @if ($buku->peminjaman && $buku->peminjaman->isNotEmpty())
                        {{-- Tombol Beri Ulasan --}}
                        @if ($buku->peminjaman->first()->StatusPeminjaman == 'dikembalikan')
                            @if ($buku->ulasan->isNotEmpty())
                            <a href="{{ route('ulasan.show', $buku->BukuID) }}" class="btn btn-outline-warning btn-sm">
                                Lihat Ulasan
                            </a>
                            @else
                            <a href="{{ route('ulasan.create', $buku->BukuID) }}" class="btn btn-outline-warning btn-sm">
                                Beri Ulasan
                            </a>
                            @endif
                        @endif
                        @endif
                    </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
<style>
    .rating i.fas {
        color: #ffbb00;
    }
</style>
<script>
    document.getElementById('kategoriSelect').addEventListener('change', function() {
            document.getElementById('searchForm').submit();
        });
</script>
@endsection