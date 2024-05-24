<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pembayaran Siswa</title>
    <style>
        body {
            text-align: center; /* Posisi teks tengah */
            background-color: white; /* Latar belakang putih */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto; /* Posisi tabel tengah */
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center; /* Posisi teks tengah dalam sel tabel */
        }
        th {
            background-color: #f2f2f2;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

<h2>Data Pembayaran Siswa</h2>
<img src="depan/images/hikka.jpg" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; display: block; margin-left: auto; margin-right: auto;" alt="Gambar Lingkaran">


<h5 class="card-text">{{ now()->format('l, d F Y H:i:s') }} WIB</h5>

<!-- <h5> Rekap data pada Tanggal {{ date('d-M-Y') }}</h5> -->
<hr>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pembayaran as $key => $bayar)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $bayar->nama}}</td>
            <td>{{ $bayar->keterangan }}</td>
            <td>Rp. 500.000</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" style="text-align:right;"><strong>Total :</strong></td>
            <td><strong>Rp. {{ number_format($pembayaran->count() * 500000, 0, ',', '.') }}</strong></td>
        </tr>
    </tfoot>
</table>

</body>
</html>
