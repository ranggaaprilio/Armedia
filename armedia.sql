-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 17 Jul 2019 pada 02.45
-- Versi server: 5.7.26
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `armedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` char(7) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(35) NOT NULL,
  `tgl_input` date NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `balita`
--

DROP TABLE IF EXISTS `balita`;
CREATE TABLE IF NOT EXISTS `balita` (
  `id_balita` varchar(10) NOT NULL,
  `no_rekamedis` varchar(12) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jekel` enum('laki-laki','perempuan') DEFAULT NULL,
  PRIMARY KEY (`id_balita`),
  KEY `balita_ibfk_1` (`no_rekamedis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

DROP TABLE IF EXISTS `dokter`;
CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` varchar(12) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `foto` varchar(35) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

DROP TABLE IF EXISTS `jadwal_dokter`;
CREATE TABLE IF NOT EXISTS `jadwal_dokter` (
  `id_jadwal` int(2) NOT NULL AUTO_INCREMENT,
  `id_dokter` varchar(12) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_dokter` (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

DROP TABLE IF EXISTS `obat`;
CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` varchar(6) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` enum('Kapsul','Tablet','Bedak','Makanan PG','Suntik KB','Cairan Alkohol','Suplemen','Obat Tetes') NOT NULL,
  `dosis_aturan_obat` varchar(50) NOT NULL,
  `satuan` enum('Strip','Buah','Botol','Suntikan') NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `dosis_aturan_obat`, `satuan`) VALUES
('KB001', 'Suntik KB', 'Suntik KB', '50 ml', 'Suntikan'),
('KP001', 'Vitamin B', 'Kapsul', '1x2 Sehari', 'Strip'),
('TB001', 'vitamin C', 'Tablet', '3x1 sehari', 'Strip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `id_owner` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `foto` varchar(30) NOT NULL,
  PRIMARY KEY (`id_owner`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `owner`
--

INSERT INTO `owner` (`id_owner`, `nama`, `email`, `password`, `foto`) VALUES
(1, 'Rangga Aprilio Utama', 'ranggaap0404@bsi.ac.id', '1e27eec0cbc3f6c50100428251a9e66b', 'profile1558947361');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

DROP TABLE IF EXISTS `pasien`;
CREATE TABLE IF NOT EXISTS `pasien` (
  `no_rekamedis` varchar(12) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama_pasien` varchar(35) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(35) NOT NULL,
  `pj` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`no_rekamedis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `no_registrasi` varchar(8) DEFAULT NULL,
  `no_rawat` varchar(50) NOT NULL,
  `no_rekamedis` varchar(12) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `kategori` enum('Dewasa','Balita') DEFAULT NULL,
  `id_dokter` varchar(25) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_rawat`),
  KEY `no_rekamedis` (`no_rekamedis`),
  KEY `id_dokter` (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_obat`
--

DROP TABLE IF EXISTS `temp_obat`;
CREATE TABLE IF NOT EXISTS `temp_obat` (
  `id_obat` varchar(6) DEFAULT NULL,
  `no_rekamedis` varchar(12) DEFAULT NULL,
  `kategori` enum('Dewasa','Balita') DEFAULT NULL,
  `no_rawat` varchar(25) DEFAULT NULL,
  `id_balita` varchar(10) DEFAULT NULL,
  KEY `no_rekamedis` (`no_rekamedis`),
  KEY `temp_obat_ibfk_1` (`id_obat`),
  KEY `temp_obat_ibfk_3` (`no_rawat`),
  KEY `temp_obat_ibfk_4` (`id_balita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan_balita`
--

DROP TABLE IF EXISTS `tindakan_balita`;
CREATE TABLE IF NOT EXISTS `tindakan_balita` (
  `no_rekamedis` varchar(25) NOT NULL,
  `id_balita` varchar(10) DEFAULT NULL,
  `nama_tindakan` text NOT NULL,
  `id_dokter` varchar(12) NOT NULL,
  `no_rawat` varchar(25) NOT NULL,
  `hasil_periksa` text NOT NULL,
  `tanggal` date NOT NULL,
  KEY `tindakan_balita_ibfk_1` (`no_rekamedis`),
  KEY `tindakan_balita_ibfk_3` (`id_dokter`),
  KEY `no_rawat` (`no_rawat`),
  KEY `id_balita` (`id_balita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan_hamil`
--

DROP TABLE IF EXISTS `tindakan_hamil`;
CREATE TABLE IF NOT EXISTS `tindakan_hamil` (
  `no_rekamedis` varchar(25) NOT NULL,
  `nama_tindakan` text NOT NULL,
  `id_dokter` varchar(12) NOT NULL,
  `trimester` char(1) NOT NULL,
  `no_rawat` varchar(25) NOT NULL,
  `hasil_periksa` text NOT NULL,
  `tanggal` date NOT NULL,
  KEY `no_rekamedis` (`no_rekamedis`),
  KEY `id_dokter` (`id_dokter`),
  KEY `no_rawat` (`no_rawat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `balita`
--
ALTER TABLE `balita`
  ADD CONSTRAINT `balita_ibfk_1` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `temp_obat`
--
ALTER TABLE `temp_obat`
  ADD CONSTRAINT `temp_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `temp_obat_ibfk_2` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `temp_obat_ibfk_3` FOREIGN KEY (`no_rawat`) REFERENCES `pendaftaran` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `temp_obat_ibfk_4` FOREIGN KEY (`id_balita`) REFERENCES `tindakan_balita` (`id_balita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tindakan_balita`
--
ALTER TABLE `tindakan_balita`
  ADD CONSTRAINT `tindakan_balita_ibfk_1` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_balita_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tindakan_balita_ibfk_4` FOREIGN KEY (`no_rawat`) REFERENCES `pendaftaran` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_balita_ibfk_5` FOREIGN KEY (`id_balita`) REFERENCES `balita` (`id_balita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tindakan_hamil`
--
ALTER TABLE `tindakan_hamil`
  ADD CONSTRAINT `tindakan_hamil_ibfk_1` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_hamil_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tindakan_hamil_ibfk_3` FOREIGN KEY (`no_rawat`) REFERENCES `pendaftaran` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
