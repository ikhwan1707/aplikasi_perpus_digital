<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Report</title>
    <style>
        /* Gaya CSS untuk laporan */
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        @page {
            margin: 0px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .header p {
            font-size: 16px;
            margin: 5px 0;
        }

        table {

            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Perpustakaan Digital SMK Informatika Utama</h1>
        <p>JL. JCC KOMPLEKS PT.PLN P3B JAWA BALI NO.61 KRUKUT</p>
        <p>Telp: (021)753-0843 | Email: smki-utama@smki-gratis.sch.id</p>
    </div>


    <h3>Laporan Peminjaman Periode ({{ $tanggalBulanTahunawal }} - {{ $tanggalBulanTahunakhir }})</h3>
    <table>
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
        <tbody>
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
</body>

</html>