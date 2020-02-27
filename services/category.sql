-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 07:33 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebookhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `no` int(11) NOT NULL,
  `sub_category` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`no`, `sub_category`, `category`) VALUES
(1, 'Umum', 'Non Fiksi'),
(2, 'Filsafat', 'Non Fiksi'),
(3, 'Psikologi', 'Non Fiksi'),
(4, 'Agama', 'Non Fiksi'),
(5, 'Sejarah', 'Non Fiksi'),
(6, 'Sosial', 'Non Fiksi'),
(7, 'Bahasa', 'Non Fiksi'),
(8, 'Sains', 'Non Fiksi'),
(9, 'Geografi', 'Non Fiksi'),
(10, 'Teknologi', 'Non Fiksi'),
(11, 'Seni', 'Non Fiksi'),
(12, 'Literatur', 'Non Fiksi'),
(13, 'Sastra', 'Non Fiksi'),
(14, 'Biografi', 'Non Fiksi'),
(15, 'Matematika', 'Non Fiksi'),
(16, 'Novel', 'Fiksi'),
(17, 'Cerpen', 'Fiksi'),
(18, 'Puisi', 'Fiksi'),
(19, 'Drama', 'Fiksi'),
(20, 'Komik', 'Fiksi'),
(21, 'Dongeng', 'Fiksi'),
(22, 'Fabel', 'Fiksi'),
(23, 'Mitos', 'Fiksi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
