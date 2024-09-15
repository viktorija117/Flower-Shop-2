-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2023 at 10:59 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvecara`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikli`
--

DROP TABLE IF EXISTS `artikli`;
CREATE TABLE IF NOT EXISTS `artikli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artikli`
--

INSERT INTO `artikli` (`id`, `naziv`, `cena`) VALUES
(1, 'BUKET 1', 5300),
(2, 'BUKET 2', 4500),
(3, 'BUKET 3', 4000),
(4, 'BUKET 4', 2000),
(5, 'BUKET 5', 3000),
(6, 'BUKET 6', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `kontakt`
--

DROP TABLE IF EXISTS `kontakt`;
CREATE TABLE IF NOT EXISTS `kontakt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ImePrezime` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `nazivArtikla` varchar(45) NOT NULL,
  `Poruka` varchar(45) DEFAULT NULL,
  `VremeSlanjaPoruke` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id`, `ImePrezime`, `Email`, `nazivArtikla`, `Poruka`, `VremeSlanjaPoruke`) VALUES
(1, 'Viktorija KitanoviÄ‡ 394', 'viktorija.kitanovic.17@gmail.com', 'BUKET 1', '', '22:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `menadzer`
--

DROP TABLE IF EXISTS `menadzer`;
CREATE TABLE IF NOT EXISTS `menadzer` (
  `identifikacioniBrojMenadzera` varchar(10) NOT NULL,
  `lozinkaMenadzer` varchar(45) NOT NULL,
  `imePrezime` varchar(45) NOT NULL,
  `plata` int(11) NOT NULL,
  PRIMARY KEY (`identifikacioniBrojMenadzera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menadzer`
--

INSERT INTO `menadzer` (`identifikacioniBrojMenadzera`, `lozinkaMenadzer`, `imePrezime`, `plata`) VALUES
('1234567891', 'lozinkaM1', 'menadzer1', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `prijavljivanjeradnika`
--

DROP TABLE IF EXISTS `prijavljivanjeradnika`;
CREATE TABLE IF NOT EXISTS `prijavljivanjeradnika` (
  `idPrijavaR` int(11) NOT NULL AUTO_INCREMENT,
  `vremePrijavljivanjaR` varchar(45) DEFAULT NULL,
  `radnik_identifikacioniBrojRadnika` varchar(10) NOT NULL,
  PRIMARY KEY (`idPrijavaR`),
  KEY `fk_prijavljivanje_radnik1_idx` (`radnik_identifikacioniBrojRadnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prodaja`
--

DROP TABLE IF EXISTS `prodaja`;
CREATE TABLE IF NOT EXISTS `prodaja` (
  `radnik_identifikacioniBrojRadnika` varchar(10) NOT NULL,
  `vreme` time NOT NULL,
  `artikli_id` int(11) NOT NULL,
  `kontakt_id` int(11) NOT NULL,
  KEY `fk_radnik_has_kontakt_radnik1_idx` (`radnik_identifikacioniBrojRadnika`),
  KEY `fk_prodaja_Atrikli1_idx` (`artikli_id`),
  KEY `fk_prodaja_kontakt1_idx` (`kontakt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `radnik`
--

DROP TABLE IF EXISTS `radnik`;
CREATE TABLE IF NOT EXISTS `radnik` (
  `identifikacioniBrojRadnika` varchar(10) NOT NULL,
  `lozinkaRadnik` varchar(45) DEFAULT NULL,
  `imePrezime` varchar(45) NOT NULL,
  `plata` int(11) NOT NULL,
  `pocetakSmene` time NOT NULL,
  `krajSmene` time NOT NULL,
  PRIMARY KEY (`identifikacioniBrojRadnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prijavljivanjeradnika`
--
ALTER TABLE `prijavljivanjeradnika`
  ADD CONSTRAINT `fk_prijavljivanje_radnik1` FOREIGN KEY (`radnik_identifikacioniBrojRadnika`) REFERENCES `radnik` (`identifikacioniBrojRadnika`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prodaja`
--
ALTER TABLE `prodaja`
  ADD CONSTRAINT `fk_prodaja_Atrikli1` FOREIGN KEY (`artikli_id`) REFERENCES `artikli` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodaja_kontakt1` FOREIGN KEY (`kontakt_id`) REFERENCES `kontakt` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_radnik_has_kontakt_radnik1` FOREIGN KEY (`radnik_identifikacioniBrojRadnika`) REFERENCES `radnik` (`identifikacioniBrojRadnika`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
