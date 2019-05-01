-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2019 pada 16.28
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bahan`
--

CREATE TABLE `tb_bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_bahan` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bahan`
--

INSERT INTO `tb_bahan` (`id_bahan`, `nama_bahan`, `stok`, `harga_bahan`, `harga_total`) VALUES
(1, 'Leather - Nabati', 55, 5000, 2500000),
(2, 'Leather - Chrome', 55, 0, 0),
(3, 'Leather - PullUp', 55, 0, 0),
(4, 'Leather - Suede', 55, 0, 0),
(5, 'Polyester', 55, 0, 0),
(6, 'Canvas', 55, 0, 0),
(7, 'Satin', 55, 0, 0),
(8, 'Serge de Nimes (denim)', 55, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id` int(10) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `tanggal_keluar` datetime NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_tas` varchar(200) NOT NULL,
  `nama_bahan` varchar(200) NOT NULL,
  `type_sleting` varchar(155) NOT NULL,
  `bag_depan` varchar(100) NOT NULL,
  `bag_belakang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id`, `id_transaksi`, `tanggal_masuk`, `tanggal_keluar`, `lokasi`, `kode_barang`, `nama_barang`, `jenis_tas`, `nama_bahan`, `type_sleting`, `bag_depan`, `bag_belakang`, `satuan`, `jumlah`) VALUES
