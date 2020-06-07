-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 07, 2020 at 09:25 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `MyBuilding`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `pk` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `appartment_number` int(255) DEFAULT NULL,
  `FK_building` int(255) DEFAULT NULL,
  PRIMARY KEY (`pk`),
  UNIQUE KEY `email` (`email`),
  KEY `users_buildings` (`FK_building`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`pk`, `name`, `email`, `password`, `role`, `appartment_number`, `FK_building`) VALUES
(23, 'admin', 'admin@admin.com', '$2y$10$IRElU06KT4/Ak5CBvJCimuKlI3wmUlMXMNGziGY2NFQftRU1zLpH.', 'admin', 20, NULL),
(24, 'John Doe', 'john@doe.com', '$2y$10$FS5I2vaBnjq5fTexiEhok..fNApmkcYQiTnqvhEUxt5JWTr866/iy', 'resident', 8, NULL),
(25, 'Robert', 'robert@gmail.com', '$2y$10$.wWXZ4Fsxy8jJdOfWMgf.e8CtF5oUPFJfFfx2iArlo9fwUZI3KAHK', 'resident', 45, NULL),
(26, 'Louis', 'louis@resident.com', '$2y$10$YCIm6QIdbksA2GVRwR8Xd.NbG/iM1vm8RWAroKKPLcKdrn6n/8ctO', 'resident', 65, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_buildings` FOREIGN KEY (`FK_building`) REFERENCES `building` (`pk`) ON DELETE CASCADE ON UPDATE CASCADE;
