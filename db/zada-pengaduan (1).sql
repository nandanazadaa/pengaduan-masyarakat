-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 10:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zada-pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(7, 'Prasana Umum'),
(8, 'Lingkunag Hidup'),
(9, 'Perhubungan'),
(10, 'Kesehatan'),
(11, 'Pelanggaran Peraturan Daerah'),
(12, 'Perizinan'),
(13, 'Sosial'),
(14, 'Perpajakan'),
(15, 'Komunikasi dan Informatika'),
(18, 'Kepegawaian');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `level` int(3) NOT NULL,
  `active` enum('active','suspend') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `no_telp`, `level`, `active`) VALUES
(5, '12121212', 'Vania Rahma', 'vania', '$2y$10$AkM8JTjXBWn6gmKe.cc45eDQu5lxiRjdZYuYjasGQOf/7l..qX8Te', '0895379132634', 3, 'active'),
(6, '1232321312321', 'zada', 'zada', '$2y$10$rRh40GbpfcdBFTECH8vyjOf4DdRqlOb0TuhpFkjeghtCbi3AMMkOO', '0892137213813', 0, 'active'),
(7, '6785678567', 'azez', 'masyarakat', '$2y$10$Uuj7xzM0y5sjj.XMyEuzhu1DZGL69uN1F2NvDBPBvwx5xAuoL9yE6', '6475454654', 0, 'active'),
(8, '453463453453', 'gendro', 'sartono', '$2y$10$I0A4m23eRSBGvV82hmfxHOGVq5fS4d1NL2DqnHiMdTdoLhAaQb45K', '78867967', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('segera','proses','selesai') NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `id_kategori`, `sub_kategori`) VALUES
(24, '2023-03-15', '1232321312321', 'byubiu\r\n', '', 'selesai', 7, 'asd'),
(25, '2023-03-15', '1232321312321', 'dsdededded', 'tahun_lulus3.PNG', 'selesai', 8, 'dgdghd');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas','ban') NOT NULL,
  `is_active` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `no_telp`, `level`, `is_active`) VALUES
(1, 'pur', 'zada', '$2y$10$qWEHmobW1NghVuV8A0INTOXiVu3qFFYsmKHFGDKwWqm8vBGJt/CW2', '24524525', 'admin', 1),
(4, 'Nandana Zada Abiproya', 'nandana', '$2y$10$w87djPffnLSgibt/VStc2eoPb4o6VsIP94p0t05tRoEq.3Zq7pVMC', '05678567567', 'admin', 1),
(6, 'zavan', 'vanzad', '$2y$10$lJf66GAyZlgmUm5iXSf8Me9lXaCEdIYmfAkQRchtXVz6LlzUW21Am', '0892135782312', 'petugas', 1),
(7, 'wisang', 'wisang', '$2y$10$h4YApXdTqCibrpr6nNd5/OUc89Bu1V5BmQv0JlG159sxK9FMvBH.m', '223232323', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_subkategori` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_subkategori`, `id_kategori`, `sub_kategori`) VALUES
(27, 7, 'asd'),
(32, 7, 'sasas'),
(34, 8, 'dgdghd'),
(35, 9, 'fdfdsgfgs'),
(36, 10, 'dgdsfdsfsca');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `nama_petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `nama_petugas`) VALUES
(1, 0, '2023-03-15', 'asasa', 'pur'),
(2, 24, '2023-03-15', 'asasa', 'pur'),
(3, 24, '2023-03-15', 'selesai', 'pur'),
(4, 25, '2023-03-15', 'sedang di proses....\r\n', 'pur'),
(5, 25, '2023-03-15', '', 'pur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_subkategori`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_subkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
