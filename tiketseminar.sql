-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2024 pada 21.41
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketseminar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `data1` varchar(100) NOT NULL,
  `data2` varchar(100) NOT NULL,
  `data3` varchar(100) NOT NULL,
  `data4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar_seminar`
--

CREATE TABLE `pendaftar_seminar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `waktu_pendaftaran` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftar_seminar`
--

INSERT INTO `pendaftar_seminar` (`id`, `nama`, `email`, `telepon`, `id_tiket`, `waktu_pendaftaran`) VALUES
(1, 'wawee', 'wawee@gmail.com', '0124832598', 2, '2024-07-04 18:15:08'),
(2, 'user', 'user@gmail.com', '0129138512758', 2, '2024-07-04 19:21:50'),
(3, 'user', 'user@gmail.com', '0129138512758', 2, '2024-07-04 19:23:59'),
(4, 'user', 'user@gmail.com', '0129138512758', 2, '2024-07-04 19:24:23'),
(5, 'user', 'user@gmail.com', '01248325981', 2, '2024-07-04 19:29:40'),
(6, 'user', 'user@gmail.com', '01248325981', 2, '2024-07-04 19:34:46'),
(7, 'user1', 'user1@gmail.com', '019127591298', 2, '2024-07-04 19:38:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `tema_event` varchar(100) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `no_tagihan` varchar(50) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `tema_event`, `tanggal`, `no_tagihan`, `status_bayar`, `total_harga`) VALUES
(2, 'CARA MENDEKATI WANITA EX MEMBER', '7 Juli 2024', '1002', 'Belum Lunas', 50000.00),
(5, 'CYBER SECURITY', '17 AGUSTUST 2024', '2222', 'Belum Lunas', 50000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `email`) VALUES
(1, 'admin', '12345', 'Admin', 'admin@gmail.com'),
(2, 'user', '12345', 'User', 'user@gmail.com'),
(3, 'user1', '12345', 'User1', 'user1@gmail.com'),
(4, 'user2', '12345', 'user2', 'user2@gmail.com'),
(5, 'user3', '12345', 'user3', 'user3@gmail.com'),
(6, 'wawee', '12345', 'wawee', 'wawee@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftar_seminar`
--
ALTER TABLE `pendaftar_seminar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
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
-- AUTO_INCREMENT untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftar_seminar`
--
ALTER TABLE `pendaftar_seminar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pendaftar_seminar`
--
ALTER TABLE `pendaftar_seminar`
  ADD CONSTRAINT `pendaftar_seminar_ibfk_1` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
