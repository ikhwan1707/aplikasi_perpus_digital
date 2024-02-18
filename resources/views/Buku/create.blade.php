@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tambah Buku</h5>
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
                <form action="{{ route('buku.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                        <label for="KodeBuku" class="col-sm-2 col-form-label">Kode Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Kode Buku" name="KodeBuku"
                                value="{{old('KodeBuku')}}">
                            {{-- @error('KodeBuku')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Judul Buku" name="Judul"
                                value="{{old('Judul')}}">
                            {{-- @error('Judul')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="KategoriID" class="col-sm-2 col-form-label">Kategori Buku</label>
                        <div class="col-sm-10">
                            <select class="form-select kategori-select" name="KategoriID">
                                <option value="">-- Silahkan Pilih --</option>
                                @foreach ( $dataKategoribuku as $kategori)
                                <option value="{{ $kategori->KategoriID }}">{{ $kategori->NamaKategori}}</option>
                                @endforeach
                            </select>
                            {{-- @error('KategoriID')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Penulis" class="col-sm-2 col-form-label">Penulis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Penulis" placeholder="Penulis"
                                value="{{ old('Penulis') }}">
                            {{-- @error('Penulis')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Penerbit" placeholder="Penerbit"
                                value="{{ old('Penerbit') }}">
                            {{-- @error('Penerbit')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="TahunTerbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="TahunTerbit" maxlength="4"
                                value="{{ old('TahunTerbit') }}">
                            {{-- @error('TahunTerbit')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Stock" class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Stock" placeholder="Stock"
                                value="{{ old('Stock') }}">
                            {{-- @error('Stock')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Image" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" name="Image" class="form-control" value="{{ old('Image') }}">
                            {{-- @error('Image')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="Deskripsi" id="Deskripsi"
                                placeholder="Deskripsi Buku">{{old('Deskripsi')}}</textarea>
                            {{-- @error('Deskripsi')
                            <div style="color: red;">{{ $message }}</div>
                            @enderror --}}
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/buku" class="btn btn-dark">Kembali</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<!-- LOAD CKEDITOR -->

<script>
    //TERAPKAN CKEDITOR PADA TEXTAREA DENGAN ID DESCRIPTION
        CKEDITOR.replace('Deskripsi');
</script>
@endsection