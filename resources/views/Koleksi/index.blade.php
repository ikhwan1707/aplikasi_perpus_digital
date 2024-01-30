@extends('layouts.main')
@section('content')
@if ($koleksiPribadi->isEmpty())

<div class="container-fluid">
    <div class="misc-wrapper">
        <h2 class="mb-2 mx-2">Koleksi Buku tidak tersedia!</h2>
        <div class="mt-4">
            <img src="{{ asset('assets/img/illustrations/girl-doing-yoga-light.png')}}" alt="girl-doing-yoga-light"
                width="500" class="img-fluid" data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                data-app-light-img="illustrations/girl-doing-yoga-light.png" />
        </div>
    </div>
</div>
@else
<div class="row">
    @foreach($koleksiPribadi as $item)
    <div class="col-sm-4 col-md-4 col-lg-3 mb-4">
        <div class="card">

            <div style="width: 100%; padding-top: 100%; position: relative;">
                <img @if ($item->buku->Image != '')
                src="{{ asset('storage/uploadbukus/'.$item->buku->Image) }}"
                @else
                src="{{asset('assets/img/icons/brands/image-not-found.jpg')}}"
                @endif class="card-img-top" alt="{{ $item->buku->Judul }}"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $item->buku->Judul }}</h5>
                <p class="card-text">Penulis: {{ $item->buku->Penulis }}</p>

                <!-- Tombol Hapus -->
                <form action="{{ route('koleksibuku.destroy', $item->KoleksiID) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus dari koleksi</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection