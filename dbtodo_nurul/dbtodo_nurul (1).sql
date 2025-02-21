-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2025 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtodo_nurul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbtodo`
--

CREATE TABLE `tbtodo` (
  `id` int(11) NOT NULL,
  `tugas` varchar(255) NOT NULL,
  `jangkawaktu` date NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbtodo`
--

INSERT INTO `tbtodo` (`id`, `tugas`, `jangkawaktu`, `keterangan`) VALUES
(23, 'Belajar PAI', '2025-03-01', 'Selesai'),
(24, 'Belajar IPA', '2025-03-02', 'Belum Selesai'),
(25, 'Belajar IPS', '2025-03-03', 'Belum Selesai'),
(26, 'Belajar PPKN', '2025-03-04', 'Belum Selesai'),
(27, 'Belajar Bahasa Sunda', '2025-03-05', 'Belum Selesai'),
(28, 'Belajar Ikhlas', '2025-03-06', 'Belum Selesai'),
(29, 'Belajar Bahasa Arab', '2025-03-07', 'Belum Selesai'),
(30, 'Belajar Menggambar', '2025-03-08', 'Belum Selesai'),
(31, 'Belajar PHP', '2025-03-10', 'Belum Selesai'),
(32, 'Belajar HTML', '2025-03-11', 'Belum Selesai'),
(33, 'Belajar CSS', '2025-03-12', 'Belum Selesai'),
(34, 'Belajar javascript', '2025-03-13', 'Belum Selesai'),
(35, 'Project Buku Tamu', '2025-02-26', 'Belum Selesai'),
(36, 'Project To Do List', '2025-02-26', 'Belum Selesai'),
(37, 'Project Postoolio', '2025-02-26', 'Belum Selesai'),
(38, 'Project Buku Tamu', '2025-02-26', 'Belum Selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbtodo`
--
ALTER TABLE `tbtodo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbtodo`
--
ALTER TABLE `tbtodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
