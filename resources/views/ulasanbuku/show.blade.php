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
                                        <p class="mb-2">
                                            {!!$bukuShow->Deskripsi!!}
                                        </p>
                                    </div>
                                    <div class="flex-grow-1">
                                        <a href="{{route('peminjaman.index',$bukuShow->BukuID)}}"
                                            class="{{$bukuShow->Stock == 0 ? 'btn btn-outline-danger btn-sm disabled' : 'btn btn-outline-primary'}} ">Pinjam
                                            Buku</a>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="navs-justified-ulasan" role="tabpanel">
                                    @forelse($ulasan as $ulasanItem)
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{ asset('assets/img/avatars/1.png') }}"
                                                class="w-px-50 h-auto rounded-circle" alt="User Photo">
                                        </div>
                                        <div class="col-md-10">
                                            <h5 class="mb-0">{{ $ulasanItem->user->Username }}</h5>
                                            <div class="rating">
                                                {{-- @php
                                                $averageRating = $bukuShow->ulasan->avg('Rating');
                                                @endphp
                                                @for ($i = 1; $i <= 5; $i++) @if ($i <=$averageRating) <i
                                                    class="fas fa-star"></i>
                                                    @elseif ($i - 0.5 <= $averageRating) <i
                                                        class="fas fa-star-half-alt"></i>
                                                        @else
                                                        <i class="far fa-star"></i>
                                                        @endif
                                                        @endfor --}}
                                                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$ulasanItem->Rating)
                                                            <i class="fas fa-star"></i>
                                                            @else
                                                            <i class="far fa-star"></i>
                                                            <!-- Bintang kosong jika rating < $i - 0.5 -->
                                                            @endif
                                                            @endfor
                                            </div>
                                            <p>{{ $ulasanItem->Ulasan }}</p>
                                        </div>
                                    </div>
                                    @empty
                                    <p>Tidak Ada Ulasan</p>
                                    @endforelse

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