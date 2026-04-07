-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2026 pada 14.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduanmasyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` enum('pending','proses','selesai') DEFAULT NULL,
  `waktu_dikirim` datetime DEFAULT current_timestamp(),
  `waktu_proses` datetime DEFAULT NULL,
  `waktu_selesai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `user_id`, `judul`, `isi`, `gambar`, `tanggal`, `status`, `waktu_dikirim`, `waktu_proses`, `waktu_selesai`, `tanggal_selesai`) VALUES
(11, 1, 'listrik padam', 'listrik padam yang berkepanjangan ', '1775493229_8485b565df64b2559566f96ea62765fd.webp', '2026-04-06 23:33:50', 'proses', '2026-04-06 23:33:50', NULL, NULL, '2026-04-07 10:02:32'),
(16, 2, 'Akses jalan kurang memadai', 'Akses jalan dari perkampungan menuju kota tidak memadai karena banyaknya jalan yang rusak dan jalan alternatif terlalu jauh sehingga membutuhkan waktu yang lebih lama untuk sampai ke tujuan. ', 'jalan-rusak-di-indramayu.jpg', '2026-04-07 07:56:46', 'proses', '2026-04-07 12:56:46', NULL, NULL, NULL),
(17, 3, 'knalpot bising', 'knalpot bising mengganggu ketidaknyamanan bagi warga sekitar dan di area jalanan. Dengan itu diharapkan segera di tindak lanjuti supaya penggunaan knalpot  bising bisa di tangani ', 'kenalpot bising.jpg', '2026-04-07 08:53:50', '', '2026-04-07 13:53:50', NULL, NULL, NULL),
(18, 3, 'Remaja Tawuran', 'Hal ini sangat berbahaya bagi warga sekitar dan pejalan yang sedang melintasi jalan raya. mohon segera di tindak lanjuti dan pelaku yang terlibat tawuran untuk di beri sanksi dan di beri pelatihan khusus ', 'remaja tawuran.jpg', '2026-04-07 08:58:16', '', '2026-04-07 13:58:16', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `no_hp`, `password`, `role`) VALUES
(2, 'Ummu', 'ummu', '0852 3912 3891', '202cb962ac59075b964b07152d234b70', 'user'),
(3, 'badriyah', 'badbad', '0875 5533 3222', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(4, 'aditya', 'admin 1', '0875 5533 3795', '12345', 'admin'),
(5, 'safi i', 'admin 2', '0815 4521 3531', 'ad123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
