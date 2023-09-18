-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 12:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naivebayes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training`
--

CREATE TABLE `tbl_training` (
  `id_training` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `jml_tanggungan` int(10) NOT NULL,
  `kepala_rt` varchar(20) NOT NULL,
  `pbb` varchar(50) NOT NULL,
  `jml_penghasilan` varchar(10) NOT NULL,
  `status_rumah` varchar(20) NOT NULL,
  `status_kelayakan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_training`
--

INSERT INTO `tbl_training` (`id_training`, `nama`, `nilai`, `jml_tanggungan`, `kepala_rt`, `pbb`, `jml_penghasilan`, `status_rumah`, `status_kelayakan`) VALUES
(1, 'AA RIZAL', '7.00-8.00', 3, 'laki-laki', '26.000-100.000', '1950000', 'milik sendiri', 'layak'),
(2, 'ABDUL QORI', '7.00-8.00', 6, 'laki-laki', '26.000-100.000', '500000', 'milik sendiri', 'layak');


--
-- Indexes for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`id_training`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `id_training` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
