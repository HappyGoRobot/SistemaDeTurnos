-- phpMyAdmin SQL Dump
-- version 5.2.2-dev+20230929.3b750c73b4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 12:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemadeturnos`
--

-- --------------------------------------------------------

--
-- Table structure for table `especialidad`
--

CREATE TABLE `especialidad` (
  `idespecialidad` int(11) NOT NULL,
  `especialidad` enum('Pediatría','Cardiología','Dermatología','Hematología') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `especialidad`
--

INSERT INTO `especialidad` (`idespecialidad`, `especialidad`) VALUES
(1, 'Pediatría'),
(2, 'Cardiología'),
(3, 'Dermatología'),
(4, 'Hematología');

-- --------------------------------------------------------

--
-- Table structure for table `medicos`
--

CREATE TABLE `medicos` (
  `idmedico` int(11) NOT NULL,
  `nombremedico` varchar(45) NOT NULL,
  `idespecialidad` int(11) NOT NULL,
  `telefonomedico` varchar(20) NOT NULL,
  `direccionmedico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicos`
--

INSERT INTO `medicos` (`idmedico`, `nombremedico`, `idespecialidad`, `telefonomedico`, `direccionmedico`) VALUES
(1, 'Hugo Morales', 1, '+54 264 111-1111', 'San Juan, Argentina'),
(2, 'Emma Gómez', 1, ' +54 264 222-2222', 'San Juan, Argentina'),
(3, 'Enrique Godoy', 2, '+54 264 333-3333', 'San Juan, Argentina'),
(4, 'Ulises Molina', 2, '+54 264 444-4444', 'San Juan, Argentina'),
(5, 'Anna Carrizo', 3, '+54 264 555-5555', 'San Juan, Argentina'),
(6, 'Lucía Chávez', 3, ' 54 264 666-6666', 'San Juan, Argentina'),
(7, 'Mariana Paz', 4, '+54 264 777-7777', 'San Juan, Argentina'),
(8, 'Manuel Vera', 4, '+54 264 888-8888', 'San Juan, Argentina');

-- --------------------------------------------------------

--
-- Table structure for table `obrasocial`
--

CREATE TABLE `obrasocial` (
  `idobrasocial` int(11) NOT NULL,
  `obrasocial` enum('DAMSU','Jerárquicos','Obra Social Provincia','OSECAC','OSTES','Sancor Salud') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obrasocial`
--

INSERT INTO `obrasocial` (`idobrasocial`, `obrasocial`) VALUES
(1, 'DAMSU'),
(2, 'Jerárquicos'),
(3, 'Obra Social Provincia'),
(4, 'OSECAC'),
(5, 'OSTES'),
(6, 'Sancor Salud');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `idpaciente` int(11) NOT NULL,
  `nombrepaciente` varchar(45) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `sexo` enum('M','F') NOT NULL,
  `dni` int(11) NOT NULL,
  `idobrasocial` int(11) NOT NULL,
  `direccionpaciente` text NOT NULL,
  `telefonopaciente` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`idpaciente`, `nombrepaciente`, `fechanacimiento`, `sexo`, `dni`, `idobrasocial`, `direccionpaciente`, `telefonopaciente`) VALUES
(1, 'Felipe Torres', '1984-10-31', 'M', 11111111, 1, 'San Juan, Argentina', '+54 264 222-2222'),
(2, 'Dante Rojas', '1990-07-12', 'M', 22222222, 3, 'San Juan, Argentina', ' 54 264 999-9999'),
(3, 'Nora Castro', '1996-08-07', 'F', 33333333, 6, 'San Juan, Argentina', '+54 264 123-4567'),
(5, 'Leticia Luna', '1992-11-24', 'F', 44444444, 3, 'San Juan, Argentina', '+54 264 876-5432');

-- --------------------------------------------------------

--
-- Table structure for table `turnos`
--

CREATE TABLE `turnos` (
  `idturno` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `diahora` varchar(45) NOT NULL,
  `idmedico` int(11) NOT NULL,
  `estado` enum('En Espera','Atendido','Cancelado','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `turnos`
--

INSERT INTO `turnos` (`idturno`, `dni`, `diahora`, `idmedico`, `estado`) VALUES
(1, 11111111, 'Jueves - 03:00 PM', 6, 'Cancelado'),
(2, 22222222, 'Lunes - 09:00 AM', 7, 'En Espera'),
(5, 33333333, 'Miércoles - 10:00 AM', 7, 'Atendido'),
(6, 44444444, 'Viernes - 01:00 PM', 8, 'En Espera');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idespecialidad`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`idmedico`),
  ADD KEY `idespecialidad` (`idespecialidad`);

--
-- Indexes for table `obrasocial`
--
ALTER TABLE `obrasocial`
  ADD PRIMARY KEY (`idobrasocial`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`idpaciente`),
  ADD KEY `idobrasocial` (`idobrasocial`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`idturno`),
  ADD KEY `medico` (`idmedico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idespecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicos`
--
ALTER TABLE `medicos`
  MODIFY `idmedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obrasocial`
--
ALTER TABLE `obrasocial`
  MODIFY `idobrasocial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `idturno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`idespecialidad`) REFERENCES `especialidad` (`idespecialidad`);

--
-- Constraints for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`idobrasocial`) REFERENCES `obrasocial` (`idobrasocial`);

--
-- Constraints for table `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`idmedico`) REFERENCES `medicos` (`idmedico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
