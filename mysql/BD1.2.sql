-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 06:36:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `datospersonales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE `datospersonales` (
  `boleta` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_paterno` varchar(30) NOT NULL,
  `apellido_materno` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `semestre` varchar(20) NOT NULL,
  `carrera` varchar(30) NOT NULL,
  `tutoria` varchar(30) NOT NULL,
  `genero_tutor` char(1) NOT NULL,
  `tutor_asignado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`boleta`, `correo`, `contrasena`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `semestre`, `carrera`, `tutoria`, `genero_tutor`, `tutor_asignado`) VALUES
('1', 'admin@ipn.mx', '54321', 'admin', 'admin', 'admin', '1234567890', '0000000000', 'admin', 'nulo', 'M', NULL),
('1111111111', 'ola22@alumno.ipn.mx', '1111', 'a', 'a', 'a', '1233451122', 'Primero', 'ISC', 'Regularizacion', 'M', 'Iván Mosso García'),
('1111111112', 'ola@alumno.ipn.mx', '1111', 'z', 'z', 'z', '1233451122', 'Primero', 'ISC', 'Regularizacion', 'M', NULL),
('2023630323', 'zzzzzz@alumno.ipn.mx', '1111', 'asdasd', 'Melo', 'Jimenez', '1233451122', 'Primero', 'ISC', 'Grupal', 'F', 'Laura Méndez Segundo'),
('3333333333', 'jesus@alumno.ipn.mx', '1111', 'asda', 'Melo', 'Jimenez', '1233451122', 'Primero', 'ISC', 'Regularizacion', 'M', 'Iván Mosso García');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE `tutores` (
  `id_trabajador` varchar(10) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `genero` char(1) NOT NULL,
  `tipotutoria` varchar(50) DEFAULT NULL,
  `registros` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`id_trabajador`, `nombre`, `genero`, `tipotutoria`, `registros`) VALUES
('2020080188', 'Patricia Escamilla Miranda', 'F', 'Individual', 0),
('2020300100', 'Laura Méndez Segundo', 'F', 'Grupal', 1),
('2020300101', 'Martha Patricia Jiménez Villanueva', 'F', 'Recuperacion', 0),
('2020300102', 'Laura Muñoz Salazar', 'F', 'Regularizacion', 0),
('2020300103', 'Judith Margarita Tirado Lule', 'F', 'Pares', 0),
('2020300104', 'Karina Viveros Vela', 'F', 'Individual', 0),
('2020300105', 'Rocio Palacios Solano', 'F', 'Grupal', 0),
('2020300106', 'Claudia Díaz Huerta', 'F', 'Recuperacion', 0),
('2020300107', 'Elia Ramírez Martínez', 'F', 'Regularizacion', 0),
('2020300108', 'Gabriela López Ruiz', 'F', 'Pares', 0),
('2020300109', 'José Asunción Enríquez Zárate', 'M', 'Individual', 0),
('2020300110', 'Alberto Jesús Alcántara Méndez', 'M', 'Grupal', 0),
('2020300111', 'Felipe de Jesús Figueroa del Prado', 'M', 'Recuperacion', 0),
('2020300112', 'Erick Linares Vallejo', 'M', 'Regularizacion', 0),
('2020300113', 'Edgar Armando Catalán', 'M', 'Pares', 0),
('2020300114', 'Jorge Cortés Galicia', 'M', 'Individual', 0),
('2020300115', 'Edgardo Franco Martínez', 'M', 'Grupal', 0),
('2020300116', 'Vicente García Sales', 'M', 'Recuperacion', 0),
('2020300117', 'Iván Mosso García', 'M', 'Regularizacion', 2),
('2020300118', 'Miguel Ángel Rodríguez', 'M', 'Pares', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD PRIMARY KEY (`boleta`);

--
-- Indices de la tabla `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`id_trabajador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
