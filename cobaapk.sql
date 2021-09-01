-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Agu 2021 pada 02.13
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobaapk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_pemeliharaans`
--

CREATE TABLE `hasil_pemeliharaans` (
  `id_hasil_pemeliharaan` int(10) UNSIGNED NOT NULL,
  `id_pemeliharaan` int(10) UNSIGNED NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Belum dicek','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum dicek',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil_pemeliharaans`
--

INSERT INTO `hasil_pemeliharaans` (`id_hasil_pemeliharaan`, `id_pemeliharaan`, `metode`, `hasil`, `status`, `created_at`, `updated_at`) VALUES
(57, 66, NULL, NULL, 'Belum dicek', '2021-08-20 16:43:33', '2021-08-20 16:43:33'),
(58, 67, NULL, NULL, 'Belum dicek', '2021-08-20 16:44:18', '2021-08-20 16:44:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_perbaikans`
--

CREATE TABLE `hasil_perbaikans` (
  `id_hasil_perbaikan` int(10) UNSIGNED NOT NULL,
  `id_perbaikan` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `tanggal_perbaikan` datetime DEFAULT NULL,
  `dilakukan_perbaikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('belum diperbaiki','sedang diperbaiki','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil_perbaikans`
--

INSERT INTO `hasil_perbaikans` (`id_hasil_perbaikan`, `id_perbaikan`, `id_user`, `tanggal_perbaikan`, `dilakukan_perbaikan`, `hasil`, `status`, `created_at`, `updated_at`) VALUES
(71, 79, 7, NULL, NULL, NULL, 'belum diperbaiki', '2021-08-19 10:10:31', '2021-08-19 10:10:31'),
(72, 80, 7, NULL, NULL, NULL, 'belum diperbaiki', '2021-08-20 10:38:29', '2021-08-20 10:38:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id_jabatan` int(10) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2021-04-17 05:35:43', '2021-07-16 07:52:29'),
(2, 'Teknisi', '2021-04-17 05:34:36', '2021-07-16 07:52:40'),
(3, 'operator mesin', '2021-04-16 23:14:18', '2021-04-16 23:14:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesins`
--

CREATE TABLE `mesins` (
  `id_mesin` int(10) UNSIGNED NOT NULL,
  `nama_mesin` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tahun_pembuatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_pakai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mesins`
--

INSERT INTO `mesins` (`id_mesin`, `nama_mesin`, `kapasitas`, `tanggal_pembelian`, `tahun_pembuatan`, `periode_pakai`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'BOCK TYPE HG4/ 650-4S 20HP (B)', '3 ton', '2020-07-20', '2011', '2025', 'Ruang Mesin 1 (CS 1)', '2021-04-19 00:33:03', '2021-07-13 21:48:08'),
(2, 'BOCK TYPE HG4 /650-4S 20 HP (A)', '600', '2021-06-01', '2021', '2030', 'Ruang Mesin 1 (CS 1)', '2021-06-01 01:59:19', '2021-06-01 01:59:19'),
(3, 'BOCK TYPE HG4/ 650-4S 20HP (C)', '3 ton', '2020-07-20', '2011', '2025', 'Ruang Mesin 1 (CS 1)', '2021-07-13 21:46:31', '2021-07-16 09:00:56'),
(4, 'BOCK TYPE HG4/ 650-4S 20HP (B)', '3 ton', '2020-07-20', '2014', '2029', 'Ruang Mesin 1 (CS 1)', '2021-07-13 21:46:46', '2021-07-16 09:00:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_28_045909_create_mesins_table', 1),
(5, '2020_11_30_044314_create_pemeliharaans_table', 1),
(6, '2020_11_30_152542_create_parameters_table', 1),
(7, '2020_12_07_094758_create_perbaikans_table', 1),
(8, '2021_04_17_032059_create_pegawais_table', 1),
(9, '2021_04_17_032444_create_jabatans_table', 1),
(10, '2021_04_17_033233_create_hasil_pemeliharaans_table', 1),
(11, '2021_04_17_033938_create_hasil_perbaikans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parameters`
--

CREATE TABLE `parameters` (
  `id_parameter` int(10) NOT NULL,
  `nama_parameter` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parameters`
--

INSERT INTO `parameters` (`id_parameter`, `nama_parameter`, `created_at`, `updated_at`) VALUES
(1, 'Ganti Oli', '2021-04-19 00:44:50', '2021-07-13 22:58:43'),
(210003, 'Kebersihan', '2021-06-01 00:41:05', '2021-06-01 00:41:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `id_pegawai` int(10) NOT NULL,
  `id_jabatan` int(10) UNSIGNED NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pegawai` enum('Aktif','Cuti','Keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`id_pegawai`, `id_jabatan`, `nama`, `alamat`, `no_telp`, `status_pegawai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Indah Admin', 'Desa Tapanrejo, Kec. Muncar', '082141998567', 'Aktif', '2021-04-17 05:36:39', '2021-07-16 20:23:14'),
(210000, 3, 'Devan', 'Negara', '082141998569', 'Aktif', '2021-06-01 00:45:14', '2021-07-16 20:23:43'),
(210001, 3, 'Dino', 'Jember', '082141998558', 'Aktif', '2021-06-01 02:37:30', '2021-07-16 20:18:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemeliharaans`
--

CREATE TABLE `pemeliharaans` (
  `id_pemeliharaan` int(10) UNSIGNED NOT NULL,
  `id_mesin` int(10) UNSIGNED NOT NULL,
  `id_parameter` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `tanggal_jadwal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemeliharaans`
--

INSERT INTO `pemeliharaans` (`id_pemeliharaan`, `id_mesin`, `id_parameter`, `id_user`, `tanggal_jadwal`, `created_at`, `updated_at`) VALUES
(66, 3, 1, 6, '2021-08-20 23:45:22', '2021-08-20 16:43:33', '2021-08-20 16:43:33'),
(67, 2, 1, 6, '2021-08-20 23:46:10', '2021-08-20 16:44:18', '2021-08-20 16:44:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikans`
--

CREATE TABLE `perbaikans` (
  `id_perbaikan` int(10) UNSIGNED NOT NULL,
  `id_mesin` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `deskripsi_masalah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perbaikans`
--

INSERT INTO `perbaikans` (`id_perbaikan`, `id_mesin`, `id_user`, `deskripsi_masalah`, `created_at`, `updated_at`) VALUES
(79, 3, 6, 'cc', '2021-08-19 10:10:31', '2021-08-19 10:10:31'),
(80, 2, 6, 'mmmm', '2021-08-20 10:38:28', '2021-08-20 10:38:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pegawai` int(10) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','operator','teknisi','manager') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_pegawai`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'admin1', 'admin@gmail.com', NULL, '$2y$10$8oj1w03o.gwByZPG3JU4netpjaViDuTod2tECszIBJeSW3BIa/0R6', 'admin', '1thtSyHpdR0D663PGTPMr6oaSeztrynwlq3ufGHy6WdWcnML93bx63XjGNUj', '2021-04-16 22:56:45', '2021-07-16 08:45:14'),
(6, 210000, 'Devan Operator 1', 'isari5032@gmail.com', NULL, '$2y$10$cqWAJNbkTm3FDF0eIb3muO5sieT9UChS7jiGyVbEzhRMgJ/MizpTa', 'operator', 'NyowtudIpoWMXsflPped3i97yBKIHuyY2Xq9C96PmO2BUkqzccBATED0dbU2', '2021-06-01 01:25:09', '2021-06-01 01:25:09'),
(7, 210001, 'dino teknisi 1', 'wahyugobel17@gmail.com', NULL, '$2y$10$yrrPgW5TEdGUxD8xsDfCjONGhOTue/y7o3k/1wEM10FEI.gqmM5Qu', 'teknisi', 'PuO4cQHPcOHSrA8riGGX3pip6WJkoriNbeT7MB8GC8HRe0y4KDFWyTICTD2J', '2021-06-01 02:40:03', '2021-06-01 02:40:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil_pemeliharaans`
--
ALTER TABLE `hasil_pemeliharaans`
  ADD PRIMARY KEY (`id_hasil_pemeliharaan`),
  ADD KEY `id_pemeliharaan` (`id_pemeliharaan`);

--
-- Indeks untuk tabel `hasil_perbaikans`
--
ALTER TABLE `hasil_perbaikans`
  ADD PRIMARY KEY (`id_hasil_perbaikan`),
  ADD KEY `id_perbaikan` (`id_perbaikan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `mesins`
--
ALTER TABLE `mesins`
  ADD PRIMARY KEY (`id_mesin`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id_parameter`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `pemeliharaans`
--
ALTER TABLE `pemeliharaans`
  ADD PRIMARY KEY (`id_pemeliharaan`),
  ADD KEY `id_mesin` (`id_mesin`),
  ADD KEY `id_parameter` (`id_parameter`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `perbaikans`
--
ALTER TABLE `perbaikans`
  ADD PRIMARY KEY (`id_perbaikan`),
  ADD KEY `id_mesin` (`id_mesin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil_pemeliharaans`
--
ALTER TABLE `hasil_pemeliharaans`
  MODIFY `id_hasil_pemeliharaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `hasil_perbaikans`
--
ALTER TABLE `hasil_perbaikans`
  MODIFY `id_hasil_perbaikan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id_jabatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mesins`
--
ALTER TABLE `mesins`
  MODIFY `id_mesin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id_parameter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210004;

--
-- AUTO_INCREMENT untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210002;

--
-- AUTO_INCREMENT untuk tabel `pemeliharaans`
--
ALTER TABLE `pemeliharaans`
  MODIFY `id_pemeliharaan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `perbaikans`
--
ALTER TABLE `perbaikans`
  MODIFY `id_perbaikan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil_pemeliharaans`
--
ALTER TABLE `hasil_pemeliharaans`
  ADD CONSTRAINT `hasil_pemeliharaans_ibfk_1` FOREIGN KEY (`id_pemeliharaan`) REFERENCES `pemeliharaans` (`id_pemeliharaan`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `hasil_perbaikans`
--
ALTER TABLE `hasil_perbaikans`
  ADD CONSTRAINT `hasil_perbaikans_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasil_perbaikans_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD CONSTRAINT `pegawais_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatans` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `pemeliharaans`
--
ALTER TABLE `pemeliharaans`
  ADD CONSTRAINT `pemeliharaans_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `pemeliharaans_ibfk_2` FOREIGN KEY (`id_mesin`) REFERENCES `mesins` (`id_mesin`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `perbaikans`
--
ALTER TABLE `perbaikans`
  ADD CONSTRAINT `perbaikans_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
