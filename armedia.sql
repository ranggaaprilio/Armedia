-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2019 at 09:57 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

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
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `no_telp`, `alamat`, `foto`, `tgl_input`) VALUES
('ADM-001', 'Medina Citra', 'medina@gmail.com', '6a973a1cb0703afd0a7e65e4c14ea17a', '0876858969', 'Jalan Sudirman raya jakarta pusat', 'default.png', '2019-04-04'),
('ADM-002', 'Edo', 'Edo@gmail.com', 'f7953ed435f9fb3009128e280748a1c4', '0878585586966', 'Bogor', 'default.png', '2019-04-10'),
('ADM-003', 'aaaa', 'aaaa@gmail.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '000000', 'aaaaaa', 'default.png', '2019-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `balita`
--

DROP TABLE IF EXISTS `balita`;
CREATE TABLE IF NOT EXISTS `balita` (
  `id_balita` varchar(14) NOT NULL,
  `no_rekamedis` varchar(12) DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jekel` enum('laki-laki','perempuan') DEFAULT NULL,
  PRIMARY KEY (`id_balita`),
  KEY `balita_ibfk_1` (`no_rekamedis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balita`
--

INSERT INTO `balita` (`id_balita`, `no_rekamedis`, `nama`, `tanggal_lahir`, `jekel`) VALUES
('RM-KIA-002-01', 'RM-KIA-002', 'Zalina Daud Wylie', '2019-06-08', 'perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

DROP TABLE IF EXISTS `dokter`;
CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` varchar(12) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `alamat`, `email`, `password`, `foto`, `no_telp`) VALUES
('D-KIA-001', 'dr.Aleta Diningrat', 'Jakarta Timur', 'aleta@gmail.com', 'd1ad95d8d128c81278e31dbe6398dd42', 'default.png', '0875858882'),
('D-KIA-003', 'dr.Maharani Puspita Sari', 'jombang', 'Maharani@gmail.com', 'a15d0a991b1c6462117fb7fc6465120e', 'profile1558947035', '08783378878'),
('D-KIA-004', 'Dr.Cinta Sastro', 'Pondok Labu', 'cinta@gmail.com', '261c7675ea6ce06be91fb43f225d818c', 'default.png', '0898878788777');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dokter`
--

DROP TABLE IF EXISTS `jadwal_dokter`;
CREATE TABLE IF NOT EXISTS `jadwal_dokter` (
  `id_dokter` varchar(12) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `nama` varchar(35) DEFAULT NULL,
  KEY `id_dokter` (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_dokter`, `tanggal`, `jam_mulai`, `jam_akhir`, `nama`) VALUES
('D-KIA-001', '2019-05-31', '11:12:00', '13:12:00', 'dr.Aleta Diningrat'),
('D-KIA-004', '2019-06-01', '18:00:00', '21:00:00', 'Dr.Cinta Sastro');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
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
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis_obat`, `dosis_aturan_obat`, `satuan`) VALUES
('KB-001', 'KB pila', 'Suntik KB', '50ml', 'Suntikan'),
('KP-001', 'Vitamin B12', 'Kapsul', '3x1 sehari sehabis makan', 'Strip'),
('SM-001', 'Extersi', 'Suplemen', '2x1 Sehari', 'Strip'),
('TB-001', 'Vitamin C', 'Tablet', '3x1/hari', 'Strip'),
('TB-002', 'Paracetamol', 'Tablet', '2x1/hari', 'Strip');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
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
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id_owner`, `nama`, `email`, `password`, `foto`) VALUES
(1, 'Rangga Aprilio Utama', 'ranggaap0404@bsi.ac.id', '1e27eec0cbc3f6c50100428251a9e66b', 'profile1558947361');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
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
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`no_rekamedis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_rekamedis`, `no_ktp`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `email`, `password`, `foto`) VALUES
('RM-KIA-001', '1234567891012345', 'Anindiya Safitri', 'Jakarta', '1990-04-23', '0878789989887', 'Jalan Sudirman Jakarta Selatan', 'anindiya@gmail.com', 'ad6b87e1c6c3998b1a57640d67bf6157', 'default.png'),
('RM-KIA-002', '123344545454', 'Raisa Andriana', 'Bogor', '1998-10-26', '1234567', 'Pemagar Sari', 'alfia@email.com', '95bbf7e889244f706ee4b5b97c884a68', 'raisa.png');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

