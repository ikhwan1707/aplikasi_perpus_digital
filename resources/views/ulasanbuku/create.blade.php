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
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Ulasan Buku</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-4 mb-4">
                        <div class="square-image">
                            <img draggable="false" class="card-img-top" @if ($buku->Image != '')
                            src="{{ asset('storage/uploadbukus/'.$buku->Image) }}"
                            @else
                            src="{{asset('assets/img/icons/brands/image-not-found.jpg')}}"
                            @endif
                            alt="Card image cap" style="object-fit:
                            cover;">
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-8 mb-4">
                        <form action="{{route('ulasan.store')}}" method="POST">
                            <h3 class="card-title">{{$buku->Judul}}</h3>
                            <span class="card-text">{{$buku->Penulis}}</span>
                            <p class="card-text">{{$buku->Penerbit}}</p>
                            <p class="card-text">Bagaimana kualitas buku ini secara keseluruhan?</p>
                            <div class="rating mb-4">
                                <i class="far fa-star" data-rating="1" title="Sangat Buruk"></i>
                                <i class="far fa-star" data-rating="2" title="Buruk"></i>
                                <i class="far fa-star" data-rating="3" title="Cukup"></i>
                                <i class="far fa-star" data-rating="4" title="Baik"></i>
                                <i class="far fa-star" data-rating="5" title="Sangat Baik"></i>
                                <input type="hidden" name="Rating" id="selected-rating" required>
                            </div>
                            <p class="card-text">Berikan ulasan untuk buku ini</p>

                            {{ csrf_field() }}
                            <input type="hidden" name="BukuID" value="{{$buku->BukuID}}" />
                            <input type="hidden" name="UserID" value="{{auth()->user()->UserID}}" />
                            <div class="col-12 mb-4">
                                <textarea name="Ulasan" class="form-control"
                                    placeholder="Tuliskan Deskripsi Anda mengenai buku ini" required
                                    style="height: 76px; width:100%; resize:none"></textarea>
                            </div>
                            <div class="row">
                                <div>
                                    <a href="/listbuku" class="btn btn-outline-dark">Kembali</a>
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<style>
    .rating {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .rating i {
        font-size: 24px;
        color: #d3d3d3;
        transition: color 0.3s;
    }

    .rating i.fas {
        color: #ffbb00;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
            const stars = document.querySelectorAll('.rating i');
            const ratingInput = document.getElementById('selected-rating');
            let selectedRating = 0;
            
            stars.forEach(star => {
                star.addEventListener('mouseover', () => {
                    const ratingValue = star.getAttribute('data-rating');
                    highlightStars(ratingValue);
                });

                star.addEventListener('mouseout', () => {
                    resetStars();
                });

                star.addEventListener('click', () => {
                    const ratingValue = star.getAttribute('data-rating');
                    selectedRating = ratingValue;
                    ratingInput.value = selectedRating;
                    //alert('You clicked on ' + ratingValue + ' stars!');
                    // You can perform further actions, such as submitting the rating via AJAX
                });
            });

            function highlightStars(rating) {
                stars.forEach(star => {
                    const starRating = star.getAttribute('data-rating');
                    star.classList.toggle('fas', starRating <= rating || starRating <=selectedRating); 
                });
            }

            function resetStars() {
                stars.forEach(star => {
                    star.classList.remove('fas');
                });

                // Mengembalikan warna bintang yang sudah dipilih
                if (selectedRating !== 0) {
                stars.forEach(star => {
                const starRating = star.getAttribute('data-rating');
                star.classList.toggle('fas', starRating <= selectedRating); }); }
            }
        });
</script>

@endsection