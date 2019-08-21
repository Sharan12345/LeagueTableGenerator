-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 08:50 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leaguetabledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `previous_winner` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_id`, `club_name`, `country_id`, `previous_winner`) VALUES
(1, 'Real Madrid', 1, 1),
(2, 'Atletico Madrid', 1, 1),
(3, 'Bayern Munchen', 2, 1),
(4, 'Barcelona', 1, 1),
(5, 'Juventus', 3, 1),
(6, 'Paris Saint-German', 4, 1),
(7, 'Manchester City', 5, 1),
(8, 'Lokomotiv Moskva', 6, 1),
(9, 'Borussia Dortmund', 2, 0),
(10, 'Porto', 7, 0),
(11, 'Manchester United', 5, 0),
(12, 'Shakhtar Donetsk', 8, 0),
(13, 'Napoli', 3, 0),
(14, 'Tottenham Hotspur', 5, 0),
(15, 'Roma', 3, 0),
(16, 'Liverpool', 5, 0),
(17, 'Schalke', 2, 0),
(18, 'Lyon', 4, 0),
(19, 'Monaco', 4, 0),
(20, 'CSKA Moskva', 6, 0),
(21, 'Valencia', 1, 0),
(22, 'Viktoria Plzen', 9, 0),
(23, 'Club Brugge', 10, 0),
(24, 'Galatasaray', 11, 0),
(25, 'Internazionale Milano', 3, 0),
(26, 'Hoffenheim', 2, 0),
(27, 'Benfica', 7, 0),
(28, 'Ajax', 12, 0),
(29, 'PSV Eindhoven', 12, 0),
(30, 'Young Boys', 14, 0),
(31, 'Crvena Zvezda', 13, 0),
(32, 'AEK Athens', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `country_code`) VALUES
(1, 'Spain', 'ESP'),
(2, 'Germany', 'GER'),
(3, 'Italy', 'ITA'),
(4, 'France', 'FRA'),
(5, 'England', 'ENG'),
(6, 'Russia', 'RUS'),
(7, 'Portugal', 'POR'),
(8, 'Ukrania', 'UKR'),
(9, 'Czech Republic', 'CZE'),
(10, 'Belgium', 'BEL'),
(11, 'Turkey', 'TUR'),
(12, 'Netherland', 'NED'),
(13, 'Serbia', 'SRB'),
(14, 'Switzerland', 'SUI'),
(15, 'Greece', 'GRE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
