-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 16-10-2022 a las 08:43:58
-- Versión del servidor: 10.8.2-MariaDB-1:10.8.2+maria~focal
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bezeroa`
--

CREATE TABLE `bezeroa` (
  `izenAbizen` varchar(50) NOT NULL,
  `NAN` varchar(10) DEFAULT NULL,
  `telefonoa` int(9) DEFAULT NULL,
  `jaiotzeData` date DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `pasahitza` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bezeroa`
--

INSERT INTO `bezeroa` (`izenAbizen`, `NAN`, `telefonoa`, `jaiotzeData`, `email`, `pasahitza`) VALUES
('admin', '12345678-Z', 123451234, '2002-12-12', 'galder@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gustoko`
--

CREATE TABLE `gustoko` (
  `bezeroIzen` varchar(128) NOT NULL,
  `jokoIzen` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jokoa`
--

CREATE TABLE `jokoa` (
  `izena` varchar(128) NOT NULL,
  `pegi` int(11) NOT NULL,
  `info` varchar(128) NOT NULL,
  `prezioa` varchar(128) NOT NULL,
  `jaurtiData` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jokoa`
--

INSERT INTO `jokoa` (`izena`, `pegi`, `info`, `prezioa`, `jaurtiData`) VALUES
('Bloodborne', 16, 'Un juego de terror muy weno', '69,99', '2015-06-06'),
('GTA V', 18, 'Un juegardo bien bueno bonito', '49,99', '2014-02-03'),
('Overwatch', 12, 'Juego de disparos e hijos de puta', '19,99', '2016-10-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bezeroa`
--
ALTER TABLE `bezeroa`
  ADD PRIMARY KEY (`izenAbizen`);

--
-- Indices de la tabla `gustoko`
--
ALTER TABLE `gustoko`
  ADD PRIMARY KEY (`bezeroIzen`,`jokoIzen`),
  ADD KEY `jokoIzen` (`jokoIzen`);

--
-- Indices de la tabla `jokoa`
--
ALTER TABLE `jokoa`
  ADD PRIMARY KEY (`izena`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gustoko`
--
ALTER TABLE `gustoko`
  ADD CONSTRAINT `gustoko_ibfk_1` FOREIGN KEY (`bezeroIzen`) REFERENCES `bezeroa` (`izenAbizen`),
  ADD CONSTRAINT `gustoko_ibfk_2` FOREIGN KEY (`jokoIzen`) REFERENCES `jokoa` (`izena`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