(1, 'WG-201713067948', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NTB', '8888166995215', 'Ciki Walens', '', '', '', '', '', 'Dus', '50'),
(2, 'WG-201713067948', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NTB', '8888166995215', 'Ciki Walens', '', '', '', '', '', 'Dus', '6'),
(3, 'WG-201713549728', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Banten', '1923081008002', 'Buku Hiragana', '', '', '', '', '', 'Pack', '3'),
(4, 'WG-201774896520', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Yogyakarta', '60201311121008264', 'Battery ZTE', '', '', '', '', '', 'Dus', '3'),
(5, 'WG-201727134650', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Jakarta', '29312390203', 'Susu', '', '', '', '', '', 'Dus', '17'),
(6, 'WG-201810974628', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Lampung', '1923081008002', 'Buku Nihongo', '', '', '', '', '', 'Dus', '50'),
(7, 'WG-201781267543', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Yogyakarta', '97897952889', 'Buku Framework Codeigniter', '', '', '', '', '', 'Dus', '1'),
(8, 'WG-201832570869', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bali', '1923081008002', 'test', '', '', '', '', '', 'Dus', '10'),
(9, 'WG-201893850472', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bali', '1923081008002', 'lumpur nartugo', '', '', '', '', '', 'Pcs', '11'),
(10, 'WG-201781267543', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Yogyakarta', '97897952889', 'Buku Framework Codeigniter', '', '', '', '', '', 'Dus', '1'),
(11, 'WG-201727134650', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Jakarta', '29312390203', 'Susu', '', '', '', '', '', 'Dus', '3'),
(12, 'WG-201774896520', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Yogyakarta', '60201311121008264', 'Battery ZTE', '', '', '', '', '', 'Dus', '3'),
(13, 'WG-201727134650', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Jakarta', '29312390203', 'Susu', '', '', '', '', '', 'Dus', '1'),
(14, 'WG-201727134650', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Jakarta', '29312390203', 'Susu', '', '', '', '', '', 'Dus', '1'),
(15, 'WG-201885472106', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Riau', '8996001600146', 'Teh Pucuk', '', '', '', '', '', 'Dus', '50'),
(16, 'WG-201871602934', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Papua', '312212331222', 'Kopi Hitam', '', '', '', '', '', 'Dus', '10'),
(17, 'WG-201909516372', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bengkulu', 'asaw', 'teh', '', '', '', '', '', 'Pcs', '56'),
(18, 'WG-201994738506', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Bali', '78942', 'popoku2', '', '', '', '', '', 'Dus', '23'),
(19, 'WG-201925781604', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Jakarta', '656462', 'popok', '', '', '', '', '', 'Dus', '2'),
(20, 'WG-201937849210', '0000-00-00 00:00:00', '2019-04-27 00:00:00', 'Jakarta', '159236', 'tas hitam222', '', '', '', '', '', 'Pcs', '3'),
(21, 'WG-201983709126', '2019-05-08 00:00:00', '2019-04-27 00:00:00', 'Lampung', '55555', 'tas hitam3333', '', '', '', '', '', 'Pcs', '5'),
(22, 'WG-201937905814', '0000-00-00 00:00:00', '2019-04-28 00:00:00', 'Bali', '78942', 'Tas gunung2', 'Tas gun', 'denim', 'sleting', 'depan', 'belakang', 'Pcs', '3'),
(23, 'WG-201993857602', '2019-04-28 00:00:00', '2019-04-28 00:00:00', 'Jakarta', '55555', 'tas pantai', 'Tas pantai', '3', 'sleting2', 'depan2', 'belakang1', 'Pcs', '5'),
(24, 'WG-201937082946', '2019-04-28 00:00:00', '2019-04-28 00:00:00', 'Jawa Tengah', '656462', 'tas hitamku', 'TAS TROLI  ', 'Leather - Nabati', 'sleting2', 'depan211', 'belakang122', 'Dus', '5'),
(25, 'WG-201959703482', '2019-04-10 00:00:00', '2019-04-28 00:00:00', 'Jakarta', '656462', 'tas hitamku45345', 'SOFT CASE ', 'Leather - PullUp', 'sleting2', 'depan', 'belakang1', 'Pcs', '50'),
(26, 'WG-201959703482', '2019-04-10 00:00:00', '2019-04-29 00:00:00', 'Jakarta', '656462', 'tas hitamku45345', 'SOFT CASE ', 'Leather - PullUp', 'sleting2', 'depan', 'belakang1', 'Pcs', '16'),
(27, 'WG-201918390452', '2019-04-29 00:00:00', '2019-04-29 00:00:00', 'Yogyakarta', '159487', 'gudibagsss', 'TAS RANSEL LAPTOP', 'Leather - Suede', 'sleting21222', 'depan211111545', 'belakang124', 'Pcs', '35'),
(28, 'WG-201926490817', '2019-04-30 00:00:00', '2019-04-30 00:00:00', 'Bengkulu', '78942', 'teh', 'TAS KOPER', 'Leather - PullUp', 'sleting21222', 'depan', 'belakang122', 'Pcs', '3');

--
-- Trigger `tb_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `TG_BARANG_KELUAR` AFTER INSERT ON `tb_barang_keluar` FOR EACH ROW BEGIN
 UPDATE tb_barang_masuk SET jumlah=jumlah-NEW.jumlah
 WHERE kode_barang=NEW.kode_barang;
 DELETE FROM tb_barang_masuk WHERE jumlah = 0;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_tas` varchar(200) NOT NULL,
  `nama_bahan` varchar(200) NOT NULL,
  `type_sleting` varchar(155) NOT NULL,
  `bag_depan` varchar(100) NOT NULL,
  `bag_belakang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_transaksi`, `tanggal`, `lokasi`, `kode_barang`, `nama_barang`, `jenis_tas`, `nama_bahan`, `type_sleting`, `bag_depan`, `bag_belakang`, `satuan`, `jumlah`) VALUES
('WG-201918390452', '2019-04-29', 'Yogyakarta', '159487', 'gudibagsss', 'TAS RANSEL LAPTOP', 'Leather - Suede', 'sleting21222', 'depan211111545', 'belakang124', 'Pcs', '31'),
('WG-201926490817', '2019-04-30', 'Bengkulu', '78942', 'teh', 'TAS KOPER', 'Leather - PullUp', 'sleting21222', 'depan', 'belakang122', 'Pcs', '30'),
('WG-201965741039', '2019-04-29', 'Jawa Timur', 'asaw222', 'tas hitam43', 'TAS SEMINAR', 'Satin', 'sleting21222', 'depan211', 'belakang12121', 'Pcs', '23'),
('WG-201992046157', '2019-04-29', 'Jakarta', '55555', 'tas hitamku123', 'TAS SPUNBOND ', 'Polyester', 'sleting21', 'depan211111', 'belakang122222', 'Pcs', '34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `jenis_tas` varchar(155) DEFAULT NULL,
  `nama_bahan` varchar(155) DEFAULT NULL,
  `type_sleting` varchar(155) DEFAULT NULL,
  `bag_depan` varchar(155) DEFAULT NULL,
  `bag_belakang` varchar(155) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `name`, `jenis_tas`, `nama_bahan`, `type_sleting`, `bag_depan`, `bag_belakang`, `price`, `image`, `description`) VALUES
('5c9a2abb29b09', 'user', NULL, NULL, NULL, NULL, NULL, 1231, 'default.jpg', '4123hahaha'),
('5c9a2c3e57cba', 'asdaxfhdfg', NULL, NULL, NULL, NULL, NULL, 12412, '5c9a2c3e57cba.png', 'wgsdfs'),
('5c9e4ced3dbe3', 'Tas Hitam', NULL, NULL, NULL, NULL, NULL, 1000, '5c9e4ced3dbe3.png', 'Produk Sangat Baik '),
('5ca62998d1e58', 'admin1', NULL, NULL, NULL, NULL, NULL, 56565656, '5ca62998d1e58.png', 'jadiiiiiiiiiiiiiiii'),
('5ca62f3937784', 'Tas Merah', NULL, NULL, NULL, NULL, NULL, 15964, '5ca62f3937784.png', 'Tst Jadiii');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `kode_satuan` varchar(100) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `kode_satuan`, `nama_satuan`) VALUES
(2, 'Pcs', 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tas`
--

CREATE TABLE `tb_tas` (
  `id_tas` int(11) NOT NULL,
  `nama_tas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tas`
--

INSERT INTO `tb_tas` (`id_tas`, `nama_tas`) VALUES
(1, 'TAS KANVAS'),
(2, 'TAS LAPTOP'),
(3, 'TAS RANSEL'),
(4, 'TAS KOPER'),
(5, 'TAS SEKOLAH'),
(6, 'TAS TRAVEL'),
(7, 'TAS TROLI  '),
(8, 'TAS WANITA'),
(9, 'TAS KULIT'),
(10, 'GOODY BAG'),
(11, 'SOFT CASE '),
(12, 'TAS BEKAL'),
(13, 'TAS OLAHRAGA '),
(14, 'TAS KERJA'),
(15, 'TAS ORGANIZER'),
(16, 'TAS PINGGANG'),
(17, 'TAS PROMOSI '),
(18, 'TAS SEMINAR'),
(19, 'TAS SPUNBOND '),
(20, 'TAS RANSEL LAPTOP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_upload_gambar_user`
--

CREATE TABLE `tb_upload_gambar_user` (
  `id` int(11) NOT NULL,
  `username_user` varchar(100) NOT NULL,
  `nama_file` varchar(220) NOT NULL,
  `ukuran_file` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_upload_gambar_user`
--

INSERT INTO `tb_upload_gambar_user` (`id`, `username_user`, `nama_file`, `ukuran_file`) VALUES
(1, 'zahidin', 'nopic5.png', '6.33'),
(2, 'test', 'nopic4.png', '6.33'),
(3, 'coba', 'logo_unsada1.jpg', '16.69'),
(4, 'admin', 'nopic2.png', '6.33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` enum('kasir','gudang','admin','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin99', 'admin'),
(2, 'kasir', 'kasir99', 'kasir'),
(3, 'gudang', 'gudang99', 'gudang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` double NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode`, `barang`, `jumlah`, `total_harga`, `tgl`) VALUES
(0, 'T0004', 'TAS HITAM', 2, 200000, '2019-03-31 00:00:00'),
(1, 'T005', 'TAS KOPER', 3, 150000, '2018-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `last_login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `last_login`) VALUES
(11, 'zahidin', 'riskididin@ymail.com', '$2y$10$WZYOZcN05JHriS09.C6o7evdWIJ3Obj7vNHzuLunFIAZCDJtG6W1C', 1, '17-03-2018 11:47'),
(12, 'husni', 'husni@gmail.com', '$2y$10$MXbWRsLw6S6xpyQu2/ZiEeB7oTCLrfEPpDcXWaszFVoYj.Yv51wG.', 0, '17-03-2018 11:19'),
(16, 'test', 'test@gmail.com', '$2y$10$CTjzvmT5B.dxojKZOxsjTeMc4E7.Gwl9slAgX.0lozwGrKSMxzWdO', 1, '16-03-2018 4:46'),
(17, 'coba', 'coba@gmail.com', '$2y$10$WRMyjAi8nnkr3J3QvzvyHuEoqay5dYd5NgMJKxsxtXKCp8.JCxZm.', 1, '15-01-2018 15:41'),
(20, 'admin', 'admin@gmail.com', '$2y$10$3HNkMOtwX8X88Xb3DIveYuhXScTnJ9m16/rPDF1/VTa/VTisxVZ4i', 1, '17-03-2018 11:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bahan`
--
ALTER TABLE `tb_bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tb_tas`
--
ALTER TABLE `tb_tas`
  ADD PRIMARY KEY (`id_tas`);

--
-- Indeks untuk tabel `tb_upload_gambar_user`
--
ALTER TABLE `tb_upload_gambar_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

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
-- AUTO_INCREMENT untuk tabel `tb_bahan`
--
ALTER TABLE `tb_bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_tas`
--
ALTER TABLE `tb_tas`
  MODIFY `id_tas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_upload_gambar_user`
--
ALTER TABLE `tb_upload_gambar_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
