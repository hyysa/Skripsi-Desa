-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2024 pada 13.17
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_21_062218_create_tb_berita', 1),
(6, '2024_02_22_101029_create_tb_video', 2),
(9, '2024_02_22_190922_create_tb_pemetaan', 3);

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
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_author` varchar(50) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi_berita` varchar(1000) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `dokumentasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `nama_author`, `judul`, `isi_berita`, `kategori`, `dokumentasi`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Kerja Bakti Bersama Masyarakat Pandanarum', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...', 'Kegiatan', 'gambar/tGoQ2EIcLkUMDzU4AuOJBkqczlJ3IdVhcb1uI0y3.jpg', '2024-02-21 09:56:00', '2024-02-21 12:34:15'),
(3, 'Admin', 'Mitigasi Bencana Komunitas Pandur Desa Pandanarum', 'Komunitas Pandur, penggiat lingkungan ini konsisten merawat alam dengan menanam pohon tegakan di sekitar lereng pegunungan Desa Pandanarum, Kecamatan Sutojayan, Kabupaten Blitar, Jawa Timur.', 'Reboisasi', 'gambar/z0OxvRUoiLly6NZcgDRrz2SUM42BSY7IPGxh1ahv.jpg', '2024-02-21 13:12:51', '2024-02-21 13:12:51'),
(4, 'Admin', 'Situs Jaka Tarub di Desa Pandanarum, Potensi Wisata Blitar', 'Di Desa Pandanarum, Kecamatan Sutojayan, Kabupaten Blitar, Jawa Timur, terdapat situs Jaka Tarub. Sayangnya, lokasi tersebut belum tersentuh secara maksimal untuk destinasi wisata setempat.', 'Wisata', 'gambar/HFW3f3gFeURuR6ExnkUvu3Ft71jyi5zjj2kh0BUK.jpg', '2024-02-21 13:15:07', '2024-02-21 13:15:07'),
(5, 'Admin', 'Densus 88 Bawa Dua Senjata Laras Panjang dari Rumah Istri Terduga Teroris', 'Sebuah rumah di Desa Pandanarum Kecamatan Sutojayan Kabupaten Blitar digeledah Detasemen Khusus 88 Polri, Rabu (24/5/2023). Rumah tersebut merupakan milik SM, istri Y, terduga teroris yang ditangkap di Malang.', 'Keamanan', 'gambar/nlqq8NxaJiehk1kXwwCq75bZQ8yx0lKXWVNRD2Zf.jpg', '2024-02-22 01:53:06', '2024-02-22 01:53:06'),
(6, 'Admin', '(Bahasa Indonesia) Desa Pandanarum gali Gagasan Warga Melalui Pelatihan Perencanaan Apresiatif Desa', 'Pelatihan Perencanaan Apresiatif Desa Pandanarum dihelat pada Sabtu-Minggu (30 Maret-1 April 2019) di Balai Desa Pandanarum, Sutojayan Blitar. Pelatihan ini diikuti oleh kader desa, pemuda, perangkat desa, PKK dan para kelompok peduli di Desa Pandanarum. Total peserta yang mengikuti kegiatan ini sebanyak 48 Orang. Kegiatan ini juga dihadiri oleh Perwakilan dari Bapeda Kabupaten Blitar, Kepala Desa (Kades) Pandanarum dan Infest Yogyakarta.', 'Kegiatan', 'gambar/xdK048eXVfdqc9EkpypXPjNuEtEBc01Bu5rQA6ZB.png', '2024-02-22 01:58:00', '2024-02-22 01:58:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemetaan`
--

CREATE TABLE `tb_pemetaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `nama_blok` varchar(255) NOT NULL,
  `koordinat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`koordinat`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_pemetaan`
--

INSERT INTO `tb_pemetaan` (`id`, `nama_tempat`, `nama_blok`, `koordinat`, `created_at`, `updated_at`) VALUES
(1, 'Kandor Desa Pandanarum', 'kandesa', '[\r\n            [\r\n              112.19328586037693,\r\n              -8.181607109550995\r\n            ],\r\n            [\r\n              112.19293526414867,\r\n              -8.182057417009176\r\n            ],\r\n            [\r\n              112.19240207572795,\r\n              -8.182753364993218\r\n            ],\r\n            [\r\n              112.19286495358864,\r\n              -8.182846157965514\r\n            ],\r\n            [\r\n              112.19306800767777,\r\n              -8.182410409798791\r\n            ],\r\n            [\r\n              112.19339837770559,\r\n              -8.182403300954263\r\n            ],\r\n            [\r\n              112.19336486190531,\r\n              -8.182313255578165\r\n            ],\r\n            [\r\n              112.19328586037693,\r\n              -8.181607109550995\r\n            ]\r\n          ]', '2024-02-22 15:06:16', '2024-02-22 15:06:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_video`
--

CREATE TABLE `tb_video` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(200) NOT NULL,
  `link_ytb` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_video`
--

INSERT INTO `tb_video` (`id`, `judul`, `link_ytb`, `created_at`, `updated_at`) VALUES
(2, 'Profil Desa Pandanarum, Kec.Sutojayan, Kab.Blitar, Jawa Timur', 'https://www.youtube.com/embed/hIw-YBThvQQ?si=fiU-CEYPzwo0QVtc', '2024-02-22 03:39:49', '2024-02-22 03:39:49');

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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@pandanarum.com', NULL, '$2y$12$OanKcj0.LmccVXKVzFTeleu3lkWHmE4fJCUXAGedRJHXA8NYunQbW', NULL, '2024-02-21 02:06:36', '2024-02-21 02:06:36');

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_berita_id_unique` (`id`);

--
-- Indeks untuk tabel `tb_pemetaan`
--
ALTER TABLE `tb_pemetaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_pemetaan_id_unique` (`id`);

--
-- Indeks untuk tabel `tb_video`
--
ALTER TABLE `tb_video`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_video_id_unique` (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_pemetaan`
--
ALTER TABLE `tb_pemetaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
