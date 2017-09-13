-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2017 at 04:56 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uciliste`
--

-- --------------------------------------------------------

--
-- Table structure for table `administracija`
--

CREATE TABLE `administracija` (
  `pozicija` varchar(10) NOT NULL,
  `ime` varchar(10) NOT NULL,
  `prezime` varchar(15) NOT NULL,
  `user` varchar(15) NOT NULL,
  `passvord` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administracija`
--

INSERT INTO `administracija` (`pozicija`, `ime`, `prezime`, `user`, `passvord`) VALUES
('d', 'Marko', 'Minovski', 'marko', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
('s', 'admin', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `arhiva`
--

CREATE TABLE `arhiva` (
  `arhiva_id` int(5) NOT NULL,
  `sifra` varchar(10) NOT NULL,
  `kolicina` int(2) NOT NULL,
  `predmet_id` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arhiva`
--

INSERT INTO `arhiva` (`arhiva_id`, `sifra`, `kolicina`, `predmet_id`) VALUES
(1, '2', 122, 'Matematika'),
(8, '2', 9999, 'Biznis'),
(12, '2', 0, 'Matematika'),
(13, '11', 888, 'Fizicko');

-- --------------------------------------------------------

--
-- Table structure for table `biblioteka`
--

CREATE TABLE `biblioteka` (
  `sifra` varchar(10) NOT NULL,
  `tip` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biblioteka`
--

INSERT INTO `biblioteka` (`sifra`, `tip`) VALUES
('2', 'Skripta'),
('11', 'tetratk'),
('123', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `evidencija`
--

CREATE TABLE `evidencija` (
  `evidencija_id` int(5) NOT NULL,
  `embg_p` varchar(13) NOT NULL,
  `embg_u` varchar(13) NOT NULL,
  `oblast` varchar(10) NOT NULL,
  `participacija_id` int(5) NOT NULL,
  `grad` varchar(10) NOT NULL,
  `natprevar_id` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evidencija`
--

INSERT INTO `evidencija` (`evidencija_id`, `embg_p`, `embg_u`, `oblast`, `participacija_id`, `grad`, `natprevar_id`) VALUES
(1, '0802991410014', '1007999415021', 'istorija', 2, 'Rim', '2'),
(2, '2210965410055', '1204998410054', 'Matematika', 3, 'Madrid', '1'),
(5, '0802991410014', '2208001410089', 'Istorija', 2, 'Rim', '3'),
(4, '0303978415044', '2010999410012', 'fizika', 4, 'bitola', '4'),
(6, '0802991410014', '1007999415021', 'Istorija', 2, 'Minhen', '1'),
(7, '1234567890123', '1007999415021', 'aaaa', 25, 'Madrid', '11');

-- --------------------------------------------------------

--
-- Table structure for table `natprevari`
--

CREATE TABLE `natprevari` (
  `natprevar_id` int(10) NOT NULL,
  `odrzan_na` varchar(10) NOT NULL,
  `nagradi` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `natprevari`
--

INSERT INTO `natprevari` (`natprevar_id`, `odrzan_na`, `nagradi`) VALUES
(1, '22.10.2016', 'prvo Mesto'),
(11, '12.12.1203', 'jooo'),
(12, '22.10.2014', 'asdasd'),
(13, '12.12.1203', 'sto');

-- --------------------------------------------------------

--
-- Table structure for table `participacija`
--

CREATE TABLE `participacija` (
  `participacija_id` int(5) UNSIGNED NOT NULL,
  `prvo_polugodie` varchar(8) NOT NULL,
  `vtoro_polugodie` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participacija`
--

INSERT INTO `participacija` (`participacija_id`, `prvo_polugodie`, `vtoro_polugodie`) VALUES
(7, '100evra', '100evra'),
(2, '130evra', '13evra'),
(25, '199 ', '490'),
(26, '494', '334');

-- --------------------------------------------------------

--
-- Table structure for table `plakane`
--

CREATE TABLE `plakane` (
  `plakane_id` int(5) NOT NULL,
  `embg_u` varchar(13) NOT NULL,
  `participacija_id` int(5) NOT NULL,
  `kazna` varchar(10) NOT NULL,
  `popusti` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plakane`
--

INSERT INTO `plakane` (`plakane_id`, `embg_u`, `participacija_id`, `kazna`, `popusti`) VALUES
(1, '1007999415021', 15, '111', '2'),
(2, '2208001410089', 1, '100', '0'),
(5, '1234567890123', 22, '0', '0'),
(4, '1007999415021', 7, '90', '11'),
(6, '1204998410054', 16, '0', '0'),
(7, '1204998410054', 19, '0', '0'),
(8, '1007999415021', 25, '22', '22'),
(9, '1234567890123', 26, '12', '142');

-- --------------------------------------------------------

--
-- Table structure for table `predmeti`
--

CREATE TABLE `predmeti` (
  `predmet_id` varchar(10) NOT NULL,
  `zadolzitelen` varchar(10) NOT NULL,
  `izboren` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predmeti`
--

INSERT INTO `predmeti` (`predmet_id`, `zadolzitelen`, `izboren`) VALUES
('Matematika', 'da', 'da'),
('Geografija', 'da', 'ne'),
('Istorija', 'da', 'ne'),
('Fizicko', 'da', 'ne'),
('Biznis', 'ne', 'ne'),
('mmmmmm', 'da', 'da'),
('ooooo', 'da', 'da');

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE `profesori` (
  `imeP` varchar(10) NOT NULL,
  `prezimeP` varchar(15) NOT NULL,
  `embg_p` varchar(13) NOT NULL,
  `staz` int(2) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profesori`
--

INSERT INTO `profesori` (`imeP`, `prezimeP`, `embg_p`, `staz`, `img_path`) VALUES
('Gjoko', 'Talevskiiii', '0802991410014', 20, 'Penguins.jpg'),
('asdas', 'milev', '1234567890123', 11, 'Desert.jpg'),
('afsdfa', 'sdfsdfsdfq', '4324234234234', 22, '');

-- --------------------------------------------------------

--
-- Table structure for table `razmena`
--

CREATE TABLE `razmena` (
  `grad` varchar(10) NOT NULL,
  `drzava` varchar(10) NOT NULL,
  `uciliste` varchar(20) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `razmena`
--

INSERT INTO `razmena` (`grad`, `drzava`, `uciliste`, `img_path`) VALUES
('aaaa', 'aaaaa', 'meeee', 'Lighthouse.jpg'),
('Minhen', 'Germanija', 'Stiv_Naumovvv', ''),
('Madrid', 'Spanija', 'Dame_Gruev', ''),
('bla balb', 'vaaba', 'aaaaa', 'rome.jpg'),
('bblba', 'aasdasda', 'dzenememm', '');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `rezervacija_id` int(5) NOT NULL,
  `embg_u` varchar(13) NOT NULL,
  `sifra` varchar(10) NOT NULL,
  `data_od` varchar(10) NOT NULL,
  `data_do` varchar(10) NOT NULL,
  `kazna` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`rezervacija_id`, `embg_u`, `sifra`, `data_od`, `data_do`, `kazna`) VALUES
(1, '1204998410054', '1', '08.02.2019', '15.02.2019', '5'),
(2, '1204998410054', '2', '03.04.2015', '17.04.2015', '333'),
(6, '1234567890123', '3', '10.10.2010', '12.12.2012', '9'),
(5, '2010999410012', '3', '10.10.2010', '12.12.2012', '200'),
(7, '1007999415021', '3', '10.10.2010', '12.12.2012', '0'),
(8, '1007999415021', '2', '10.10.2010', '12.12.2012', '111'),
(9, '1007999415021', '11', '10.10.2010', '15.02.2019', '100'),
(10, '1234567890123', '123', '10', '13', '11');

-- --------------------------------------------------------

--
-- Table structure for table `sekcii`
--

CREATE TABLE `sekcii` (
  `oblast` varchar(10) NOT NULL,
  `nedelno` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekcii`
--

INSERT INTO `sekcii` (`oblast`, `nedelno`) VALUES
('Geografija', 5),
('Istorija', 1),
('aaaa', 1200),
('sfasdga', 1213);

-- --------------------------------------------------------

--
-- Table structure for table `ucenici`
--

CREATE TABLE `ucenici` (
  `imeU` varchar(10) NOT NULL,
  `PrezimeU` varchar(15) NOT NULL,
  `embg_u` varchar(13) NOT NULL,
  `klas` int(2) NOT NULL,
  `oddelenie` int(2) NOT NULL,
  `img_path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ucenici`
--

INSERT INTO `ucenici` (`imeU`, `PrezimeU`, `embg_u`, `klas`, `oddelenie`, `img_path`) VALUES
('petre', 'andeeeski', '1234567890123', 5, 3, 'Jellyfish.jpg'),
('Sneska', 'Stojanovska', '1007999415021', 6, 2, ''),
('asdasd', 'asdasda', '12312423512', 1, 7, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administracija`
--
ALTER TABLE `administracija`
  ADD PRIMARY KEY (`pozicija`);

--
-- Indexes for table `arhiva`
--
ALTER TABLE `arhiva`
  ADD PRIMARY KEY (`arhiva_id`);

--
-- Indexes for table `biblioteka`
--
ALTER TABLE `biblioteka`
  ADD PRIMARY KEY (`sifra`);

--
-- Indexes for table `evidencija`
--
ALTER TABLE `evidencija`
  ADD PRIMARY KEY (`evidencija_id`);

--
-- Indexes for table `natprevari`
--
ALTER TABLE `natprevari`
  ADD PRIMARY KEY (`natprevar_id`);

--
-- Indexes for table `participacija`
--
ALTER TABLE `participacija`
  ADD PRIMARY KEY (`participacija_id`),
  ADD UNIQUE KEY `participacija_id` (`participacija_id`);

--
-- Indexes for table `plakane`
--
ALTER TABLE `plakane`
  ADD PRIMARY KEY (`plakane_id`);

--
-- Indexes for table `predmeti`
--
ALTER TABLE `predmeti`
  ADD PRIMARY KEY (`predmet_id`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD PRIMARY KEY (`embg_p`);

--
-- Indexes for table `razmena`
--
ALTER TABLE `razmena`
  ADD PRIMARY KEY (`grad`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`rezervacija_id`);

--
-- Indexes for table `sekcii`
--
ALTER TABLE `sekcii`
  ADD PRIMARY KEY (`oblast`);

--
-- Indexes for table `ucenici`
--
ALTER TABLE `ucenici`
  ADD PRIMARY KEY (`embg_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arhiva`
--
ALTER TABLE `arhiva`
  MODIFY `arhiva_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `evidencija`
--
ALTER TABLE `evidencija`
  MODIFY `evidencija_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `natprevari`
--
ALTER TABLE `natprevari`
  MODIFY `natprevar_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `participacija`
--
ALTER TABLE `participacija`
  MODIFY `participacija_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `plakane`
--
ALTER TABLE `plakane`
  MODIFY `plakane_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `rezervacija_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
