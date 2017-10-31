-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2017 a las 17:22:14
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Base de datos: `p_cursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `nombre` varchar(45) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `precio` varchar(45) NOT NULL,
  `duracion` varchar(14) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `version` varchar(45) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`nombre`, `descripcion`, `precio`, `duracion`, `codigo`, `version`, `estado`) VALUES
('Blogger', 'Bono de referidos: 16$\r\nBono de recompra de referido:\r\nRecompra de 50$, Ganas: 3,5$\r\nRecompra de 100$, Ganas: 7$\r\nRecompra de 650$, Ganas: 18$\r\nRecompra de 1200$, Ganas: 35$\r\nBono de matriz 10x4: 1$ por persona, Hasta 10.000$', '125', '10', 'BS', 'Starter', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matrix`
--

CREATE TABLE `matrix` (
  `fila` varchar(100) NOT NULL,
  `columna` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(100) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'NoPago',
  `usuario` varchar(45) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `version` varchar(45) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `precio` int(10) NOT NULL,
  `txbitcoin` varchar(200) NOT NULL,
  `carterabitcoin` varchar(200) NOT NULL,
  `imagenPago` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(28) NOT NULL,
  `nivel` int(1) NOT NULL,
  `cookie` int(10) NOT NULL,
  `patrocinador` varchar(100) NOT NULL,
  `usuarios_referidos` varchar(100) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `cod_documento` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `b_glob_pos` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `password`, `salt`, `nivel`, `cookie`, `patrocinador`, `usuarios_referidos`, `sexo`, `tipo_documento`, `cod_documento`, `pais`, `ciudad`, `b_glob_pos`) VALUES
('admin', 'jose', 'suarez', 'admin@admin.com', '+1(334)54494', 'calle francisco', 'f5f368634deb1f07dc15cdd839653b491aed62d59da091fcc4a32ecc668965b21d0a5f7ca826022bc3a17f1add02debd367d72c1a6d1dc63b3e90116587a9f8c', 'Wtjwk1EgykH7me+r9akZLAgInVw.', 1, 701276809, 'erick', '', 'Hombre', 'Cedula', '1123323', 'Colombia', 'Palmira', 0),
('gallego', 'gallego gallego', 'gallego', 'gallego@gallego.com', '103012391', 'gallego', 'bafa37996ba2c6141679784d4bd007221192921a327c5daa9a221573c6c6369b5eca2e53e795421541754ae0eefdc87f3f179addb9fbdf81a63f8a64e4b1207a', 'To+R4zEQ9KvxHMqQVCB+vgnE0h0.', 2, 0, 'admin', '', 'Hombre', 'Cedula', '1123323', 'Colombia', 'Cali', 140);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
