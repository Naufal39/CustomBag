-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2019 pada 09.34
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

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
(1, 'Leather - Nabati', 25, 5000, 2500000),
(2, 'Leather - Chrome', 20, 0, 0),
(3, 'Leather - PullUp', 51, 0, 0),
(4, 'Leather - Suede', 53, 0, 0),
(5, 'Polyester', 55, 0, 0),
(6, 'Canvas', 53, 0, 0),
(7, 'Satin', 55, 0, 0),
(8, 'Serge de Nimes (denim)', 45, 0, 0);

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
  `type_sleting` varchar(155) NOT NULL,
  `bag_depan` varchar(100) NOT NULL,
  `bag_belakang` varchar(100) NOT NULL,
  `unit_depan` int(11) NOT NULL,
  `unit_belakang` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id`, `id_transaksi`, `tanggal_masuk`, `tanggal_keluar`, `lokasi`, `kode_barang`, `nama_barang`, `jenis_tas`, `type_sleting`, `bag_depan`, `bag_belakang`, `unit_depan`, `unit_belakang`, `satuan`, `jumlah`, `total_harga`) VALUES
(30, 'CB-201990168357', '2019-05-01 00:00:00', '2019-06-02 00:00:00', '', '1234568', 'tas hitamku', 'TAS SEMINAR', 'sleting2', 'depan', 'belakang', 0, 0, 'Pcs', '15', 500000),
(31, 'CB-201914378905', '2019-05-01 00:00:00', '2019-05-01 00:00:00', '', '7508462', 'Tas Lepi', 'TAS KANVAS', 'sleting', 'depan211', 'belakang1', 0, 0, 'Pcs', '50', 48965),
(32, 'CB-201972095643', '2019-05-06 00:00:00', '2019-05-06 00:00:00', '', '2416307', 'tas hitamku', 'TAS SEKOLAH', 'sleting2', 'depan', 'belakang122', 0, 0, 'Pcs', '33', 500000),
(33, 'CB-201914378905', '2019-05-01 00:00:00', '2019-05-06 00:00:00', '', '7508462', 'Tas Lepi', 'TAS KANVAS', 'sleting', 'depan211', 'belakang1', 0, 0, 'Pcs', '4', 48965),
(34, 'CB-201901728593', '2019-04-29 00:00:00', '1931-11-13 00:00:00', '', '1637425', 'tas hitamku', 'TAS RANSEL', 'sleting2', 'Leather - Nabati', 'Leather - Chrome', 0, 0, 'Pcs', '3', 500000),
(35, 'CB-201972389104', '0000-00-00 00:00:00', '2019-09-26 00:00:00', '', '1845793', 'tas hitamku', 'TAS KOPER', 'yes', 'Leather - Nabati', 'Leather - Chrome', 0, 0, 'Pcs', '1', 300000),
(36, 'CB-201934860517', '2019-09-26 00:00:00', '2019-10-03 00:00:00', '', '9510842', 'Tas gunung2', 'TAS TRAVEL', 'yes', 'Leather - Chrome', 'Polyester', 0, 0, 'Pcs', '5', 300000),
(37, 'CB-201934860517', '2019-09-26 00:00:00', '2019-11-13 00:00:00', '', '9510842', 'Tas gunung2', 'TAS TRAVEL', 'yes', 'Leather - Chrome', 'Polyester', 0, 0, 'Pcs', '1', 300000);

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
  `type_sleting` varchar(155) NOT NULL,
  `bag_depan` varchar(100) NOT NULL,
  `bag_belakang` varchar(100) NOT NULL,
  `unit_depan` int(11) NOT NULL,
  `unit_belakang` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_transaksi`, `tanggal`, `lokasi`, `kode_barang`, `nama_barang`, `jenis_tas`, `type_sleting`, `bag_depan`, `bag_belakang`, `unit_depan`, `unit_belakang`, `satuan`, `jumlah`, `total_harga`) VALUES
