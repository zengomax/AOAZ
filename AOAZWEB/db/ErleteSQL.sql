-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2021 a las 09:17:09
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `erlete`
--
CREATE DATABASE IF NOT EXISTS `erlete` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `erlete`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bolsa`
--

DROP TABLE IF EXISTS `bolsa`;
CREATE TABLE `bolsa` (
  `eurostotales` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bolsa`
--

INSERT INTO `bolsa` (`eurostotales`) VALUES
(200033);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `calendario`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `calendario`;
CREATE TABLE `calendario` (
`id` int(11)
,`title` varchar(94)
,`start` date
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas`
--

DROP TABLE IF EXISTS `deudas`;
CREATE TABLE `deudas` (
  `iddeuda` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `eurosdeuda` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deudas`
--

INSERT INTO `deudas` (`iddeuda`, `motivo`, `eurosdeuda`, `dni`) VALUES
(1, 'REGISTRATION: 12345678M', 30, '12345678M'),
(2, 'REGISTRATION: 12345678T', 30, '12345678T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE `inventario` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idproducto`, `nombre`, `cantidad`) VALUES
(1, 'JAR OF HONEY', 7990);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metalbins`
--

DROP TABLE IF EXISTS `metalbins`;
CREATE TABLE `metalbins` (
  `idmetal` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metalbins`
--

INSERT INTO `metalbins` (`idmetal`, `tipo`, `estado`) VALUES
(1, '100ML', 'DISPONIBLE'),
(2, '100ML', 'DISPONIBLE'),
(3, '100ML', 'DISPONIBLE'),
(4, '150ML', 'DISPONIBLE'),
(5, '150ML', 'DISPONIBLE'),
(6, '150ML', 'DISPONIBLE'),
(7, '250ML', 'DISPONIBLE'),
(8, 'MY OWN', 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
CREATE TABLE `movimiento` (
  `idmovimiento` int(11) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `fecha` date NOT NULL,
  `euros` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `fechainicio` date NOT NULL,
  `dni` varchar(9) NOT NULL,
  `kilos` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `idmetal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `reserva`
--
DROP TRIGGER IF EXISTS `restar_jarras`;
DELIMITER $$
CREATE TRIGGER `restar_jarras` AFTER UPDATE ON `reserva` FOR EACH ROW BEGIN
UPDATE inventario
SET inventario.cantidad=inventario.cantidad-new.kilos WHERE inventario.idproducto=1;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nacimiento` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `imagen` varchar(300) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `nacimiento`, `email`, `password`, `rol`, `imagen`, `estado`) VALUES
('12345678M', 'admin', 'admin', '1981-05-19', 'admin@admin.com', '$2y$10$QHj2yERZVQnoVc07j0esBOBWVOw8.mNZOltLOWMnJGC9D4tNl6XpC', 'admin', 'img/SeÃ±orX.jpg', 'ACTIVO'),
('12345678T', 'asier', 'asier', '1988-05-20', 'asier@asier.com', '$2y$10$EfsTe1BilvzrNmGhgcCVzu/mUoGPm.wEpP/agl9CH2AFhIw5dF2OS', 'usuario', 'img/fotoperfil.png', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura para la vista `calendario`
--
DROP TABLE IF EXISTS `calendario`;

DROP VIEW IF EXISTS `calendario`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `calendario`  AS SELECT `reserva`.`idreserva` AS `id`, ucase(concat(`usuario`.`nombre`,' ',`usuario`.`apellido`,' | ',`metalbins`.`tipo`)) AS `title`, `reserva`.`fechainicio` AS `start` FROM ((`reserva` join `usuario` on(`reserva`.`dni` = `usuario`.`dni`)) join `metalbins` on(`reserva`.`idmetal` = `metalbins`.`idmetal`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bolsa`
--
ALTER TABLE `bolsa`
  ADD PRIMARY KEY (`eurostotales`);

--
-- Indices de la tabla `deudas`
--
ALTER TABLE `deudas`
  ADD PRIMARY KEY (`iddeuda`),
  ADD KEY `fk_id` (`dni`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `metalbins`
--
ALTER TABLE `metalbins`
  ADD PRIMARY KEY (`idmetal`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`idmovimiento`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `fk_reservadni` (`dni`),
  ADD KEY `idmetal` (`idmetal`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deudas`
--
ALTER TABLE `deudas`
  MODIFY `iddeuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `idmovimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `deudas`
--
ALTER TABLE `deudas`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reservadni` FOREIGN KEY (`dni`) REFERENCES `usuario` (`dni`),
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idmetal`) REFERENCES `metalbins` (`idmetal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
