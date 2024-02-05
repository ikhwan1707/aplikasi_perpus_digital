@extends('layouts.main')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Buku</h5>
        <div class="d-flex ">
            <a href="{{ route('buku.create')}}" class="btn btn-dark btn-sm me-2">Tambah Buku</a>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible" role="alert" id="notification">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Kategori Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Gambar Buku</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ( $dataBuku as $buku)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$buku->KodeBuku}}</td>
                    <td>{{$buku->Judul}}</td>
                    <td>{{$buku->Kategoribuku->NamaKategori}}</td>
                    <td>{{$buku->Penulis}}</td>
                    <td>{{$buku->Penerbit}}</td>
                    <td>{{$buku->TahunTerbit}}</td>
                    <td>
                        <img src="{{ asset('storage/uploadbukus/' . $buku->Image) }}" width="100px" height="100px"
                            alt="{{ $buku->Judul }}">
                    </td>
                    <td>{{$buku->Stock}}</td>
                    <td>{{$buku->Status}}</td>
                    <td>

                        <form action="{{route('buku.destroy',$buku->BukuID)}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE" />
                            <input type="hidden" id="BukuId" value="{{ $buku->BukuID }}">
                            <button type="button" class="btn btn-info btn-sm lihat-btn" data-bs-toggle="modal"
                                id="lihat" data-bs-target="#backDropModal" data-bukuid="{{ $buku->BukuID }}">
                                Lihat
                            </button>
                            <a href="{{route('buku.edit',$buku->BukuID)}}" class="btn btn-primary btn-sm">Ubah</a>
                            <button type="submit" name="hapus" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah anda yakin ingin menghapus Buku ini !!!?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11">Data Buku Kosong.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-2">
            {{ $dataBuku->links() }}
        </div>

    </div>


    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Detail Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body-content">

                </div>
                <div class="modal-footer">

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // AJAX untuk mengambil data berdasarkan ID
    $(function () {
        $('.lihat-btn').on('click', function() {
            var Idbuku = $(this).data('bukuid');//document.getElementById('BukuId').value; // Ganti dengan ID yang sesuai
            console.log(Idbuku);
            $.ajax({
                type: 'GET',
                url: '/get-buku/' + Idbuku,
                success: function(response) {
                    console.log(response);
                    //Isi konten modal dengan data dari server
                    $('#modal-body-content').html(
                        '<div class="col-md-6 col-lg-12 mb-12">'+
                            '<div class="card h-100">'+
                                '<img src="storage/uploadbukus/' + response.buku.Image + '" alt="' + response.buku.Judul + '" class="card-img-top">' +
                                '<div class="card-body">'+
                                    '<h5 class="card-title">'+ response.buku.Judul +'</h5>'+
                                    '<p class="card-title">'+ response.buku.Penulis +'</p>'+
                                    '<p class="card-text">'+ response.buku.Deskripsi +'</p>' +
                                '</div>' +
                            '</div>'+
                        '</div>'
                    );

                    // Tampilkan modal
                    $('#backDropModal').modal('show');
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script>

@endsection