DROP TABLE IF EXISTS `pendaftaran`;
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `no_registrasi` varchar(8) DEFAULT NULL,
  `no_rawat` varchar(50) NOT NULL,
  `no_rekamedis` varchar(25) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `kategori` enum('Dewasa','Balita') DEFAULT NULL,
  `id_dokter` varchar(25) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`no_rawat`),
  KEY `no_rekamedis` (`no_rekamedis`),
  KEY `id_dokter` (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_registrasi`, `no_rawat`, `no_rekamedis`, `tanggal_daftar`, `kategori`, `id_dokter`, `status`) VALUES
('0001', 'DKIA001-2019-06-08-0001', 'RM-KIA-002', '2019-06-08', 'Dewasa', 'D-KIA-001', '2'),
('0001', 'DKIA003-2019-06-09-0001', 'RM-KIA-001', '2019-06-09', 'Dewasa', 'D-KIA-003', '2'),
('0002', 'DKIA003-2019-06-09-0002', 'RM-KIA-002', '2019-06-09', 'Dewasa', 'D-KIA-003', '2');

-- --------------------------------------------------------

--
-- Table structure for table `temp_obat`
--

DROP TABLE IF EXISTS `temp_obat`;
CREATE TABLE IF NOT EXISTS `temp_obat` (
  `id_obat` varchar(6) DEFAULT NULL,
  `no_rekamedis` varchar(12) DEFAULT NULL,
  `kategori` enum('Dewasa','Balita') DEFAULT NULL,
  `no_rawat` varchar(25) DEFAULT NULL,
  KEY `no_rekamedis` (`no_rekamedis`),
  KEY `temp_obat_ibfk_1` (`id_obat`),
  KEY `temp_obat_ibfk_3` (`no_rawat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_obat`
--

INSERT INTO `temp_obat` (`id_obat`, `no_rekamedis`, `kategori`, `no_rawat`) VALUES
('TB-001', 'RM-KIA-002', 'Dewasa', 'DKIA001-2019-06-08-0001'),
('SM-001', 'RM-KIA-001', 'Dewasa', 'DKIA003-2019-06-09-0001'),
('TB-001', 'RM-KIA-001', 'Dewasa', 'DKIA003-2019-06-09-0001'),
('TB-002', 'RM-KIA-002', 'Dewasa', 'DKIA003-2019-06-09-0002');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan_balita`
--

DROP TABLE IF EXISTS `tindakan_balita`;
CREATE TABLE IF NOT EXISTS `tindakan_balita` (
  `no_rekamedis` varchar(25) NOT NULL,
  `id_balita` varchar(13) DEFAULT NULL,
  `nama_tindakan` text NOT NULL,
  `id_dokter` varchar(12) NOT NULL,
  `no_rawat` varchar(25) NOT NULL,
  `hasil_periksa` text NOT NULL,
  `id_obat` varchar(6) NOT NULL,
  `tanggal` date NOT NULL,
  KEY `tindakan_balita_ibfk_1` (`no_rekamedis`),
  KEY `tindakan_balita_ibfk_3` (`id_dokter`),
  KEY `tindakan_balita_ibfk_2` (`id_balita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan_hamil`
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
  KEY `id_dokter` (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan_hamil`
--

INSERT INTO `tindakan_hamil` (`no_rekamedis`, `nama_tindakan`, `id_dokter`, `trimester`, `no_rawat`, `hasil_periksa`, `tanggal`) VALUES
('RM-KIA-001', 'asdsasdsasdsa', 'D-KIA-003', '1', 'DKIA003-2019-06-01-0001', 'asdsasdsasdsa', '2019-06-01'),
('RM-KIA-001', 'sdsdsdfdfd', 'D-KIA-004', '2', 'DKIA004-2019-06-03-0001', 'asdasds', '2019-06-03'),
('RM-KIA-002', 'pemberian vitamin', 'D-KIA-001', '2', 'DKIA001-2019-06-08-0001', 'Sehat', '2019-06-08'),
('RM-KIA-001', 'pemberian vitamin ', 'D-KIA-003', '3', 'DKIA003-2019-06-09-0001', 'Kondisi baik pekembangan sempurna', '2019-06-09'),
('RM-KIA-002', 'pemberian obat', 'D-KIA-003', '2', 'DKIA003-2019-06-09-0002', 'Jenis Kelamin Perempuan,kondisi baik', '2019-06-09');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balita`
--
ALTER TABLE `balita`
  ADD CONSTRAINT `balita_ibfk_1` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `temp_obat`
--
ALTER TABLE `temp_obat`
  ADD CONSTRAINT `temp_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `temp_obat_ibfk_2` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `temp_obat_ibfk_3` FOREIGN KEY (`no_rawat`) REFERENCES `pendaftaran` (`no_rawat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tindakan_balita`
--
ALTER TABLE `tindakan_balita`
  ADD CONSTRAINT `tindakan_balita_ibfk_1` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_balita_ibfk_2` FOREIGN KEY (`id_balita`) REFERENCES `balita` (`id_balita`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_balita_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tindakan_hamil`
--
ALTER TABLE `tindakan_hamil`
  ADD CONSTRAINT `tindakan_hamil_ibfk_1` FOREIGN KEY (`no_rekamedis`) REFERENCES `pasien` (`no_rekamedis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tindakan_hamil_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
