-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: 136.145.29.193
-- Generation Time: Nov 22, 2020 at 03:07 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leosotmo_db`
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
  `promocion` text NOT NULL,
  `fotos` int(11) NOT NULL,
  `fiscalYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actividades`
--

INSERT INTO `actividades` (`actividadID`, `nombre`, `recurso`, `lugar`, `fecha`, `hora`, `proposito`, `participantes`, `tipo`, `promocion`, `fotos`, `fiscalYear`) VALUES
(1, 'Taller de Word', 'Leonardo Sotomayor', 'Biblioteca', '2020-10-15', '4:00pm', 'La actividad se hizo para que aprendan a usar la herramienta de word.', 15, 1, '', 0, 1),
(2, 'Prevencion de Drogas', 'Leonardo Sotomayor', 'Biblioteca', '2020-09-21', '', 'Formentar el no uso de las drogas.', 0, 2, '', 0, 1),
(3, 'Busqueda de Documentos de', 'Leonardo Sotomayor', 'Biblioteca', '2020-10-29', '', 'rkjfldjfs', 0, 3, '', 0, 1),
(4, 'Movie Day', 'Leonardo Sotomayor', 'Biblioteca', '2020-10-30', '', 'bvjksdbfkjdsb.', 0, 4, '', 0, 1),
(5, 'Taller de Excel', 'Leonardo Sotomayor', 'Biblioteca', '2020-11-04', '', 'Excel', 0, 1, 'promocion.pdf', 0, 0),
(14, 'Gaming Day', 'Leonardo Sotomayor', 'Biblioteca', '2020-11-07', '20:30', 'Jugar Videojuegos.', 0, 4, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `participanteID` int(11) NOT NULL,
  `proposito` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `horaDeEntrada` time DEFAULT NULL,
  `horaDeSalida` time NOT NULL,
  `hojaAsistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asistencia`
--

INSERT INTO `asistencia` (`id`, `participanteID`, `proposito`, `edad`, `horaDeEntrada`, `horaDeSalida`, `hojaAsistencia`) VALUES
(1, 2, 6, 16, '12:15:36', '13:05:10', 1),
(2, 44, 1, 45, '12:37:45', '13:37:45', 1),
(3, 16, 8, 12, '13:05:10', '13:47:22', 1),
(4, 9, 5, 15, '14:16:02', '15:16:02', 1),
(5, 45, 6, 41, '15:01:55', '15:55:55', 1),
(6, 38, 5, 60, '15:19:33', '16:19:33', 1),
(7, 19, 8, 13, '12:21:47', '13:21:47', 2),
(8, 46, 4, 26, '12:26:07', '13:26:07', 2),
(9, 47, 7, 33, '13:34:59', '14:34:59', 2),
(10, 8, 5, 20, '13:39:22', '14:39:22', 2),
(11, 40, 2, 44, '13:40:55', '14:40:55', 2),
(12, 20, 3, 12, '14:00:16', '15:00:16', 2),
(13, 32, 4, 17, '14:18:47', '15:18:47', 2),
(14, 56, 2, 41, '14:28:58', '15:28:58', 2),
(15, 57, 8, 46, '12:11:31', '13:11:31', 3),
(16, 19, 8, 13, '13:24:11', '14:24:11', 3),
(17, 3, 6, 21, '13:32:54', '14:32:54', 3),
(18, 24, 7, 17, '13:41:27', '14:41:27', 3),
(19, 51, 5, 50, '14:07:12', '15:07:12', 3),
(20, 36, 4, 44, '14:11:25', '15:11:25', 3),
(21, 42, 3, 27, '14:27:48', '15:27:48', 3),
(22, 42, 3, 27, '14:39:11', '15:39:11', 3),
(23, 10, 8, 20, '14:51:22', '15:51:22', 3),
(24, 39, 6, 52, '15:13:00', '16:13:00', 3),
(25, 16, 5, 12, '15:21:28', '16:21:28', 3),
(26, 33, 2, 16, '12:47:48', '13:47:48', 4),
(27, 39, 8, 52, '14:16:11', '15:16:11', 4),
(28, 39, 6, 52, '14:35:55', '15:35:55', 4),
(29, 14, 5, 17, '15:25:01', '16:25:01', 4),
(30, 20, 2, 22, '22:26:17', '23:32:20', 6);

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
(2, '2021-2022'),
(3, '2022-2023');

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
(1, '2020-11-02', '1'),
(2, '2020-11-03', '1'),
(3, '2020-11-04', '1'),
(4, '2020-11-05', '1'),
(5, '2020-11-06', '1'),
(6, '2020-11-21', '1');

-- --------------------------------------------------------

--
-- Table structure for table `participantes`
--

CREATE TABLE `participantes` (
  `participanteID` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `edificio` int(8) NOT NULL,
  `unidad` int(8) NOT NULL,
  `birthday` date NOT NULL,
  `inscripcion` date NOT NULL,
  `activo` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participantes`
