-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-08-2016 a las 23:08:52
-- Versión del servidor: 5.5.42
-- Versión de PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `parkiller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_users`
--

CREATE TABLE `cat_users` (
  `id` int(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_users`
--

INSERT INTO `cat_users` (`id`, `name`, `icon`) VALUES
(1, 'Conductor Parkiller', 'parkiller'),
(2, 'Cliente Parkiller', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position` varchar(150) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '1',
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `positions`
--

INSERT INTO `positions` (`id`, `position`, `user_type`, `status`, `creation`) VALUES
(24, '19.4787354,-99.1911417', 1, 1, '2016-08-05 21:04:04'),
(25, '19.4573434,-99.1837189', 1, 1, '2016-08-05 21:07:17'),
(26, '19.4588061,-99.205248', 1, 1, '2016-08-05 21:07:26'),
(27, '19.4363013,-99.1985192', 1, 1, '2016-08-05 21:07:38'),
(28, '19.4116262,-99.1939038', 2, 1, '2016-08-05 21:07:43'),
(29, '19.4201036,-99.179138', 2, 1, '2016-08-05 21:07:49'),
(30, '19.4694954,-99.1922307', 2, 1, '2016-08-05 21:08:00'),
(31, '19.4363656,-99.1439199', 2, 1, '2016-08-05 21:08:06'),
(32, '19.4377047,-99.1495031', 2, 1, '2016-08-05 21:08:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_users`
--
ALTER TABLE `cat_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_users`
--
ALTER TABLE `cat_users`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;