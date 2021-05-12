-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2021 a las 13:06:19
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

CREATE TABLE `bolsa` (
  `eurostotales` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas`
--

CREATE TABLE `deudas` (
  `iddeuda` int(11) NOT NULL,
  `motivo` varchar(50) NOT NULL,
  `eurosdeuda` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metalbins`
--

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
(3, '100ML', 'OCUPADO'),
(4, '150ML', 'DISPONIBLE'),
(5, '150ML', 'DISPONIBLE'),
(6, '150ML', 'DISPONIBLE'),
(7, '250ML', 'DISPONIBLE'),
(8, 'FROM MY HOUSE', 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

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

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `fechainicio` date NOT NULL,
  `dni` varchar(9) NOT NULL,
  `kilos` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `idmetal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

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
  MODIFY `iddeuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `idmovimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
