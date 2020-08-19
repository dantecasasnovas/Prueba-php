-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2020 a las 21:20:17
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobby`
--

CREATE TABLE `hobby` (
  `id_hobby` int(11) NOT NULL,
  `first_hobby` varchar(100) NOT NULL,
  `second_hobby` varchar(100) NOT NULL,
  `third_hobby` varchar(100) NOT NULL,
  `fourth_hobby` varchar(100) NOT NULL,
  `fifth_hobby` varchar(100) NOT NULL,
  `hobby_loggin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loggin`
--

CREATE TABLE `loggin` (
  `id_loggin` int(11) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `clave_encrypted` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `id_perfil` int(11) NOT NULL,
  `usuario_perfil` varchar(100) NOT NULL,
  `cedula_perfil` varchar(12) NOT NULL,
  `telefono_perfil` varchar(50) NOT NULL,
  `correo_perfil` varchar(100) NOT NULL,
  `photo_perfil` varchar(100) NOT NULL,
  `id_loggin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hobby`
--
ALTER TABLE `hobby`
  ADD PRIMARY KEY (`id_hobby`),
  ADD UNIQUE KEY `hobby_loggin` (`hobby_loggin`);

--
-- Indices de la tabla `loggin`
--
ALTER TABLE `loggin`
  ADD PRIMARY KEY (`id_loggin`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_perfil`),
  ADD UNIQUE KEY `cedula` (`cedula_perfil`),
  ADD KEY `id_loggin` (`id_loggin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hobby`
--
ALTER TABLE `hobby`
  MODIFY `id_hobby` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `loggin`
--
ALTER TABLE `loggin`
  MODIFY `id_loggin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hobby`
--
ALTER TABLE `hobby`
  ADD CONSTRAINT `hobby-perfil` FOREIGN KEY (`hobby_loggin`) REFERENCES `profile` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `id_loggin` FOREIGN KEY (`id_loggin`) REFERENCES `loggin` (`id_loggin`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
