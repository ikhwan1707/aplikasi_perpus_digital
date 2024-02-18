@extends('layouts.main')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Peminjaman Periode</h5>
        <div class="d-flex ">
            <form action="{{ route('laporanpeminjaman.filter') }}" method="GET">
                <div class="input-group mb-3 col-md-4 float-right">
                    <input type="text" id="date_range" name="date_range" class="form-control">
                    <button class="btn btn-secondary" type="submit">Filter</button>
                </div>
            </form>
            <form action="{{ route('laporanpeminjaman.peminjamanpdf') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="start_date" value="{{ $startDate }}">
                <input type="hidden" name="end_date" value="{{ $endDate }}">
                <button type="submit" target="_blank" class="btn btn-dark">Generate PDF</button>
            </form>
            {{-- <form action="{{ route('laporanpeminjaman.index') }}" method="get">
                <div class="input-group mb-3 col-md-4 float-right">
                    <input type="text" id="created_at" name="date" class="form-control">
                    <div class="btn-group" role="group">
                        <button class="btn btn-secondary" type="submit">Filter</button>
                    </div>
                    <a target="_blank" class="btn btn-dark" id="exportpdf">Export PDF</a>
                </div>

            </form> --}}
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Tanggal Pengembalian Aktual</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ( $peminjaman as $val)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$val->user->Username}}</td>
                    <td>{{$val->buku->Judul}}</td>
                    <td>{{ $val->TanggalPeminjaman }}</td>
                    <td>{{ $val->TanggalPengembalian }}</td>
                    <td>{{$val->Tanggalpengembalianaktual}}</td>
                    <td>{{ $val->StatusPeminjaman }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Data Kosong</td>
                </tr>

                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
{{-- <script>
    $(function() {
        let start = moment().startOf('month');
        let end = moment().endOf('month');
        
        //KEMUDIAN TOMBOL EXPORT PDF DI-SET URLNYA BERDASARKAN TGL TERSEBUT
        $('#exportpdf').attr('href', '/laporanpeminjaman/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

        //INISIASI DATERANGEPICKER
        $('#created_at').daterangepicker({
            startDate: start,
            endDate: end
        }, function(first, last) {
            //JIKA USER MENGUBAH VALUE, MANIPULASI LINK DARI EXPORT PDF
            
            $('#exportpdf').attr('href', '/laporanpeminjaman/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
            
        });
    });
</script> --}}
<script>
    $(document).ready(function() {
        let start = moment().startOf('month');
        let end = moment().endOf('month');

        $('#date_range').daterangepicker(
            {
            startDate: start,
            endDate: end
            }
        );
    });
</script>
@endsection