--

INSERT INTO `participantes` (`participanteID`, `nombre`, `apellidos`, `genero`, `edificio`, `unidad`, `birthday`, `inscripcion`, `activo`) VALUES
(1, 'Maria', 'Vega Esteves', 'F', 109, 70, '2003-04-13', '2019-04-26', 1),
(2, 'Ana Maria', 'Aznar Chacon', 'F', 101, 16, '2004-09-15', '2020-05-13', 1),
(3, 'Fernand', 'Alcaraz Fernandez', 'M', 107, 68, '1999-01-07', '2020-09-08', 1),
(4, 'Maicol', 'Luque Diaz', 'M', 103, 1, '1998-10-27', '2020-05-04', 1),
(5, 'Pablo', 'Fernandez Garcia', 'M', 100, 21, '1998-12-29', '2019-08-20', 1),
(6, 'Irene', 'Jimenez Arias', 'F', 109, 75, '2004-06-10', '2019-09-28', 1),
(7, 'Anna', 'Perez Gomez', 'F', 108, 66, '2007-02-05', '2020-08-14', 1),
(8, 'Manuel', 'Robledo Fontan', 'M', 104, 90, '2000-02-03', '2020-05-21', 1),
(9, 'Maria Isabel', 'Garcia Alvarez', 'F', 110, 41, '2004-12-15', '2020-11-15', 1),
(10, 'Natalia', 'Pilar Rodriguez', 'F', 105, 92, '1999-12-29', '2019-08-08', 0),
(11, 'Mariana', 'Bravo Vicente', 'F', 108, 86, '2007-07-29', '2020-07-15', 1),
(12, 'David', 'Paz Rocha', 'M', 100, 25, '1997-01-16', '2020-03-05', 1),
(13, 'Adrian', 'Godoy Lopez', 'M', 100, 62, '1996-04-14', '2019-12-22', 1),
(14, 'Ramon', 'Garay Carretero', 'M', 103, 47, '2003-01-28', '2019-10-07', 1),
(15, 'Manuel', 'Ruiz Duran', 'M', 101, 84, '2002-06-16', '2019-12-01', 1),
(16, 'Kamila', 'Sanchez Abascal', 'F', 100, 14, '2008-09-12', '2019-10-08', 1),
(17, 'Andres', 'Duran Cordero', 'M', 110, 27, '1998-02-13', '2020-10-05', 1),
(18, 'Monica', 'Linares Vilar', 'F', 102, 63, '1995-10-09', '2019-03-24', 1),
(19, 'Juan Carlos', 'Berrios Rodriguez', 'M', 110, 56, '2007-03-02', '2019-03-22', 1),
(20, 'Valerie', 'Farre Navarro', 'F', 107, 32, '2008-04-08', '2020-04-20', 0),
(21, 'Maria Jose', 'Pardo Correa', 'F', 107, 39, '1996-08-26', '2020-02-25', 1),
(22, 'Jorge', 'Rodriguez Izquierdo', 'M', 103, 2, '1999-11-16', '2019-08-04', 1),
(23, 'Cataline', 'Salinas Gimenez', 'F', 109, 93, '2002-07-26', '2019-02-08', 1),
(24, 'Laura', 'Castillo Miguel', 'F', 102, 7, '2002-11-19', '2019-09-20', 1),
(25, 'Yandel Omar', 'Lozano Pedrosa', 'M', 111, 65, '2008-10-05', '2020-10-20', 1),
(26, 'Miguel Angel', 'Torres Segovia', 'M', 104, 48, '2006-02-02', '2019-07-06', 0),
(27, 'Ana Maria', 'Manzano Ribes', 'F', 100, 24, '1995-03-08', '2020-02-03', 1),
(28, 'Pedro', 'Lopez Vera', 'M', 111, 45, '1996-11-11', '2020-06-04', 1),
(29, 'Jose Manuel', 'Moral Pallares', 'M', 102, 76, '2005-09-10', '2020-04-17', 1),
(30, 'Maria', 'Perez Prada', 'F', 109, 34, '2001-09-22', '2020-04-22', 1),
(31, 'Emily', 'Collazo Sanchez', 'F', 107, 74, '2003-04-25', '2019-12-17', 1),
(32, 'Iriana', 'Trillo Rodriguez', 'F', 101, 13, '2002-12-17', '2019-03-09', 0),
(33, 'Ana', 'Bueno Andrade', 'F', 100, 88, '2004-09-14', '2019-12-26', 1),
(34, 'Maria Nieves', 'Gomez Carballo', 'F', 106, 58, '1999-02-05', '2019-09-07', 1),
(35, 'Laurie', 'Garcia Garcia', 'F', 104, 38, '2007-04-04', '2019-12-18', 1),
(36, 'Antonio', 'Mu~oz Tenorio', 'M', 110, 71, '1976-06-24', '2020-06-16', 1),
(37, 'Sergio', 'Martin Ruiz', 'M', 109, 81, '1993-11-12', '2020-12-20', 1),
(38, 'Angel', 'Ramon Miguelez', 'M', 109, 64, '1960-05-06', '2020-06-02', 1),
(39, 'Ana Belen', 'Sanchez Garcia', 'F', 100, 33, '1968-04-21', '2019-05-22', 0),
(40, 'Ana Maria', 'Julia Laguna', 'F', 104, 97, '1976-06-10', '2019-11-16', 1),
(41, 'Alberto', 'Ripoll Prieto', 'M', 105, 23, '1969-02-26', '2019-09-19', 1),
(42, 'Monica', 'Gonzalez Moreno', 'F', 104, 15, '1993-10-26', '2020-05-16', 1),
(43, 'Inmaculada', 'Panadero Gonzalez', 'F', 106, 12, '1977-06-13', '2019-02-02', 1),
(44, 'Manuel', 'Villa Wang', 'M', 100, 67, '1974-12-11', '2020-05-09', 1),
(45, 'Juan', 'Medina Morales', 'M', 109, 80, '1979-02-10', '2020-10-02', 1),
(46, 'Santiago', 'Delgado Torres', 'M', 111, 72, '1994-08-02', '2019-10-12', 1),
(47, 'David', 'Alvarez Nu~ez', 'M', 104, 99, '1987-08-27', '2020-11-11', 1),
(48, 'Patricia', 'Tello Lopez', 'F', 104, 43, '1977-02-17', '2019-01-01', 1),
(49, 'Beatriz', 'Martin Garcia', 'F', 107, 30, '1972-03-03', '2019-05-04', 1),
(50, 'Francisco', 'Fernandez Lopez', 'M', 110, 19, '1976-08-11', '2019-05-23', 1),
(51, 'Maria Dolores', 'Diaz Zhou', 'F', 106, 42, '1970-07-17', '2020-10-23', 1),
(52, 'Juan Carlos', 'Cortes Escobar', 'M', 110, 17, '1969-05-14', '2019-01-22', 1),
(53, 'Francisco', 'Sanchez Navarro', 'M', 104, 61, '1993-05-06', '2019-06-15', 1),
(54, 'Teresa', 'Quevedo Marques', 'F', 100, 20, '1963-08-20', '2020-01-28', 1),
(55, 'Carmen', 'Velasco Castellano', 'F', 100, 5, '1993-05-22', '2020-07-18', 1),
(56, 'Rosa Maria', 'Ruiz Diaz', 'F', 106, 89, '1979-03-12', '2020-12-16', 1),
(57, 'Mercedes', 'Ochoa Moreno', 'F', 107, 9, '1974-10-09', '2020-05-11', 0),
(58, 'Juan', 'Ramirez Gonzalez', 'M', 101, 4, '1979-04-10', '2019-10-16', 1),
(59, 'Manuel', 'Garcia Garzon', 'M', 111, 59, '1994-09-13', '2019-04-19', 1),
(60, 'Andres', 'Paredes Hernandez', 'M', 101, 10, '1971-06-06', '2020-03-18', 2),
(61, 'Wanda', 'Vazquez Garced', 'F', 107, 60, '1960-07-09', '2020-11-22', 1);

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
(5, 'Resume'),
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
  `usuario` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `rol` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`userID`, `nombre`, `apellidos`, `usuario`, `password`, `rol`, `activo`) VALUES
(1, 'Meleane', 'Arroyo Candelaria', 'meleane.arroyo', 'admi123', 1, 1),
(2, 'Learning Center', '', 'fluisgarcia', 'user', 2, 1),
(3, 'Leonardo', 'Sotomayor Montalvo', 'leonardo.sotomayor', 'admi1', 1, 1),
(6, 'Hector Luis', 'Rivera Rosa', 'hector.rivera', 'admi1', 1, 1),
(7, 'Learning Center', '', 'pcatalina', 'user1', 2, 1),
(8, 'Jonathan', 'Rodriguez Pizarro', 'jonathan.rodriguez', 'admi123', 1, 1),
(9, 'Angel', 'Santiago Perez', 'angel.perez', 'admin1', 1, 1),
(12, 'Juan', 'Del Town', 'juan.deltown1', 'admi1', 1, 1);

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
  MODIFY `actividadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `asistenciaactividad`
--
ALTER TABLE `asistenciaactividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fiscalyear`
--
ALTER TABLE `fiscalyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `participanteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
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
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
