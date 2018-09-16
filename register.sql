-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 03:36 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `username` varchar(50) NOT NULL,
  `data_name` char(50) NOT NULL,
  `data_address` char(50) NOT NULL,
  `data_phno` char(50) NOT NULL,
  `data_emergency` char(50) NOT NULL,
  `data_addmited` varchar(256) NOT NULL,
  `data_ward` char(50) NOT NULL,
  `data_medicines` char(50) NOT NULL,
  `data_report` varchar(256) NOT NULL,
  `lab` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`username`, `data_name`, `data_address`, `data_phno`, `data_emergency`, `data_addmited`, `data_ward`, `data_medicines`, `data_report`, `lab`) VALUES
('karan.more', 'Karan', 'Thane', '9769133326', 'Yes', 'Yes', '89', 'Combiflam', 'https://drive.google.com/open?id=1GfgYW361gNpjoCm35bvDnNp8pMSxidMZwIcY1Jhg3f8', 'https://drive.google.com/open?id=1V91EN3tgZd3eIlHXnDZp9K1HV30ovRj0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(9, 'amit', '$2y$10$bZU5R2KiqGB5MtXqlWQlSe3Ww.ISOxOKf3CnSER31/D/4.RzJ1mry'),
(10, 'swapnil.more', '$2y$10$ycN3WB/SzOCyvZJtOKxS9uuB7wzygrkYclgy6aC3tIsyGXrtemU/.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
