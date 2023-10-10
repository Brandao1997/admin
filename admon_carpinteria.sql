-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-08-2023 a las 04:56:24
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id19703861_proyectoventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `id_Bodega` bigint(20) NOT NULL,
  `Nombre_Bodega` varchar(60) DEFAULT NULL,
  `Telefono_Bodega` bigint(10) DEFAULT NULL,
  `Estado` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`id_Bodega`, `Nombre_Bodega`, `Telefono_Bodega`, `Estado`) VALUES
(1, 'Bodega general', 41102565, 'habilitado'),
(18, 'Bodega 11', 12345678, 'habilitado'),
(79, 'Bodega 10', 7895410, 'habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` bigint(20) NOT NULL,
  `Nombre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Nombre`) VALUES
(1, 'Compu'),
(2, 'Redes'),
(8, 'HADWARE'),
(15, 'Celulares'),
(78, 'Audio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `Id_compra` bigint(20) NOT NULL,
  `Id_proveedor` bigint(20) NOT NULL,
  `id_producto` bigint(20) NOT NULL,
  `cantidad` bigint(10) DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`Id_compra`, `Id_proveedor`, `id_producto`, `cantidad`, `fecha_compra`) VALUES
(0, 3, 52, 5, '2022-10-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mainlogin`
--

CREATE TABLE `mainlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mainlogin`
--

INSERT INTO `mainlogin` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'brandon', 'brandon@gmail.com', '123456', 'admin'),
(6, 'wayo', 'wayo@gmail.com', '12345678', 'operador'),
(10, 'marvin lopez', 'marvin@gmail.com', '12345678', 'admin'),
(11, 'Eduardo', 'eduardo@gmail.com', '123456', 'operador'),
(12, 'marcos', 'pappa@gmail.com', '123456', 'admin'),
(13, 'user1', 'creger1973@gmail.com', 'user1user1', 'admin'),
(14, 'julio', 'julio@gmail.com', '12345678', 'admin'),
(15, 'cristiano', 'cr7@gmail.com', '12345678', 'operador'),
(16, 'Cachi', 'cachi12@gmail.com', '12345678', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` bigint(20) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `Id_Categoria` bigint(20) NOT NULL,
  `id_Bodega` bigint(20) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `precioCompra` float(7,2) DEFAULT NULL,
  `precioVenta` float(7,2) DEFAULT NULL,
  `existencia` bigint(10) DEFAULT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo`, `Id_Categoria`, `id_Bodega`, `Nombre`, `precioCompra`, `precioVenta`, `existencia`, `img`) VALUES
(2, 'A56', 1, 1, 'Laptop_dell', 400.50, 500.50, 1, '20230108_162641.jpg'),
(52, 'A12', 1, 1, 'Rj-45', 10.23, 500.50, 0, 'rj45.png'),
(61, 'A977', 8, 79, 'Memoria Ram', 150.00, 175.00, 15, 'ram.jpg'),
(62, 'A520', 8, 18, 'Mouse', 142.00, 174.00, 13, 'combo_mouse_teclado.png'),
(63, 'dfsadfd', 8, 18, '32dsfsadf', 45.00, 33.00, 12, '20230108_162641.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_vendidos`
--

CREATE TABLE `producto_vendidos` (
  `id` bigint(20) NOT NULL,
  `id_venta` bigint(20) NOT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `id_p` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_vendidos`
--

INSERT INTO `producto_vendidos` (`id`, `id_venta`, `cantidad`, `id_p`) VALUES
(31, 54, 1, 2),
(52, 77, 1, 61),
(53, 77, 1, 62),
(54, 77, 1, 2),
(55, 78, 2, 2),
(56, 79, 2, 2),
(57, 79, 1, 62),
(58, 80, 1, 61),
(59, 81, 1, 62),
(60, 81, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Id_proveedor` bigint(20) NOT NULL,
  `Nit_proveedor` varchar(20) DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Id_proveedor`, `Nit_proveedor`, `Nombre`, `Direccion`, `telefono`) VALUES
(2, 'A23021', 'MacroSistemas', 'Zona 10', 10123540),
(3, 'A2525', 'Distelsa', 'zona 16', 12345678),
(7, 'A5112', 'Intelaf', 'Zona 7', 10123540),
(65, '847103', 'Globanet', 'zona 15', 12345678),
(95, '451223', 'Kemik', 'zona 4', 10234566);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `total` float(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`) VALUES
(52, '2022-10-15', 11.00),
(53, '2022-10-15', 500.50),
(54, '2022-10-15', 500.50),
(55, '2022-10-15', 11.00),
(56, '2022-10-15', 500.50),
(57, '2022-10-15', 11.14),
(58, '2022-10-15', 0.00),
(59, '2022-10-15', 0.00),
(60, '2022-10-15', 11.14),
(61, '2022-10-15', 500.50),
(62, '2022-10-15', 0.00),
(63, '2022-10-15', 1001.00),
(64, '2022-10-15', 22.28),
(65, '2022-10-15', 500.50),
(66, '2022-10-15', 1500.00),
(67, '2022-10-16', 1001.00),
(68, '2022-10-18', 1500.00),
(69, '2022-10-18', 11.00),
(70, '2022-10-23', 11.14),
(71, '2022-10-25', 155.00),
(72, '2022-10-25', 250.00),
(73, '2022-10-25', 11.00),
(74, '2022-10-25', 500.50),
(75, '2022-10-25', 261.00),
(76, '2022-10-25', 500.50),
(77, '2022-10-26', 849.50),
(78, '2022-10-26', 1001.00),
(79, '2022-11-08', 1175.00),
(80, '2023-01-09', 175.00),
(81, '2023-02-08', 674.50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`id_Bodega`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`Id_compra`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `Id_proveedor` (`Id_proveedor`);

--
-- Indices de la tabla `mainlogin`
--
ALTER TABLE `mainlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `Id_Categoria` (`Id_Categoria`),
  ADD KEY `id_Bodega` (`id_Bodega`);

--
-- Indices de la tabla `producto_vendidos`
--
ALTER TABLE `producto_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_p` (`id_p`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Id_proveedor`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mainlogin`
--
ALTER TABLE `mainlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `producto_vendidos`
--
ALTER TABLE `producto_vendidos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`Id_proveedor`) REFERENCES `proveedor` (`Id_proveedor`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`Id_Categoria`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_Bodega`) REFERENCES `bodega` (`id_Bodega`);

--
-- Filtros para la tabla `producto_vendidos`
--
ALTER TABLE `producto_vendidos`
  ADD CONSTRAINT `producto_vendidos_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `producto_vendidos_ibfk_2` FOREIGN KEY (`id_p`) REFERENCES `productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
