-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2023 pada 14.29
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trash.id1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduanpembeli`
--

CREATE TABLE `aduanpembeli` (
  `id_aduanPembeli` int(11) NOT NULL,
  `kode_aduan` varchar(150) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `desk_aduan` varchar(255) NOT NULL,
  `bukti_aduan` varchar(255) NOT NULL,
  `status_aduan` int(11) NOT NULL,
  `tgl_aduan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detaildatapemesanan`
--

CREATE TABLE `detaildatapemesanan` (
  `id_detaildataPemesanan` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `kode_transaksi` varchar(45) NOT NULL,
  `total_hargaPemesanan` varchar(45) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `bulan_pemesanan` varchar(45) NOT NULL,
  `id_informasiStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `detaildatapemesanan`
--

INSERT INTO `detaildatapemesanan` (`id_detaildataPemesanan`, `id_pembeli`, `kode_transaksi`, `total_hargaPemesanan`, `tgl_pemesanan`, `bulan_pemesanan`, `id_informasiStatus`) VALUES
(5, 4, '29112023IEFUP6', '4000', '2023-11-29', 'November', 5),
(6, 4, '29112023VRTWXN', '2000', '2023-11-29', 'November', 5),
(7, 4, '29112023F7C8AR', '4000', '2023-11-29', 'November', 5),
(8, 4, '291120230DEYZM', '50000', '2023-11-29', 'November', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasipemesanansampah`
--

CREATE TABLE `informasipemesanansampah` (
  `id_informasiPemesanansampah` int(11) NOT NULL,
  `kode_transaksi` varchar(45) NOT NULL,
  `kode_produk` varchar(45) NOT NULL,
  `jumlah_sampah` int(11) NOT NULL,
  `total_harga` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `informasipemesanansampah`
--

INSERT INTO `informasipemesanansampah` (`id_informasiPemesanansampah`, `kode_transaksi`, `kode_produk`, `jumlah_sampah`, `total_harga`) VALUES
(6, '070520227FZZJ1', 'KP_5hT2', 2, '10000'),
(7, '310520229W1RRG', 'KP_5hT2', 2, '10000'),
(8, '29112023IEFUP6', 'KP_D1k3', 2, '4000'),
(9, '29112023VRTWXN', 'KP_D1k3', 1, '2000'),
(10, '29112023F7C8AR', 'KP_D1k3', 2, '4000'),
(11, '291120230DEYZM', 'KP_UPl2', 5, '50000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasistatuspemesanansampah`
--

CREATE TABLE `informasistatuspemesanansampah` (
  `id_informasiStatus` int(11) NOT NULL,
  `nama_status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `informasistatuspemesanansampah`
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
-- Struktur dari tabel `ketersediaansampah`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ketersediaansampah`
--

INSERT INTO `ketersediaansampah` (`id_ketersediaansampah`, `kode_produk`, `nama_sampah`, `id_penjual`, `ukuran_sampah`, `jumlah_ketersediaan`, `harga_sampah`, `foto_sampah`, `status_pembuatan`, `tgl_produksi`, `tgl_restock`) VALUES
(3, 'KP_5hT2', 'sampah 1 Kg', 1, '15', '20', '5000', 'kertas2.jpg', 8, '2022-05-05', '2022-06-07'),
(4, 'KP_UPl2', 'sampah 2 Kg', 1, '20', '9', '10000', 'plastik.jpeg', 8, '2022-05-06', '2022-05-06'),
(7, 'KP_Iub3', 'sampah baru', 1, '', '5', '1000', 'KP_Iub3.jpeg', 3, '2023-11-29', '2023-11-29'),
(8, 'KP_D1k3', 'sampah besi', 1, '', '3', '2000', 'KP_D1k3.jpg', 7, '2023-11-29', '2023-11-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporankeuangan`
--

CREATE TABLE `laporankeuangan` (
  `id_laporanKeuangan` int(11) NOT NULL,
  `nominal` varchar(45) NOT NULL,
  `jenis` varchar(45) NOT NULL,
  `saldo_terakhir` varchar(45) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `laporankeuangan`
--

INSERT INTO `laporankeuangan` (`id_laporanKeuangan`, `nominal`, `jenis`, `saldo_terakhir`, `tanggal`, `bulan`, `keterangan`) VALUES
(1, '20000', 'Pemasukan', '20000', '2022-06-07', 'June', 'Pemasukan Dari Pemesanan Dengan Kode 060520225B6SOP'),
(2, '20000', 'Pemasukan', '40000', '2022-06-07', 'June', 'Pemasukan Dari Pemesanan Dengan Kode 070520226U73IX'),
(3, '10000', 'Pemasukan', '50000', '2022-06-07', 'June', 'Pemasukan Dari Pemesanan Dengan Kode 070520227FZZJ1'),
(4, '10000', 'Pemasukan', '60000', '2022-06-07', 'June', 'Pemasukan Dari Pemesanan Dengan Kode 310520229W1RRG'),
(5, '25000', 'Pengeluaran', '35000', '2022-06-07', 'June', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_nvX1'),
(6, '', 'Pengeluaran', '35000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_Iub3'),
(7, '', 'Pengeluaran', '35000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(8, '', 'Pengeluaran', '35000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(9, '', 'Pengeluaran', '35000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(10, '', 'Pengeluaran', '35000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(11, '', 'Pengeluaran', '35000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(12, '', 'Pengeluaran', '35000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(13, '', 'Pengeluaran', '35000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(14, '4000', 'Pengeluaran', '31000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(15, '', 'Pengeluaran', '31000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_Iub3'),
(16, '', 'Pengeluaran', '31000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_Iub3'),
(17, '4000', 'Pemasukan', '35000', '2023-11-29', 'November', 'Pemasukan Dari Pemesanan Dengan Kode 29112023IEFUP6'),
(18, '2000', 'Pemasukan', '37000', '2023-11-29', 'November', 'Pemasukan Dari Pemesanan Dengan Kode 29112023VRTWXN'),
(19, '', 'Pengeluaran', '37000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(20, '', 'Pengeluaran', '37000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(21, '', 'Pengeluaran', '37000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(22, '', 'Pengeluaran', '37000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(23, '', 'Pengeluaran', '37000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(24, '', 'Pengeluaran', '37000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(25, '', 'Pengeluaran', '37000', '2023-11-29', 'November', 'Pengeluaran Pembuatan sampah Dengan Kode Produk KP_D1k3'),
(26, '4000', 'Pemasukan', '41000', '2023-11-29', 'November', 'Pemasukan Dari Pemesanan Dengan Kode 29112023F7C8AR'),
(27, '50000', 'Pemasukan', '91000', '2023-11-29', 'November', 'Pemasukan Dari Pemesanan Dengan Kode 291120230DEYZM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaranpembelisampah`
--

CREATE TABLE `pembayaranpembelisampah` (
  `id_pembayaranPembelisampah` int(11) NOT NULL,
  `id_detailDataPemesanan` int(11) NOT NULL,
  `kode_transaksi` varchar(45) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `metode_pembayaran` varchar(45) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pembayaranpembelisampah`
--

INSERT INTO `pembayaranpembelisampah` (`id_pembayaranPembelisampah`, `id_detailDataPemesanan`, `kode_transaksi`, `tgl_pembayaran`, `metode_pembayaran`, `bukti_pembayaran`) VALUES
(9, 5, '29112023IEFUP6', '2023-11-29', 'Transfer', 'Cara-Mudah-Memilih-Buah-Jeruk-Dengan-Rasa-Manis-Dan-Segar.jpg'),
(10, 6, '29112023VRTWXN', '2023-11-29', 'Transfer', 'grape-0002.jpg'),
(11, 7, '29112023F7C8AR', '2023-11-29', 'Transfer', 'grape-00021.jpg'),
(12, 8, '291120230DEYZM', '2023-11-29', 'Transfer', 'grape-00022.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuspembuatansampah`
--

CREATE TABLE `statuspembuatansampah` (
  `id_statusPembuatansampah` int(11) NOT NULL,
  `nama_statusPembuatansampah` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `statuspembuatansampah`
--

INSERT INTO `statuspembuatansampah` (`id_statusPembuatansampah`, `nama_statusPembuatansampah`) VALUES
(1, 'Pengumpulan sampah'),
(2, 'Pemilahan Sampah'),
(3, 'Pembersihan sampah'),
(4, 'Penjemuran Sampah'),
(5, 'Pewarnaan Sampah'),
(6, 'Pengeringan cat'),
(7, 'Pengemasan sampah'),
(8, 'sampah Sedang Dalam Penjualan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_telp`, `alamat`, `email`, `password`, `jenis_kelamin`, `foto_profil`, `level_user`, `tgl_daftar`) VALUES
(1, 'Admin TRASH.ID', '081234835361', 'Probolinggo', 'adminTrash@gmail.com', '0192023a7bbd73250516f069df18b500', 'Perempuan', 'default.jpg', 1, '2023-11-04'),
(4, 'ria', '082330622518', 'balunglor, balung, jembar', 'karanganyarklabang@gmail.com', '2dbeb97b84f1a70661e7a5a0934fc006', NULL, 'default.jpg', 2, '2023-11-29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aduanpembeli`
--
ALTER TABLE `aduanpembeli`
  ADD PRIMARY KEY (`id_aduanPembeli`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indeks untuk tabel `detaildatapemesanan`
--
ALTER TABLE `detaildatapemesanan`
  ADD PRIMARY KEY (`id_detaildataPemesanan`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_informasiStatus` (`id_informasiStatus`);

--
-- Indeks untuk tabel `informasipemesanansampah`
--
ALTER TABLE `informasipemesanansampah`
  ADD PRIMARY KEY (`id_informasiPemesanansampah`),
  ADD KEY `id_ketersediaansampah` (`kode_produk`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indeks untuk tabel `informasistatuspemesanansampah`
--
ALTER TABLE `informasistatuspemesanansampah`
  ADD PRIMARY KEY (`id_informasiStatus`);

--
-- Indeks untuk tabel `ketersediaansampah`
--
ALTER TABLE `ketersediaansampah`
  ADD PRIMARY KEY (`id_ketersediaansampah`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `kode_produk` (`kode_produk`),
  ADD KEY `fk_pembuatansampah` (`status_pembuatan`);

--
-- Indeks untuk tabel `laporankeuangan`
--
ALTER TABLE `laporankeuangan`
  ADD PRIMARY KEY (`id_laporanKeuangan`);

--
-- Indeks untuk tabel `pembayaranpembelisampah`
--
ALTER TABLE `pembayaranpembelisampah`
  ADD PRIMARY KEY (`id_pembayaranPembelisampah`),
  ADD KEY `id_detailDataPemesanan` (`id_detailDataPemesanan`);

--
-- Indeks untuk tabel `statuspembuatansampah`
--
ALTER TABLE `statuspembuatansampah`
  ADD PRIMARY KEY (`id_statusPembuatansampah`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aduanpembeli`
--
ALTER TABLE `aduanpembeli`
  MODIFY `id_aduanPembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `detaildatapemesanan`
--
ALTER TABLE `detaildatapemesanan`
  MODIFY `id_detaildataPemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `informasipemesanansampah`
--
ALTER TABLE `informasipemesanansampah`
  MODIFY `id_informasiPemesanansampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `informasistatuspemesanansampah`
--
ALTER TABLE `informasistatuspemesanansampah`
  MODIFY `id_informasiStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ketersediaansampah`
--
ALTER TABLE `ketersediaansampah`
  MODIFY `id_ketersediaansampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `laporankeuangan`
--
ALTER TABLE `laporankeuangan`
  MODIFY `id_laporanKeuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pembayaranpembelisampah`
--
ALTER TABLE `pembayaranpembelisampah`
  MODIFY `id_pembayaranPembelisampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `statuspembuatansampah`
--
ALTER TABLE `statuspembuatansampah`
  MODIFY `id_statusPembuatansampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aduanpembeli`
--
ALTER TABLE `aduanpembeli`
  ADD CONSTRAINT `fk_pembeliAduan` FOREIGN KEY (`id_pembeli`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detaildatapemesanan`
--
ALTER TABLE `detaildatapemesanan`
  ADD CONSTRAINT `fk_pembeliPemesanan` FOREIGN KEY (`id_pembeli`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `informasipemesanansampah`
--
ALTER TABLE `informasipemesanansampah`
  ADD CONSTRAINT `fk_kodeProduk` FOREIGN KEY (`kode_produk`) REFERENCES `ketersediaansampah` (`kode_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ketersediaansampah`
--
ALTER TABLE `ketersediaansampah`
  ADD CONSTRAINT `fk_ketersediaanPenjual` FOREIGN KEY (`id_penjual`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembuatansampah` FOREIGN KEY (`status_pembuatan`) REFERENCES `statuspembuatansampah` (`id_statusPembuatansampah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaranpembelisampah`
--
ALTER TABLE `pembayaranpembelisampah`
  ADD CONSTRAINT `fk_detailPemesananPembayaran` FOREIGN KEY (`id_detailDataPemesanan`) REFERENCES `detaildatapemesanan` (`id_detaildataPemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
