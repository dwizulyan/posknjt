-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2025 pada 11.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posknjt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok_barang` varchar(11) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `stok_barang`, `harga`, `created_at`, `updated_at`) VALUES
(2, 'Ayam Geprek Kunjad v2', '1', '12000', '2025-04-26', '2025-05-12'),
(3, 'Es Teh', '46', '3000', '2025-05-03', '2025-05-12'),
(4, 'Roti Bakar Mas Rusdi', '22', '3500', '2025-05-09', '2025-05-12'),
(5, 'Susu Hitam Mbak Jenny', '2', '15000', '2025-05-12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_barang_dibeli`
--

CREATE TABLE `detail_barang_dibeli` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `kuantitas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_barang_dibeli`
--

INSERT INTO `detail_barang_dibeli` (`id`, `transaksi_id`, `nama_barang`, `harga`, `kuantitas`) VALUES
(40, 18, 'Ayam Geprek Kunjad v2', '12000', '1'),
(41, 18, 'Es Teh', '3000', '1'),
(42, 18, 'Roti Bakar Mas Rusdi', '3500', '1'),
(43, 18, 'Susu Hitam Mbak Jenny', '15000', '1'),
(44, 19, 'Ayam Geprek Kunjad v2', '12000', '3'),
(45, 19, 'Es Teh', '3000', '5'),
(46, 19, 'Roti Bakar Mas Rusdi', '3500', '5'),
(47, 19, 'Susu Hitam Mbak Jenny', '15000', '1'),
(48, 20, 'Ayam Geprek Kunjad v2', '12000', '5'),
(49, 20, 'Es Teh', '3000', '3'),
(50, 20, 'Roti Bakar Mas Rusdi', '3500', '5'),
(51, 20, 'Susu Hitam Mbak Jenny', '15000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas_outlet`
--

CREATE TABLE `identitas_outlet` (
  `id` int(11) NOT NULL,
  `nama_outlet` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `nomor_usaha` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `identitas_outlet`
--

INSERT INTO `identitas_outlet` (`id`, `nama_outlet`, `nama_pemilik`, `nomor_usaha`, `contact_person`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'All Mighty KNJD Sejahter Abadi', 'Sir Salamanca The II', '234523123124', '088555443910', 'Kediri, Jawa Timur, Indonesia', '2025-03-25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_karyawan`, `nomor_hp`, `jabatan`, `created_at`, `updated_at`) VALUES
(6, 'Bennito Mussolini', '123432556711', 'Admin', '2025-04-26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `uang_bayar` varchar(255) NOT NULL,
  `total_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_pembeli`, `tanggal_pembelian`, `uang_bayar`, `total_bayar`) VALUES
(18, 'Jamal', '2025-05-12', '40000', '33500'),
(19, '', '2025-05-12', '100000', '83500'),
(20, 'Ahmad Sumbul', '2025-05-12', '110000', '101500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roleType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `roleType`) VALUES
(1, 'jekitheright', 'jekitheright', 'jekitheright@gmail.com', 'admin'),
(2, 'jeki', 'jeki', 'jeki@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_barang_dibeli`
--
ALTER TABLE `detail_barang_dibeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id` (`transaksi_id`);

--
-- Indeks untuk tabel `identitas_outlet`
--
ALTER TABLE `identitas_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_barang_dibeli`
--
ALTER TABLE `detail_barang_dibeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `identitas_outlet`
--
ALTER TABLE `identitas_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_barang_dibeli`
--
ALTER TABLE `detail_barang_dibeli`
  ADD CONSTRAINT `detail_barang_dibeli_ibfk_1` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
