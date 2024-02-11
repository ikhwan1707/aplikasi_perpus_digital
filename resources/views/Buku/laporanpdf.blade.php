<!-- pdf.blade.php -->

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
            margin: 50px;
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
            width: 100%;
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

    <h2>Data Buku</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $buku)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$buku->KodeBuku}}</td>
                <td>{{$buku->Judul}}</td>
                <td>{{$buku->Kategoribuku->NamaKategori}}</td>
                <td>{{$buku->Penulis}}</td>
                <td>{{$buku->Penerbit}}</td>
                <td>{{$buku->TahunTerbit}}</td>
                <td>{{$buku->Stock}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>