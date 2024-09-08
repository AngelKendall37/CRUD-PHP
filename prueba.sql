-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2024 a las 00:16:56
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Cundinamarca'),
(2, 'Antioquia'),
(3, 'Cordoba'),
(4, 'Bolivar'),
(5, 'Arauca'),
(6, 'Amazonas'),
(7, 'Atlántico'),
(8, 'Boyacá'),
(9, 'Caldas'),
(10, 'Cauca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `nombre`, `url`, `parent_id`, `orden`, `user_id`) VALUES
(1, 'Inicio', 'index.php?controller=menu&action=showMenu', 0, 0, NULL),
(8, 'Reportes', 'index.php?controller=reports&action=index', NULL, 1, 4),
(9, 'Administración', 'https://www.youtube.com/watch?v=2k-BxdNKtzE&list=RDOI6hP0GuJhA&index=11', 0, 2, 4),
(11, 'Mis Documentos', 'index.php?controller=documents&action=list', 2, 1, 4),
(16, 'Youtube', 'https://www.youtube.com/watch?v=A1KBxLXqWrc&list=RDGMEM6ijAnFTG9nX1G-kbWBUCJAVMA1KBxLXqWrc&start_radio=1', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) NOT NULL,
  `departamento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `departamento_id`) VALUES
(3, 'Marco', 'Mora Rivera', 2),
(11, 'Jhon', 'Ramirez', 1),
(12, 'Jose', 'Gutierrez', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `email`, `password`) VALUES
(4, 'Angel', 'Mora', 'angelmora@gmail.com', '$2y$10$fr7x4FyZcZaqePUJYAZPhe.2ziwdm4zXVSWbvdsUqd8qs5qvTGLi6'),
(5, 'Dana', 'Montes', 'montes@gmail.com', '$2y$10$l4zfypu.gEoQyHdtoLCJbOyszbuEhhso2oT0Ljg3SVpdVK4cCuCmK'),
(6, 'Marta', 'Gomez', 'marta@gmail.com', '$2y$10$mouoemZY1Bv3fJJvaoX.J.e9zfkmODScfXUhBdNtfuejpNztwL4BO'),
(7, 'Cesar', 'Carrasco', 'carrasco@gmail.com', '$2y$10$Ut9kbKDFuFxIztgget6pWefNxARyO.c8l..LXQgepnIYT5mPS.7IC'),
(8, 'ken', 'Mora Rivera', 'ken@gmail.com', '$2y$10$.2HYmVeHH7gsvs7ESjwv3eIiNE4zG0/Iqn6wy9MplqOh1tJiGptNW'),
(9, 'Mariana', 'Ruiz', 'ruiz@gmail.com', '$2y$10$Wbp7bg0qoMWJozkPVRIfoe1K0GS/ysiZiBhtLFrZi5Ifpcp.AC3mO'),
(10, 'Sophia', 'Gomez', 'gomez@gmail.com', '$2y$10$CyHLjxVBCTWqI7CnnULiYeXTyas9ctMb3BJHnAEp2uYh37A1BwDVG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
