-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 02:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning_center_flg`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
--

CREATE TABLE `actividades` (
  `actividadID` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `recurso` varchar(35) NOT NULL,
  `lugar` varchar(35) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(20) NOT NULL,
  `proposito` text NOT NULL,
  `participantes` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fotos` int(11) NOT NULL,
  `fiscalYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actividades`
--

INSERT INTO `actividades` (`actividadID`, `nombre`, `recurso`, `lugar`, `fecha`, `hora`, `proposito`, `participantes`, `tipo`, `fotos`, `fiscalYear`) VALUES
(1, 'Taller de Word', 'Leonardo Sotomayor', 'Biblioteca', '2020-10-15', '4:00pm', 'La actividad se hizo para que aprendan a usar la herramienta de word.', 15, 1, 0, 1),
(2, 'Prevension de Drogas', 'Leonardo Sotomayor', 'Biblioteca', '2020-09-21', '', 'Formentar el no uso de las drogas.', 0, 2, 0, 1),
(3, 'Busqueda de Documentos de', 'Leonardo Sotomayor', 'Biblioteca', '2020-10-29', '', 'rkjfldjfs', 0, 3, 0, 1),
(4, 'Movie Day', 'Leonardo Sotomayor', 'Biblioteca', '2020-10-30', '', 'bvjksdbfkjdsb.', 0, 4, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `participanteID` int(11) NOT NULL,
  `proposito` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `horaDeEntrada` time NOT NULL DEFAULT current_timestamp(),
  `horaDeSalida` time NOT NULL,
  `hojaAsistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asistencia`
--

INSERT INTO `asistencia` (`id`, `participanteID`, `proposito`, `edad`, `horaDeEntrada`, `horaDeSalida`, `hojaAsistencia`) VALUES
(1, 4, 3, 23, '00:00:00', '00:00:00', 1),
(2, 3, 4, 30, '00:00:00', '00:00:00', 1),
(3, 4, 1, 23, '15:30:00', '00:00:00', 4),
(4, 8, 5, 23, '19:14:39', '00:00:00', 3),
(5, 8, 5, 22, '20:36:00', '00:00:00', 5),
(6, 4, 3, 23, '00:00:00', '00:00:00', 5),
(7, 4, 4, 23, '15:16:33', '00:00:00', 6),
(8, 12, 4, 23, '15:17:16', '00:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `asistenciaactividad`
--

CREATE TABLE `asistenciaactividad` (
  `id` int(11) NOT NULL,
  `actividadID` int(11) NOT NULL,
  `participanteID` int(11) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asistenciaactividad`
--

INSERT INTO `asistenciaactividad` (`id`, `actividadID`, `participanteID`, `edad`) VALUES
(1, 1, 4, 23),
(2, 1, 3, 19),
(3, 1, 8, 20),
(4, 2, 8, 20),
(5, 4, 11, 20);

-- --------------------------------------------------------

--
-- Table structure for table `fiscalyear`
--

CREATE TABLE `fiscalyear` (
  `id` int(11) NOT NULL,
  `year` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fiscalyear`
--

INSERT INTO `fiscalyear` (`id`, `year`) VALUES
(1, '2020-2021'),
(2, '2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `fotosactividades`
--

CREATE TABLE `fotosactividades` (
  `id` int(5) NOT NULL,
  `actividad` int(5) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hojaasistencia`
--

CREATE TABLE `hojaasistencia` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fiscalYear` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hojaasistencia`
--

INSERT INTO `hojaasistencia` (`id`, `fecha`, `fiscalYear`) VALUES
(1, '2020-09-23', '1'),
(2, '2020-10-26', '1'),
(3, '2020-10-27', '1'),
(4, '2020-10-29', '1'),
(5, '2020-10-30', '1'),
(6, '2020-10-31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `participantes`
--

CREATE TABLE `participantes` (
  `participanteID` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `edificio` int(11) NOT NULL,
  `unidad` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `inscripcion` date NOT NULL DEFAULT current_timestamp(),
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participantes`
--

INSERT INTO `participantes` (`participanteID`, `nombre`, `apellidos`, `genero`, `edificio`, `unidad`, `birthday`, `inscripcion`, `activo`) VALUES
(3, 'Juan Antonio', 'Perez Cruz', 'M', 102, 27, '2001-12-31', '2020-10-26', 1),
(4, 'Kelmary', 'La Loca', 'F', 101, 10, '1997-03-13', '2020-10-27', 1),
(8, 'Hector Luis', 'Mata Putas', 'M', 105, 50, '1998-11-01', '2020-10-28', 1),
(11, 'Yonaro Astronauta', 'Mala Memoria', 'M', 103, 28, '1999-07-17', '2020-10-28', 1),
(12, 'Leo Libro', 'Del Cotto', 'M', 111, 100, '1997-03-06', '2020-10-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `propositos`
--

CREATE TABLE `propositos` (
  `id` int(11) NOT NULL,
  `proposito` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propositos`
--

INSERT INTO `propositos` (`id`, `proposito`) VALUES
(1, 'Asignacion'),
(2, 'Computadora'),
(3, 'Proyecto'),
(4, 'Re-Examen'),
(5, 'Resumé'),
(6, 'Tutorias'),
(7, 'Internet'),
(8, 'Copia');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `rolID` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`rolID`, `rol`) VALUES
(1, 'Bibliotecario'),
(2, 'Biblioteca');

-- --------------------------------------------------------

--
-- Table structure for table `tipoactividad`
--

CREATE TABLE `tipoactividad` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipoactividad`
--

INSERT INTO `tipoactividad` (`id`, `tipo`) VALUES
(1, 'Taller'),
(2, 'Charla'),
(3, 'Adiestramiento'),
(4, 'Otro');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `userID` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `rol` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`userID`, `nombre`, `apellidos`, `email`, `password`, `rol`, `activo`) VALUES
(1, 'Meleane', 'Arroyo Candelaria', 'meleane.arroyo@learningcenter.com', 'admi123', 1, 1),
(2, 'Learning Center', '', 'fluisgarcia@learningcenter.com', 'user123', 2, 1),
(3, 'Leonardo', 'Sotomayor Montalvo', 'leonardo.sotomayor@learningcenter.com', 'admi123', 1, 1),
(6, 'Hector Luis', 'Rivera Rosa', 'hector.rivera@learningcenter.com', 'admi123', 1, 1),
(7, 'Learning Center', '', 'pcatalina@learningcenter.com', 'user1', 2, 1),
(8, 'Jonathan', 'Rodriguez Pizarro', 'jonathan.rodriguez@learningcenter.com', 'admi123', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`actividadID`);

--
-- Indexes for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asistenciaactividad`
--
ALTER TABLE `asistenciaactividad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fiscalyear`
--
ALTER TABLE `fiscalyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fotosactividades`
--
ALTER TABLE `fotosactividades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hojaasistencia`
--
ALTER TABLE `hojaasistencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`participanteID`);

--
-- Indexes for table `propositos`
--
ALTER TABLE `propositos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rolID`);

--
-- Indexes for table `tipoactividad`
--
ALTER TABLE `tipoactividad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividades`
--
ALTER TABLE `actividades`
  MODIFY `actividadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `asistenciaactividad`
--
ALTER TABLE `asistenciaactividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fiscalyear`
--
ALTER TABLE `fiscalyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fotosactividades`
--
ALTER TABLE `fotosactividades`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hojaasistencia`
--
ALTER TABLE `hojaasistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `participantes`
--
ALTER TABLE `participantes`
  MODIFY `participanteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `propositos`
--
ALTER TABLE `propositos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `rolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipoactividad`
--
ALTER TABLE `tipoactividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
