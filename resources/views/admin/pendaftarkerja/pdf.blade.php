<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendaftaran Siswa</title>
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

<h2>Data Laporan Siswa</h2>
<img src="depan/images/hikka.jpg" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; display: block; margin-left: auto; margin-right: auto;" alt="Gambar Lingkaran">


<h5 class="card-text">{{ now()->format('l, d F Y H:i:s') }} WIB</h5>

<!-- <h5> Rekap data pada Tanggal {{ date('d-M-Y') }}</h5> -->
<hr>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Status Pernikahan</th>
            <th>Jenis Kelamin</th>
            <th>No. HP</th>
            <th>Status Data</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pendaftar_kerja as $key => $pendaftar)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $pendaftar->pendaftar_pekerja}}</td>
            <td>{{ $pendaftar->tempat_lahir }}</td>
            <td>{{ $pendaftar->tanggal_lahir }}</td>
            <td>{{ $pendaftar->nikah}}</td>
            <td>{{ $pendaftar->jenis_kelamin }}</td>
            <td>{{ $pendaftar->no_hp }}</td>
            <td>{{ $pendaftar->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
