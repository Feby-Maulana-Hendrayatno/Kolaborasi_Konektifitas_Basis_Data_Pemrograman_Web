-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Bulan Mei 2021 pada 22.17
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angkringan-family`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel`
--

CREATE TABLE `tabel` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `nama_makanan` varchar(100) NOT NULL,
  `nama_minuman` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jumlah_makanan&minuman` int(10) NOT NULL,
  `jumlah_makanan` int(2) NOT NULL,
  `jumlah_minuman` int(2) NOT NULL,
  `harga_makanan` int(6) NOT NULL,
  `harga_minuman` int(6) NOT NULL,
  `total_harga` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel`
--

INSERT INTO `tabel` (`id_pelanggan`, `nama_pelanggan`, `nama_makanan`, `nama_minuman`, `tanggal_pembelian`, `jumlah_makanan&minuman`, `jumlah_makanan`, `jumlah_minuman`, `harga_makanan`, `harga_minuman`, `total_harga`) VALUES
(1, 'Feby Maulana Hendrayatno', 'Nasi Kucing', 'Es Teh', '2021-05-18', 3, 2, 1, 2000, 3000, 7000),
(2, 'Alan', 'sate usus', 'Es Susu', '2021-05-19', 2, 1, 1, 4000, 5000, 9000),
(3, 'Luffy', 'Baso Bakar', 'Susu Jahe Hangat', '2021-05-19', 2, 1, 1, 5000, 5000, 10000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel`
--
ALTER TABLE `tabel`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel`
--
ALTER TABLE `tabel`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
