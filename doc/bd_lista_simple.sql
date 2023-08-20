-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2023 a las 22:13:55
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
-- Base de datos: `bd_lista_simple`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL,
  `id_list` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `creation_date` datetime NOT NULL,
  `is_check` int(2) DEFAULT 0,
  `price` float DEFAULT 0,
  `quantity` int(11) DEFAULT 1,
  `alarm_date` datetime DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `total_time` time DEFAULT NULL,
  `work_time` time DEFAULT NULL,
  `break_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id_item`, `id_list`, `id_user`, `item_name`, `creation_date`, `is_check`, `price`, `quantity`, `alarm_date`, `notes`, `total_time`, `work_time`, `break_time`) VALUES
(37, 33, 1, 'cebolla', '2023-05-23 01:11:08', 1, 2, 1, '2023-05-30 11:45:00', '', NULL, NULL, NULL),
(38, 33, 1, 'pasta', '2023-05-23 01:11:14', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(39, 33, 1, 'arroz', '2023-05-23 01:11:18', 1, 12, 1, '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(41, 33, 1, 'patatas', '2023-05-23 14:10:01', 1, 0, 10, '2023-06-09 19:28:00', '', NULL, NULL, NULL),
(42, 62, 1, 'Ale', '2023-05-24 10:20:15', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(43, 62, 1, 'Extenso', '2023-05-24 10:20:19', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(44, 62, 1, 'Manu', '2023-05-24 10:20:23', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(45, 62, 1, 'Samu', '2023-05-24 10:20:29', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(46, 62, 1, 'Jaime', '2023-05-24 10:20:33', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(47, 62, 1, 'Andres', '2023-05-24 10:20:37', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(48, 62, 1, 'Montes', '2023-05-24 10:20:42', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(49, 62, 1, 'Marina', '2023-05-24 10:20:46', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(50, 62, 1, 'Yas', '2023-05-24 10:20:52', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(51, 62, 1, 'yo', '2023-05-24 10:20:55', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(52, 64, 1, 'Matemáticas', '2023-05-24 10:40:38', 1, 0, 1, '2023-05-31 10:40:00', '', NULL, NULL, NULL),
(53, 64, 1, 'Lengua', '2023-05-24 10:40:55', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(56, 69, 1, 'estudiar', '2023-06-05 19:27:18', 0, 0, 1, NULL, NULL, NULL, NULL, NULL),
(57, 64, 1, 'Ciencias', '2023-08-04 18:43:42', 0, 0, 1, '2023-08-04 21:43:00', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lists`
--

CREATE TABLE `lists` (
  `id_list` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `list_name` varchar(100) NOT NULL,
  `creation_date` datetime NOT NULL,
  `modif_date` datetime NOT NULL,
  `trash` int(2) DEFAULT 0,
  `total_time` time DEFAULT NULL,
  `work_time` time DEFAULT NULL,
  `break_time` time DEFAULT NULL,
  `notif` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lists`
--

INSERT INTO `lists` (`id_list`, `id_user`, `list_name`, `creation_date`, `modif_date`, `trash`, `total_time`, `work_time`, `break_time`, `notif`) VALUES
(33, 1, 'compra', '2023-05-23 01:10:54', '2023-06-05 19:29:44', 1, NULL, NULL, NULL, NULL),
(36, 1, '2', '2023-05-23 03:49:32', '2023-05-24 10:20:00', 1, NULL, NULL, NULL, NULL),
(37, 1, '3', '2023-05-23 03:49:35', '2023-05-23 14:03:27', 1, NULL, NULL, NULL, NULL),
(62, 1, 'Sonoria', '2023-05-24 10:20:08', '2023-05-24 10:20:08', 0, NULL, NULL, NULL, NULL),
(64, 1, 'Estudiar', '2023-05-24 10:40:29', '2023-05-24 10:40:29', 0, NULL, NULL, NULL, NULL),
(65, 1, 'aaaa', '2023-05-26 21:48:15', '2023-05-26 21:48:17', 1, NULL, NULL, NULL, NULL),
(69, 1, 'prueba', '2023-06-05 19:27:08', '2023-06-05 19:27:08', 0, NULL, NULL, NULL, NULL),
(70, 1, 'lista_prueba', '2023-08-20 22:09:22', '2023-08-20 22:09:22', 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id_rol`, `rol`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `registration_date` datetime NOT NULL,
  `rol` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `name`, `email`, `password`, `registration_date`, `rol`, `photo`) VALUES
(1, 'anthoo', 'prueba@prueba.com', '03e5eca7bca6b5a1981020b60301918577e7d8d7990fd93693da74249acee489324328ddef689408af3eea8d546e35bacae5ec5d54e6fceed4b531d7b5ee9065', '2023-04-24 11:31:24', 2, 'logopc2.png'),
(2, 'lsadminls', 'admin@lsadmin.com', '03e5eca7bca6b5a1981020b60301918577e7d8d7990fd93693da74249acee489324328ddef689408af3eea8d546e35bacae5ec5d54e6fceed4b531d7b5ee9065', '2023-04-24 11:34:48', 1, NULL),
(41, 'antho', 'antho@anthoox.com', '$2y$10$BzTZdbM31PzwHz2GDn.tee4OqbYB1XLQCMzL/8DJvsuJjuCZq4Faq', '2023-08-05 13:10:23', 1, NULL),
(42, 'probando', 'probando@probando.com', '$2y$10$pbaP2IA277dHKWfD1NpeVODEBypc9Uh4IPTmSOxH6A1Ho5PoAjHxG', '2023-08-05 13:12:28', 2, NULL),
(44, 'probando', 'probando@probandomas.com', '$2y$10$HeKNg.7fyAa1DbJogbK7yeSVAyrlBHs0JfjuADzjlizfk7..r593G', '2023-08-06 21:00:22', 2, NULL),
(45, 'prueba2', 'prueba1@prueba.com', '$2y$10$6QSsSzjgBlfUdlnmAzQ1hOM2FRcXIiXEcZwnApYqniNfWvMgFoQ3m', '2023-08-06 21:18:47', 2, NULL),
(52, 'yasmin', 'yasmin@yasmin.com', '$2y$10$Tixir0TfLDqXjIoSPKXsrOqyQE0UkDRAntn.2/QTokVYuAclkP9Ai', '2023-08-06 21:29:13', 2, NULL),
(53, 'noextends', 'noextends@noextends.com', '$2y$10$s6oBqkfTHDSPhIHsVLpo7O.Z.vHgU6e/9ctghV51rJlVOSxi4IOm.', '2023-08-06 21:36:10', 2, NULL),
(54, '23', '23@ase.com', '$2y$10$oO28P1cOQcGx/RQMCBubRuR0rsUlMmL3SE3dRfUWaZuNvJptQc2au', '2023-08-06 22:05:43', 2, NULL),
(55, '20agosto', '20@20.com', '$2y$10$vEkgvQJ.l3ET4RWjvxv8FumjfoSdH1WTsjygx9w33WNYMh9sy37ge', '2023-08-20 18:18:07', 2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_list` (`id_list`),
  ADD KEY `fk_items_users` (`id_user`);

--
-- Indices de la tabla `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id_list`),
  ADD UNIQUE KEY `list_name` (`list_name`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `lists`
--
ALTER TABLE `lists`
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_list`) REFERENCES `lists` (`id_list`) ON DELETE CASCADE;

--
-- Filtros para la tabla `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rols` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
