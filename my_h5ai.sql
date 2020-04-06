-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2020 at 08:35 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_h5ai`
--

-- --------------------------------------------------------

--
-- Table structure for table `fichiers`
--

CREATE TABLE `fichiers` (
  `id` int(11) NOT NULL,
  `nom` varchar(211) NOT NULL,
  `tag` varchar(211) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fichiers`
--

INSERT INTO `fichiers` (`id`, `nom`, `tag`) VALUES
(3, '../EXAM_SQL/Exam_SQL_02/ex_02.sql', 'exam'),
(4, '../EXAM_SQL/Exam_SQL_02/ex_02.sql', 'sql'),
(6, '../EXAM_SQL/Exam_SQL_02/ex_02.sql', 'exercice'),
(7, '../EXAM_SQL/Exam_SQL_02/ex_02.sql', 'ex'),
(8, '../EXAM_SQL/Exam_SQL_02/ex_01.sql', 'exam'),
(9, '../EXAM_SQL/Exam_SQL_02/ex_01.sql', 'sql'),
(10, '../EXAM_SQL/Exam_SQL_01/ex_02.sql', 'exercice'),
(11, '../EXAM_SQL/Exam_SQL_01/ex_02.sql', 'sql');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fichiers`
--
ALTER TABLE `fichiers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fichiers`
--
ALTER TABLE `fichiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
