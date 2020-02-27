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
-- Table structure for table `unggah`
--

CREATE TABLE `unggah` (
  `no` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `user_id` varchar(30)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unggah`
--

INSERT INTO `unggah` (`no`, `title`, `author`, `category`, `description`, `file`, `upload_date`, `status`) VALUES
(1, 'Mencari Ramai dalam Sepi', 'Fid Rian', 'Novel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras efficitur, ex aliquam tempus rhoncus, enim erat viverra felis, at volutpat orci purus sit amet ante. Maecenas luctus scelerisque velit. Mauris sit amet iaculis turpis, at venenatis ante.', NULL, '2019-11-05', 'Dalam Proses Penyuntingan'),
(12, 'How to Code', 'David Robertino', 'Pilih kategori...', 'Lorem ipsum dolor sit amet', 'Bing kelas duabelas.docx', '2019-11-05', 'Dalam Proses Penyuntingan'),
(38, 'sgrreytrher', 'fdhrhrtjt', 'Pilih kategori...', 'sgrhrehjer', 'Asisten BAPSI.docx', '2019-11-06', 'Dalam Proses Penyuntingan'),
(39, 'Buku Belajar', 'Kartiko', 'Pilih kategori...', 'loremloreman', 'Application Form Anterin.docx', '2019-11-06', 'Dalam Proses Penyuntingan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `unggah`
--
ALTER TABLE `unggah`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `unggah`
--
ALTER TABLE `unggah`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
