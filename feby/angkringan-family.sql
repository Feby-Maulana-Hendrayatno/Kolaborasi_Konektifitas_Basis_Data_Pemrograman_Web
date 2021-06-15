-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 03:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(19, 'Sate Bakso'),
(25, 'Nasi Kucing'),
(34, 'Es Teh'),
(35, 'Sate Telor Puyuh');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`) VALUES
(1, '5', '5', '$2y$10$4RvJ7zN7tZWbpzlEGP30NuH2qXpjLgXjVcQLldjauF2jOQpDIvTPq'),
(2, 'y', 'y@gmail.com', '$2y$10$kEdziGopQWuKXpjVGBdYSua661/h5.MAYQmoC1Nlzf3Up3ME/Bw.u'),
(3, '7', '7', '$2y$10$F7elMMQx.iWTNGEBlETNt.MK7NHMjqZ9oiVS4yA/U1tFLflJZPG/O'),
(4, 'y', 'y', '$2y$10$CTlAF0UsTFkpuE.ecC2sWehKsd2E32VQ0JaXHf/vqSPv98cwm5/6a'),
(5, 'Maulana', 'Maulana@gmail.com', '$2y$10$FPg.B1.DQC8EGCTpzclMT.2PAgLf3lHkfTZ7HCjL4pLY2jSXTa1Xq'),
(6, 'alan', 'alan', '$2y$10$i8E7szIDoeg1RTE4BVl4JuX08VvlDR8ocxsXwe4T3dA.JGfXhbdhS');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `id_pembelian_barang` int(255) NOT NULL,
  `id_pembelian` int(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_barang`
--

INSERT INTO `pembelian_barang` (`id_pembelian_barang`, `id_pembelian`, `id_produk`, `jumlah`, `harga`) VALUES
(1, 2, 76, 2, 2000),
(2, 2, 80, 1, 3000),
(3, 2, 78, 1, 2500),
(4, 3, 78, 1, 2500),
(5, 5, 76, 1, 2000),
(6, 5, 80, 1, 3000),
(7, 6, 80, 1, 3000),
(8, 7, 78, 1, 2500),
(9, 7, 80, 1, 3000),
(10, 8, 76, 1, 2000),
(11, 9, 100, 1, 2000),
(12, 9, 93, 1, 3000),
(13, 10, 100, 1, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_kategori`, `harga`, `deskripsi`, `foto`) VALUES
(74, 7, '1000', 'es dingin', '60c57fdd3d843.jpg'),
(78, 21, '2500', 'kaya akan vitamin dan omega', '60c716dccc88b.jpg'),
(83, 0, '', '', '60c7c85b5ec6c.jpg'),
(84, 0, '', '', '60c7c87232281.jpg'),
(88, 18, '3000', 'Es Teh penyegar dahaga dikala kehausan', '60c7d2b8490af.jpg'),
(89, 0, '20000', 'Es Teh manis penyegar dahaga dimalam hari', '60c7d3eeb6c91.jpg'),
(91, 0, '2000', 'Es teh penyegar dahaga', '60c7d4737d02e.jpg'),
(96, 34, '2000', 'Es teh penyegar dahaga dikala kehausan', '60c7e206b45a0.jpg'),
(100, 25, '2000', 'Nasi Kucing tapi Bukan untuk kucing', '60c7e474846d1.jpg'),
(101, 35, '2000', 'Telur puyuh kaya akan vitamin', '60c7e86e6d157.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_checkout`
--

CREATE TABLE `tb_checkout` (
  `id_checkout` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `tgl_beli` date NOT NULL,
  `total_beli` double NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_checkout`
--

INSERT INTO `tb_checkout` (`id_checkout`, `id_pelanggan`, `nama_pelanggan`, `tgl_beli`, `total_beli`, `status`) VALUES
(1, 1, '5', '2021-06-15', 9500, 0),
(2, 1, '5', '2021-06-15', 9500, 0),
(3, 1, '5', '2021-06-15', 2500, 0),
(4, 1, '5', '2021-06-15', 0, 0),
(5, 3, '7', '2021-06-15', 5000, 0),
(6, 4, 'y', '2021-06-15', 3000, 0),
(7, 4, 'y', '2021-06-15', 5500, 0),
(8, 4, 'y', '2021-06-15', 2000, 0),
(9, 6, 'alan', '2021-06-15', 5000, 0),
(10, 6, 'alan', '2021-06-15', 2000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(8, 'admin', '$2y$10$A4Eq/qihAUC3WEtJymSyQ.6ZX7O6K1g3eHJCfEglVJIUhQ2PatQlS', 'admin@gmail.com', 1),
(9, 'user', '$2y$10$e3610h3y/Zv/PQjSVMaceerLaw5qvWrw1VtLv2SWQgujvutSaD0Pe', 'user@gmail.com', 0),
(10, 'Feby Maulana Hendrayatno', '$2y$10$Dij47xj.jbOgpI.TlFIxpeWAk0zDWLGdY4PnRaVD9VOZRGaiVxTjy', 'feby@gmail.com', 1),
(11, 'alan', '$2y$10$mtotwTYLlrHlFJ57tDUdBOEbh4jN.t83iqSy016muB2GCsAO..P12', 'alan@gmail.com', 0),
(12, 'Mas Al', '$2y$10$XmbBZWC/m8rBsOzeKM0Pu.HlSmaAqW6978fDa7IVeLpQC6z/zPnyG', 'Mas_Al@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`id_pembelian_barang`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id_pembelian_barang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
