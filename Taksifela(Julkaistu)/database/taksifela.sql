-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 18.03.2026 klo 07:19
-- Palvelimen versio: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deb02itjy_taksifela`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `hinnasto`
--

CREATE TABLE `hinnasto` (
  `id` int(11) NOT NULL,
  `taksa` varchar(255) NOT NULL,
  `alv` varchar(255) NOT NULL,
  `esimerkkimatka` varchar(255) NOT NULL,
  `aloitusmaksu` varchar(255) NOT NULL,
  `aloitusmaksumuina` varchar(255) NOT NULL,
  `aika` varchar(255) NOT NULL,
  `matkatavarat` varchar(255) NOT NULL,
  `kulkuvalineet` varchar(255) NOT NULL,
  `matkustaja` varchar(255) NOT NULL,
  `matkustajia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `hinnasto`
--

INSERT INTO `hinnasto` (`id`, `taksa`, `alv`, `esimerkkimatka`, `aloitusmaksu`, `aloitusmaksumuina`, `aika`, `matkatavarat`, `kulkuvalineet`, `matkustaja`, `matkustajia`) VALUES
(1, '1.7.2025', '13.5', '42.95', '7,00', '10.50', '1.15', '3.50', '16.90', '1.52', '2.10');

-- --------------------------------------------------------

--
-- Rakenne taululle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, 'admin', '$2y$10$Ux0D5kYJaFQ8Upop6zb.MOf4xqyUCxFdmY3Wt..OWkcdK/tGeHijy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hinnasto`
--
ALTER TABLE `hinnasto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hinnasto`
--
ALTER TABLE `hinnasto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
