-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2024 pada 13.05
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
-- Database: `pilah_cantik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `no_telepon`, `created_at`) VALUES
(2, 'admin123   ', 'admin@gmail.com', 'admin123', '212121212', '2024-06-05 05:21:10'),
(3, 'ok', 'hahah@gmail.com', '1', '1', '2024-06-05 06:09:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT 0.00,
  `sampah` int(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`id`, `nama`, `alamat`, `no_telepon`, `email`, `saldo`, `sampah`, `created_at`, `password`) VALUES
(3, 'hi', 'gsk', '08689235', 'okspoter16@gmail.com', 10000.00, 3, '2024-06-15 01:25:13', 'user123'),
(4, 'cewe', 'rumah kecil', '098708', 'melon@gmail.com', 20000.00, 4, '2024-06-15 04:43:34', 'user'),
(5, 'cancikuu', 'manyar', '098098789098', 'melongemoy@gmail.com', 10000.00, 4, '2024-06-15 05:26:06', ''),
(6, 'kiwkiw', 'jalan', '09809876546', 'upnjatim@gmail.com', 0.00, 0, '2024-06-15 05:35:48', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah`
--

CREATE TABLE `sampah` (
  `id` int(11) NOT NULL,
  `jenis_sampah` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `satuan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sampah`
--

INSERT INTO `sampah` (`id`, `jenis_sampah`, `deskripsi`, `gambar`, `harga`, `satuan`, `created_at`) VALUES
(2, 'kaca ', 'ini sampah kaca', 'still-life-with-indoor-plants.png', 9000.00, 'KG', '2024-06-05 08:17:43'),
(3, 'plastik', 'ini sampah plastik', 'jean-philippe-delberghe-Ry9WBo3qmoc-unsplash.png', 5000.00, 'KG', '2024-06-11 06:22:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `jenis_sampah` varchar(100) NOT NULL,
  `berat` decimal(10,2) NOT NULL,
  `harga` int(255) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal_setor` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setor`
--

INSERT INTO `setor` (`id`, `id_nasabah`, `jenis_sampah`, `berat`, `harga`, `total`, `id_admin`, `tanggal_setor`, `created_at`) VALUES
(4, 3, 'plastik', 3.00, 5000, 15000.00, 2, '2024-06-13', '2024-06-15 01:25:42'),
(5, 4, 'plastik', 4.00, 5000, 20000.00, 2, '2024-06-13', '2024-06-15 04:57:59'),
(6, 5, 'plastik', 4.00, 5000, 20000.00, 2, '2024-06-26', '2024-06-15 05:33:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarik`
--

CREATE TABLE `tarik` (
  `id` int(11) NOT NULL,
  `id_nasabah` int(11) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tanggal_tarik` date NOT NULL,
  `jumlah_tarik` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tarik`
--

INSERT INTO `tarik` (`id`, `id_nasabah`, `saldo`, `id_admin`, `tanggal_tarik`, `jumlah_tarik`, `created_at`) VALUES
(6, 3, 15000.00, 2, '2024-06-13', 5000, '2024-06-15 02:16:04'),
(7, 5, 20000.00, 2, '2024-06-20', 10000, '2024-06-15 05:34:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nasabah` (`id_nasabah`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `tarik`
--
ALTER TABLE `tarik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nasabah` (`id_nasabah`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tarik`
--
ALTER TABLE `tarik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `setor`
--
ALTER TABLE `setor`
  ADD CONSTRAINT `setor_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id`),
  ADD CONSTRAINT `setor_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Ketidakleluasaan untuk tabel `tarik`
--
ALTER TABLE `tarik`
  ADD CONSTRAINT `tarik_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id`),
  ADD CONSTRAINT `tarik_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
