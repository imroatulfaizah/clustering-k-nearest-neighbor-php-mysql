-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2019 at 01:36 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `knn`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_testing`
--

CREATE TABLE IF NOT EXISTS `data_testing` (
`id` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `dp` int(20) NOT NULL,
  `kontribusi` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_testing`
--

INSERT INTO `data_testing` (`id`, `id_dealer`, `dp`, `kontribusi`) VALUES
(1, 7, 500000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `data_training`
--

CREATE TABLE IF NOT EXISTS `data_training` (
`id` int(11) NOT NULL,
  `id_dealer` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `dp` int(20) NOT NULL,
  `kontribusi` int(20) NOT NULL,
  `nama_grade` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_training`
--

INSERT INTO `data_training` (`id`, `id_dealer`, `id_merk`, `id_type`, `dp`, `kontribusi`, `nama_grade`) VALUES
(1, 1, 7, 1, 500000, 10, 'B'),
(2, 2, 7, 2, 500000, 5, 'A'),
(3, 3, 8, 3, 500000, 10, 'B'),
(4, 4, 8, 3, 500000, 5, 'A'),
(5, 5, 9, 4, 500000, 4, 'A'),
(6, 6, 7, 1, 500000, 8, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE IF NOT EXISTS `dealer` (
  `id_dealer` int(11) NOT NULL,
  `nama_dealer` varchar(20) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`id_dealer`, `nama_dealer`, `id_merk`, `alamat`, `no_telp`) VALUES
(1, 'AM', 7, 'Jl. Kepanjen No. 32', '0341-334455'),
(2, 'RD', 7, 'Jl. Ahmad Yani No. 30 Malang', '0341-333444'),
(3, 'PL', 8, 'Jl. Capung No. 21, Malang', '0341-546789'),
(4, 'WJ', 8, 'Jl. Keputih Malang', '0341-888999'),
(5, 'MT', 9, 'Jl. Klayatan No. 50', '085773123456'),
(6, 'DY', 7, 'Jl. supriadi No. 48', '085776677889'),
(7, 'IF', 9, 'Jl. Sumberkerto Malang', '0341-882345');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uname`, `pass`, `foto`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
  `id_merk` int(11) NOT NULL,
  `nama_merk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(7, 'HONDA'),
(8, 'YAMAHA'),
(9, 'SUZUKI');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_k`
--

CREATE TABLE IF NOT EXISTS `nilai_k` (
  `k` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_k`
--

INSERT INTO `nilai_k` (`k`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_grade`
--

CREATE TABLE IF NOT EXISTS `tbl_grade` (
`id_grade` int(11) NOT NULL,
  `nama_grade` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_grade`
--

INSERT INTO `tbl_grade` (`id_grade`, `nama_grade`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
`id` int(5) NOT NULL,
  `klasifikasi` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `klasifikasi`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `temp02`
--

CREATE TABLE IF NOT EXISTS `temp02` (
  `id` int(5) NOT NULL,
  `Vi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL,
  `id_merk` int(11) NOT NULL,
  `nama_type` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `id_merk`, `nama_type`, `keterangan`) VALUES
(1, 7, 'BEAT POP', 'Baru'),
(2, 7, 'REVO FIT', 'Baru'),
(3, 8, 'MIO M3', 'Baru'),
(4, 9, 'SATRIA', 'Baru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_testing`
--
ALTER TABLE `data_testing`
 ADD PRIMARY KEY (`id`), ADD KEY `id_dealer` (`id_dealer`);

--
-- Indexes for table `data_training`
--
ALTER TABLE `data_training`
 ADD PRIMARY KEY (`id`), ADD KEY `id_dealer` (`id_dealer`), ADD KEY `id_merk` (`id_merk`), ADD KEY `id_type` (`id_type`), ADD KEY `id_dealer_2` (`id_dealer`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
 ADD PRIMARY KEY (`id_dealer`), ADD KEY `id_merk` (`id_merk`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
 ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
 ADD PRIMARY KEY (`id_grade`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
 ADD PRIMARY KEY (`id_type`), ADD KEY `id_merk` (`id_merk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_testing`
--
ALTER TABLE `data_testing`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `data_training`
--
ALTER TABLE `data_training`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_grade`
--
ALTER TABLE `tbl_grade`
MODIFY `id_grade` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_testing`
--
ALTER TABLE `data_testing`
ADD CONSTRAINT `data_testing_ibfk_1` FOREIGN KEY (`id_dealer`) REFERENCES `dealer` (`id_dealer`);

--
-- Constraints for table `data_training`
--
ALTER TABLE `data_training`
ADD CONSTRAINT `data_training_ibfk_1` FOREIGN KEY (`id_dealer`) REFERENCES `dealer` (`id_dealer`),
ADD CONSTRAINT `data_training_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`),
ADD CONSTRAINT `data_training_ibfk_3` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`);

--
-- Constraints for table `dealer`
--
ALTER TABLE `dealer`
ADD CONSTRAINT `dealer_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`);

--
-- Constraints for table `type`
--
ALTER TABLE `type`
ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
