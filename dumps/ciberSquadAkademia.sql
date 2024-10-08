-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-10-2024 a las 12:56:54
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
-- Base de datos: `ciberSquadAkademia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzaileak`
--

CREATE TABLE `erabiltzaileak` (
  `id` int(3) NOT NULL,
  `erabiltzaile_izena` varchar(40) NOT NULL,
  `ikasle_id` int(3) DEFAULT NULL,
  `ikasle_izena` varchar(25) DEFAULT NULL,
  `ikasle_abizena` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `administraria` int(1) DEFAULT NULL,
  `pasahitza` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `erabiltzaileak`
--

INSERT INTO `erabiltzaileak` (`id`, `erabiltzaile_izena`, `ikasle_id`, `ikasle_izena`, `ikasle_abizena`, `email`, `administraria`, `pasahitza`) VALUES
(1, 'admin', 1, 'admin', 'admin', 'admin@cibersquad.eus', 0, '$2a$12$T0y8VRWXiPqNpjbytZgjouCN8OrO29osFyw16IGDUnM0USSHPNaDe'),
(7, 'Julen', 8, 'Julen', 'Herrero', 'jh@uni.eus', 1, '$2y$10$9I2pvhJ4I13Dl1E4qvXS/.37HUxitmKfRV2X.XxgAQL0K1C03/eQm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erregistro_eskaerak`
--

CREATE TABLE `erregistro_eskaerak` (
  `id` int(3) NOT NULL,
  `ikasle_izena` varchar(50) NOT NULL,
  `ikasle_abizena` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `erabiltzaile_izena` varchar(40) NOT NULL,
  `pasahitza` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ikasleak`
--

CREATE TABLE `ikasleak` (
  `id` int(3) NOT NULL,
  `izena` varchar(25) NOT NULL,
  `abizena` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kurtso_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ikasleak`
--

INSERT INTO `ikasleak` (`id`, `izena`, `abizena`, `email`, `kurtso_id`) VALUES
(1, 'admin', 'admin', 'admin@cibersquad.eus', NULL),
(8, 'Julen', 'Herrero Garay', 'jh@cibersquad.eus', 'SSZ1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kurtsoak`
--

CREATE TABLE `kurtsoak` (
  `identifikatzailea` varchar(10) NOT NULL,
  `izena` varchar(40) NOT NULL,
  `ikasturtea` varchar(15) NOT NULL,
  `iraupena` varchar(15) NOT NULL,
  `ikasle_kopurua` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `kurtsoak`
--

INSERT INTO `kurtsoak` (`identifikatzailea`, `izena`, `ikasturtea`, `iraupena`, `ikasle_kopurua`) VALUES
('GZ1', 'Garatzaileentzako Ziberseguritatea', '2024-2025', '1 urte', 20),
('ISPT1', 'Ingeniaritza Soziala eta Phishing-a', '2024-2025', '2 hilabete', 10),
('KGK', 'Kriptografia eta Gakoen Kudeaketa', '2024-2025', '1 urte', 25),
('MGZ1', 'Mugikorretarako Gailuen Zibersegurtasuna', '2024-2025', '1 urte', 15),
('SAP1', 'Segurtasun Auditoria eta Pentesting', '2024-2025', '1 urte', 20),
('SGE1', 'Segurtasun Gertakarien Erantzuna', '2024-2025', '6 hilabete', 15),
('SSZ1', 'Sareen Zibersegurtasuna', '2024-2025', '6 hilabete', 10),
('WAS1', 'Web Aplikazioen Segurtasuna', '2024-2025', '3 hilabete', 15),
('ZA1', 'Zibersegurtasun Araudia', '2024-2025', '1 urte', 25),
('ZS1', 'Zibersegurtasunaren Sarrera', '2024-2025', '1 urte', 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ikasleak` (`ikasle_id`);

--
-- Indices de la tabla `erregistro_eskaerak`
--
ALTER TABLE `erregistro_eskaerak`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ikasleak`
--
ALTER TABLE `ikasleak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kurtsoak` (`kurtso_id`);

--
-- Indices de la tabla `kurtsoak`
--
ALTER TABLE `kurtsoak`
  ADD PRIMARY KEY (`identifikatzailea`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `erregistro_eskaerak`
--
ALTER TABLE `erregistro_eskaerak`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ikasleak`
--
ALTER TABLE `ikasleak`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  ADD CONSTRAINT `fk_ikasleak` FOREIGN KEY (`ikasle_id`) REFERENCES `ikasleak` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `ikasleak`
--
ALTER TABLE `ikasleak`
  ADD CONSTRAINT `fk_kurtsoak` FOREIGN KEY (`kurtso_id`) REFERENCES `kurtsoak` (`identifikatzailea`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
