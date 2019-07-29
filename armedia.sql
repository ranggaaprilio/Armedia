-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 29 Jul 2019 pada 07.22
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

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `no_telp`, `alamat`, `foto`, `tgl_input`) VALUES
('ADM001', 'Ismi Dahlia', 'ismi@gmail.com', '40e0ba990d7ec62b20009bc94a34b771', '098998767655', 'Jalan Barito', 'default.png', '2019-07-26');

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

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `alamat`, `email`, `password`, `foto`, `no_telp`) VALUES
('DKIA001', 'dr. Deana Fitria', 'Jalan Raya Pamulang Tangerang', 'deana@gmail.com', 'f4cbac8a5007c98a76fb29d8b97aaaaf', 'default.png', '0898778787877');

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
(1, 'Rangga Aprilio Utama', 'ranggaap0404@bsi.ac.id', '1e27eec0cbc3f6c50100428251a9e66b', 'profile1563623100');

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

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`no_rekamedis`, `no_ktp`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `email`, `password`, `foto`, `pj`) VALUES
('RMKIA001', '345454555656', 'Irene Anindiya', 'Jakarta', '1990-07-11', '0878989876', 'Jakarta Utara', 'irene@gmail.com', '454d7d1a8583002dc03cb8855b038b4b', 'profile1564307208', 'Zaky Ubaidilah'),
('RMKIA002', '67677767464746', 'Aisyah Askara', 'Jakarta', '1990-11-29', '0989898876767', 'Jalan Pinus Bogor', 'aisyah@gmail.com', 'd5e2d4a88fc0820f143334cfcc79a885', 'default.png', 'Rezky Aditya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `no_registrasi` varchar(8) DEFAULT NULL,
  `no_rawat` varchar(19) NOT NULL,
  `no_rekamedis` varchar(12) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `kategori` enum('Dewasa','Balita') DEFAULT NULL,
  `id_dokter` varchar(25) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_rawat`),
  KEY `no_rekamedis` (`no_rekamedis`),
  KEY `id_dokter` (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_registrasi`, `no_rawat`, `no_rekamedis`, `tanggal_daftar`, `kategori`, `id_dokter`, `status`) VALUES
('0001', 'DKIA001201907190001', 'RMKIA002', '2019-07-19', 'Dewasa', 'DKIA001', '2'),
('0002', 'DKIA001201907190002', 'RMKIA001', '2019-07-19', 'Dewasa', 'DKIA001', '2'),
('0001', 'DKIA001201907200001', 'RMKIA002', '2019-07-20', 'Dewasa', 'DKIA001', '2'),
('0002', 'DKIA001201907200002', 'RMKIA001', '2019-07-20', 'Dewasa', 'DKIA001', '2'),
('0001', 'DKIA001201907210001', 'RMKIA001', '2019-07-21', 'Dewasa', 'DKIA001', '2'),
('0001', 'DKIA001201907280001', 'RMKIA001', '2019-07-28', 'Dewasa', 'DKIA001', '1');

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

--
-- Dumping data untuk tabel `temp_obat`
--

INSERT INTO `temp_obat` (`id_obat`, `no_rekamedis`, `kategori`, `no_rawat`, `id_balita`) VALUES
('KB001', 'RMKIA001', 'Dewasa', 'DKIA001201907200001', NULL),
('KB001', 'RMKIA002', 'Dewasa', 'DKIA001201907200001', NULL),
('TB001', 'RMKIA001', 'Dewasa', 'DKIA001201907200002', NULL),
('TB001', 'RMKIA001', 'Dewasa', 'DKIA001201907210001', NULL);

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
  `no_rawat` varchar(19) NOT NULL,
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
  `no_rawat` varchar(19) NOT NULL,
  `hasil_periksa` text NOT NULL,
  `tanggal` date NOT NULL,
  KEY `no_rekamedis` (`no_rekamedis`),
  KEY `id_dokter` (`id_dokter`),
  KEY `no_rawat` (`no_rawat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan_hamil`
--

INSERT INTO `tindakan_hamil` (`no_rekamedis`, `nama_tindakan`, `id_dokter`, `trimester`, `no_rawat`, `hasil_periksa`, `tanggal`) VALUES
('RMKIA001', 'Suntik KB', 'DKIA001', '0', 'DKIA001201907200001', 'Suntik KB', '2019-07-20'),
('RMKIA002', 'Suntik KB', 'DKIA001', '0', 'DKIA001201907200001', 'Pasang KB', '2019-07-20'),
('RMKIA001', 'Pemebrian Vitamin C', 'DKIA001', '1', 'DKIA001201907200002', 'Diyatakan Hamil,Usia Kandungan 2 minggu', '2019-07-20'),
('RMKIA001', 'USG', 'DKIA001', '1', 'DKIA001201907210001', 'Kondisi janin sehat usi kandungan 2 minngu', '2019-07-21');

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
  ADD CONSTRAINT `temp_obat_ibfk_4` FOREIGN KEY (`id_balita`) REFERENCES `tindakan_balita` (`id_balita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tindakan_balita`
--
ALTER TABLE `tindakan_balita`
  ADD CONSTRAINT `tindakan_balita_ibfk_1` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_balita_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tindakan_balita_ibfk_5` FOREIGN KEY (`id_balita`) REFERENCES `balita` (`id_balita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tindakan_hamil`
--
ALTER TABLE `tindakan_hamil`
  ADD CONSTRAINT `tindakan_hamil_ibfk_1` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_hamil_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
