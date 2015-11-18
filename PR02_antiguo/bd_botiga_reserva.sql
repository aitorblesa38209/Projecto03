-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2015 a las 11:56:39
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_botiga_reserva`
--
CREATE DATABASE IF NOT EXISTS `bd_botiga_reserva` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_botiga_reserva`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recurs`
--

CREATE TABLE IF NOT EXISTS `tbl_recurs` (
`id_recurs` int(11) NOT NULL,
  `nom_recurs` varchar(35) NOT NULL,
  `desc_recurs` varchar(100) NOT NULL,
  `img_recurs` varchar(35) NOT NULL,
  `tipus_recurs` tinyint(1) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `id_usuari` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_recurs`
--

INSERT INTO `tbl_recurs` (`id_recurs`, `nom_recurs`, `desc_recurs`, `img_recurs`, `tipus_recurs`, `estado`, `id_usuari`) VALUES
(1, 'Carro de portatiles', 'Carro para llevar portatiles y guardarlos, perfecto para preparar conferencias o clases.', 'carro_portatiles.jpg', 0, 'no disponible', 1),
(3, 'Portatil 2', 'Ordenador portatil MSI con sistema operativo Windows 10, con diversos editores de textos instalados,', 'portatil_2.jpg', 0, 'disponible', NULL),
(4, 'Portatil 3', 'Ordenador portatil VAIO con sistema operativo Windows 7, con editores 3D y de imagen.', 'portatil_3.jpg', 0, 'disponible', NULL),
(5, 'Movil 1', 'Movil Samsung Galaxy 6 con sistema operativo Android 5.0 Lollipop.', 'movil_1.jpg', 0, 'no disponible', 1),
(6, 'Movil 2', 'Movil Iphone 6 con sistema operativo iOS 8.', 'movil_2.jpg', 0, 'disponible', NULL),
(7, 'Portatil 1', 'Ordenador portatil ACER con sistema operativo Windows 8, con el pack office instalado. Perfecto para', 'portatil_1.jpg', 0, 'disponible', NULL),
(8, 'Proyector portatil', 'Proyector portatil facil de usar y perfecto para moverlo entre salas.', 'proyector_portatil.jpg', 0, 'disponible', NULL),
(9, 'Aula de informatica 2', 'recurs de informatica que dispone de 19 mesas con una pizarra tactil, ordenadores y proyector.', 'recurs_informatica_2.jpg', 1, 'disponible', NULL),
(10, 'Aula de entrevistes', 'Aula para hacer entrevistas que dispone de una mesa de despacho.', 'recurs_entrevistas_1.jpg', 1, 'disponible', NULL),
(11, 'Aula de teoria 1', 'Aula de teoria que dispone de 20 mesas con una pizarra tactil.', 'recurs_teoria_1.jpg', 1, 'no disponible', 1),
(12, 'Aula de teoria 2', 'Aula de teoria que dispone de 17 mesas con una pizarra.', 'recurs_teoria_2.jpg', 1, 'no disponible', 2),
(13, 'Aula de teoria 3', 'Aula de teoria que dispone de 22 mesas con una pizarra.', 'recurs_teoria_3.jpg', 1, 'disponible', NULL),
(14, 'Aula de teoria 4', 'Aula de teoria que dispone de 19 mesas con una pizarra tactil.', 'recurs_teoria_4.jpg', 1, 'disponible', NULL),
(15, 'Aula de informatica 1', 'Aula de informatica que dispone de 22 mesas con una ordenador en cada una, proyector y una pizarra', 'recurs_informatica_1.jpg', 1, 'no disponible', 1),
(16, 'Aula de entrevistas 2', 'Aula para hacer entrevistas que dispone de una mesa de despacho con un portatil en ella.', 'recurs_entrevistas_2.jpg', 1, 'disponible', NULL),
(17, 'Aula de reuniones', 'Aula para hacer reuniones que dispone de una mesa alargada la cual esta rodeada por 15 sillas, tambi', 'sala_reuniones.jpg', 1, 'disponible', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuaris`
--

CREATE TABLE IF NOT EXISTS `tbl_usuaris` (
`id_usuari` int(11) NOT NULL,
  `pass_usuari` varchar(20) NOT NULL,
  `nom_usuari` varchar(20) NOT NULL,
  `email_usuari` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuaris`
--

INSERT INTO `tbl_usuaris` (`id_usuari`, `pass_usuari`, `nom_usuari`, `email_usuari`) VALUES
(1, '1234', 'Daniel_L', '10000318.joan23@fje.edu'),
(2, '12345', 'Aitor_B', '38209.joan23@fje.edu'),
(3, '0123', 'Alejandro_M', '96034.joan23@fje.edu'),
(4, '9876', 'David_M', 'david.marin@fje.edu'),
(5, '01234', 'Ignasi_R', 'ignasi.romero@fje.edu');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_recurs`
--
ALTER TABLE `tbl_recurs`
 ADD PRIMARY KEY (`id_recurs`), ADD KEY `id_recurs` (`id_recurs`), ADD KEY `fk_usuaris_recurs` (`id_usuari`);

--
-- Indices de la tabla `tbl_usuaris`
--
ALTER TABLE `tbl_usuaris`
 ADD PRIMARY KEY (`id_usuari`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_recurs`
--
ALTER TABLE `tbl_recurs`
MODIFY `id_recurs` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tbl_usuaris`
--
ALTER TABLE `tbl_usuaris`
MODIFY `id_usuari` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_recurs`
--
ALTER TABLE `tbl_recurs`
ADD CONSTRAINT `fk_usuaris_recurs` FOREIGN KEY (`id_usuari`) REFERENCES `tbl_usuaris` (`id_usuari`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
