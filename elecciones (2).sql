-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2020 a las 01:33:32
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `elecciones`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_por_cedula` (IN `_cedula` VARCHAR(30))  BEGIN

select * from ciudadanos where cedula = _cedula;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `usuario`, `contraseña`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `idCandidatos` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Partido` varchar(45) DEFAULT NULL,
  `Puesto` varchar(45) DEFAULT NULL,
  `Foto` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`idCandidatos`, `Nombre`, `Apellido`, `Partido`, `Puesto`, `Foto`, `Estado`) VALUES
(1, 'Leonel', 'Fernandez', 'Fuerza del pueblo', 'Presidente', NULL, 'Activo'),
(3, 'Luis', 'Abinador', '0', 'Presidente', NULL, 'on'),
(4, 'Gonzalo', 'Castillo', '0', 'Presidente', NULL, 'on'),
(5, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(6, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(7, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(8, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(9, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(10, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(11, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(12, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(13, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(14, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(15, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(16, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(17, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(18, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(19, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(20, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(21, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(22, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on'),
(23, 'Gonzalo', 'Castillo', '0', 'Presidente', '????\0JFIF\0\0\0d\0d\0\0??\0Ducky\0\0\0\0\0P\0\0??\0&Ad', 'on');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadanos`
--

CREATE TABLE `ciudadanos` (
  `Cedula` varchar(45) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudadanos`
--

INSERT INTO `ciudadanos` (`Cedula`, `Nombre`, `Apellido`, `Email`, `Estado`) VALUES
('402-0077109-1', 'David', 'Solano', 'david@gmail.com', 'Activo'),
('402-0332103-2', 'Roy', 'Willinson', 'roy@gmail.com', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elecciones`
--

CREATE TABLE `elecciones` (
  `idElecciones` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Fecha_realizacion` datetime DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `idPartidos` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Logo_Partido` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto_electivo`
--

CREATE TABLE `puesto_electivo` (
  `idPuesto_Electivo` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`idCandidatos`);

--
-- Indices de la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD PRIMARY KEY (`Cedula`);

--
-- Indices de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  ADD PRIMARY KEY (`idElecciones`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`idPartidos`);

--
-- Indices de la tabla `puesto_electivo`
--
ALTER TABLE `puesto_electivo`
  ADD PRIMARY KEY (`idPuesto_Electivo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `idCandidatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  MODIFY `idElecciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `idPartidos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puesto_electivo`
--
ALTER TABLE `puesto_electivo`
  MODIFY `idPuesto_Electivo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
