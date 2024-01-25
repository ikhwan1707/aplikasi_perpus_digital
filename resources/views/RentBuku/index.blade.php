@extends('layouts.main')
@section('content')
<form action="">
    <div class="row">
        <div class="col-6 col-md-3 col-lg-4 ">
            <div class="input-group mb-3">
                <select name="Kategoribuku" id="" class="form-select ">
                    <option value="">Pilih Kategori</option>
                    @foreach ($Kategoribuku as $item)
                    <option value="{{$item->KategoriID}}">{{$item->NamaKategori}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-6 col-md-3 col-lg-8 ">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" name="title" />
                <button type="submit" class="btn btn-primary">Pindai</button>
            </div>
        </div>
    </div>
</form>
<div class="row">
    @foreach ($Buku as $item)
    <div class="col-sm-4 col-md-4 col-lg-4 mb-3">
        <div class="card">
            <img draggable="false" class="card-img-top" @if ($item->Image != '')
            src="{{ asset('storage/uploadbukus/'.$item->Image) }}"
            @else
            src="{{asset('assets/img/icons/brands/image-not-found.jpg')}}"
            @endif
            alt="Card image cap" >
            <div class="card-body">
                <h5 class="card-title">{{$item->Judul}}</h5>
                <p class="card-text">
                    Kode Buku: {{$item->KodeBuku}}
                </p>
                <div class="d-flex justify-content-between">
                    @if (Auth::user() == '')
                    <a href="#" class="btn btn-outline-primary btn-sm">Login</a>
                    @else
                    <a href="#" class="btn btn-outline-primary btn-sm">Pinjam</a>
                    @endif
                    <p class="card-text text-end {{$item->status == 'in Stock' ? 'text-success' : 'text-danger'}}">
                        {{$item->Status}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection