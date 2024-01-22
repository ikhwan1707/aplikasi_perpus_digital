<form action="{{ route('kategoribuku.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="NamaKategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" placeholder="Nama Kategori" name="NamaKategori">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>