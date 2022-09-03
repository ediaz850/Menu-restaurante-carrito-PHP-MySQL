-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2022 a las 02:43:23
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `delicias_la_chitreana`
--
CREATE DATABASE IF NOT EXISTS `delicias_la_chitreana` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `delicias_la_chitreana`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `CLIENTE_ID` int(11) NOT NULL,
  `CLIENTE_NOMBRE` varchar(50) DEFAULT NULL,
  `CLIENTE_DIRECCION_ID` int(11) NOT NULL,
  `CLIENTE_SALDO` decimal(60,2) DEFAULT NULL,
  `CLIENTE_CREDITO` decimal(24,2) DEFAULT NULL,
  `CLIENTE_EDAD` int(11) DEFAULT NULL,
  `CLIENTE_SEXO` varchar(50) DEFAULT NULL,
  `CLIENTE_TELEFONO` bigint(20) DEFAULT NULL,
  `CLIENTE_CORREO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--


--
-- Estructura de tabla para la tabla `comida`
--

CREATE TABLE `comida` (
  `COMIDA_ID` int(11) NOT NULL,
  `COMIDA_DELIVERY` varchar(50) NOT NULL,
  `COMIDA_PROMOCION` varchar(255) NOT NULL,
  `COMIDA_NOMBRE` varchar(100) NOT NULL,
  `COMIDA_DESCRIPCION` varchar(255) NOT NULL,
  `COMIDA_PRECIO` decimal(20,2) NOT NULL,
  `COMIDA_IMAGEN` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `delivery`
--

CREATE TABLE `delivery` (
  `ID` int(11) NOT NULL,
  `DELIVERY` varchar(100) NOT NULL,
  `NUM_PEDIDO` int(11) NOT NULL,
  `OPERADOR` varchar(100) NOT NULL,
  `TELEFONO` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `DETALLE_VENTA_ID` int(11) NOT NULL,
  `ID_VENTA` int(11) NOT NULL,
  `COMIDA_ID` int(11) NOT NULL,
  `COMIDA_NOMBRE` varchar(255) NOT NULL,
  `PRECIO` decimal(20,2) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `DIRECCION_ID` int(11) NOT NULL,
  `DIRECCION_NUMERO_CALLE` varchar(255) DEFAULT NULL,
  `DIRECCION_COMUNA` varchar(50) DEFAULT NULL,
  `DIRECCION_CIUDAD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--


--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `PEDIDO_ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `DIRECCION` varchar(255) NOT NULL,
  `COMUNA` varchar(100) NOT NULL,
  `CALLE` varchar(200) NOT NULL,
  `VENTA_PEDIDO` int(11) NOT NULL,
  `TOTAL` decimal(20,2) NOT NULL,
  `FECHA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `VENTA_ID` int(11) NOT NULL,
  `FECHA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CLAVE_TRANSACCION` varchar(255) NOT NULL,
  `PAY_PAL_DATOS` text NOT NULL,
  `TOTAL` decimal(60,2) NOT NULL,
  `CLIENTE_VENTA_ID` int(11) NOT NULL,
  `ESTADO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`CLIENTE_ID`),
  ADD KEY `FK_CLIENTE_DIRECCION_1` (`CLIENTE_DIRECCION_ID`);

--
-- Indices de la tabla `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`COMIDA_ID`);

--
-- Indices de la tabla `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`DETALLE_VENTA_ID`),
  ADD KEY `ID_VENTA` (`ID_VENTA`),
  ADD KEY `COMIDA_ID` (`COMIDA_ID`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`DIRECCION_ID`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`PEDIDO_ID`),
  ADD KEY `VENTA_PEDIDO` (`VENTA_PEDIDO`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`VENTA_ID`),
  ADD KEY `FK_CLIENTE_VENTA_1` (`CLIENTE_VENTA_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `CLIENTE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `comida`
--
ALTER TABLE `comida`
  MODIFY `COMIDA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `delivery`
--
ALTER TABLE `delivery`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `DETALLE_VENTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `DIRECCION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `PEDIDO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `VENTA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `FK_CLIENTE_DIRECCION_1` FOREIGN KEY (`CLIENTE_DIRECCION_ID`) REFERENCES `direccion` (`DIRECCION_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`ID_VENTA`) REFERENCES `ventas` (`VENTA_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`COMIDA_ID`) REFERENCES `comida` (`COMIDA_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`VENTA_PEDIDO`) REFERENCES `ventas` (`VENTA_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `FK_CLIENTE_VENTA_1` FOREIGN KEY (`CLIENTE_VENTA_ID`) REFERENCES `clientes` (`CLIENTE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
