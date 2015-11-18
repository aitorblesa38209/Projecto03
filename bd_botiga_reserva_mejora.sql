-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2015 a las 18:08:30
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_botiga_reserva_mejora`
--
CREATE DATABASE IF NOT EXISTS `bd_botiga_reserva_mejora` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `bd_botiga_reserva_mejora`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_material`
--

CREATE TABLE IF NOT EXISTS `tbl_material` (
`id_material` int(11) NOT NULL,
  `id_tipo_material` int(11) NOT NULL,
  `nombre_material` text COLLATE utf8_bin,
  `disponible` tinyint(1) DEFAULT NULL,
  `incidencia` tinyint(1) DEFAULT NULL,
  `descripcion_incidencia` text COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_material`
--

INSERT INTO `tbl_material` (`id_material`, `id_tipo_material`, `nombre_material`, `disponible`, `incidencia`, `descripcion_incidencia`) VALUES
(1, 1, 'Sala Reuniones 01', 0, 0, NULL),
(2, 1, 'Sala Reuniones 02', 0, 0, NULL),
(3, 1, 'Despacho 01', 0, 0, NULL),
(4, 1, 'Despacho 02', 0, 0, NULL),
(5, 1, 'Aula Informática 01', 0, 0, NULL),
(7, 1, 'Aula Teoría 01', 0, 0, NULL),
(8, 1, 'Aula Teoría 02', 0, 0, NULL),
(9, 1, 'Aula Teoría 03', 0, 0, NULL),
(10, 1, 'Aula Teoría 04', 0, 0, NULL),
(11, 2, 'Ordenador Portátil MSI', 0, 0, NULL),
(12, 2, 'Ordenador Portátil Apple', 0, 0, NULL),
(13, 2, 'Ordenador Portátil Acer', 0, 0, NULL),
(20, 2, 'Proyector Lg', 0, 0, NULL),
(21, 2, 'Móvil Bq Aquaris', 0, 0, NULL),
(22, 2, 'Móvil Xiaomi', 0, 0, NULL),
(26, 2, 'Carro de portátil 01', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas`
--

CREATE TABLE IF NOT EXISTS `tbl_reservas` (
`id_reserva` int(11) NOT NULL,
  `id_usuari` int(11) DEFAULT NULL,
  `hora_entrada` datetime DEFAULT NULL,
  `hora_salida` datetime DEFAULT NULL,
  `id_material` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_reservas`
--

INSERT INTO `tbl_reservas` (`id_reserva`, `id_usuari`, `hora_entrada`, `hora_salida`, `id_material`) VALUES
(73, NULL, '2015-11-18 12:30:04', NULL, 1),
(74, NULL, NULL, '2015-11-18 12:30:24', 1),
(75, NULL, '2015-11-18 17:58:09', NULL, 1),
(76, NULL, NULL, '2015-11-18 17:58:11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_material`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_material` (
`id_tipo_material` int(11) NOT NULL,
  `tipo` text COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_tipo_material`
--

INSERT INTO `tbl_tipo_material` (`id_tipo_material`, `tipo`) VALUES
(1, 'sala'),
(2, 'material');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_usuari`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_usuari` (
`id_tipo_usuari` int(11) NOT NULL,
  `tipus_usuari` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_tipo_usuari`
--

INSERT INTO `tbl_tipo_usuari` (`id_tipo_usuari`, `tipus_usuari`) VALUES
(1, 'Usuario'),
(2, 'Administrador'),
(3, 'Root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuaris`
--

CREATE TABLE IF NOT EXISTS `tbl_usuaris` (
`id_usuari` int(11) NOT NULL,
  `pass_usuari` varchar(20) COLLATE utf8_bin NOT NULL,
  `nom_usuari` varchar(20) COLLATE utf8_bin NOT NULL,
  `email_usuari` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_tipo_usuari` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_usuaris`
--

INSERT INTO `tbl_usuaris` (`id_usuari`, `pass_usuari`, `nom_usuari`, `email_usuari`, `id_tipo_usuari`) VALUES
(1, '1234', 'Daniel_Lorenzo', '10000318.joan23@fje.edu', 2),
(2, '12345', 'Aitor_Blesa', '38209.joan23@fje.edu', 3),
(3, '0123', 'Alejandro_Moreno', '96034.joan23@fje.edu', 1),
(4, '9876', 'David_MarÃ­n', 'david.marin@fje.edu', 1),
(5, '01234', 'Ignasi_Romero', 'ignasi.romero@fje.edu', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_material`
--
ALTER TABLE `tbl_material`
 ADD PRIMARY KEY (`id_material`), ADD KEY `id_material` (`id_material`), ADD KEY `id_tipo_material` (`id_tipo_material`);

--
-- Indices de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
 ADD PRIMARY KEY (`id_reserva`), ADD KEY `id_reserva` (`id_reserva`), ADD KEY `id_usuario` (`id_usuari`), ADD KEY `id_material` (`id_material`);

--
-- Indices de la tabla `tbl_tipo_material`
--
ALTER TABLE `tbl_tipo_material`
 ADD PRIMARY KEY (`id_tipo_material`), ADD KEY `id_tipo_material` (`id_tipo_material`);

--
-- Indices de la tabla `tbl_tipo_usuari`
--
ALTER TABLE `tbl_tipo_usuari`
 ADD PRIMARY KEY (`id_tipo_usuari`), ADD KEY `id_tipo_usuari` (`id_tipo_usuari`);

--
-- Indices de la tabla `tbl_usuaris`
--
ALTER TABLE `tbl_usuaris`
 ADD PRIMARY KEY (`id_usuari`), ADD KEY `id_tipo_usuari` (`id_tipo_usuari`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_material`
--
ALTER TABLE `tbl_material`
MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_material`
--
ALTER TABLE `tbl_tipo_material`
MODIFY `id_tipo_material` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_tipo_usuari`
--
ALTER TABLE `tbl_tipo_usuari`
MODIFY `id_tipo_usuari` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_usuaris`
--
ALTER TABLE `tbl_usuaris`
MODIFY `id_usuari` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
ADD CONSTRAINT `tbl_reservas_ibfk_1` FOREIGN KEY (`id_usuari`) REFERENCES `tbl_usuaris` (`id_usuari`),
ADD CONSTRAINT `tbl_reservas_ibfk_2` FOREIGN KEY (`id_material`) REFERENCES `tbl_material` (`id_material`);

--
-- Filtros para la tabla `tbl_tipo_material`
--
ALTER TABLE `tbl_tipo_material`
ADD CONSTRAINT `tbl_tipo_material_ibfk_1` FOREIGN KEY (`id_tipo_material`) REFERENCES `tbl_material` (`id_tipo_material`);

--
-- Filtros para la tabla `tbl_usuaris`
--
ALTER TABLE `tbl_usuaris`
ADD CONSTRAINT `tbl_usuaris_ibfk_1` FOREIGN KEY (`id_tipo_usuari`) REFERENCES `tbl_tipo_usuari` (`id_tipo_usuari`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
