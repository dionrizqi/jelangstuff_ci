-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 06:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jelangci`
--

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `id` int(4) NOT NULL,
  `id_produk` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tarif_ongkir` int(11) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id`, `id_produk`, `id_user`, `jumlah`, `created_at`, `total`, `status`, `tarif_ongkir`, `bukti`) VALUES
(4, 2, 2, 10, '2023-12-02 14:20:28', 2112000, 'Ditolak', 12000, '4b960d7ab55c8ee11e7ac958670f65e2.PNG'),
(5, 2, 2, 1, '2023-12-02 15:21:38', 2112000, 'Selesai', 12000, '3f1fa6401107bca9029809a4c28a9112.PNG'),
(6, 2, 2, 1, '2023-12-02 23:18:00', 4524000, 'Pembayaran Diterima', 12000, 'c02b695ac105abf6a0f7a605a66977d3.png'),
(7, 1, 2, 1, '2023-12-02 23:18:00', 4524000, 'Pembayaran Diterima', 12000, 'c02b695ac105abf6a0f7a605a66977d3.png');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `judul`, `isi`, `created_at`) VALUES
(2, 'jadi ini situasi anjir apa buset?', 'aseli', '2023-12-02 23:58:03'),
(3, 'test', 'ini adalah faq yang keduaasdasd', '2023-12-02 23:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_produk`
--

INSERT INTO `foto_produk` (`id`, `id_produk`, `foto`) VALUES
(1, 1, '379846764_6808778842514929_4498277273053051009_n.jpg'),
(2, 1, '379604133_6808804059179074_7464702651232578486_n.jpg'),
(4, 2, '399600340_6987201691339309_4615603259674462047_n.jpg'),
(15, 2, '399529173_6987201511339327_6717612408598763391_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `history_beli`
--

CREATE TABLE `history_beli` (
  `id` int(4) NOT NULL,
  `id_beli` int(4) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_beli`
--

INSERT INTO `history_beli` (`id`, `id_beli`, `status`, `created_at`, `notes`) VALUES
(2, 2, 'Pembayaran Diterima', '2023-12-02 14:17:39', NULL),
(3, 3, 'Pembayaran Diterima', '2023-12-02 14:19:03', NULL),
(4, 4, 'Pembayaran Diterima', '2023-12-02 14:20:28', NULL),
(7, 4, 'Ditolak', '2023-12-02 21:19:07', ''),
(8, 5, 'Pembayaran Diterima', '2023-12-02 15:21:38', NULL),
(9, 5, 'Dikirim', '2023-12-02 21:22:03', 'Kurir: JNE Resi: 11223344 '),
(10, 6, 'Pembayaran Diterima', '2023-12-02 23:18:00', NULL),
(11, 7, 'Pembayaran Diterima', '2023-12-02 23:18:00', NULL),
(12, 5, 'Selesai', '2023-12-02 23:55:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(2, 'Scale Figure'),
(3, 'Figma');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_produk`, `id_user`, `jumlah`) VALUES
(3, 2, 2, 1),
(4, 1, 2, 1),
(5, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Bekasi', 10000),
(2, 'Jakarta', 15000),
(4, 'Bogor', 12000),
(5, 'Depok', 12000),
(6, 'Tangerang', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `kategori` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `berat`, `deskripsi`, `stok`, `created_at`, `kategori`, `link`) VALUES
(1, 'PVC 1/7 Daiwa Scarlet', 2400000, 500, 'PVC 1/7 Daiwa Scarlet Uma Musume. BIB Mulus', 2, '2023-12-02 09:54:13', 2, 'pvc-18-daiwa-scarlet-scale-figure-1-2023-12-02'),
(2, 'PVC 1/8 Ichinose Shiki', 2100000, 500, 'PVC 1/8 Ichinose Shiki Idomaster Cinderella Girls. BIB Mulus', 6, '2023-12-02 11:19:15', 2, 'pvc-18-ichinose-shiki-scale-figure-2-2023-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `level` char(5) NOT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `telepon`, `alamat`, `level`, `created_at`) VALUES
(1, 'Dion Rizqi', 'dion@adikariwisesa.com', 'e10adc3949ba59abbe56e057f20f883e', '6262813832512', 'Jl. Gas Alam RT 04 RW 007 No. B65 Cimanggis Depok', 'user', '2022-10-22'),
(2, 'Admin', 'jelangstuff@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '6287780920699', 'Secret', 'admin', '2022-10-22'),
(3, 'Dions', 'dionrizqi@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '6262626287780', 'Gas Alam Depok', 'user', '2022-11-13'),
(5, 'Jefry', 'jefryfebriano@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '6208170111072', 'Jalan jalan', 'admin', '2023-08-25'),
(6, 'test', 'testemail@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '6212314155623', 'qswsesdfasF', 'user', '2023-08-28'),
(7, 'Niggatelo', 'nigatelo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '6287780920699', 'Depok', 'user', '2023-11-30'),
(9, 'test', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '6287780920699', 'testghjvghj', 'user', '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_produk`, `id_user`) VALUES
(24, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_beli`
--
ALTER TABLE `history_beli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `history_beli`
--
ALTER TABLE `history_beli`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
