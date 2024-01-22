@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tambah User</h5>
                <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}">
                    {{ csrf_field() }}
                    <div class="row mb-3">
                        <label for="Username" class="col-sm-2 col-form-label">{{ __('Username') }}</label>

                        <div class="col-sm-10">
                            <input id="Username" type="text"
                                class="form-control @error('Username') is-invalid @enderror" name="Username"
                                value="{{ old('Username') }}" required autocomplete="Username" autofocus>

                            @error('Username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>

                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Namalengkap" class="col-sm-2 col-form-label">{{ __('Nama Lengkap') }}</label>

                        <div class="col-sm-10">
                            <input id="Namalengkap" type="text"
                                class="form-control @error('Namalengkap') is-invalid @enderror" name="Namalengkap"
                                value="{{ old('Namalengkap') }}" required autocomplete="Namalengkap" autofocus>

                            @error('Namalengkap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="Email" class="col-sm-2 col-form-label">{{ __('E-Mail') }}</label>
                        <div class="col-sm-10">
                            <input id="Email" type="email" class="form-control @error('Email') is-invalid @enderror"
                                name="Email" value="{{ old('Email') }}" required autocomplete="Email">

                            @error('Email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="Password" class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                        <div class="col-sm-10">
                            <input id="Password" type="password"
                                class="form-control @error('Password') is-invalid @enderror" name="Password" required
                                autocomplete="new-password">

                            @error('Password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Alamat" class="col-sm-2 col-form-label">{{ __('Alamat') }}</label>
                        <div class="col-sm-10">
                            <textarea id="Alamat" type="password"
                                class="form-control @error('Alamat') is-invalid @enderror" name="Alamat"
                                required>{{ old('Alamat') }}</textarea>

                            @error('Password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Role" class="col-sm-2 col-form-label">{{ __('Role') }}</label>
                        <div class="col-sm-10">
                            <select id="Role" name="Role" class="form-control @error('Role') is-invalid @enderror" required>
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                                <option value="user">User</option>
                            </select>
                           
                    
                            @error('Role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/user" class="btn btn-dark">Kembali</a>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection