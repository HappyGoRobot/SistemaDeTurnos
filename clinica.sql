-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2023 a las 20:17:23
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `ID_Medico` int(11) NOT NULL,
  `NombreCompleto` varchar(100) DEFAULT NULL,
  `EspecialidadMedica` varchar(50) DEFAULT NULL,
  `TelefonoContacto` varchar(15) DEFAULT NULL,
  `DireccionConsulta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `ID_Paciente` int(11) NOT NULL,
  `NombreCompleto` varchar(100) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Genero` varchar(10) DEFAULT NULL,
  `NumeroSeguroSocial` varchar(20) DEFAULT NULL,
  `DireccionPaciente` varchar(100) DEFAULT NULL,
  `TelefonoContacto` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `ID_Turno` int(11) NOT NULL,
  `ID_Medico` int(11) DEFAULT NULL,
  `ID_Paciente` int(11) DEFAULT NULL,
  `FechaHoraTurno` datetime DEFAULT NULL,
  `EstadoTurno` varchar(20) DEFAULT NULL,
  `Observaciones` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`ID_Medico`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`ID_Paciente`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`ID_Turno`),
  ADD KEY `ID_Medico` (`ID_Medico`),
  ADD KEY `ID_Paciente` (`ID_Paciente`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`ID_Medico`) REFERENCES `medicos` (`ID_Medico`),
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`ID_Paciente`) REFERENCES `pacientes` (`ID_Paciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
