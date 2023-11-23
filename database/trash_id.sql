-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2023 pada 08.03
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
-- Database: `trash.id`
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

--
-- Dumping data untuk tabel `aduanpembeli`
--

INSERT INTO `aduanpembeli` (`id_aduanPembeli`, `kode_aduan`, `id_pembeli`, `desk_aduan`, `bukti_aduan`, `status_aduan`, `tgl_aduan`) VALUES
(8, 'ADUAN08062022XY3', 2, 'Pengiriman tidak sesuai dengan kode transaksi 10202026ASDJIS', 'ADUAN08062022XY3.png', 2, '2022-06-08');

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
(5, 4, '211120234JRBVU', '60000', '2023-11-21', 'November', 5),
(6, 4, '21112023EAXKSJ', '15000', '2023-11-21', 'November', 1),
(7, 4, '221120237ZAGXA', '30000', '2023-11-22', 'November', 1),
(8, 4, '2211202390QSSJ', '10000', '2023-11-22', 'November', 1);

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
  `jumlah_ketersediaan` varchar(45) NOT NULL,
  `harga_sampah` varchar(45) NOT NULL,
  `foto_sampah` varchar(255) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `tgl_restock` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ketersediaansampah`
--

INSERT INTO `ketersediaansampah` (`id_ketersediaansampah`, `kode_produk`, `nama_sampah`, `id_penjual`, `jumlah_ketersediaan`, `harga_sampah`, `foto_sampah`, `tgl_produksi`, `tgl_restock`) VALUES
(9, 'KP_5hT2', 'sampah 2 kg', 1, '9', '4000', 'besi.jpeg', '2023-11-22', '2023-11-22'),
(11, 'KP_UPl2', 'sampah 3 kg', 1, '12', '2000', 'plastik.jpeg', '2023-11-22', '2023-11-22'),
(12, 'KP_5hT2', 'sampah 4 kg', 1, '10', '2000', 'plastik11.jpeg', '2023-11-23', '2023-11-23'),
(13, 'KP_mHu3', 'besi', 1, '10', '2000', 'KP_mHu31.jpeg', '2023-11-23', '2023-11-23'),
(14, 'KP_GyL3', 'sampah 4 kg', 1, '14', '1000', 'KP_GyL3.jpg', '2023-11-23', '2023-11-23');

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
(6, '60000', 'Pemasukan', '95000', '2023-11-22', 'November', 'Pemasukan Dari Pemesanan Dengan Kode 211120234JRBVU');

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
(9, 5, '211120234JRBVU', '2023-11-22', 'Transfer', 'kertas.jpeg');

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
(1, 'Admin TRASH.ID', '081234835361', 'Probolinggo', 'adminTera_c@gmail.com', '0192023a7bbd73250516f069df18b500', 'Perempuan', 'default.jpg', 1, '2022-05-04'),
(2, 'Arman Maulana Saputra', '081234091823', 'Lumajang', 'user@gmail.com', '6ad14ba9986e3615423dfca256d04e3f', NULL, 'default.jpg', 2, '2022-04-14'),
(3, 'Coba', '081234835352', 'coba', 'coba@gmail.com', 'a3040f90cc20fa672fe31efcae41d2db', 'Laki - Laki', 'AAA.JPG', 2, '2022-05-04'),
(4, 'ria', '082330622518', 'balunglor, balung, jembar', 'karanganyarklabang@gmail.com', '2dbeb97b84f1a70661e7a5a0934fc006', 'Perempuan', 'default.jpg', 2, '0000-00-00');

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
  ADD KEY `kode_produk` (`kode_produk`);

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
  MODIFY `id_ketersediaansampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `laporankeuangan`
--
ALTER TABLE `laporankeuangan`
  MODIFY `id_laporanKeuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayaranpembelisampah`
--
ALTER TABLE `pembayaranpembelisampah`
  MODIFY `id_pembayaranPembelisampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `fk_ketersediaanPenjual` FOREIGN KEY (`id_penjual`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaranpembelisampah`
--
ALTER TABLE `pembayaranpembelisampah`
  ADD CONSTRAINT `fk_detailPemesananPembayaran` FOREIGN KEY (`id_detailDataPemesanan`) REFERENCES `detaildatapemesanan` (`id_detaildataPemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
