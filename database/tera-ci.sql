-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 12:16 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TRASH.ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `aduanpembeli`
--

CREATE TABLE `aduanpembeli` (
  `id_aduanPembeli` int(11) NOT NULL,
  `kode_aduan` varchar(150) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `desk_aduan` varchar(255) NOT NULL,
  `bukti_aduan` varchar(255) NOT NULL,
  `status_aduan` int(11) NOT NULL,
  `tgl_aduan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aduanpembeli`
--

INSERT INTO `aduanpembeli` (`id_aduanPembeli`, `kode_aduan`, `id_pembeli`, `desk_aduan`, `bukti_aduan`, `status_aduan`, `tgl_aduan`) VALUES
(8, 'ADUAN08062022XY3', 2, 'Pengiriman tidak sesuai dengan kode transaksi 10202026ASDJIS', 'ADUAN08062022XY3.png', 2, '2022-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `detaildatapemesanan`
--

CREATE TABLE `detaildatapemesanan` (
  `id_detaildataPemesanan` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `kode_transaksi` varchar(45) NOT NULL,
  `total_hargaPemesanan` varchar(45) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `bulan_pemesanan` varchar(45) NOT NULL,
  `id_informasiStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detaildatapemesanan`
--

INSERT INTO `detaildatapemesanan` (`id_detaildataPemesanan`, `id_pembeli`, `kode_transaksi`, `total_hargaPemesanan`, `tgl_pemesanan`, `bulan_pemesanan`, `id_informasiStatus`) VALUES
(1, 2, '060520225B6SOP', '20000', '2022-05-06', 'May', 3),
(2, 2, '070520226U73IX', '20000', '2022-05-07', 'May', 6),
(3, 2, '070520227FZZJ1', '10000', '2022-05-07', 'May', 6),
(4, 2, '310520229W1RRG', '10000', '2022-05-31', 'May', 3);

-- --------------------------------------------------------

--
-- Table structure for table `informasipemesanansampah`
--

CREATE TABLE `informasipemesanansampah` (
  `id_informasiPemesanansampah` int(11) NOT NULL,
  `kode_transaksi` varchar(45) NOT NULL,
  `kode_produk` varchar(45) NOT NULL,
  `jumlah_sampah` int(11) NOT NULL,
  `total_harga` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasipemesanansampah`
--

INSERT INTO `informasipemesanansampah` (`id_informasiPemesanansampah`, `kode_transaksi`, `kode_produk`, `jumlah_sampah`, `total_harga`) VALUES
(2, '060520225B6SOP', 'KP_nvX1', 2, '10000'),
(3, '060520225B6SOP', 'KP_QF92', 1, '10000'),
(4, '070520226U73IX', 'KP_nvX1', 2, '10000'),
(5, '070520226U73IX', 'KP_QF92', 1, '10000'),
(6, '070520227FZZJ1', 'KP_nvX1', 2, '10000'),
(7, '310520229W1RRG', 'KP_nvX1', 2, '10000');

-- --------------------------------------------------------

--
-- Table structure for table `informasistatuspemesanansampah`
--

CREATE TABLE `informasistatuspemesanansampah` (
  `id_informasiStatus` int(11) NOT NULL,
  `nama_status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasistatuspemesanansampah`
--

INSERT INTO `informasistatuspemesanansampah` (`id_informasiStatus`, `nama_status`) VALUES
(1, 'Menunggu Pembayaran'),
(2, 'Pengecekan Pembayaran'),
(3, 'Pesanan Dikemas'),
(4, 'Pembayaran Ditolak'),
(5, 'Pesanan Dikirim'),
(6, 'Pesanan Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `ketersediaansampah`
--

CREATE TABLE `ketersediaansampah` (
  `id_ketersediaansampah` int(11) NOT NULL,
  `kode_produk` varchar(45) NOT NULL,
  `nama_sampah` varchar(45) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `ukuran_sampah` varchar(45) NOT NULL,
  `jumlah_ketersediaan` varchar(45) NOT NULL,
  `harga_sampah` varchar(45) NOT NULL,
  `foto_sampah` varchar(255) NOT NULL,
  `status_pembuatan` int(11) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `tgl_restock` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ketersediaansampah`
--

INSERT INTO `ketersediaansampah` (`id_ketersediaansampah`, `kode_produk`, `nama_sampah`, `id_penjual`, `ukuran_sampah`, `jumlah_ketersediaan`, `harga_sampah`, `foto_sampah`, `status_pembuatan`, `tgl_produksi`, `tgl_restock`) VALUES
(3, 'KP_nvX1', 'sampah 1 Kg', 1, '15', '20', '5000', 'KP_nvX1.jpg', 8, '2022-05-05', '2022-06-07'),
(4, 'KP_QF92', 'sampah 2 Kg', 1, '20', '14', '10000', 'KP_QF92.jpg', 8, '2022-05-06', '2022-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `laporankeuangan`
--

CREATE TABLE `laporankeuangan` (
  `id_laporanKeuangan` int(11) NOT NULL,
  `nominal` varchar(45) NOT NULL,
  `jenis` varchar(45) NOT NULL,
  `saldo_terakhir` varchar(45) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporankeuangan`
--

INSERT INTO `laporankeuangan` (`id_laporanKeuangan`, `nominal`, `jenis`, `saldo_terakhir`, `tanggal`, `bulan`, `keterangan`) VALUES
(1, '20000', 'Pemasukan', '20000', '2022-06-07', 'June', 'Pemasukan Dari Pemesanan Dengan Kode 060520225B6SOP'),
(2, '20000', 'Pemasukan', '40000', '2022-06-07', 'June', 'Pemasukan Dari Pemesanan Dengan Kode 070520226U73IX'),
(3, '10000', 'Pemasukan', '50000', '2022-06-07', 'June', 'Pemasukan Dari Pemesanan Dengan Kode 070520227FZZJ1'),
(4, '10000', 'Pemasukan', '60000', '2022-06-07', 'June', 'Pemasukan Dari Pemesanan Dengan Kode 310520229W1RRG'),
(5, '25000', 'Pengeluaran', '35000', '2022-06-07', 'June', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_nvX1');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaranpembelisampah`
--

CREATE TABLE `pembayaranpembelisampah` (
  `id_pembayaranPembelisampah` int(11) NOT NULL,
  `id_detailDataPemesanan` int(11) NOT NULL,
  `kode_transaksi` varchar(45) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `metode_pembayaran` varchar(45) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaranpembelisampah`
--

INSERT INTO `pembayaranpembelisampah` (`id_pembayaranPembelisampah`, `id_detailDataPemesanan`, `kode_transaksi`, `tgl_pembayaran`, `metode_pembayaran`, `bukti_pembayaran`) VALUES
(2, 1, '060520225B6SOP', '2022-05-06', 'Transfer', 'BBB1.JPG'),
(6, 2, '070520226U73IX', '2022-05-07', 'Transfer', 'dddd.JPG'),
(7, 3, '070520227FZZJ1', '2022-05-07', 'Transfer', 'dddd1.JPG'),
(8, 4, '310520229W1RRG', '2022-05-31', 'Transfer', 'AAA3.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `statuspembuatansampah`
--

CREATE TABLE `statuspembuatansampah` (
  `id_statusPembuatansampah` int(11) NOT NULL,
  `nama_statusPembuatansampah` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuspembuatansampah`
--

INSERT INTO `statuspembuatansampah` (`id_statusPembuatansampah`, `nama_statusPembuatansampah`) VALUES
(1, 'Proses Pembersihan Bahan Baku'),
(2, 'Penggaraman'),
(3, 'Penjemuran'),
(4, 'Penggilingan Bahan Baku'),
(5, 'Penjemuran Lanjut'),
(6, 'Pencetakan sampah'),
(7, 'Pengemasan sampah'),
(8, 'sampah Sedang Dalam Penjualan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(45) NOT NULL,
  `no_telp` char(12) DEFAULT NULL,
  `alamat` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `foto_profil` varchar(225) NOT NULL,
  `level_user` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_telp`, `alamat`, `email`, `password`, `jenis_kelamin`, `foto_profil`, `level_user`, `tgl_daftar`) VALUES
(1, 'Admin TRASH.ID', '081234835361', 'Probolinggo', 'adminTera_c@gmail.com', '0192023a7bbd73250516f069df18b500', 'Perempuan', 'default.jpg', 1, '2022-05-04'),
(2, 'Arman Maulana Saputra', '081234091823', 'Lumajang', 'user@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', NULL, 'default.jpg', 2, '2022-04-14'),
(3, 'Coba', '081234835352', 'coba', 'coba@gmail.com', 'a3040f90cc20fa672fe31efcae41d2db', 'Laki - Laki', 'AAA.JPG', 2, '2022-05-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aduanpembeli`
--
ALTER TABLE `aduanpembeli`
  ADD PRIMARY KEY (`id_aduanPembeli`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indexes for table `detaildatapemesanan`
--
ALTER TABLE `detaildatapemesanan`
  ADD PRIMARY KEY (`id_detaildataPemesanan`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_informasiStatus` (`id_informasiStatus`);

--
-- Indexes for table `informasipemesanansampah`
--
ALTER TABLE `informasipemesanansampah`
  ADD PRIMARY KEY (`id_informasiPemesanansampah`),
  ADD KEY `id_ketersediaansampah` (`kode_produk`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `informasistatuspemesanansampah`
--
ALTER TABLE `informasistatuspemesanansampah`
  ADD PRIMARY KEY (`id_informasiStatus`);

--
-- Indexes for table `ketersediaansampah`
--
ALTER TABLE `ketersediaansampah`
  ADD PRIMARY KEY (`id_ketersediaansampah`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `kode_produk` (`kode_produk`),
  ADD KEY `fk_pembuatansampah` (`status_pembuatan`);

--
-- Indexes for table `laporankeuangan`
--
ALTER TABLE `laporankeuangan`
  ADD PRIMARY KEY (`id_laporanKeuangan`);

--
-- Indexes for table `pembayaranpembelisampah`
--
ALTER TABLE `pembayaranpembelisampah`
  ADD PRIMARY KEY (`id_pembayaranPembelisampah`),
  ADD KEY `id_detailDataPemesanan` (`id_detailDataPemesanan`);

--
-- Indexes for table `statuspembuatansampah`
--
ALTER TABLE `statuspembuatansampah`
  ADD PRIMARY KEY (`id_statusPembuatansampah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aduanpembeli`
--
ALTER TABLE `aduanpembeli`
  MODIFY `id_aduanPembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detaildatapemesanan`
--
ALTER TABLE `detaildatapemesanan`
  MODIFY `id_detaildataPemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `informasipemesanansampah`
--
ALTER TABLE `informasipemesanansampah`
  MODIFY `id_informasiPemesanansampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `informasistatuspemesanansampah`
--
ALTER TABLE `informasistatuspemesanansampah`
  MODIFY `id_informasiStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ketersediaansampah`
--
ALTER TABLE `ketersediaansampah`
  MODIFY `id_ketersediaansampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laporankeuangan`
--
ALTER TABLE `laporankeuangan`
  MODIFY `id_laporanKeuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaranpembelisampah`
--
ALTER TABLE `pembayaranpembelisampah`
  MODIFY `id_pembayaranPembelisampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `statuspembuatansampah`
--
ALTER TABLE `statuspembuatansampah`
  MODIFY `id_statusPembuatansampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aduanpembeli`
--
ALTER TABLE `aduanpembeli`
  ADD CONSTRAINT `fk_pembeliAduan` FOREIGN KEY (`id_pembeli`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detaildatapemesanan`
--
ALTER TABLE `detaildatapemesanan`
  ADD CONSTRAINT `fk_pembeliPemesanan` FOREIGN KEY (`id_pembeli`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `informasipemesanansampah`
--
ALTER TABLE `informasipemesanansampah`
  ADD CONSTRAINT `fk_kodeProduk` FOREIGN KEY (`kode_produk`) REFERENCES `ketersediaansampah` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ketersediaansampah`
--
ALTER TABLE `ketersediaansampah`
  ADD CONSTRAINT `fk_ketersediaanPenjual` FOREIGN KEY (`id_penjual`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembuatansampah` FOREIGN KEY (`status_pembuatan`) REFERENCES `statuspembuatansampah` (`id_statusPembuatansampah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaranpembelisampah`
--
ALTER TABLE `pembayaranpembelisampah`
  ADD CONSTRAINT `fk_detailPemesananPembayaran` FOREIGN KEY (`id_detailDataPemesanan`) REFERENCES `detaildatapemesanan` (`id_detaildataPemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