('CB-201902367154', '', '', '9304287', 'qwqwqw', 'TAS RANSEL', 'yes', 'Leather - Nabati', 'Leather - Chrome', 4, 3, 'Pcs', '12', 2147483647),
('CB-201910825479', '', '', '1507962', 'werwr11', 'TAS LAPTOP', 'yes', 'Leather - Chrome', 'Canvas', 4, 4, 'Pcs', '56', 77777778),
('CB-201912864537', '', '', '9435176', 'werwr', 'TAS LAPTOP', 'yes', 'Leather - Chrome', 'Leather - Nabati', 0, 0, 'Pcs', '7', 7777777),
('CB-201919724563', '', '', '7852604', 'ererererer60', 'TAS KANVAS', 'yes', 'Leather - Nabati', 'Leather - Chrome', 5, 5, 'Pcs', '50', 7777777),
('CB-201921906357', '', '', '6189547', 'taskuq', 'TAS RANSEL', 'yes', 'Leather - Suede', 'Leather - Suede', 1, 1, 'Pcs', '3', 0),
('CB-201924075398', '', '', '9508134', 'tas hitamku2222', 'TAS KANVAS', 'no', 'Leather - Nabati', 'Leather - Chrome', 0, 0, 'Pcs', '6', 300000),
('CB-201925971084', '', '', '3576201', 'tas hitamku45345', 'TAS KOPER', 'no', 'Leather - Nabati', 'Leather - Chrome', 0, 0, 'Pcs', '2', 500000),
('CB-201927394568', '', '', '8509374', 'ererererer675', 'TAS ORGANIZER', 'yes', 'Serge de Nimes (denim)', 'Serge de Nimes (denim)', 10, 4, 'Pcs', '67', 777777787),
('CB-201928534196', '', '', '1382576', 'tasku', 'TAS RANSEL', 'yes', 'Leather - Nabati', 'Leather - Nabati', 0, 0, '', '2', 113131226),
('CB-201934860517', '2019-09-26', '', '9510842', 'Tas gunung2', 'TAS TRAVEL', 'yes', 'Leather - Chrome', 'Polyester', 0, 0, 'Pcs', '1', 300000),
('CB-201941027658', '', '', '7163928', 'tas hitamku', 'TAS LAPTOP', 'no', 'Leather - Nabati', 'Leather - Chrome', 0, 0, 'Pcs', '2', 500000),
('CB-201941769205', '', '', '1038249', 'ererererer6', 'TAS OLAHRAGA ', 'yes', 'Leather - Chrome', 'Leather - Chrome', 4, 10, 'Pcs', '6', 7777777),
('CB-201960481279', '', '', '7259031', 'werwr45345', 'TAS RANSEL', 'yes', 'Leather - PullUp', 'Leather - Nabati', 4, 4, 'Pcs', '54', 77777778),
('CB-201962543817', '', '', '7293481', 'werwr11', 'TAS LAPTOP', 'yes', 'Leather - Chrome', 'Canvas', 10, 40, 'Pcs', '', 77777778),
('CB-201968475132', '', '', '5710648', 'ererererer', 'TAS KANVAS', 'yes', 'Leather - Chrome', 'Leather - Nabati', 5, 9, 'Pcs', '55', 77777778),
('CB-201972389104', '', '', '1845793', 'tas hitamku', 'TAS KOPER', 'yes', 'Leather - Nabati', 'Leather - Chrome', 0, 0, 'Pcs', '1', 300000),
('CB-201975904386', '2019-12-08', '', '1260785', 'ererererer', 'TAS KANVAS', 'yes', 'Leather - Nabati', 'Leather - Chrome', 5, 5, 'Pcs', '33', 77777778),
('CB-201994310782', '', '', '7406293', 'werwr', 'TAS KOPER', 'yes', 'Leather - Chrome', 'Leather - Nabati', 5, 4, 'Pcs', '76', 2147483647);

