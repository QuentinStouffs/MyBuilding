-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 08, 2020 at 12:50 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `MyBuilding`
--

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
                            `pk` int(255) NOT NULL,
                            `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`pk`, `name`) VALUES
(9, 'Bruyères'),
(10, 'Fougère'),
(11, 'Chêne');

-- --------------------------------------------------------

--
-- Table structure for table `communications`
--

CREATE TABLE `communications` (
                                  `pk` int(255) NOT NULL,
                                  `title` varchar(255) NOT NULL,
                                  `text` text NOT NULL,
                                  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                  `FK_building` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `communications`
--

INSERT INTO `communications` (`pk`, `title`, `text`, `date`, `FK_building`) VALUES
(3, 'Ramassage ordures', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eros velit, ultricies a viverra ac, varius id ante. Donec non elit sed leo gravida blandit. Maecenas nec ornare erat. Ut non est in ipsum aliquet lobortis nec nec ligula. Etiam rutrum leo ac sapien auctor cursus. Fusce mollis placerat ante, a viverra risus efficitur non. Praesent tellus odio, ullamcorper vitae semper id, blandit vitae tellus. Praesent rutrum vulputate ipsum, sit amet consectetur mi interdum eget. ', '2020-06-07 21:14:48', 9),
(4, 'Consommation des communs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eros velit, ultricies a viverra ac, varius id ante. Donec non elit sed leo gravida blandit. Maecenas nec ornare erat. Ut non est in ipsum aliquet lobortis nec nec ligula. Etiam rutrum leo ac sapien auctor cursus. Fusce mollis placerat ante, a viverra risus efficitur non. Praesent tellus odio, ullamcorper vitae semper id, blandit vitae tellus. Praesent rutrum vulputate ipsum, sit amet consectetur mi interdum eget. ', '2020-06-07 21:15:12', 10),
(5, 'Réparation chaudière', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eros velit, ultricies a viverra ac, varius id ante. Donec non elit sed leo gravida blandit. Maecenas nec ornare erat. Ut non est in ipsum aliquet lobortis nec nec ligula. Etiam rutrum leo ac sapien auctor cursus. Fusce mollis placerat ante, a viverra risus efficitur non. Praesent tellus odio, ullamcorper vitae semper id, blandit vitae tellus. Praesent rutrum vulputate ipsum, sit amet consectetur mi interdum eget. ', '2020-06-07 21:15:31', 10),
(6, 'Escalier en panne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eros velit, ultricies a viverra ac, varius id ante. Donec non elit sed leo gravida blandit. Maecenas nec ornare erat. Ut non est in ipsum aliquet lobortis nec nec ligula. Etiam rutrum leo ac sapien auctor cursus. Fusce mollis placerat ante, a viverra risus efficitur non. Praesent tellus odio, ullamcorper vitae semper id, blandit vitae tellus. Praesent rutrum vulputate ipsum, sit amet consectetur mi interdum eget. ', '2020-06-07 21:16:28', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
                         `pk` int(32) NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `role` varchar(255) NOT NULL,
                         `appartment_number` int(255) DEFAULT NULL,
                         `FK_building` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`pk`, `name`, `email`, `password`, `role`, `appartment_number`, `FK_building`) VALUES
(23, 'admin', 'admin@admin.com', '$2y$10$IRElU06KT4/Ak5CBvJCimuKlI3wmUlMXMNGziGY2NFQftRU1zLpH.', 'admin', 20, NULL),
(24, 'John Doe', 'john@doe.com', '$2y$10$FS5I2vaBnjq5fTexiEhok..fNApmkcYQiTnqvhEUxt5JWTr866/iy', 'resident', 8, NULL),
(25, 'Robert', 'robert@gmail.com', '$2y$10$.wWXZ4Fsxy8jJdOfWMgf.e8CtF5oUPFJfFfx2iArlo9fwUZI3KAHK', 'resident', 45, NULL),
(26, 'Louis', 'louis@resident.com', '$2y$10$YCIm6QIdbksA2GVRwR8Xd.NbG/iM1vm8RWAroKKPLcKdrn6n/8ctO', 'resident', 65, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
    ADD PRIMARY KEY (`pk`);

--
-- Indexes for table `communications`
--
ALTER TABLE `communications`
    ADD PRIMARY KEY (`pk`),
    ADD KEY `communications_buildings` (`FK_building`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`pk`),
    ADD UNIQUE KEY `email` (`email`),
    ADD KEY `users_buildings` (`FK_building`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
    MODIFY `pk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `communications`
--
ALTER TABLE `communications`
    MODIFY `pk` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `pk` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `communications`
--
ALTER TABLE `communications`
    ADD CONSTRAINT `communications_buildings` FOREIGN KEY (`FK_building`) REFERENCES `building` (`pk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
    ADD CONSTRAINT `users_buildings` FOREIGN KEY (`FK_building`) REFERENCES `building` (`pk`) ON DELETE CASCADE ON UPDATE CASCADE;
