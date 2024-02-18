@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tambah Kategoru</h5>
                <small class="text-muted float-end"></small>
            </div>

            <div class="card-body">
                @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissible" role="alert" id="notification">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('kategoribuku.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                        <label for="NamaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nama Kategori" name="NamaKategori">

                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/kategoribuku" class="btn btn-dark">Kembali</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection