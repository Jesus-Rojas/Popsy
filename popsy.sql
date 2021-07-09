-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-12-2020 a las 01:29:52
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `popsy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `precio` int(11) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `precio`, `estado`) VALUES
(1, 'Tradicionales', 3000, 'activo'),
(2, 'Nuevos', 1500, 'activo'),
(5, 'asdasd', 13, 'inactivo'),
(6, 'asdas', 1231242, 'inactivo'),
(7, 'asdsad', 4124, 'inactivo'),
(8, 'asassa', 14124, 'inactivo'),
(9, '231312123', 132132123, 'inactivo'),
(10, '12323', 132123, 'inactivo'),
(11, '21313213', 132123132, 'inactivo'),
(12, '12332', 132132, 'inactivo'),
(13, '123132321', 312312132, 'inactivo'),
(14, '14214', 1241, 'inactivo'),
(15, 'asdsa', 124, 'inactivo'),
(16, 'dsaad', 14214, 'inactivo'),
(17, '124124', 124124, 'inactivo'),
(18, '14124124', 124124, 'inactivo'),
(19, '123123', 123123, 'inactivo'),
(20, '1232123', 123213123, 'inactivo'),
(21, '1224', 124212, 'inactivo'),
(22, '12442', 14224142, 'inactivo'),
(23, 'a', 123, 'inactivo'),
(24, 'asdssss', 12, 'inactivo'),
(25, 'asd', 1223, 'inactivo'),
(26, 'prueba', 1200, 'inactivo'),
(27, 'mitchel', 12222, 'inactivo'),
(28, 'dasdsad', 32323, 'inactivo'),
(29, 'Navidad', 5000, 'inactivo'),
(30, 'navidad', 5000, 'inactivo'),
(31, 'Temporada', 5000, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `identificacion` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `puntos` int(11) DEFAULT NULL,
  `estado` enum('activo','inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `identificacion`, `nombre`, `apellido`, `puntos`, `estado`) VALUES
(1, '1003804256', 'jesus', 'rojas', 12, 'activo'),
(3, '12', 'daniel', 'rojas', 191, 'activo'),
(5, '122', 'jessica', 'carvajal', 1020, 'activo'),
(6, '131412', 'Ariel', 'Gonzales', 0, 'activo'),
(7, '1314122', 'Maicol', 'Romero', 0, 'activo'),
(8, '13141222', 'adssa', 'asdas', 6, 'activo'),
(9, '12223', 'assslll', 'lll', 0, 'activo'),
(10, '9999', 'sadsa sss', 'sss', 0, 'activo'),
(11, '888', 'aaaa', 'bbbb', 0, 'activo'),
(12, '777', 'hjg', 'jhgj', 0, 'activo'),
(13, '666', 'fghg', 'hhh', 0, 'activo'),
(14, '555', 'asaa', 'aaaa', 0, 'activo'),
(15, '11111', 'asss', 'ttye', 0, 'activo'),
(16, '12422', 'asda', 'dsadss', 0, 'activo'),
(17, '16636', 'dddd', 'sss', 0, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_sabor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `identificacion` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `rol` enum('Administrador','Empleado') NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `identificacion`, `nombre`, `apellido`, `rol`, `usuario`, `clave`, `estado`) VALUES
(1, '123', 'jesus', 'rojas', 'Administrador', 'root', 'root', 'activo'),
(2, '4', 'Karen', 'Sanchez', 'Empleado', 'karen', '123', 'activo'),
(3, '6', 'Oscar', 'Jaramillo', 'Empleado', 'oscar', '1111', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id_ingrediente` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`id_ingrediente`, `nombre`, `estado`) VALUES
(1, 'mantequilla', 'activo'),
(2, 'chocolate', 'activo'),
(3, 'nata', 'activo'),
(4, 'frutas', 'activo'),
(5, 'asddd', 'inactivo'),
(6, 'ssssasd', 'inactivo'),
(7, 'hfkhfhf', 'inactivo'),
(8, 'fadsfasf', 'inactivo'),
(9, 'leche', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sabor`
--

CREATE TABLE `sabor` (
  `id_sabor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sabor`
--

INSERT INTO `sabor` (`id_sabor`, `id_categoria`, `nombre`, `imagen`, `cantidad`, `estado`) VALUES
(1, 1, 'asdsa', '', 0, 'inactivo'),
(2, 1, 'ssss', '../img/Tradicionales/', 0, 'inactivo'),
(3, 1, 'asdsa', '', 0, 'inactivo'),
(4, 1, 'asdsa', '../img/Tradicionales/', 0, 'inactivo'),
(5, 1, 'asdsa', '../img/Tradicionales/', 0, 'inactivo'),
(6, 1, 'asdsa', '../img/Tradicionales/', 0, 'inactivo'),
(7, 1, 'asdsa', '../img/Tradicionales/', 0, 'inactivo'),
(8, 1, 'asdsa', '../img/Tradicionales/', 0, 'inactivo'),
(9, 1, 'asdsa', '../img/Tradicionales/', 0, 'inactivo'),
(10, 2, 'dddddd', '../img/Nuevos/', 0, 'inactivo'),
(11, 1, 'asdsa', '../img/Tradicionales/', 0, 'inactivo'),
(12, 1, 'asdsa', '../img/Tradicionales/', 0, 'inactivo'),
(13, 1, 'asdsa', '../img/Tradicionales/', 0, 'inactivo'),
(14, 1, 'asd', '../img/Tradicionales/', 0, 'inactivo'),
(15, 2, 'asdas', '../img/Nuevos/', 0, 'inactivo'),
(16, 2, 'asd', '../img/Nuevos/', 0, 'inactivo'),
(17, 1, 'asdsa', '../img/Tradicionales/', 0, 'inactivo'),
(18, 1, 'asdsa', '../img/Tradicionales/asdsa.jpeg', 0, 'inactivo'),
(19, 1, 'asdsa', '../img/Tradicionales/asdsa.png', 0, 'inactivo'),
(20, 1, 'asd', '../img/Tradicionales/asd.jpeg', 0, 'inactivo'),
(21, 26, '123444', '../img/prueba/123444.jpeg', 0, 'inactivo'),
(22, 2, 'sss', '../img/Nuevos/sss.png', 0, 'inactivo'),
(23, 25, 'asdsa', '../img/asd/asdsa.png', 0, 'inactivo'),
(24, 25, 'ssss', '../img/asd/ssss.png', 0, 'inactivo'),
(25, 1, 'asd', '../img/Tradicionales/asd.jpeg', 0, 'inactivo'),
(26, 1, 'asd', '../img/Tradicionales/asd.png', 0, 'inactivo'),
(27, 1, 'asdsa', '../img/Tradicionales/asdsa.png', 0, 'inactivo'),
(28, 2, 'asd', '../img/Nuevos/asd.jpeg', 0, 'inactivo'),
(29, 1, '9999', '../img/Tradicionales/9999.jpeg', 5, 'inactivo'),
(30, 27, 'uurturtrur', '../img/mitchel/uurturtrur.png', 8, 'inactivo'),
(31, 1, 'blue', '../img/Tradicionales/blue.png', 10, 'activo'),
(32, 1, 'orange', '../img/Tradicionales/orange.png', 10, 'activo'),
(33, 1, 'red', '../img/Tradicionales/red.png', 10, 'activo'),
(34, 1, 'brown', '../img/Tradicionales/brown.png', 10, 'activo'),
(35, 1, 'green', '../img/Tradicionales/green.png', 10, 'activo'),
(36, 2, 'orange-white', '../img/Nuevos/orange-white.png', 10, 'activo'),
(37, 2, 'purple', '../img/Nuevos/purple.png', 10, 'activo'),
(38, 2, 'pink', '../img/Nuevos/pink.png', 10, 'activo'),
(39, 2, 'yellow', '../img/Nuevos/yellow.png', 10, 'activo'),
(40, 2, 'pink-white', '../img/Nuevos/pink-white.jpeg', 10, 'inactivo'),
(41, 2, 'asd', '../img/Nuevos/asd.jpeg', 1, 'inactivo'),
(42, 1, 'asdsa', '../img/Tradicionales/asdsa.jpeg', 1, 'inactivo'),
(43, 28, 'asdsa', '../img/dasdsad/asdsa.jpeg', 1, 'inactivo'),
(44, 1, 'helado', '../img/navidad/helado.jpeg', 56, 'inactivo'),
(45, 31, 'ugguogo', '../img/Nuevos/ugguogo.jpeg', 1, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sabor_ingrediente`
--

CREATE TABLE `sabor_ingrediente` (
  `id_sabor_ingrediente` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `id_sabor` int(11) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sabor_ingrediente`
--

INSERT INTO `sabor_ingrediente` (`id_sabor_ingrediente`, `id_ingrediente`, `id_sabor`, `estado`) VALUES
(1, 1, 12, 'inactivo'),
(2, 2, 12, 'inactivo'),
(3, 1, 13, 'inactivo'),
(4, 2, 13, 'inactivo'),
(5, 3, 13, 'inactivo'),
(6, 1, 14, 'inactivo'),
(7, 2, 14, 'inactivo'),
(8, 3, 14, 'inactivo'),
(9, 1, 15, 'inactivo'),
(10, 1, 16, 'inactivo'),
(11, 2, 16, 'inactivo'),
(12, 1, 17, 'inactivo'),
(13, 2, 17, 'inactivo'),
(14, 1, 18, 'inactivo'),
(15, 1, 19, 'inactivo'),
(16, 2, 19, 'inactivo'),
(17, 2, 20, 'inactivo'),
(18, 4, 20, 'inactivo'),
(19, 1, 21, 'inactivo'),
(20, 2, 21, 'inactivo'),
(21, 1, 22, 'inactivo'),
(22, 2, 22, 'inactivo'),
(23, 1, 23, 'inactivo'),
(24, 4, 23, 'inactivo'),
(25, 2, 24, 'inactivo'),
(26, 4, 24, 'inactivo'),
(27, 1, 27, 'inactivo'),
(28, 2, 27, 'inactivo'),
(29, 3, 27, 'inactivo'),
(30, 4, 27, 'inactivo'),
(31, 2, 28, 'inactivo'),
(32, 4, 28, 'inactivo'),
(33, 3, 21, 'inactivo'),
(34, 4, 21, 'inactivo'),
(35, 1, 20, 'inactivo'),
(36, 1, 29, 'inactivo'),
(37, 2, 29, 'inactivo'),
(38, 2, 30, 'inactivo'),
(39, 8, 30, 'inactivo'),
(40, 1, 31, 'activo'),
(41, 3, 31, 'activo'),
(42, 1, 32, 'activo'),
(43, 3, 32, 'activo'),
(44, 4, 32, 'activo'),
(45, 1, 33, 'activo'),
(46, 3, 33, 'activo'),
(47, 4, 33, 'activo'),
(48, 1, 34, 'activo'),
(49, 2, 34, 'activo'),
(50, 1, 35, 'activo'),
(51, 4, 35, 'activo'),
(52, 1, 36, 'activo'),
(53, 3, 36, 'activo'),
(54, 4, 36, 'activo'),
(55, 1, 37, 'activo'),
(56, 3, 37, 'activo'),
(57, 1, 38, 'activo'),
(58, 3, 38, 'activo'),
(59, 1, 39, 'activo'),
(60, 3, 39, 'activo'),
(61, 4, 39, 'activo'),
(62, 1, 40, 'inactivo'),
(63, 3, 40, 'inactivo'),
(64, 4, 40, 'inactivo'),
(65, 1, 41, 'inactivo'),
(66, 1, 42, 'inactivo'),
(67, 1, 43, 'inactivo'),
(68, 2, 43, 'inactivo'),
(69, 4, 43, 'inactivo'),
(70, 3, 44, 'inactivo'),
(71, 4, 44, 'inactivo'),
(72, 9, 44, 'inactivo'),
(73, 1, 45, 'activo'),
(74, 2, 45, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `texto` text NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `id_empleado`, `texto`, `estado`) VALUES
(1, 1, 'asdsa', 'inactivo'),
(2, 1, 'ggkjfflsss', 'inactivo'),
(3, 1, 'Se creo un nuevo producto', 'activo'),
(4, 1, 'holaaa', 'inactivo'),
(5, 2, 'hola222', 'inactivo'),
(6, 1, 'asdfdsafadsf', 'inactivo'),
(7, 1, 'adsfasf', 'inactivo'),
(8, 1, 'adsfasfsad', 'inactivo'),
(9, 1, 'dsafadsf', 'inactivo'),
(10, 1, 'sadfadsf', 'inactivo'),
(11, 1, 'fdfsadf', 'inactivo'),
(12, 1, 'sdafadsf', 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_empleado`, `id_cliente`, `fecha`, `total`, `estado`) VALUES
(1, 1, 5, '2020-11-21 00:00:00', 0, 'activo'),
(2, 1, 7, '2020-11-21 00:00:00', 0, 'activo'),
(3, 1, 3, '2020-11-21 00:00:00', 0, 'activo'),
(4, 1, 3, '2020-11-22 08:41:52', 0, 'activo'),
(5, 1, 3, '2020-11-22 08:44:41', 0, 'activo'),
(6, 1, 3, '2020-11-22 08:46:19', 0, 'activo'),
(7, 1, 3, '2020-11-22 08:48:57', 0, 'activo'),
(8, 1, 3, '2020-11-22 08:49:46', 0, 'activo'),
(9, 1, 3, '2020-11-22 08:53:06', 0, 'activo'),
(10, 1, 3, '2020-11-22 08:54:00', 0, 'activo'),
(11, 1, 15, '2020-11-22 08:55:07', 0, 'activo'),
(12, 1, 3, '2020-11-22 08:55:26', 0, 'activo'),
(13, 1, 3, '2020-11-22 09:09:37', 0, 'activo'),
(14, 1, 3, '2020-11-22 09:11:05', 0, 'activo'),
(15, 1, 3, '2020-11-22 09:12:01', 0, 'activo'),
(16, 1, 3, '2020-11-22 09:17:09', 0, 'activo'),
(17, 1, 3, '2020-11-22 09:17:18', 0, 'activo'),
(18, 1, 3, '2020-11-22 09:18:06', 0, 'activo'),
(19, 1, 3, '2020-11-22 09:18:13', 0, 'activo'),
(20, 1, 3, '2020-11-22 09:18:38', 0, 'activo'),
(21, 1, 3, '2020-11-22 09:19:37', 0, 'activo'),
(22, 1, 3, '2020-11-22 09:20:00', 0, 'activo'),
(23, 1, 3, '2020-11-22 09:21:12', 0, 'activo'),
(24, 1, 3, '2020-11-22 09:21:55', 0, 'activo'),
(25, 1, 3, '2020-11-22 09:32:01', 0, 'activo'),
(26, 1, 3, '2020-11-22 09:45:26', 0, 'activo'),
(27, 1, 5, '2020-11-22 10:01:37', 9000, 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cc` (`identificacion`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_sabor_nuevo` (`id_sabor`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `cc` (`identificacion`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id_ingrediente`);

--
-- Indices de la tabla `sabor`
--
ALTER TABLE `sabor`
  ADD PRIMARY KEY (`id_sabor`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `sabor_ingrediente`
--
ALTER TABLE `sabor_ingrediente`
  ADD PRIMARY KEY (`id_sabor_ingrediente`),
  ADD KEY `id_ingrediente` (`id_ingrediente`),
  ADD KEY `id_sabor_tradicional` (`id_sabor`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `id_ingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sabor`
--
ALTER TABLE `sabor`
  MODIFY `id_sabor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `sabor_ingrediente`
--
ALTER TABLE `sabor_ingrediente`
  MODIFY `id_sabor_ingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_sabor`) REFERENCES `sabor` (`id_sabor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sabor`
--
ALTER TABLE `sabor`
  ADD CONSTRAINT `sabor_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sabor_ingrediente`
--
ALTER TABLE `sabor_ingrediente`
  ADD CONSTRAINT `sabor_ingrediente_ibfk_1` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingrediente` (`id_ingrediente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sabor_ingrediente_ibfk_2` FOREIGN KEY (`id_sabor`) REFERENCES `sabor` (`id_sabor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
