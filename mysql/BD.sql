-- CREATE TABLE datospersonales (
--     boleta VARCHAR(10) NOT NULL PRIMARY KEY,
--     correo VARCHAR(50) NOT NULL,
--     contrasena VARCHAR(50) NOT NULL,
--     nombre VARCHAR(30) NOT NULL,
--     apellido_paterno VARCHAR(30) NOT NULL,
--     apellido_materno VARCHAR(30) NOT NULL,
--     telefono VARCHAR(10) NOT NULL,
--     semestre VARCHAR(20) NOT NULL,
--     carrera VARCHAR(30) NOT NULL,
--     genero_tutor CHAR(1) NOT NULL
-- 
-- );
-- 
-- 
-- CREATE TABLE tutores (
--     tutor_id SERIAL PRIMARY KEY,
--     nombre VARCHAR(20) NOT NULL,
--     genero CHAR(1) NOT NULL
-- );
-- 
-- 
-- 
-- INSERT INTO datospersonales (boleta, correo, contrasena, nombre, apellido_paterno, apellido_materno, telefono, semestre, carrera, genero_tutor)
-- 	VALUES 
--     	(1, 'admin@ipn.mx', 'admin', 'admin', 'admin', 'admin', '1234567890', '0', 'admin', 'M')



-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2024 a las 18:29:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

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
  `genero_tutor` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`boleta`, `correo`, `contrasena`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `semestre`, `carrera`, `tutoria`, `genero_tutor`) VALUES
('1', 'admin@ipn.mx', '54321', 'admin', 'admin', 'admin', '1234567890', '0000000000', 'admin', 'nulo', 'M'),
('1111111111', 'Dam@ipn.mx', '12345', 'dam', 'fran', 'ray', '2222222222', 'Tercero', 'IIA', 'Pares', 'F'),
('1234241234', 'asdadsad@ipn.mx', 'awdadw', 'adwdwad', 'awddwadwa', 'adwdwaadw', '3242523532', 'Septimo', 'IIA', 'Individual', 'F'),
('1234324234', 'asdadasd@ipn.mx', 'asdasd', 'sdadasd', 'asdsadsad', 'sadsadasd', '2343242423', 'Sexto', 'IIA', 'Regularizacion', 'F'),
('2023630231', 'anna@ipn.mx', 'awdawdawd', 'Damm ', 'adwad ', 'adwda ', '5555555553', 'Cuarto', 'IIA', 'Pares', 'F'),
('2023630238', 'afrancor1900@alumno.ipn.mx', 'mypasswordxd', 'Angel Damián', 'Franco', 'Rayas', '5500000000', 'Cuarto', 'IIA', '', 'F'),
('2111212111', 'adsddassad@ipn.mx', 'AAAAAA', 'AAAA', 'AAAA', 'AAA', '1112223111', 'Tercero', 'LCD', 'Individual', ''),
('2134234231', 'sda@ipn.mx', 'asdadsads', 'asdsadass', 'sdad asd', 'dasdasd as', '1213131231', 'Sexto', 'LCD', 'Recuperacion', 'F'),
('2134234232', 'sda@ipn.mx', 'sadasdad', 'asdsadas', 'sdad ', 'dasdasd ', '1213131233', 'Sexto', 'LCD', 'Recuperacion', 'F'),
('2134234234', 'sda@ipn.mx', 'asdasda', 'asdsada', 'sdad', 'dasdasd', '1213131232', 'Noveno', 'LCD', 'Recuperacion', 'F'),
('2134343242', 'asdas@ipn.mx', 'dwad', 'dawdad', 'awdawdaw', 'wadwddwdwaw', '2343243242', 'Quinto', 'IIA', 'Regularizacion', 'F'),
('2342423426', 'Dam@ipn.mx', 'awdada', 'awd', 'adwd', 'awdawd', '2322345232', 'Tercero', 'LCD', 'Regularizacion', ''),
('2342423429', 'Dam@ipn.mx', 'dsgfsd', 'awdh', 'adw', 'awdaw', '2322345231', 'Tercero', 'IIA', 'Regularizacion', 'm'),
('2423432412', 'ads@ipn.mx', 'asdasdasd', 'dasdadwdsa', 'awdawdsda', 'awdawdwdsda', '1232432421', 'Tercero', 'LCD', 'Grupal', 'F'),
('2423432423', 'ads@ipn.mx', 'asdasd', 'dasdadw', 'awdawd', 'awdawdwd', '1232432423', 'Tercero', 'LCD', 'Grupal', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

CREATE TABLE `tutores` (
  `id_trabajador` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `genero` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`id_trabajador`, `nombre`, `genero`) VALUES
('2020080188', 'Patricia', 'F');

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
