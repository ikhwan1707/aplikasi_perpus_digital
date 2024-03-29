@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Ubah Kategori Buku</h5>
                <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form action="{{ route('kategoribuku.update', $dataeditkategori->KategoriID)}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="row mb-3">
                        <label for="NamaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Nama Kategori" name="NamaKategori"
                                value="{{$dataeditkategori->NamaKategori}}">
                            @error('NamaKategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <a href="/kategoribuku" class="btn btn-dark">Kembali</a>
                        </div>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection