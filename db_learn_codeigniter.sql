-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2020 at 02:20 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_learn_codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE `tbl_data` (
  `id_data` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`id_data`, `score`, `created_at`) VALUES
(1, 12, '2020-12-16'),
(2, 24, '2020-11-03'),
(3, 32, '2021-01-05'),
(4, 34, '2021-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `id_report` int(11) NOT NULL,
  `month` varchar(121) DEFAULT NULL,
  `score` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`id_report`, `month`, `score`) VALUES
(3, 'Januari', 12),
(4, 'Februari', 13),
(5, 'Maret', 14),
(6, 'April', 15),
(7, 'Mei', 16),
(8, 'Juni', 17),
(9, 'Juli', 18),
(10, 'Agustus', 19),
(11, 'Oktober', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_score`
--

CREATE TABLE `tbl_score` (
  `id_score` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_score`
--

INSERT INTO `tbl_score` (`id_score`, `score`, `created_at`) VALUES
(1, 2, '2020-11-17 10:26:38'),
(2, 5, '2020-12-18 11:26:38'),
(3, 7, '2021-01-19 12:27:31'),
(4, 9, '2021-02-20 13:27:31'),
(5, 13, '2021-03-21 14:27:31'),
(6, 15, '2021-04-22 15:27:31'),
(7, 18, '2021-05-23 16:27:31'),
(8, 11, '2021-06-24 17:27:31'),
(9, 4, '2021-07-25 12:27:31'),
(10, 1, '2021-08-26 09:27:31'),
(11, 45, '2021-02-18 20:07:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `tbl_score`
--
ALTER TABLE `tbl_score`
  ADD PRIMARY KEY (`id_score`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_score`
--
ALTER TABLE `tbl_score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
