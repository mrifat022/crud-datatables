-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 01:11 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_keahlian`
--

CREATE TABLE IF NOT EXISTS `bidang_keahlian` (
  `bidang_keahlian_id` int(11) NOT NULL,
  `nama_bidangkeahlian` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`bidang_keahlian_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_keahlian`
--

INSERT INTO `bidang_keahlian` (`bidang_keahlian_id`, `nama_bidangkeahlian`) VALUES
(0, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `jurusan_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`jurusan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`jurusan_id`, `nama_jurusan`) VALUES
(8, 'Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_pengajar`
--

CREATE TABLE IF NOT EXISTS `kelompok_pengajar` (
  `idkelompok_pengajar` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelompok` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idkelompok_pengajar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kelompok_pengajar`
--

INSERT INTO `kelompok_pengajar` (`idkelompok_pengajar`, `nama_kelompok`) VALUES
(1, 'asd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
