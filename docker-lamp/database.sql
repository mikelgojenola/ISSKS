-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 16-10-2022 a las 18:20:52
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
  `NAN` varchar(15) DEFAULT NULL,
  `telefonoa` int(9) DEFAULT NULL,
  `jaiotzeData` date DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `pasahitza` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `info` varchar(250) NOT NULL,
  `prezioa` varchar(128) NOT NULL,
  `jaurtiData` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jokoa`
--

INSERT INTO `jokoa` (`izena`, `pegi`, `info`, `prezioa`, `jaurtiData`) VALUES
('Bloodborne', 16, 'Bloodborne es un videojuego de rol de acción dirigido por Hidetaka Miyazaki, desarrollado por From Software y JapanStudio', '29,99', '2015-01-09'),
('GTA V', 18, 'Grand Theft Auto V es un videojuego de acción-aventura de mundo abierto desarrollado por el estudio Rockstar North y distribuido por Rockstar Games', '19,99', '2014-10-10'),
('Minecraft', 3, 'Minecraft es un videojuego de construcción de tipo «mundo abierto» o sandbox creado originalmente por el sueco Markus Persson, ​ y posteriormente desarrollado por Mojang Studios', '29,99', '2011-08-04'),
('Overwatch', 12, 'Overwatch es un juego de acción en equipo gratuito ambientado en un futuro optimista en el que todas las partidas presentan una refriega definitiva 5c5.', '12,99', '2015-12-23');

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
