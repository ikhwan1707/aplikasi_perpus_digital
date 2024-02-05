@extends('layouts.main')
@section('content')
<style>
    .rating i.fas {
        color: #ffbb00;
        font-size: 15px;
    }

    .list-inline {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .list-inline-item:not(:last-child)::after {
        content: " · ";
        color: rgb(171, 169, 169);
        margin-left: 5px;
        font-size: 20px;
    }
</style>
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 mb-4">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-4 mb-4">
                        <div class="square-image">
                            <img draggable="false" class="card-img-top" @if ($bukuShow->Image != '')
                            src="{{ asset('storage/uploadbukus/'.$bukuShow->Image) }}"
                            @else
                            src="{{asset('assets/img/icons/brands/image-not-found.jpg')}}"
                            @endif
                            alt="Card image cap" style="object-fit:cover;">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-8 mb-4">
                        <h3 class="card-title mb-2">{{$bukuShow->Judul}}</h3>

                        <ul class="list-inline mb-2">
                            @php
                            $averageRating = $bukuShow->ulasan->avg('Rating');
                            @endphp
                            <li class="list-inline-item">Terpinjam
                                <small class="text-light fw-semibold">({{$jumlahPeminjaman}})</small>
                            </li>
                            <li class="list-inline-item rating"><i class="fas fa-star"></i>
                                {{ (!$averageRating) ? '0' : $averageRating }}
                                <small class="text-light fw-semibold">(
                                    {{ (!$averageRating) ? '0' : $averageRating }}
                                    rating)</small>
                            </li>
                            <li class="list-inline-item">Ulasan
                                <small class="text-light fw-semibold">({{ $jumlahUlasan }})</small>
                            </li>
                        </ul>
                        <hr class="m-0" />
                        <div class="nav-align-top mb-4">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-detail" aria-controls="navs-justified-detail"
                                        aria-selected="true">
                                        <i class="tf-icons bx bx-list-ul"></i> Detail

                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-justified-ulasan" aria-controls="navs-justified-ulasan"
                                        aria-selected="false">
                                        <i class="tf-icons bx bx-user"></i> Ulasan
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="navs-justified-detail" role="tabpanel">
                                    <p class="fw-semibold d-block mb-0">Penulis:
                                        <small class="text-muted">{{$bukuShow->Penulis}}</small>
                                    </p>
                                    <p class="fw-semibold d-block mb-0">Penerbit:
                                        <small class="text-muted">{{$bukuShow->Penerbit}}</small>
                                    </p>
                                    <p class="fw-semibold d-block mb-0">Tahun Terbit:
                                        <small class="text-muted">{{$bukuShow->TahunTerbit}}</small>
                                    </p>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">Deskripsi:</span>
                                        <p class="mb-0">
                                            {!!$bukuShow->Deskripsi!!}
                                        </p>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="navs-justified-ulasan" role="tabpanel">
                                    <p>
                                        Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat
                                        cake ice
                                        cream. Gummies halvah tootsie roll muffin biscuit icing dessert gingerbread.
                                        Pastry ice cream
                                        cheesecake fruitcake.
                                    </p>
                                    <p class="mb-0">
                                        Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie
                                        tiramisu halvah
                                        cotton candy liquorice caramels.
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection