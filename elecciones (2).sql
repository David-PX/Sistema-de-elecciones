-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2020 a las 12:16:50
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
  `Partido` int(11) DEFAULT NULL,
  `Puesto` int(11) DEFAULT NULL,
  `Foto` longblob DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('402-0332103-2', 'ROY', 'Willinson', 'roywillinson@gmail.com', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elecciones`
--

CREATE TABLE `elecciones` (
  `idElecciones` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Fecha_realizacion` timestamp NULL DEFAULT current_timestamp(),
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `elecciones`
--

INSERT INTO `elecciones` (`idElecciones`, `Nombre`, `Fecha_realizacion`, `Estado`) VALUES
(8, 'Eleccion 2020', '2020-08-11 09:49:38', 'Inactivo'),
(9, 'Eleccion de prueba', '2020-08-11 09:50:18', 'Inactivo'),
(10, 'Elecciones 2028', '2020-08-11 10:09:22', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `idPartidos` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Logo_Partido` longblob DEFAULT NULL,
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
-- Volcado de datos para la tabla `puesto_electivo`
--

INSERT INTO `puesto_electivo` (`idPuesto_Electivo`, `Nombre`, `Descripcion`, `Estado`) VALUES
(15, 'Presidente', 'Este es el cargo mas importante del mundo', 'Activo'),
(16, 'Alcalde', 'Este es otro cargo', 'Activo'),
(17, 'Senador', 'Este pertenece al senado', 'Activo'),
(18, 'Diputado', 'Somos diputados', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrovotos`
--

CREATE TABLE `registrovotos` (
  `idRegistro` int(11) NOT NULL,
  `cedulaVotante` varchar(30) NOT NULL,
  `nombreCandidato` varchar(30) NOT NULL,
  `puestoElectivo` varchar(20) DEFAULT NULL,
  `partido` varchar(10) DEFAULT NULL,
  `votos` int(11) DEFAULT NULL,
  `fechaCelebracion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registrovotos`
--

INSERT INTO `registrovotos` (`idRegistro`, `cedulaVotante`, `nombreCandidato`, `puestoElectivo`, `partido`, `votos`, `fechaCelebracion`) VALUES
(1, '402-0077109-1', 'ninguno', 'Presidente', 'ninguno', 1, '2020-08-11'),
(2, '402-0077109-1', 'ninguno', 'Alcalde', 'ninguno', 1, '2020-08-11'),
(3, '402-0077109-1', 'ninguno', 'Senador', 'ninguno', 1, '2020-08-11'),
(4, '402-0077109-1', 'ninguno', 'Diputado', 'ninguno', 1, '2020-08-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `idResultados` int(11) NOT NULL,
  `idElecciones` int(11) NOT NULL,
  `nombreCandidato` varchar(30) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `partido` varchar(30) NOT NULL,
  `totalVotos` int(11) NOT NULL
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
  ADD PRIMARY KEY (`idCandidatos`),
  ADD KEY `fk_partido` (`Partido`),
  ADD KEY `fk_puesto` (`Puesto`);

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
-- Indices de la tabla `registrovotos`
--
ALTER TABLE `registrovotos`
  ADD PRIMARY KEY (`idRegistro`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`idResultados`),
  ADD KEY `fk_id_eleccion` (`idElecciones`);

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
  MODIFY `idCandidatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `elecciones`
--
ALTER TABLE `elecciones`
  MODIFY `idElecciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `idPartidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `puesto_electivo`
--
ALTER TABLE `puesto_electivo`
  MODIFY `idPuesto_Electivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `registrovotos`
--
ALTER TABLE `registrovotos`
  MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `idResultados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `vista_candidato_partido` FOREIGN KEY (`Partido`) REFERENCES `partidos` (`idPartidos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vista_candidato_puesto` FOREIGN KEY (`Puesto`) REFERENCES `puesto_electivo` (`idPuesto_Electivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `vista_eleccion_resultado` FOREIGN KEY (`idElecciones`) REFERENCES `elecciones` (`idElecciones`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
