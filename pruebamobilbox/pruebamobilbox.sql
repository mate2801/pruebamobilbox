-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2020 a las 15:55:23
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebamobilbox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticiasmobilbox`
--

CREATE TABLE `noticiasmobilbox` (
  `idNoticias` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlimg` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticiasmobilbox`
--

INSERT INTO `noticiasmobilbox` (`idNoticias`, `descripcion`, `urlimg`, `usuario_idusuario`, `titulo`, `fecha`) VALUES
(9, 'fbfv', 'public/img/1c5aef60f0c1876e4b1ee245974d0806.jpg', 4, 'ddf', '2020-07-02'),
(10, 'dfgfdgdfg', 'public/img/d86e0b4f3f9f680b6b1a4a9212ac4bae.jpg', 4, 'fdgfdgfdg', '2020-07-02'),
(11, '<p><span style=\"color:#3498db\">puta</span></p>\n', 'public/img/fcf28efd08543f4ebe3243dafc564ae5.jpg', 4, 'mateo', '2020-07-02'),
(12, '<p><span style=\"color:#2ecc71\">ggh</span></p>\n', 'public/img/1b39f98b13c1fb8d170806ffce795c25.jpg', 4, 'bnbn', '2020-07-02'),
(13, '<p>xcvxcv</p>\n', 'public/img/19ca9f787bd808ce87c9fba1a66e3eb2.jpg', 4, 'culo', '2020-07-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabramobilbox`
--

CREATE TABLE `palabramobilbox` (
  `idpalabra` int(11) NOT NULL,
  `palabra` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noticias_idNoticias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosmobilbox`
--

CREATE TABLE `usuariosmobilbox` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuariosmobilbox`
--

INSERT INTO `usuariosmobilbox` (`idUsuario`, `usuario`, `contrasena`, `correo`) VALUES
(4, 'mateo', '827ccb0eea8a706c4c34a16891f84e7b', 'mate2801@gmail.com'),
(5, 'jorge21', '827ccb0eea8a706c4c34a16891f84e7b', 'cristianmateoflorezgarcia@gmai');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticiasmobilbox`
--
ALTER TABLE `noticiasmobilbox`
  ADD PRIMARY KEY (`idNoticias`),
  ADD KEY `fk_1` (`usuario_idusuario`);

--
-- Indices de la tabla `palabramobilbox`
--
ALTER TABLE `palabramobilbox`
  ADD PRIMARY KEY (`idpalabra`),
  ADD KEY `fk_2` (`noticias_idNoticias`);

--
-- Indices de la tabla `usuariosmobilbox`
--
ALTER TABLE `usuariosmobilbox`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticiasmobilbox`
--
ALTER TABLE `noticiasmobilbox`
  MODIFY `idNoticias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `palabramobilbox`
--
ALTER TABLE `palabramobilbox`
  MODIFY `idpalabra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuariosmobilbox`
--
ALTER TABLE `usuariosmobilbox`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticiasmobilbox`
--
ALTER TABLE `noticiasmobilbox`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuariosmobilbox` (`idUsuario`);

--
-- Filtros para la tabla `palabramobilbox`
--
ALTER TABLE `palabramobilbox`
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`noticias_idNoticias`) REFERENCES `noticiasmobilbox` (`idNoticias`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
