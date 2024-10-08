-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-10-2024 a las 10:30:41
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
-- Base de datos: `ciberSquadDB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzaileak`
--

CREATE TABLE `erabiltzaileak` (
  `id` INT(3) NOT NULL AUTO_INCREMENT,
  `erabiltzaile_izena` VARCHAR(40) NOT NULL,
  `ikasle_id` INT(3) DEFAULT NULL,
  `ikasle_izena` VARCHAR(25) DEFAULT NULL,
  `ikasle_abizena` VARCHAR(30) DEFAULT NULL,
  `email` VARCHAR(50) DEFAULT NULL,
  `administraria` INT(1) DEFAULT NULL,
  `pasahitza` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ikasleak` (`ikasle_id`)  -- Solo una vez
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ikasleak`
--

CREATE TABLE `ikasleak` (
  `id` INT(3) NOT NULL AUTO_INCREMENT,
  `izena` VARCHAR(25) NOT NULL,
  `abizena` VARCHAR(30) NOT NULL,
  `email` VARCHAR(50) DEFAULT NULL,
  `kurtso_id` VARCHAR(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_kurtsoak` (`kurtso_id`)  -- Solo una vez
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kurtsoak`
--

CREATE TABLE `kurtsoak` (
  `identifikatzailea` VARCHAR(10) NOT NULL,
  `izena` VARCHAR(40) NOT NULL,
  `ikasturtea` VARCHAR(15) NOT NULL,
  `iraupena` VARCHAR(15) NOT NULL,
  `ikasle_kopurua` INT(3) DEFAULT NULL,
  PRIMARY KEY (`identifikatzailea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erregistro_eskaerak`
--

CREATE TABLE `erregistro_eskaerak` (
  `id` INT(3) NOT NULL AUTO_INCREMENT,
  `ikasle_izena` VARCHAR(50) NOT NULL,
  `ikasle_abizena` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `erabiltzaile_izena` VARCHAR(40) NOT NULL,
  `pasahitza` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`)
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
-- Indices para tablas volcadas
--

--
-- Indices de la tabla `erabiltzaileak`
--
-- Ya se ha creado el índice fk_ikasleak, no lo duplicamos.

--
-- Indices de la tabla `ikasleak`
--
-- Ya se ha creado el índice fk_kurtsoak, no lo duplicamos.

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  MODIFY `id` INT(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ikasleak`
--
ALTER TABLE `ikasleak`
  MODIFY `id` INT(3) NOT NULL AUTO_INCREMENT;

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
