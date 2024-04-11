-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2024 pada 05.30
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lembaga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar_belajar`
--

CREATE TABLE `pendaftar_belajar` (
  `id` int(11) NOT NULL,
  `pendaftar_belajar` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat_email` varchar(100) DEFAULT NULL,
  `motivasi` varchar(100) DEFAULT NULL,
  `tingkat_belajar` enum('n1','n2','n3','n4','n5') DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `program_belajar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pendaftar_belajar`
--

INSERT INTO `pendaftar_belajar` (`id`, `pendaftar_belajar`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `usia`, `no_hp`, `alamat_email`, `motivasi`, `tingkat_belajar`, `foto`, `program_belajar`) VALUES
(1, 'Muhammad Allathof', 'Laki-laki', 'Jakarta', '2004-08-03', 18, '08273273', 'Jl sunan ampel', 'Ingin menguasai bahasa asing', 'n4', 'foto.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar_kerja`
--

CREATE TABLE `pendaftar_kerja` (
  `id` int(11) NOT NULL,
  `pendaftar_pekerja` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `nikah` varchar(10) DEFAULT NULL,
  `alamat_email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat_rumah` varchar(100) DEFAULT NULL,
  `sakit_berat` varchar(100) DEFAULT NULL,
  `pendidikan_terakhir` enum('SMA','SMK','D3','S1') DEFAULT NULL,
  `program` int(11) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pendaftar_kerja`
--

INSERT INTO `pendaftar_kerja` (`id`, `pendaftar_pekerja`, `tempat_lahir`, `tanggal_lahir`, `berat_badan`, `jenis_kelamin`, `nikah`, `alamat_email`, `no_hp`, `alamat_rumah`, `sakit_berat`, `pendidikan_terakhir`, `program`, `foto`) VALUES
(1, 'Ahmad basri', 'Ttangerang', '2005-04-13', 70, 'Laki-laki', 'Belum', 'ahma@gmail.com', '089453543', 'jl sunan amaple', 'tidak ada', 'SMA', 1, 'saya.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_belajar`
--

CREATE TABLE `program_belajar` (
  `id` int(11) NOT NULL,
  `program_belajar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `program_belajar`
--

INSERT INTO `program_belajar` (`id`, `program_belajar`) VALUES
(1, 'Regular-Offline'),
(2, 'Regular-Online');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_kerja`
--

CREATE TABLE `program_kerja` (
  `id` int(11) NOT NULL,
  `nama_program` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `program_kerja`
--

INSERT INTO `program_kerja` (`id`, `nama_program`) VALUES
(1, 'Magang'),
(2, 'Tokutei Ginou');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_belajar`
--

CREATE TABLE `proses_belajar` (
  `id` int(11) NOT NULL,
  `nama_murid` int(11) DEFAULT NULL,
  `program_belajar` int(11) DEFAULT NULL,
  `deskripsi` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `proses_belajar`
--

INSERT INTO `proses_belajar` (`id`, `nama_murid`, `program_belajar`, `deskripsi`) VALUES
(1, 1, 1, '*Proses Belajar Siswa\r\n-Sudah melakukan ujian awal bulan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_kerja`
--

CREATE TABLE `proses_kerja` (
  `id` int(11) NOT NULL,
  `nama_pekerja` int(11) DEFAULT NULL,
  `program_kerja` int(11) DEFAULT NULL,
  `deskripsi` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `proses_kerja`
--

INSERT INTO `proses_kerja` (`id`, `nama_pekerja`, `program_kerja`, `deskripsi`) VALUES
(1, 1, 2, '*Proses Pengurusan Dokumen\r\n-Sertifkasi kebahasaan sudah dimilki\r\n-Sertifikasi keahlian sudah dimiliki');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pendaftar_belajar`
--
ALTER TABLE `pendaftar_belajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_program_belajar` (`program_belajar`);

--
-- Indeks untuk tabel `pendaftar_kerja`
--
ALTER TABLE `pendaftar_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_program` (`program`);

--
-- Indeks untuk tabel `program_belajar`
--
ALTER TABLE `program_belajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program_kerja`
--
ALTER TABLE `program_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proses_belajar`
--
ALTER TABLE `proses_belajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pendaftar_belajar` (`nama_murid`),
  ADD KEY `fk_nama_program_belajar` (`program_belajar`);

--
-- Indeks untuk tabel `proses_kerja`
--
ALTER TABLE `proses_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pendaftar_pekerja` (`nama_pekerja`),
  ADD KEY `fk_nama_program` (`program_kerja`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pendaftar_belajar`
--
ALTER TABLE `pendaftar_belajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendaftar_kerja`
--
ALTER TABLE `pendaftar_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `program_belajar`
--
ALTER TABLE `program_belajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `proses_belajar`
--
ALTER TABLE `proses_belajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `proses_kerja`
--
ALTER TABLE `proses_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pendaftar_belajar`
--
ALTER TABLE `pendaftar_belajar`
  ADD CONSTRAINT `fk_program_belajar` FOREIGN KEY (`program_belajar`) REFERENCES `program_belajar` (`id`);

--
-- Ketidakleluasaan untuk tabel `pendaftar_kerja`
--
ALTER TABLE `pendaftar_kerja`
  ADD CONSTRAINT `fk_program` FOREIGN KEY (`program`) REFERENCES `program_kerja` (`id`);

--
-- Ketidakleluasaan untuk tabel `proses_belajar`
--
ALTER TABLE `proses_belajar`
  ADD CONSTRAINT `fk_nama_program_belajar` FOREIGN KEY (`program_belajar`) REFERENCES `program_belajar` (`id`),
  ADD CONSTRAINT `fk_pendaftar_belajar` FOREIGN KEY (`nama_murid`) REFERENCES `pendaftar_belajar` (`id`);

--
-- Ketidakleluasaan untuk tabel `proses_kerja`
--
ALTER TABLE `proses_kerja`
  ADD CONSTRAINT `fk_nama_program` FOREIGN KEY (`program_kerja`) REFERENCES `program_kerja` (`id`),
  ADD CONSTRAINT `fk_pendaftar_pekerja` FOREIGN KEY (`nama_pekerja`) REFERENCES `pendaftar_kerja` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
