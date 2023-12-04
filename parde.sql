-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 01:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parde`
--

-- --------------------------------------------------------

--
-- Table structure for table `apmokejimas`
--

CREATE TABLE `apmokejimas` (
  `Suma` double DEFAULT NULL,
  `uzsakymo_data` date DEFAULT NULL,
  `Apmokejimo_budas` int(11) DEFAULT NULL,
  `id_Apmokejimas` int(11) NOT NULL,
  `fk_Uzsakymasid_Uzsakymas` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `apmokejimo_budas`
--

CREATE TABLE `apmokejimo_budas` (
  `id_Apmokejimo_budas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apmokejimo_budas`
--

INSERT INTO `apmokejimo_budas` (`id_Apmokejimo_budas`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `drabuziai`
--

CREATE TABLE `drabuziai` (
  `Pavadinimas` varchar(255) DEFAULT NULL,
  `Aprasas` varchar(255) DEFAULT NULL,
  `Nuotrauka` varchar(255) DEFAULT NULL,
  `Kaina` double DEFAULT NULL,
  `Kiekis` int(11) DEFAULT NULL,
  `Sukurimo_data` date DEFAULT NULL,
  `Lytis` int(11) DEFAULT NULL,
  `id_Drabuzis` int(11) NOT NULL,
  `fk_Gamintojasid_Gamintojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drabuziu_dyziai`
--

CREATE TABLE `drabuziu_dyziai` (
  `fk_Drabuzisid_Drabuzis` int(11) NOT NULL,
  `fk_Dydisid_Dydis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drabuziu_gamintojai`
--

CREATE TABLE `drabuziu_gamintojai` (
  `fk_Drabuzisid_Drabuzis` int(11) NOT NULL,
  `fk_Kategorijaid_Kategorija` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drabuziu_medziagos`
--

