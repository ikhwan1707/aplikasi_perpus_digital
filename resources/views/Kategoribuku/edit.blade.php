<form action="{{ route('kategoribuku.update', $dataeditkategori->KategoriID)}}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT" />
    <div class="form-group">
        <label for="NamaKategori" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" placeholder="Nama Kategori" name="NamaKategori" value="{{$dataeditkategori->NamaKategori}}">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Ubah</button>
    </div>
</form>