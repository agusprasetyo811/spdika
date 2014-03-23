-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2011 at 05:10 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ika_pa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(30) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `user`, `pass`, `email`) VALUES
(1, 'sp-admin', '12345', 'spdika@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(30) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  PRIMARY KEY (`id_artikel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `tgl`) VALUES
(2, 'Agus B.Bagus', '<span style="color: rgb(102, 0, 0);">HAlooo ini adalah arikel pertamakuuu,.......... Siapa Yang ingin membaca harap ijin terlebih dahulu</span>. preeet<br>', '20/07/2011 - 16:57:00'),
(5, 'A', 'ssss<br>', '20/07/2011 - 17:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE IF NOT EXISTS `aturan` (
  `id_penyakit` varchar(50) NOT NULL,
  `id_gejala` varchar(50) NOT NULL,
  KEY `id_penyakit` (`id_penyakit`),
  KEY `id_gejala` (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_penyakit`, `id_gejala`) VALUES
('P02', 'G01'),
('P02', 'G02'),
('P03', 'G01'),
('P03', 'G02'),
('P03', 'G03'),
('P04', 'G01'),
('P04', 'G02'),
('P04', 'G03'),
('P04', 'G04'),
('P04', 'G05'),
('P05', 'G01'),
('P05', 'G02'),
('P05', 'G03'),
('P05', 'G04'),
('P05', 'G05'),
('P05', 'G05'),
('P07', 'G01'),
('P07', 'G02'),
('P07', 'G07'),
('P08', 'G01'),
('P08', 'G02'),
('P08', 'G03'),
('P08', 'G07'),
('P10', 'G01'),
('P10', 'G02'),
('P10', 'G03'),
('P10', 'G04'),
('P10', 'G05'),
('P10', 'G06'),
('P10', 'G07'),
('P10', 'G08'),
('P01', 'G01'),
('P06', 'G01'),
('P06', 'G07'),
('P09', 'G01'),
('P09', 'G02'),
('P09', 'G03'),
('P09', 'G04'),
('P09', 'G05'),
('P09', 'G06'),
('P09', 'G08');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` varchar(50) NOT NULL,
  `gejala` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `gejala`) VALUES
('G01', 'Demam Tinggi'),
('G02', 'Bintik bintik merah'),
('G03', 'Pendarahan '),
('G04', 'Kulit lembab'),
('G05', 'Gelisah'),
('G06', 'Penurunan Kesadaran'),
('G07', 'Kencing sedikit'),
('G08', 'Nafas cepat');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id_jawaban` int(50) NOT NULL AUTO_INCREMENT,
  `id_gejala` varchar(50) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jawaban`),
  KEY `id_gejala` (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `jawaban`
--


-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE IF NOT EXISTS `laporan` (
  `id_laporan` int(30) NOT NULL AUTO_INCREMENT,
  `id_pasien` int(11) NOT NULL,
  `pasien` varchar(100) NOT NULL,
  `hasil_konsultasi` varchar(100) NOT NULL,
  `tgl_konsultasi` varchar(30) NOT NULL,
  PRIMARY KEY (`id_laporan`),
  KEY `id_pasien` (`id_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_pasien`, `pasien`, `hasil_konsultasi`, `tgl_konsultasi`) VALUES
(8, 10, 'dika', 'DBD3', '15/07/2011 - 20:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(100) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `umur` int(30) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `foto` varchar(1000) NOT NULL DEFAULT 'pasien/nevz.jpg',
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_lengkap`, `alamat`, `tgl_lahir`, `umur`, `user`, `pass`, `foto`) VALUES
(1, 'Agus Bocah Bagus', 'Solo', '2011-07-04', 0, 'nevz', '011108', 'pasien/nevz.jpg'),
(2, 'Bejo bin Untung', 'bandung', '02/03/1991', 20, 'bejo', '123', 'pasien/ardibanjava.jpg'),
(3, 'Agus Prasetyo', 'Solo Semarang Jogja', '02/03/1991', 0, 'untung', '1234567890', 'pasien/nevz.jpg'),
(4, 'Nevizta', 'Solo Semarang Jogja', '02/03/1991', 0, 'nevz', 'asdfghjkl', 'pasien/nevz.jpg'),
(5, 'Untung Sopanudin', 'Bandung', '07/04/1993', 18, 'udin', 'qwertyuiop', 'pasien/nevz.jpg'),
(6, 'dika', 'bjn', '09/22/1990', 21, 'cha', 'cha', 'pasien/nevz.jpg'),
(7, 'Agus Solo', 'Bandung', '02/03/1991', 20, 'neeo', '12345', 'pasien/hhe.jpg'),
(8, 'irwin', 'skb', '07/28/1991', 20, 'semriwing', 'semriwing', 'pasien/76885_1521299425376_1021273893_31292160_4554608_n.jpg'),
(9, 'agus bocah ganteng', 'solo boyolali', '02/03/1991', 20, 'ganteng', '123', 'pasien/03112010.jpg'),
(10, 'ika', 'bdg', '09/22/1991', 20, 'dika', 'dika', 'pasien/nevz.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE IF NOT EXISTS `penyakit` (
  `id_penyakit` varchar(50) NOT NULL,
  `penyakit` varchar(300) NOT NULL,
  `definisi` varchar(10000) NOT NULL,
  `solusi` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_penyakit`),
  KEY `id_penyakit` (`id_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `penyakit`, `definisi`, `solusi`) VALUES
('P01', 'DD', 'Demam Dengue', 'Berikan antipiretik seperti paracetamol 3 kali sehari ya yayaya'),
('P02', 'DBD1', 'Demam Berdarah Dengue Derajat 1', 'Perbanyak asupan cairan oral'),
('P03', 'DBD2', 'Demam Berdarah Dengue Derajat 2', 'Berikan makanan dan minuman yang bergizi secara cukup bila mungkin bawakan dari rumah menu kesukaan '),
('P04', 'DBD3', 'Demam Berdarah Dengue Derajat 3', 'Tungguin penderita biar Matinya tenang\r\n'),
('P05', 'SSD', 'Shock Syndrom Dengue atau Demam Berdarah Dengue Derajat 4', 'Perhatikan pengeluaran kencing penderita apabila kencing penderita banyak atau jumlahnya biasa berarti penderita dalam kondisi yang baik sebaliknya bila tidak dapat atau sangat jarang kencing menunjukkan tanda yang memburuk selain itu persiapkan donor darah karna memang tak semua kasus DBD memerlukan transfusi darah tetapi kebutuhan darah kadang kadang terjadi secara mendadak dalam jumlah banyak sementara persedaan di PMI belum tentu ada atau mencukupi'),
('P06', 'DD', 'Demam Dengue dengan keadaan memburuk', 'Penderita Mau Mati Harus ditungguin'),
('P07', 'DBD1', 'Demam Berdarah Dengue Derajat 1 dengan keadaan memburuk', 'tungguin penderita karena mau mati'),
('P08', 'DBD2', 'Demam Berdarah Dengue Derajat 2 dengan Keadaan memburuk', 'tungguin penderita'),
('P09', 'DBD3', 'Demam Berdarah Dengue Derajat 3 dengan keadaan memburuk', 'Bawa Surat Yasin supaya penderita pergi dengan tenang'),
('P10', 'SSD', 'Shock Syndrom Dengue atau Demam Berdarah Dengue derajat 4 dengan keadaan memburuk', 'Bawa surat Yasin dan iklaskan kepergian penderita');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id_pertanyaan` varchar(50) NOT NULL,
  `id_gejala` varchar(50) NOT NULL,
  `pertanyaan` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_pertanyaan`),
  KEY `id_gejala` (`id_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_gejala`, `pertanyaan`) VALUES
('PR01', 'G01', 'Apakah anda mengalami demam tinggi yang berlebihan?'),
('PR02', 'G02', 'Apakah anda mengalami pendarahan berupa bintik-bintik merah pada kulit atau lebam pada kulit?'),
('PR03', 'G03', 'Apakah anda mengalami pendarahan, baik dari mulut, hidung (mimisan), maupun dari anus yang terlihat seperti tinja hitam (melena)?'),
('PR04', 'G04', 'Apakah kulit anda teraba lembab dan dingin?'),
('PR05', 'G05', 'Apakah anda gelisah, tampak kebiru-biruan pada sekitar mulut, hidung, dan ujung-ujung jari?'),
('PR06', 'G06', 'Apakah anda merasa lemah dan terjadi penurunan hingga hilangnya tingkat kesadaran?'),
('PR07', 'G07', 'Apakah anda kencing sedikit atau tidak buang air kecil selama 4-6 jam?'),
('PR08', 'G08', 'Apakah nafas anda cepat hingga nadi teraba lembut hingga tidak teraba?');

-- --------------------------------------------------------

--
-- Table structure for table `temp_gejala`
--

CREATE TABLE IF NOT EXISTS `temp_gejala` (
  `ip` varchar(50) NOT NULL,
  `id_gejala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_gejala`
--


-- --------------------------------------------------------

--
-- Table structure for table `temp_penyakit`
--

CREATE TABLE IF NOT EXISTS `temp_penyakit` (
  `ip` varchar(50) NOT NULL,
  `id_penyakit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_penyakit`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aturan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;
