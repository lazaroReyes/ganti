-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2015 a las 19:23:02
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ganti`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
  `ID` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `Descripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Cantidad` int(11) NOT NULL,
  `Costo` int(11) DEFAULT NULL,
  `NoFactura` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MetodoPago` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `IDProveedor` int(11) DEFAULT NULL,
  `EstadoDeCompra` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `IDUsuario` int(11) NOT NULL,
  `IDTarjeta` int(11) DEFAULT NULL,
  `IDMaquina` int(11) NOT NULL,
  `IDMina` int(11) NOT NULL,
  `FechaRequerido` date NOT NULL,
  `FechaPedido` date DEFAULT NULL,
  `FechaEnviado` date DEFAULT NULL,
  `FechaRecibido` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`ID`, `IDProducto`, `Descripcion`, `Cantidad`, `Costo`, `NoFactura`, `MetodoPago`, `IDProveedor`, `EstadoDeCompra`, `IDUsuario`, `IDTarjeta`, `IDMaquina`, `IDMina`, `FechaRequerido`, `FechaPedido`, `FechaEnviado`, `FechaRecibido`) VALUES
(5, 4, 'Filtro para el que esta en la mina', 2, 750, 'SRWSFG321', 'Efectivo', 4, 'Recibido', 1, 0, 7, 4, '0000-00-00', '0000-00-00', '0000-00-00', '2015-07-17'),
(6, 4, 'Las dos de atras', 2, 1500, 'SRWSFG321', 'Efectivo', 4, 'Recibido', 0, 3, 16, 4, '0000-00-00', '0000-00-00', '0000-00-00', '2015-06-29'),
(7, 4, 'la del radio', 1, 15, 'eTDER234FDS', 'Efectivo', 4, 'Enviado', 0, 3, 16, 4, '0000-00-00', '0000-00-00', '2015-07-02', '0000-00-00'),
(8, 4, 'Las dos delanteras', 2, 1500, 'SRWSFGE2', 'Efectivo', 4, 'Pedido', 0, 3, 16, 4, '2015-06-29', '2015-07-02', '0000-00-00', '0000-00-00'),
(9, 2, 'Filtro para el D8', 4, 1000, 'NUMERO12345', 'Tarjeta', 3, 'Enviado', 1, 3, 6, 1, '2015-07-03', '2015-07-17', '2015-07-17', '0000-00-00'),
(10, 2, 'comentario', 1, 15, '1234567gfdsa', 'Efectivo', 4, 'Requerido', 1, 3, 5, 1, '2015-07-17', '0000-00-00', '0000-00-00', '2015-07-17'),
(11, 4, 'comentarios;  mas comentarios ', 5, 255, '123456ikjhgfds', 'Efectivo', 4, 'Recibido', 2, 0, 18, 1, '2015-07-17', '2015-07-17', '2015-07-17', '2015-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `IDMina` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE IF NOT EXISTS `maquinas` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numeroEconomico` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`ID`, `Descripcion`, `numeroEconomico`) VALUES
(5, 'SuperDuty 2010 gris', 1),
(6, 'Lobo 1999 Negra', 2),
(7, 'Tsuru 2015 blanco', 3),
(16, 'Pontiac Sunfire 1998', 4),
(17, 'D8', 5),
(18, 'Mitsubishi 2015 blanca', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `minas`
--

CREATE TABLE IF NOT EXISTS `minas` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `minas`
--

INSERT INTO `minas` (`ID`, `Nombre`, `Descripcion`) VALUES
(1, 'Piedras verdes', 'En la sierra por san Rafael'),
(3, 'Otra mina', 'En Sonora Cielo abierto'),
(4, 'Mina de Oro', 'Parral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `ID` int(11) NOT NULL,
  `Clave` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `Clave`, `Descripcion`) VALUES
(2, 'R23JT4829', 'Filtro para el D8'),
(3, '9852AJ12CV', 'Llantas para Tsuru'),
(4, 'TEFCBRED244', 'Antena para SuperDuty');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `ID` int(11) NOT NULL,
  `RFC` varchar(13) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ID`, `RFC`, `Nombre`) VALUES
(3, 'CCG130313AJ', 'MACSA'),
(4, 'OTRACOSA12345', 'Chavitar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE IF NOT EXISTS `tarjetas` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`ID`, `Descripcion`) VALUES
(1, '4458'),
(2, '3456'),
(3, '4422');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(30) NOT NULL,
  `perfil` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`ID`, `perfil`, `username`, `password`) VALUES
(1, 'Administrador', 'saul@ganti.com.mx', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e'),
(2, 'Compras', 'contactanos@ganti.com.mx', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e'),
(3, 'Usuario', 'impresora@ganti.com.mx', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e'),
(4, 'Administrador', 'saul.elchapo@gmail.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usos`
--

CREATE TABLE IF NOT EXISTS `usos` (
  `ID` int(11) NOT NULL,
  `IDMina` int(11) NOT NULL,
  `IDProducto` int(11) NOT NULL,
  `Cantidad` int(3) NOT NULL,
  `IDUsuario` int(11) NOT NULL,
  `RecibidoPor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usos`
--

INSERT INTO `usos` (`ID`, `IDMina`, `IDProducto`, `Cantidad`, `IDUsuario`, `RecibidoPor`, `Fecha`) VALUES
(3, 4, 3, 3, 2, 'Candido', '2015-06-23'),
(4, 1, 2, 3, 1, 'Hugo', '2015-06-03'),
(5, 1, 3, 2, 2, 'Hugo', '2015-07-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`IDMina`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `minas`
--
ALTER TABLE `minas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usos`
--
ALTER TABLE `usos`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `minas`
--
ALTER TABLE `minas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usos`
--
ALTER TABLE `usos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
