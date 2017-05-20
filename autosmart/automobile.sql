-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2016 a las 04:18:48
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `automobile`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alarma`
--

CREATE TABLE `alarma` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `origen` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `placa` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alarma`
--

INSERT INTO `alarma` (`id_estado`, `estado`, `origen`, `fecha`, `hora`, `placa`) VALUES
(1, 'activada', 'boton', '2016-05-13', '16:15:55', 'QMZ229'),
(23, 'activada', 'web', '2016-05-20', '04:30:24', 'QMZ229'),
(24, 'desactivada', 'web', '2016-05-20', '04:30:26', 'QMZ229'),
(25, 'activada', 'web', '2016-05-20', '04:30:27', 'QMZ229'),
(26, 'desactivada', 'web', '2016-05-20', '04:30:28', 'QMZ229'),
(27, 'activada', 'web', '2016-05-14', '12:12:14', 'QMZ229'),
(28, 'desactivada', 'web', '2016-05-14', '00:00:00', 'QMZ229'),
(29, 'activada', 'web', '2016-05-20', '14:11:40', 'QMZ229'),
(30, 'activada', 'web', '2016-05-20', '20:02:41', 'FFG354'),
(31, 'activada', 'web', '2016-05-20', '20:02:46', 'FFG354'),
(32, 'desactivada', 'web', '2016-05-20', '20:02:47', 'FFG354'),
(33, 'desactivada', 'web', '2016-05-20', '20:02:48', 'FFG354'),
(34, 'activada', 'web', '2016-05-20', '20:02:49', 'FFG354'),
(35, 'desactivada', 'web', '2016-05-20', '20:02:50', 'FFG354'),
(36, 'desactivada', 'web', '2016-05-26', '20:59:38', 'QMZ229'),
(37, 'activada', 'web', '2016-05-26', '20:59:52', 'QMZ229'),
(38, 'desactivada', 'boton', '2016-05-26', '21:06:27', 'QMZ229'),
(39, 'activada', 'boton', '2016-05-26', '21:41:49', 'FFG354'),
(40, 'activada', 'boton', '2016-05-27', '09:26:26', 'QMZ229'),
(41, 'desactivada', 'boton', '2016-05-27', '09:27:30', 'QMZ229'),
(42, 'activada', 'boton', '2016-05-27', '09:27:44', 'QMZ229'),
(43, 'desactivada', 'boton', '2016-05-27', '09:28:35', 'QMZ229'),
(44, 'activada', 'boton', '2016-05-27', '09:57:46', 'QMZ229'),
(45, 'desactivada', 'boton', '2016-05-27', '10:27:15', 'QMZ229'),
(46, 'activada', 'boton', '2016-05-27', '10:27:41', 'QMZ229'),
(47, 'desactivada', 'boton', '2016-05-27', '10:29:22', 'QMZ229'),
(48, 'activada', 'boton', '2016-05-27', '10:29:35', 'QMZ229'),
(49, 'desactivada', 'boton', '2016-05-27', '10:30:39', 'QMZ229'),
(50, 'activada', 'boton', '2016-05-27', '10:30:52', 'QMZ229'),
(51, 'desactivada', 'web', '2016-05-27', '10:39:10', 'QMZ229'),
(52, 'activada', 'web', '2016-05-27', '10:39:15', 'QMZ229'),
(53, 'desactivada', 'web', '2016-05-27', '10:39:33', 'QMZ229'),
(54, 'activada', 'web', '2016-05-27', '13:57:40', 'QMZ229'),
(55, 'desactivada', 'web', '2016-05-27', '14:09:46', 'QMZ229'),
(56, 'desactivada', 'boton', '2016-05-27', '14:20:44', 'FFG354'),
(57, 'activada', 'web', '2016-05-27', '14:21:30', 'FFG354'),
(58, 'desactivada', 'web', '2016-05-27', '14:22:00', 'FFG354'),
(59, 'activada', 'web', '2016-05-27', '14:25:19', 'QMZ229'),
(60, 'desactivada', 'boton', '2016-05-27', '14:26:48', 'QMZ229'),
(61, 'activada', 'boton', '2016-05-27', '14:32:54', 'QMZ229'),
(62, 'desactivada', 'boton', '2016-05-27', '14:33:21', 'QMZ229'),
(63, 'activada', 'boton', '2016-05-27', '14:34:39', 'QMZ229'),
(64, 'desactivada', 'boton', '2016-05-27', '14:36:01', 'QMZ229'),
(65, 'activada', 'boton', '2016-05-27', '15:32:05', 'QMZ229'),
(66, 'desactivada', 'boton', '2016-05-27', '15:33:01', 'QMZ229'),
(67, 'activada', 'web', '2016-05-27', '15:34:13', 'QMZ229'),
(68, 'desactivada', 'web', '2016-05-27', '15:35:15', 'FFG354'),
(69, 'desactivada', 'boton', '2016-05-27', '15:36:40', 'QMZ229'),
(70, 'desactivada', 'web', '2016-06-01', '16:51:23', 'QMZ229'),
(71, 'activada', 'web', '2016-06-01', '16:51:27', 'QMZ229'),
(72, 'desactivada', 'web', '2016-06-01', '16:55:03', 'QMZ229'),
(73, 'activada', 'web', '2016-06-01', '16:55:21', 'QMZ229'),
(74, 'desactivada', 'boton', '2016-06-01', '16:56:18', 'QMZ229'),
(75, 'activada', 'boton', '2016-06-01', '16:56:31', 'QMZ229'),
(76, 'desactivada', 'web', '2016-06-01', '16:57:22', 'QMZ229'),
(77, 'activada', 'boton', '2016-06-01', '17:00:22', 'QMZ229'),
(78, 'desactivada', 'web', '2016-06-01', '17:14:10', 'QMZ229'),
(79, 'activada', 'web', '2016-06-01', '17:14:25', 'QMZ229'),
(80, 'desactivada', 'boton', '2016-06-01', '17:15:29', 'QMZ229'),
(81, 'activada', 'boton', '2016-06-01', '17:44:18', 'QMZ229'),
(82, 'desactivada', 'boton', '2016-06-01', '17:45:52', 'QMZ229'),
(83, 'activada', 'web', '2016-06-01', '17:45:56', 'QMZ229'),
(84, 'activada', 'web', '2016-06-01', '17:46:01', 'QMZ229'),
(85, 'desactivada', 'boton', '2016-06-01', '18:04:43', 'QMZ229'),
(86, 'activada', 'web', '2016-06-01', '18:04:54', 'QMZ229'),
(87, 'desactivada', 'boton', '2016-06-01', '18:05:27', 'QMZ229'),
(88, 'activada', 'boton', '2016-06-01', '18:06:22', 'QMZ229'),
(89, 'desactivada', 'boton', '2016-06-01', '18:07:28', 'QMZ229'),
(90, 'activada', 'boton', '2016-06-01', '18:18:09', 'QMZ229'),
(91, 'desactivada', 'web', '2016-06-01', '18:19:23', 'QMZ229'),
(92, 'activada', 'boton', '2016-06-01', '18:23:31', 'QMZ229'),
(93, 'desactivada', 'boton', '2016-06-01', '18:24:32', 'QMZ229'),
(94, 'activada', 'web', '2016-06-01', '18:25:19', 'QMZ229'),
(95, 'activada', 'web', '2016-06-01', '18:25:27', 'QMZ229'),
(96, 'activada', 'web', '2016-06-01', '18:25:35', 'QMZ229'),
(97, 'activada', 'web', '2016-06-01', '18:25:39', 'QMZ229'),
(98, 'activada', 'web', '2016-06-01', '18:25:39', 'QMZ229'),
(99, 'activada', 'web', '2016-06-01', '18:25:40', 'QMZ229'),
(100, 'activada', 'web', '2016-06-01', '18:25:40', 'QMZ229');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(9) NOT NULL DEFAULT 'disparada',
  `causa` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `placa` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre`, `causa`, `fecha`, `hora`, `placa`) VALUES
(1, 'disparada', 'puerta', '2016-03-11', '13:00:00', 'QMZ229'),
(2, 'disparada', 'movimiento', '2016-03-11', '13:01:00', 'QMZ229'),
(7, 'disparada', 'movimiento', '2016-03-19', '11:46:38', 'QMZ229'),
(8, 'disparada', 'puerta', '2016-03-19', '11:47:15', 'QMZ229'),
(9, 'disparada', 'puerta', '2016-05-13', '16:04:02', 'QMZ229'),
(10, 'disparada', 'puerta', '2016-05-20', '04:34:20', 'QMZ229'),
(11, 'disparada', 'puerta', '2016-05-20', '04:34:24', 'QMZ229'),
(12, 'disparada', 'puerta', '2016-05-20', '04:34:25', 'QMZ229'),
(13, 'disparada', 'puerta', '2016-05-20', '04:34:27', 'QMZ229'),
(14, 'disparada', 'puerta', '2016-05-20', '04:34:29', 'QMZ229'),
(15, 'disparada', 'puerta', '2016-05-20', '04:34:30', 'QMZ229'),
(16, 'disparada', 'puerta', '2016-05-20', '04:34:45', 'QMZ229'),
(17, 'disparada', 'movimiento', '2016-05-20', '04:34:55', 'QMZ229'),
(18, 'disparada', 'movimiento', '2016-05-20', '04:34:58', 'QMZ229'),
(19, 'disparada', 'movimiento', '2016-05-20', '04:35:00', 'QMZ229'),
(20, 'disparada', 'frenado', '2016-05-26', '21:24:17', 'QMZ229'),
(21, 'disparada', 'puerta', '2016-05-27', '09:26:48', 'QMZ229'),
(22, 'disparada', 'movimiento', '2016-05-27', '09:28:05', 'QMZ229'),
(23, 'disparada', 'frenado', '2016-05-27', '09:29:25', 'QMZ229'),
(24, 'disparada', 'movimiento', '2016-05-27', '09:58:00', 'QMZ229'),
(25, 'disparada', 'movimiento', '2016-05-27', '10:01:06', 'QMZ229'),
(26, 'disparada', 'puerta', '2016-05-27', '10:26:17', 'QMZ229'),
(27, 'disparada', 'movimiento', '2016-05-27', '10:28:10', 'QMZ229'),
(28, 'disparada', 'puerta', '2016-05-27', '10:29:56', 'QMZ229'),
(29, 'disparada', 'movimiento', '2016-05-27', '10:31:21', 'QMZ229'),
(30, 'disparada', 'movimiento', '2016-05-27', '14:08:57', 'QMZ229'),
(31, 'disparada', 'puerta', '2016-05-27', '14:20:19', 'FFG354'),
(32, 'disparada', 'movimiento', '2016-05-27', '14:25:47', 'QMZ229'),
(33, 'disparada', 'movimiento', '2016-05-27', '14:33:07', 'QMZ229'),
(34, 'disparada', 'frenado', '2016-05-27', '14:34:21', 'QMZ229'),
(35, 'disparada', 'puerta', '2016-05-27', '14:35:06', 'QMZ229'),
(36, 'disparada', 'movimiento', '2016-05-27', '15:32:31', 'QMZ229'),
(37, 'disparada', 'frenado', '2016-05-27', '15:33:36', 'QMZ229'),
(38, 'disparada', 'frenado', '2016-05-27', '15:33:45', 'QMZ229'),
(39, 'disparada', 'puerta', '2016-05-27', '15:36:04', 'QMZ229'),
(40, 'disparada', 'frenado', '2016-05-27', '15:40:20', 'QMZ229'),
(41, 'disparada', 'movimiento', '2016-06-01', '16:51:45', 'QMZ229'),
(42, 'disparada', 'puerta', '2016-06-01', '16:55:35', 'QMZ229'),
(43, 'disparada', 'puerta', '2016-06-01', '16:59:51', 'QMZ229'),
(44, 'disparada', 'puerta', '2016-06-01', '17:00:39', 'QMZ229'),
(45, 'disparada', 'puerta', '2016-06-01', '17:05:12', 'QMZ229'),
(46, 'disparada', 'movimiento', '2016-06-01', '17:14:38', 'QMZ229'),
(47, 'disparada', 'frenado', '2016-06-01', '17:43:52', 'QMZ229'),
(48, 'disparada', 'movimiento', '2016-06-01', '17:45:18', 'QMZ229'),
(49, 'disparada', 'puerta', '2016-06-01', '18:03:57', 'QMZ229'),
(50, 'disparada', 'movimiento', '2016-06-01', '18:05:13', 'QMZ229'),
(51, 'disparada', 'frenado', '2016-06-01', '18:05:41', 'QMZ229'),
(52, 'disparada', 'frenado', '2016-06-01', '18:05:50', 'QMZ229'),
(53, 'disparada', 'frenado', '2016-06-01', '18:06:08', 'QMZ229'),
(54, 'disparada', 'puerta', '2016-06-01', '18:06:45', 'QMZ229'),
(55, 'disparada', 'frenado', '2016-06-01', '18:07:37', 'QMZ229'),
(56, 'disparada', 'movimiento', '2016-06-01', '18:18:27', 'QMZ229'),
(57, 'disparada', 'puerta', '2016-06-01', '18:23:57', 'QMZ229');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `identificacion` int(15) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `telefono` int(10) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `tipo` int(1) NOT NULL,
  `placa` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `identificacion`, `direccion`, `fecha`, `telefono`, `usuario`, `contrasena`, `tipo`, `placa`) VALUES
(1, 'Lina Aristizabal', 1061776284, 'Calle 44 Cr 6', '08/11/1994', 2147483647, 'admin', '2ABPC15ObUSCs', 1, ''),
(2, 'Consulta', 10384759, 'Calle 3 Cr 7', '14/02/1980', 8207689, 'consulta', '2AC217V2etbr.', 2, 'QMZ229'),
(6, 'nicolas', 10985764, 'Calle 44 N Cr 6', '11/10/1995', 2147483647, 'nicolas', '2ABPC15ObUSCs', 2, 'FFG354'),
(7, 'hola', 1234, 'calle', '2322', 2334234, 'hola', '2A/TdZ9JNfIFA', 2, 'hola');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alarma`
--
ALTER TABLE `alarma`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alarma`
--
ALTER TABLE `alarma`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