--
-- Trigger `tb_barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `TG_STOK_BAHAN` AFTER INSERT ON `tb_barang_masuk` FOR EACH ROW BEGIN
 UPDATE tb_bahan SET stok=stok-NEW.unit_depan
 WHERE nama_bahan=NEW.bag_depan;

 UPDATE tb_bahan SET stok=stok-NEW.unit_belakang
 WHERE nama_bahan=NEW.bag_belakang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TG_STOK_BAHAN2` BEFORE INSERT ON `tb_barang_masuk` FOR EACH ROW BEGIN
 UPDATE tb_bahan SET stok=stok-NEW.bag_belakang
 WHERE nama_bahan=NEW.bag_belakang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `jenis_tas` varchar(155) NOT NULL,
  `bag_depan` varchar(155) NOT NULL,
  `bag_belakang` varchar(155) NOT NULL,
  `price` int(155) NOT NULL,
  `image` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product_permintaan`
--

CREATE TABLE `tb_product_permintaan` (
  `product_id` varchar(64) NOT NULL,
  `harga_produksi` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product_template`
--

CREATE TABLE `tb_product_template` (
  `id_template` int(64) NOT NULL,
  `id_template_product` varchar(200) NOT NULL,
  `nama_template` varchar(255) NOT NULL,
  `jenis_tas` varchar(191) NOT NULL,
  `type_sleting` varchar(155) NOT NULL,
  `bag_depan` varchar(155) NOT NULL,
  `bag_belakang` varchar(155) NOT NULL,
  `unit_depan` int(11) NOT NULL,
  `unit_belakang` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_product_template`
--

INSERT INTO `tb_product_template` (`id_template`, `id_template_product`, `nama_template`, `jenis_tas`, `type_sleting`, `bag_depan`, `bag_belakang`, `unit_depan`, `unit_belakang`, `photo`, `deskripsi`, `total_harga`) VALUES
(18, 'TP-31827', 'taskuq', 'TAS RANSEL', 'yes', 'Leather - Suede', 'Leather - Chrome', 1, 1, 'default.jpg', 'hahahahahaha', 0),
(19, 'TP-67928', 'taskuq', 'TAS LAPTOP', 'yes', 'Leather - Nabati', 'Leather - Chrome', 1, 1, '', 'hahahahahaha', 0),
(20, 'TP-28701', 'tasku', 'TAS SEKOLAH', 'no', 'Leather - Nabati', 'Leather - Chrome', 1, 1, '', 'hahahahahaha', 0),
(21, 'TP-41296', 'tasku', 'TAS RANSEL', 'yes', 'Leather - Chrome', 'Polyester', 1, 1, '', 'qweqwe', 0),
(22, 'TP-14765', 'tasku', 'TAS RANSEL', 'yes', 'Leather - PullUp', 'Leather - Chrome', 1, 1, 'default.jpg', 'qweqwe', 0),
(23, 'TP-14765', 'tasku', 'TAS RANSEL', 'yes', 'Leather - PullUp', 'Leather - Chrome', 1, 1, 'default.jpg', 'qweqwe', 0),
(24, 'TP-14765', 'tasku', 'TAS RANSEL', 'yes', 'Leather - PullUp', 'Leather - Chrome', 1, 1, 'default.jpg', 'qweqwe', 0),
(25, 'TP-87253', 'taskuq89', 'TAS RANSEL', 'no', 'Leather - Nabati', 'Leather - Nabati', 3, 4, '', 'zzzzzzzzzzzz', 0),
(26, 'TP-01564', 'tasku', 'TAS KANVAS', 'no', 'Leather - Chrome', 'Leather - Chrome', 5, 4, '', 'hahahahahaha', 0),
(27, 'TP-51734', 'tasku', 'TAS RANSEL', 'yes', 'Leather - Nabati', 'Leather - PullUp', 5, 4, '', 'qweqwe', 56565613),
(28, 'TP-80241', 'taskuq', 'TAS KANVAS', 'no', 'Leather - Chrome', 'Leather - Nabati', 5, 4, '', 'hahahahahaha', 21600),
(29, 'TP-26579', 'tasku', 'TAS KOPER', 'no', 'Leather - PullUp', 'Leather - Nabati', 5, 4, '', 'hahahahahaha', 21600);

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
  `role` tinyint(4) NOT NULL DEFAULT 0,
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
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `tb_product_permintaan`
--
ALTER TABLE `tb_product_permintaan`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `tb_product_template`
--
ALTER TABLE `tb_product_template`
  ADD PRIMARY KEY (`id_template`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_product_template`
--
ALTER TABLE `tb_product_template`
  MODIFY `id_template` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
