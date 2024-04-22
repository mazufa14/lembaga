-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2024 pada 21.57
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
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Muhammad Allathof', 'Laki-laki', 'Jakarta', '2004-08-03', 18, '08273273', 'altof@gmail.com', 'Ingin menguasai bahasa asing', 'n4', 'foto-1.jpg', 1),
(2, 'Muhammad yusuf', 'Laki-laki', 'Jakarta', '2005-04-06', 18, '08829765', 'yusuf@gmail.com', 'Ingin menjadi polyglot', 'n4', 'foto-2.jpg', 2);

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
  `nikah` varchar(30) DEFAULT NULL,
  `alamat_email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
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
(1, 'Ahmad basri', 'Ttangerang', '2005-04-13', 70, 'Laki-laki', 'Menikah', 'ahma@gmail.com', '89453543', 'jl sunan amaple', 'tidak ada', 'SMA', 2, 'foto-1.jpg'),
(3, 'Husein Maulana Zoelva', 'Jakarta', '2005-02-15', 23, 'Laki-laki', 'Menikah', 'husen@gmail.com', '342424', 'pondok bahar 67', 'tidak ada', 'SMA', 29, 'foto-3.jpg'),
(6, 'Syaiful Anam', 'Bandung', '2008-03-15', 70, 'Laki-laki', 'Single Father', 'syaiful@gmail.com', '08856472656', 'Bandung kidul', '- test', 'SMK', 2, 'foto-6.jpg'),
(9, 'Maulana', 'Bojong', '2004-06-17', 70, 'Laki-laki', 'Belum Menikah', 'maualana@gmail.com', '088464532', 'jl kidung belati no 42 rt 03 rw02 Tangerang banten', '-asma', 'D3', 29, 'foto-661fa9e07e775.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_belajar`
--

CREATE TABLE `program_belajar` (
  `id` int(11) NOT NULL,
  `nama_program_belajar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `program_belajar`
--

INSERT INTO `program_belajar` (`id`, `nama_program_belajar`) VALUES
(1, 'Regular-Offline'),
(2, 'Regular-Online'),
(3, 'Private - Home');

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
(2, 'Tokutei Ginou'),
(29, 'Engginering'),
(30, 'Beasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_belajar`
--

CREATE TABLE `proses_belajar` (
  `id` int(11) NOT NULL,
  `nama_murid` int(11) DEFAULT NULL,
  `program_proses_belajar` int(11) DEFAULT NULL,
  `deskripsi` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `proses_belajar`
--

INSERT INTO `proses_belajar` (`id`, `nama_murid`, `program_proses_belajar`, `deskripsi`) VALUES
(1, 1, 1, '*Proses Belajar Siswa\r\n-Sudah melakukan ujian awal bulan\r\n-Sudah melakukan ujian listening awal bulan\r\n\r\n*Pembayaran\r\n-1 bulan lunas\r\n'),
(4, 2, 1, '-test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proses_kerja`
--

CREATE TABLE `proses_kerja` (
  `id` int(11) NOT NULL,
  `nama_pekerja` int(11) DEFAULT NULL,
  `program_proses_kerja` int(11) DEFAULT NULL,
  `deskripsi` varchar(225) DEFAULT NULL,
  `sertifikasi` varchar(100) DEFAULT NULL,
  `kebahasaan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `proses_kerja`
--

INSERT INTO `proses_kerja` (`id`, `nama_pekerja`, `program_proses_kerja`, `deskripsi`, `sertifikasi`, `kebahasaan`) VALUES
(1, 1, 1, '*Proses Pengurusan Dokumen\r\n- sudah melakukan wawancara dengan perusahaan\r\n- menunggu passport dan visa', 'Belum', 'Sudah'),
(5, 3, 2, '-passport\r\n-visa', 'Sudah', 'Sudah'),
(8, 6, 1, 'menunggu bp2mi untuk mengambil passport dan visa', 'Belum', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  ADD KEY `fk_nama_program_belajar` (`program_proses_belajar`);

--
-- Indeks untuk tabel `proses_kerja`
--
ALTER TABLE `proses_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pendaftar_pekerja` (`nama_pekerja`),
  ADD KEY `fk_nama_program` (`program_proses_kerja`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pendaftar_belajar`
--
ALTER TABLE `pendaftar_belajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pendaftar_kerja`
--
ALTER TABLE `pendaftar_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `program_belajar`
--
ALTER TABLE `program_belajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `proses_belajar`
--
ALTER TABLE `proses_belajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `proses_kerja`
--
ALTER TABLE `proses_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk_nama_program_belajar` FOREIGN KEY (`program_proses_belajar`) REFERENCES `program_belajar` (`id`),
  ADD CONSTRAINT `fk_pendaftar_belajar` FOREIGN KEY (`nama_murid`) REFERENCES `pendaftar_belajar` (`id`);

--
-- Ketidakleluasaan untuk tabel `proses_kerja`
--
ALTER TABLE `proses_kerja`
  ADD CONSTRAINT `fk_nama_program` FOREIGN KEY (`program_proses_kerja`) REFERENCES `program_kerja` (`id`),
  ADD CONSTRAINT `fk_pendaftar_pekerja` FOREIGN KEY (`nama_pekerja`) REFERENCES `pendaftar_kerja` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
