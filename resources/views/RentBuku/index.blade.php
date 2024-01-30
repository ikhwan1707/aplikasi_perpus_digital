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
            <img src="{{ asset('assets/img/illustrations/girl-doing-yoga-light.png')}}" alt="girl-doing-yoga-light" width="500"
                class="img-fluid" data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                data-app-light-img="illustrations/girl-doing-yoga-light.png" />
        </div>
    </div>
</div>
@else
<div class="row">
    @foreach ($Buku as $buku)
    <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
        <div class="card">
            <img draggable="false" class="card-img-top" @if ($buku->Image != '')
            src="{{ asset('storage/uploadbukus/'.$buku->Image) }}"
            @else
            src="{{asset('assets/img/icons/brands/image-not-found.jpg')}}"
            @endif
            alt="Card image cap" >
            <div class="card-body">
                <h5 class="card-title">{{$buku->Judul}}</h5>
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
                        <button class="btn btn-icon btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-offset="0,4"
                            data-bs-placement="bottom" data-bs-html="true"
                            title="<i class='bx bx-heart bx-xs' ></i> <span>Hapus dari Koleksi</span>">
                            <span class="tf-icons bx bx-heart"></span>
                        </button>
                        @else
                        <button class="btn btn-icon btn-outline-danger btn-sm" data-bs-toggle="tooltip"
                            data-bs-offset="0,4" data-bs-placement="bottom" data-bs-html="true"
                            title="<i class='bx bx-heart bx-xs' ></i> <span>Tambah ke Koleksi</span>">
                            <span class="tf-icons bx bx-heart"></span>
                        </button>

                        @endif

                        <form action="{{ route('listbuku.favorite') }}" method="post">
                            {{ csrf_field() }}
                            <button class="btn btn-outline-primary btn-sm">Pinjam</button>
                        </form>
                    </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
<script>
    document.getElementById('kategoriSelect').addEventListener('change', function() {
            document.getElementById('searchForm').submit();
        });
</script>
@endsection