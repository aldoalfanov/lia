-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 15 Mei 2020 pada 18.20
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `penjualan_gitar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_admin`
--

CREATE TABLE IF NOT EXISTS `tabel_admin` (
  `idAdmin` varchar(11) NOT NULL,
  `namaAdmin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_admin`
--

INSERT INTO `tabel_admin` (`idAdmin`, `namaAdmin`, `email`, `password`) VALUES
('1', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_gitar`
--

CREATE TABLE IF NOT EXISTS `tabel_gitar` (
  `idGitar` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `path` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`idGitar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data untuk tabel `tabel_gitar`
--

INSERT INTO `tabel_gitar` (`idGitar`, `nama`, `gambar`, `ukuran`, `keterangan`, `kategori`, `harga`, `stock`, `path`, `size`) VALUES
(22, 'Gitar Akustik Gybson', '48e61c89c3b1eeff22efac58af7684bb', '99 cm', 'Gitar Akustik Gibson\r\nNama legendaris Gibson di dunia musik tentu saja sangat berperan dalam menjamin kualitas tinggi produknya.\r\n', 'akustik', 2500000, 7, 'image/48e61c89c3b1eeff22efac58af7684bb.png', 14287),
(23, 'Gitar Akustik Fender', 'a4d8940d09d2603c0d8dfebe57931701', '150 cm', 'Gitar akustik fender\r\nGitar buatan Ibanez terkenal dengan kualitas tinggi gitarnya, ', 'akustik', 25000000, 9, 'image/a4d8940d09d2603c0d8dfebe57931701.png', 15198),
(24, 'Gitar Akustik Jackson', '2e6053249085217166bbd0f2d20329e0', '99 cm', 'Gitar akustik merk Jackson sebetulnya masih dibawah payung Fender', 'akustik', 50000000, 10, 'image/2e6053249085217166bbd0f2d20329e0.png', 14886),
(26, 'Gitar Listrik Ibanez', 'f4b5738e3bc9b9f01a3ff2a39ab79d24', '150 cm', 'Gitar Listrik Ibanez Gitar elektrik ini memiliki tampilan keren dengan detail bodi yang unik pada bagian ujung.', 'listrik', 70000000, 10, 'image/f4b5738e3bc9b9f01a3ff2a39ab79d24.png', 22549),
(27, 'Gitar Akustik Taylor', '7ab89589ce27b45e11add72dddc34b7e', '150 cm', 'Gitar AKustik Taylor Gitar akustik buatan Taylor dikenal luas dengan suara otentik yang dihasilkannya', 'akustik', 20000000, 9, 'image/7ab89589ce27b45e11add72dddc34b7e.png', 17133),
(28, 'Gitar Listrik Cort X2-BK', '86a9d3a8e04020fc1b0e2322c4e9edcc', '150 cm', 'Cort X2-BK-Gitar Listrik Black tampil maskulin dalam balutan warna hitam', 'listrik', 50000000, 10, 'image/86a9d3a8e04020fc1b0e2322c4e9edcc.png', 18505);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_kategori`
--

CREATE TABLE IF NOT EXISTS `tabel_kategori` (
  `idKategori` int(11) NOT NULL AUTO_INCREMENT,
  `namaKategori` varchar(30) NOT NULL,
  PRIMARY KEY (`idKategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`idKategori`, `namaKategori`) VALUES
(1, 'akustik'),
(2, 'listrik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_keranjang`
--

CREATE TABLE IF NOT EXISTS `tabel_keranjang` (
  `idKeranjang` varchar(11) NOT NULL,
  `idPelangan` int(11) NOT NULL,
  `idGitar` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`idKeranjang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_komentar`
--

CREATE TABLE IF NOT EXISTS `tabel_komentar` (
  `idKomen` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`idKomen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pelangan`
--

CREATE TABLE IF NOT EXISTS `tabel_pelangan` (
  `idPelangan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(15) NOT NULL,
  PRIMARY KEY (`idPelangan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tabel_pelangan`
--

INSERT INTO `tabel_pelangan` (`idPelangan`, `nama`, `email`, `password`, `alamat`, `telpon`) VALUES
(1, 'user1', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', 'surabaya', '234234'),
(4, 'idhy', 'idhy@yahoo.com', 'f18a17360224f989364e01f46b51e9fe', 'jalan janti kanoman', '08373737'),
(5, 'idhy', 'idhy@gmail.com', 'f18a17360224f989364e01f46b51e9fe', 'Jalan Janti', '0846366363'),
(6, 'rico', 'rico@gmail.com', 'be89e250d8388c5e7ded2f1630e5daa4', 'kanoman jogja', '085745674');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_transaksi`
--

CREATE TABLE IF NOT EXISTS `tabel_transaksi` (
  `idTransaksi` int(11) NOT NULL AUTO_INCREMENT,
  `idPelangan` varchar(11) NOT NULL,
  `daftarBarang` text NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`idTransaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`idTransaksi`, `idPelangan`, `daftarBarang`, `tanggal`, `total`) VALUES
(1, '5', 'Gitar Akustik Gybson, Kategori : akustik, Jumlah : 1<br>', '2020-05-02', 2500000),
(2, '5', 'Gitar Akustik Gybson, Kategori : akustik, Jumlah : 1<br>', '2020-05-11', 2500000),
(4, '6', 'Gitar Akustik Fender, Kategori : akustik, Jumlah : 1<br>', '2020-05-15', 25000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_trolly`
--

CREATE TABLE IF NOT EXISTS `tabel_trolly` (
  `idTrolly` int(11) NOT NULL AUTO_INCREMENT,
  `idPelangan` int(11) NOT NULL,
  `idGitar` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`idTrolly`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `tabel_trolly`
--

INSERT INTO `tabel_trolly` (`idTrolly`, `idPelangan`, `idGitar`, `jumlah`, `harga`) VALUES
(14, 0, 22, 1, 2500000),
(15, 0, 27, 1, 20000000),
(16, 0, 23, 1, 25000000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
