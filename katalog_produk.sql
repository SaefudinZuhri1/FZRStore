-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 03:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katalog_produk`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `kd_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kuantitas` varchar(11) NOT NULL,
  `hrg_satuan` varchar(15) NOT NULL,
  `total_harga` varchar(15) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `status_order` enum('Dipesan','Dikirim','Telah Tiba') NOT NULL,
  `metode_pembayaran` enum('E-Wallet','Transfer Bank','COD') NOT NULL,
  `metode_pengiriman` enum('Reguler','Express','Sameday') NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE `detail_produk` (
  `kd_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok_barang` tinyint(5) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Slip-On '),
(2, 'Oxford'),
(3, 'Safety & Fashion Boot');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_belanja`
--

CREATE TABLE `keranjang_belanja` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('Tertunda','Dipesan','Dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `harga_produk` varchar(30) NOT NULL,
  `ukuran` enum('38','39','40','41','42','43','44','45') NOT NULL,
  `desk_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `gambar_produk`, `harga_produk`, `ukuran`, `desk_produk`, `stok_produk`) VALUES
(62, 1, 'Sepatu Pantofel Pria', 'produk-a1-1.jpeg', '229.000', '38', 'null', 100);

-- --------------------------------------------------------

--
-- Table structure for table `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(41, 0, 'Array'),
(42, 0, 'b2-2.jpeg'),
(43, 0, 'b2-2.jpeg'),
(44, 0, 'b2-3.jpeg'),
(45, 0, 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token_pass` text NOT NULL,
  `no_tlpn` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `token_pass`, `no_tlpn`, `email`, `alamat`) VALUES
(1, 'zuhri', 'Admin', '21232f297a57a5a743894a0e4a801fc3', '38913e1d6a7b94cb0f55994f679f5956', '081807210897', 'emailadmin@gmail.com', 'Bandung'),
(3, 'Admin', 'Admin', '$2y$10$o5Yu1o6R8ImBETVpzFNTm.N5dqfA.AAZ38Qwg.e051u5ODVsRpyvK', '38913e1d6a7b94cb0f55994f679f5956', '12345', 'admin1@gmail.com', 'admin'),
(12, 'Cobain', 'cobain', 'cobain', '38913e1d6a7b94cb0f55994f679f5956', '12345687', 'cobaim@gmail.com', 'cobain');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` varchar(15) NOT NULL,
  `tgl_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token_pass` text NOT NULL,
  `no_tlpn` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `token_pass`, `no_tlpn`, `email`, `alamat`) VALUES
(2, 'Coba', 'Coba', 'c86da96c0a7fe822201f7847c7ad09f2', '89f0fd5c927d466d6ec9a21b9ac34ffa', 'Coba', 'Coba@Email.com', 'Coba'),
(4, 'Test', 'Test', '0cbc6611f5540bd0809a388dc95a615b', '89f0fd5c927d466d6ec9a21b9ac34ffa', '123', 'Test@Gmail.com', 'Testing'),
(22, 'fai', 'faisal', '$2y$10$eAK2HLAeG0WoXbfP1hQty.h5ljAmIeHQc3ItOqUCMtVRA93XCVeV6', '89f0fd5c927d466d6ec9a21b9ac34ffa', '1111', 'faisal@gmail.com', 'faisal'),
(23, 'faisal', 'isal', '$2y$10$CLQ8/7nkqd.pAAEsno9oa.YUBKAPRfj49x1u9p2xDR9woVE6D09j2', '89f0fd5c927d466d6ec9a21b9ac34ffa', '020101', 'isalfaisal@gmail.com', 'faisal'),
(25, 'zuhri', 'zhr', '$2y$10$SGDbbq56Qh6MZBaBKl.8FeUofXWEkcxGfthvguuBdMBa8dz9PvvzG', '89f0fd5c927d466d6ec9a21b9ac34ffa', '123', 'faisal@gmail.com', 'faisal'),
(26, 'aulia', 'aulia', '$2y$10$7XqyGP.Boced4Zz8UH6j8ejL.HwQ1Fh9KQhPC54bxSv/yNciXVln2', '89f0fd5c927d466d6ec9a21b9ac34ffa', '123', 'aulia123@gmail.com', 'aulia'),
(29, 'aul', 'aulia3', '$2y$10$d1DuPS2gavufKjIU0EEvTezqsF6vxRYf.RxVOXYue4HXTScc9n84.', '89f0fd5c927d466d6ec9a21b9ac34ffa', '123', 'aulia123@gmail.com', 'aul'),
(31, 'zuhri', 'zuhrimail', 'mailmail', '89f0fd5c927d466d6ec9a21b9ac34ffa', '123', 'zuhrisaeff12@gmail.com', 'mail'),
(32, 'aulia', 'aulia12', '$2y$10$Oz/3GQ4yRHJI.B/d3CHpSuPXH/qhZEXx2Q4G6a4MGbtVkAphIIB0G', '89f0fd5c927d466d6ec9a21b9ac34ffa', '123', 'aulia@gmail.com', 'aulia'),
(33, 'aulia', 'auli10', '$2y$10$nLdp65/3Skh9oYQ.cF3JPOStv7FaMWVezMYNPIFOEZRzcLJ8jecY.', '89f0fd5c927d466d6ec9a21b9ac34ffa', '123', 'aulia@gmail', 'aulia'),
(36, 'daftra1', 'daftar1', '$2y$10$0oN/iROSSqJt1IpQH1ou7O2Q0Tz6Y.ISNnMZgJu8Yhvuug93iFzE2', '', '1', 'q@gmail.com', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`kd_order`),
  ADD UNIQUE KEY `id_order` (`id_order`,`id_user`,`id_produk`,`id_kategori`),
  ADD UNIQUE KEY `id_order_2` (`id_order`,`id_user`,`id_produk`,`id_kategori`),
  ADD KEY `id_order_3` (`id_order`),
  ADD KEY `id_order_4` (`id_order`),
  ADD KEY `id_order_5` (`id_order`,`id_user`,`id_produk`,`id_kategori`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`kd_produk`),
  ADD KEY `id_produk` (`id_produk`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`,`id_produk`,`id_kategori`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`,`id_produk`,`id_kategori`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `kd_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `kd_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`),
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `detail_order_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_order_ibfk_4` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD CONSTRAINT `detail_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `detail_produk_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  ADD CONSTRAINT `keranjang_belanja_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `keranjang_belanja_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `keranjang_belanja_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `tb_order_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
