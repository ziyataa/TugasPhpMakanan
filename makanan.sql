-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 12:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(40) NOT NULL,
  `foto_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `foto_kategori`) VALUES
(1, 'Aneka Nasi', 'nasi.jpg'),
(2, 'Aneka Ayam & Bebek', 'ayam.jpg'),
(3, 'Minuman', 'minuman.jpg'),
(4, 'Fastfood', 'fastfood.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_makanan`
--

CREATE TABLE `tb_makanan` (
  `id_makanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_makanan` varchar(30) NOT NULL,
  `desc_makanan` varchar(120) NOT NULL,
  `foto_makanan` varchar(30) NOT NULL,
  `insert_time` varchar(90) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenkel` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(130) NOT NULL,
  `password` varchar(130) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `alamat`, `jenkel`, `no_telp`, `username`, `password`, `level`) VALUES
(1, 'Firdaus', 'Jl.ternate', 'L', '2147483647', 'admin', '123456', 1),
(2, 'Firdaus', 'Jl. loremipsum', 'L', '2147483647', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'Firdaus', 'Jl. loremipsum', 'L', '2147483647', 'admin3', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'Firdaus', 'Jl. loremipsum', 'Laki-laki', '2147483647', 'admin4', 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 'Tes', 'alamat tes', 'jenkel tes', '29313', 'usertes', '123', 1),
(6, 'Firdaus', 'Jl. loremipsum', 'Laki-laki', '2147483647', 'admin5', 'e10adc3949ba59abbe56e057f20f883e', 1),
(7, 'Firdaus', 'Jl. loremipsum', 'Laki-laki', '2147483647', 'admin6', 'e10adc3949ba59abbe56e057f20f883e', 0),
(8, 'Firdaus', 'Jl. lalsdlasdlasdlasd', 'Laki-laki', '8975231', 'admin7', 'e10adc3949ba59abbe56e057f20f883e', 0),
(9, 'Firdaus', 'Jl. loremipsum', 'Laki-laki', '2147483647', 'admin8', 'e10adc3949ba59abbe56e057f20f883e', 1),
(10, 'Firdaus 22', 'Jl. lalsdlasdlasdlasd 2', 'P', '0896474768582 ', 'admin9', 'e10adc3949ba59abbe56e057f20f883e', 1),
(11, 'Firdaus', 'Jl. tmansan', 'L', '102389123', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 1),
(12, 'Firdaus 2 ', 'Jl. lalsdlasdlasdlasd', 'L', '12345678901', 'admin0', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_makanan`
--
ALTER TABLE `tb_makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_makanan`
--
ALTER TABLE `tb_makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