CREATE TABLE `drabuziu_medziagos` (
  `fk_Drabuzisid_Drabuzis` int(11) NOT NULL,
  `fk_Medziagaid_Medziaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dravuziu_spalvos`
--

CREATE TABLE `dravuziu_spalvos` (
  `fk_Drabuzisid_Drabuzis` int(11) NOT NULL,
  `fk_Spalvaid_Spalva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dydis`
--

CREATE TABLE `dydis` (
  `id_Dydis` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dydis`
--

INSERT INTO `dydis` (`id_Dydis`, `name`) VALUES
(1, 'XXS'),
(2, 'XS'),
(3, 'S'),
(4, 'M'),
(5, 'L'),
(6, 'XL'),
(7, 'XXL'),
(8, 'one size fits all'),
(9, 'Kitas_dydis');

-- --------------------------------------------------------

--
-- Table structure for table `dydziai`
--

CREATE TABLE `dydziai` (
  `Dydis` varchar(255) DEFAULT NULL,
  `id_Dydis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gamintojai`
--

CREATE TABLE `gamintojai` (
  `Gamintojas` varchar(255) DEFAULT NULL,
  `id_Gamintojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ivykdytas_uzsakymas`
--

CREATE TABLE `ivykdytas_uzsakymas` (
  `prekės_info` varchar(255) DEFAULT NULL,
  `uzsakymo_info` varchar(255) DEFAULT NULL,
  `uzsakymo_data` date DEFAULT NULL,
  `id_Įvykdytas_Uzsakymas` int(11) NOT NULL,
  `fk_Paskyraid_Paskyra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategorijos`
--

CREATE TABLE `kategorijos` (
  `pavadinimas` varchar(255) DEFAULT NULL,
  `aprasymas` varchar(255) DEFAULT NULL,
  `id_Kategorija` int(11) NOT NULL,
  `fk_Kategorijaid_Kategorija` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `krepseliai`
--

CREATE TABLE `krepseliai` (
  `kiekis` int(11) DEFAULT NULL,
  `suma` double DEFAULT NULL,
  `Nuolaidos_suma` double DEFAULT NULL,
  `id_Krepselis` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `krepselio_drabuziai`
--

CREATE TABLE `krepselio_drabuziai` (
  `fk_Krepšelisid_Krepšelis` int(11) NOT NULL,
  `fk_Drabuzisid_Drabuzis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lytis`
--

CREATE TABLE `lytis` (
  `id_Lytis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lytis`
--

INSERT INTO `lytis` (`id_Lytis`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `medziagos`
--

CREATE TABLE `medziagos` (
  `Medziaga` varchar(255) DEFAULT NULL,
  `id_Medziaga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medziagos_tipas`
--

CREATE TABLE `medziagos_tipas` (
  `id_Medziagos_tipas` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medziagos_tipas`
--

INSERT INTO `medziagos_tipas` (`id_Medziagos_tipas`, `name`) VALUES
(1, 'Vilna'),
(2, 'Linas'),
(3, 'Medvilnė'),
(4, 'Kita'),
(5, 'Poliesteris'),
(6, 'Kita_medziaga');

-- --------------------------------------------------------

--
-- Table structure for table `naudotojai`
--

CREATE TABLE `naudotojai` (
  `Vardas` varchar(255) DEFAULT NULL,
  `El_Pastas` varchar(255) DEFAULT NULL,
  `Pavarde` varchar(255) DEFAULT NULL,
  `telefono_numeris` varchar(255) DEFAULT NULL,
  `Adresas` varchar(255) DEFAULT NULL,
  `Gimimo_data` date DEFAULT NULL,
  `Slapyvardis` varchar(255) DEFAULT NULL,
  `Slaptazodis` varchar(255) DEFAULT NULL,
  `Registracijos_data` date DEFAULT NULL,
  `Paskutinio_prisijungimo_data` date DEFAULT NULL,
  `Paskyros_tipas` int(11) DEFAULT NULL,
  `id_Naudotojas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nuolaidu_kodai`
--

CREATE TABLE `nuolaidu_kodai` (
  `Kodas` varchar(255) DEFAULT NULL,
  `Nuolaidos_kiekis` double DEFAULT NULL,
  `Galiojimo_pradzia` datetime DEFAULT NULL,
  `Galiojimo_pabaiga` datetime DEFAULT NULL,
  `id_Nuolaidu_Kodai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paskyra`
--

CREATE TABLE `paskyra` (
  `Prisjungimo_vardas` varchar(255) DEFAULT NULL,
  `id_Paskyra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paskyros_tipas`
--

CREATE TABLE `paskyros_tipas` (
  `id_Paskyros_tipas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paskyros_tipas`
--

INSERT INTO `paskyros_tipas` (`id_Paskyros_tipas`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `spalva`
--

CREATE TABLE `spalva` (
  `id_Spalva` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spalva`
--

INSERT INTO `spalva` (`id_Spalva`, `name`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `spalvos`
--

CREATE TABLE `spalvos` (
  `Spalva` varchar(255) DEFAULT NULL,
  `id_Spalva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uzsakymai`
--

CREATE TABLE `uzsakymai` (
  `Uzsakymo_num` int(11) DEFAULT NULL,
  `suma` double DEFAULT NULL,
  `Vardas` varchar(255) DEFAULT NULL,
  `Pavarde` varchar(255) DEFAULT NULL,
  `Gatves_adresas` varchar(255) DEFAULT NULL,
  `Miestas` varchar(255) DEFAULT NULL,
  `Pasto_kodas` varchar(255) DEFAULT NULL,
  `Pristatymo_salis` varchar(255) DEFAULT NULL,
  `pristatymo_budas` varchar(255) DEFAULT NULL,
  `busena` varchar(255) DEFAULT NULL,
  `id_Uzsakymas` int(11) NOT NULL,
  `fk_Krepselisid_Krepselis` int(11) NOT NULL,
  `fk_Nuolaidų_Kodaiid_Nuolaidų_Kodai` int(11) DEFAULT NULL,
  `fk_Apmokejimasid_Apmokejimas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zinutes`
--

CREATE TABLE `zinutes` (
  `Siuntejo_id` varchar(255) DEFAULT NULL,
  `Gavejo_id` varchar(255) DEFAULT NULL,
  `Turinys` varchar(255) DEFAULT NULL,
  `Laikas` datetime DEFAULT NULL,
  `id_Zinute` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas` int(11) NOT NULL,
  `fk_Naudotojasid_Naudotojas1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apmokejimas`
--
ALTER TABLE `apmokejimas`
  ADD PRIMARY KEY (`id_Apmokejimas`),
  ADD UNIQUE KEY `fk_Uzsakymasid_Uzsakymas` (`fk_Uzsakymasid_Uzsakymas`),
  ADD KEY `Apmokejimo_budas` (`Apmokejimo_budas`),
  ADD KEY `moka` (`fk_Naudotojasid_Naudotojas`);

--
-- Indexes for table `apmokejimo_budas`
--
ALTER TABLE `apmokejimo_budas`
  ADD PRIMARY KEY (`id_Apmokejimo_budas`);

--
-- Indexes for table `drabuziai`
--
ALTER TABLE `drabuziai`
  ADD PRIMARY KEY (`id_Drabuzis`),
  ADD KEY `Lytis` (`Lytis`),
  ADD KEY `turi1` (`fk_Gamintojasid_Gamintojas`);

--
-- Indexes for table `drabuziu_dyziai`
--
ALTER TABLE `drabuziu_dyziai`
  ADD PRIMARY KEY (`fk_Drabuzisid_Drabuzis`,`fk_Dydisid_Dydis`);

--
-- Indexes for table `drabuziu_gamintojai`
--
ALTER TABLE `drabuziu_gamintojai`
  ADD PRIMARY KEY (`fk_Drabuzisid_Drabuzis`,`fk_Kategorijaid_Kategorija`);

--
-- Indexes for table `drabuziu_medziagos`
--
ALTER TABLE `drabuziu_medziagos`
  ADD PRIMARY KEY (`fk_Drabuzisid_Drabuzis`,`fk_Medziagaid_Medziaga`);

--
-- Indexes for table `dravuziu_spalvos`
--
ALTER TABLE `dravuziu_spalvos`
  ADD PRIMARY KEY (`fk_Drabuzisid_Drabuzis`,`fk_Spalvaid_Spalva`);

--
-- Indexes for table `dydis`
--
ALTER TABLE `dydis`
  ADD PRIMARY KEY (`id_Dydis`);

--
-- Indexes for table `dydziai`
--
ALTER TABLE `dydziai`
  ADD PRIMARY KEY (`id_Dydis`);

--
-- Indexes for table `gamintojai`
--
ALTER TABLE `gamintojai`
  ADD PRIMARY KEY (`id_Gamintojas`);

--
-- Indexes for table `ivykdytas_uzsakymas`
--
ALTER TABLE `ivykdytas_uzsakymas`
  ADD PRIMARY KEY (`id_Įvykdytas_Uzsakymas`),
  ADD KEY `turi2` (`fk_Paskyraid_Paskyra`);

--
-- Indexes for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD PRIMARY KEY (`id_Kategorija`),
  ADD KEY `turi8` (`fk_Kategorijaid_Kategorija`);

--
-- Indexes for table `krepseliai`
--
ALTER TABLE `krepseliai`
  ADD PRIMARY KEY (`id_Krepselis`),
  ADD UNIQUE KEY `fk_Naudotojasid_Naudotojas` (`fk_Naudotojasid_Naudotojas`);

--
-- Indexes for table `krepselio_drabuziai`
--
ALTER TABLE `krepselio_drabuziai`
  ADD PRIMARY KEY (`fk_Krepšelisid_Krepšelis`,`fk_Drabuzisid_Drabuzis`);

--
-- Indexes for table `lytis`
--
ALTER TABLE `lytis`
  ADD PRIMARY KEY (`id_Lytis`);

--
-- Indexes for table `medziagos`
--
ALTER TABLE `medziagos`
  ADD PRIMARY KEY (`id_Medziaga`);

--
-- Indexes for table `medziagos_tipas`
--
ALTER TABLE `medziagos_tipas`
  ADD PRIMARY KEY (`id_Medziagos_tipas`);

--
-- Indexes for table `naudotojai`
--
ALTER TABLE `naudotojai`
  ADD PRIMARY KEY (`id_Naudotojas`),
  ADD KEY `Paskyros_tipas` (`Paskyros_tipas`);

--
-- Indexes for table `nuolaidu_kodai`
--
ALTER TABLE `nuolaidu_kodai`
  ADD PRIMARY KEY (`id_Nuolaidu_Kodai`);

--
-- Indexes for table `paskyra`
--
ALTER TABLE `paskyra`
  ADD PRIMARY KEY (`id_Paskyra`);

--
-- Indexes for table `paskyros_tipas`
--
ALTER TABLE `paskyros_tipas`
  ADD PRIMARY KEY (`id_Paskyros_tipas`);

--
-- Indexes for table `spalva`
--
ALTER TABLE `spalva`
  ADD PRIMARY KEY (`id_Spalva`);

--
-- Indexes for table `spalvos`
--
ALTER TABLE `spalvos`
  ADD PRIMARY KEY (`id_Spalva`);

--
-- Indexes for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  ADD PRIMARY KEY (`id_Uzsakymas`),
  ADD UNIQUE KEY `fk_Krepselisid_Krepselis` (`fk_Krepselisid_Krepselis`),
  ADD UNIQUE KEY `fk_Apmokejimasid_Apmokejimas` (`fk_Apmokejimasid_Apmokejimas`),
  ADD KEY `pritaikomas` (`fk_Nuolaidų_Kodaiid_Nuolaidų_Kodai`);

--
-- Indexes for table `zinutes`
--
ALTER TABLE `zinutes`
  ADD PRIMARY KEY (`id_Zinute`),
  ADD KEY `siuncia` (`fk_Naudotojasid_Naudotojas`),
  ADD KEY `gauna` (`fk_Naudotojasid_Naudotojas1`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apmokejimas`
--
ALTER TABLE `apmokejimas`
  ADD CONSTRAINT `apmoka` FOREIGN KEY (`fk_Uzsakymasid_Uzsakymas`) REFERENCES `uzsakymai` (`id_Uzsakymas`),
  ADD CONSTRAINT `apmokejimas_ibfk_1` FOREIGN KEY (`Apmokejimo_budas`) REFERENCES `apmokejimo_budas` (`id_Apmokejimo_budas`),
  ADD CONSTRAINT `moka` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojai` (`id_Naudotojas`);

--
-- Constraints for table `drabuziai`
--
ALTER TABLE `drabuziai`
  ADD CONSTRAINT `drabuziai_ibfk_1` FOREIGN KEY (`Lytis`) REFERENCES `lytis` (`id_Lytis`),
  ADD CONSTRAINT `turi1` FOREIGN KEY (`fk_Gamintojasid_Gamintojas`) REFERENCES `gamintojai` (`id_Gamintojas`);

--
-- Constraints for table `drabuziu_dyziai`
--
ALTER TABLE `drabuziu_dyziai`
  ADD CONSTRAINT `turi6` FOREIGN KEY (`fk_Drabuzisid_Drabuzis`) REFERENCES `drabuziai` (`id_Drabuzis`);

--
-- Constraints for table `drabuziu_gamintojai`
--
ALTER TABLE `drabuziu_gamintojai`
  ADD CONSTRAINT `priklauso1` FOREIGN KEY (`fk_Drabuzisid_Drabuzis`) REFERENCES `drabuziai` (`id_Drabuzis`);

--
-- Constraints for table `drabuziu_medziagos`
--
ALTER TABLE `drabuziu_medziagos`
  ADD CONSTRAINT `turi3` FOREIGN KEY (`fk_Drabuzisid_Drabuzis`) REFERENCES `drabuziai` (`id_Drabuzis`);

--
-- Constraints for table `dravuziu_spalvos`
--
ALTER TABLE `dravuziu_spalvos`
  ADD CONSTRAINT `turi4` FOREIGN KEY (`fk_Drabuzisid_Drabuzis`) REFERENCES `drabuziai` (`id_Drabuzis`);

--
-- Constraints for table `ivykdytas_uzsakymas`
--
ALTER TABLE `ivykdytas_uzsakymas`
  ADD CONSTRAINT `turi2` FOREIGN KEY (`fk_Paskyraid_Paskyra`) REFERENCES `paskyra` (`id_Paskyra`);

--
-- Constraints for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD CONSTRAINT `turi8` FOREIGN KEY (`fk_Kategorijaid_Kategorija`) REFERENCES `kategorijos` (`id_Kategorija`);

--
-- Constraints for table `krepseliai`
--
ALTER TABLE `krepseliai`
  ADD CONSTRAINT `turi5` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojai` (`id_Naudotojas`);

--
-- Constraints for table `krepselio_drabuziai`
--
ALTER TABLE `krepselio_drabuziai`
  ADD CONSTRAINT `priklauso2` FOREIGN KEY (`fk_Krepšelisid_Krepšelis`) REFERENCES `krepseliai` (`id_Krepselis`);

--
-- Constraints for table `naudotojai`
--
ALTER TABLE `naudotojai`
  ADD CONSTRAINT `naudotojai_ibfk_1` FOREIGN KEY (`Paskyros_tipas`) REFERENCES `paskyros_tipas` (`id_Paskyros_tipas`);

--
-- Constraints for table `uzsakymai`
--
ALTER TABLE `uzsakymai`
  ADD CONSTRAINT `pritaikomas` FOREIGN KEY (`fk_Nuolaidų_Kodaiid_Nuolaidų_Kodai`) REFERENCES `nuolaidu_kodai` (`id_Nuolaidu_Kodai`),
  ADD CONSTRAINT `uzsakymai_ibfk_1` FOREIGN KEY (`fk_Krepselisid_Krepselis`) REFERENCES `krepseliai` (`id_Krepselis`);

--
-- Constraints for table `zinutes`
--
ALTER TABLE `zinutes`
  ADD CONSTRAINT `gauna` FOREIGN KEY (`fk_Naudotojasid_Naudotojas1`) REFERENCES `naudotojai` (`id_Naudotojas`),
  ADD CONSTRAINT `siuncia` FOREIGN KEY (`fk_Naudotojasid_Naudotojas`) REFERENCES `naudotojai` (`id_Naudotojas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
