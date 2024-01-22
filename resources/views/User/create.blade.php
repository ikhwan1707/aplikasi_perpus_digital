<form method="POST" action="{{ route('user.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="Username" class="form-label">{{ __('Username') }}</label>
        <input id="Username" type="text" class="form-control @error('Username') is-invalid @enderror" name="Username"
            value="{{ old('Username') }}" required autocomplete="Username" autofocus>

        @error('Username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="Namalengkap" class="form-label">{{ __('Nama Lengkap') }}</label>
        <input id="Namalengkap" type="text" class="form-control @error('Namalengkap') is-invalid @enderror"
            name="Namalengkap" value="{{ old('Namalengkap') }}" required autocomplete="Namalengkap" autofocus>

        @error('Namalengkap')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>

    <div class="form-group">
        <label for="Email" class="form-label">{{ __('E-Mail') }}</label>
        <input id="Email" type="email" class="form-control @error('Email') is-invalid @enderror" name="Email"
            value="{{ old('Email') }}" required autocomplete="Email">

        @error('Email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>

    <div class="form-group">
        <label for="Password" class="form-label">{{ __('Password') }}</label>
        <input id="Password" type="password" class="form-control @error('Password') is-invalid @enderror"
            name="Password" required autocomplete="new-password">

        @error('Password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>

    <div class="form-group">
        <label for="Alamat" class="form-label">{{ __('Alamat') }}</label>
        <textarea id="Alamat" type="password" class="form-control @error('Alamat') is-invalid @enderror" name="Alamat"
            required ></textarea>
    
        @error('Password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    
    </div>

    <div class="form-group mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Simpan') }}
            </button>
        </div>
    </div>
</form>