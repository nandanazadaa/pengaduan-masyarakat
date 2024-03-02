-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Mar 2023 pada 18.05
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
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
(15, 'Komunikasi dan Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
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
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id`, `nik`, `nama`, `username`, `password`, `no_telp`, `level`, `active`) VALUES
(5, '12121212', 'Vania Rahma', 'vania', '$2y$10$AkM8JTjXBWn6gmKe.cc45eDQu5lxiRjdZYuYjasGQOf/7l..qX8Te', '0895379132634', 3, 'active'),
(6, '1232321312321', 'zadaa', 'zada', '$2y$10$rRh40GbpfcdBFTECH8vyjOf4DdRqlOb0TuhpFkjeghtCbi3AMMkOO', '0892137213813', 0, 'active'),
(7, '6785678567', 'azez', 'masyarakat', '$2y$10$Uuj7xzM0y5sjj.XMyEuzhu1DZGL69uN1F2NvDBPBvwx5xAuoL9yE6', '6475454654', 0, 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
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
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`, `id_kategori`, `sub_kategori`) VALUES
(24, '2023-03-15', '1232321312321', 'byubiu\r\n', '', 'selesai', 7, 'asd'),
(25, '2023-03-15', '1232321312321', 'dsdededded', 'tahun_lulus3.PNG', 'selesai', 8, 'dgdghd'),
(26, '2023-03-19', '1232321312321', 'yfjhgk\r\n', 'LOMBA_MAULID_MUHI.png', 'selesai', 7, 'asd'),
(27, '2023-03-19', '987987987', 'kugukgkjvbku', 'desola-lanre-ologun-IgUR1iX0mqM-unsplash.jpg', 'selesai', 9, 'fdfdsgfgs'),
(28, '2023-03-19', '987987987', 'jgujgk', 'SMK_MUH_1_YK-removebg-preview.png', 'proses', 7, 'asd'),
(29, '2023-03-19', '987987987', 'asasas', '', 'segera', 8, 'dgdghd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
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
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `no_telp`, `level`, `is_active`) VALUES
(4, 'Nandana Zada Abiproya', 'nandana', '$2y$10$w87djPffnLSgibt/VStc2eoPb4o6VsIP94p0t05tRoEq.3Zq7pVMC', '05678567567', 'admin', 1),
(6, 'zavan', 'vanzad', '$2y$10$lJf66GAyZlgmUm5iXSf8Me9lXaCEdIYmfAkQRchtXVz6LlzUW21Am', '0892135782312', 'petugas', 1),
(7, 'wisang', 'wisang', '$2y$10$h4YApXdTqCibrpr6nNd5/OUc89Bu1V5BmQv0JlG159sxK9FMvBH.m', '223232323', 'admin', 1),
(8, 'zada', 'zada', '$2y$10$pzlNRycYTIQkzNuu7DWY.udJ1SKlOlDZbRtTlWQA5OFl5Qt1h9uQO', '553643634543', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_subkategori` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_subkategori`, `id_kategori`, `sub_kategori`) VALUES
(27, 7, 'asd'),
(32, 7, 'sasas'),
(34, 8, 'dgdghd'),
(35, 9, 'fdfdsgfgs'),
(37, 10, 'gdsdfsd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `nama_petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `nama_petugas`) VALUES
(1, 0, '2023-03-15', 'asasa', 'pur'),
(2, 24, '2023-03-15', 'asasa', 'pur'),
(3, 24, '2023-03-15', 'selesai', 'pur'),
(4, 25, '2023-03-15', 'sedang di proses....\r\n', 'pur'),
(5, 25, '2023-03-15', '', 'pur'),
(6, 26, '2023-03-19', 'gjkbbjk', 'pur'),
(7, 26, '2023-03-19', 'jhjhvj', 'pur'),
(8, 27, '2023-03-19', 'igkihklhk', 'pur'),
(9, 27, '2023-03-19', 'asasas', 'zavan'),
(10, 27, '2023-03-19', 'asaa', 'zavan'),
(11, 28, '2023-03-19', '', 'zavan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_subkategori`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_subkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
