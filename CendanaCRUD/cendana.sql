-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2016 pada 03.19
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `cendana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_kelamin`
--

CREATE TABLE IF NOT EXISTS `j_kelamin` (
  `id_kelamin` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `j_kelamin`
--

INSERT INTO `j_kelamin` (`id_kelamin`, `nama`) VALUES
(1, 'Laki - Laki'),
(2, 'Wanita'),
(0, 'other');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(2, 'Blitar'),
(3, 'Nganjuk'),
(4, 'Tulungagung'),
(5, 'Malang'),
(8, 'jks'),
(9, 'jygiu'),
(10, '1111'),
(12, 'kota1'),
(13, 'kjhg'),
(18, 'dua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`user`, `pass`) VALUES
('admin', 'admin'),
('eq', 'eq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kelamin` int(1) DEFAULT NULL,
  `id_posisi` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `telepon`, `kota`, `kelamin`, `id_posisi`, `status`) VALUES
(1, 'Mas Samsul', '085234640114', '3', 1, '1', 1),
(2, 'Mas Tholka', '081233072122', '3', 0, '3', 1),
(3, 'Mas Mustofa', '081330493322', '5', 1, '1', 1),
(5, 'Mas Ikhsan', '085749535400', '1', 1, '2', 1),
(6, 'Mas Wawan', '085745966707', '4', 1, '2', 1),
(7, 'Mas Chadil', '08984119934', '2', 1, '3', 1),
(8, 'Mas Redika', '083834657395', '2', 1, '3', 1),
(9, 'Mas Antony', '3', '2', 0, '3', 1),
(10, 'Mas Hafiz', '087859615271', '2', 1, '4', 1),
(11, 'Mas Rizal', '087777284179', '2', 1, '4', 1),
(12, 'Mas Faiq', '085736333728', '5', 1, '4', 1),
(14, 'ente', NULL, NULL, NULL, NULL, NULL),
(15, 'jljlkjl', '0908080', NULL, NULL, NULL, NULL),
(16, 'dg', 'gfd', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE IF NOT EXISTS `posisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id`, `nama`) VALUES
(1, 'it'),
(2, 'HRD'),
(3, 'keuangan'),
(4, 'manajemen'),
(5, 'Support'),
(7, 'LOs'),
(8, 'llll'),
(9, 'ytughij'),
(10, 'bisa'),
(11, 'bisa2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
