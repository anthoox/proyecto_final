-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2023 a las 19:10:49
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
(7, 4, 3, 'arroz', '2023-04-24 18:45:52', 0, 0, 1, NULL, NULL, NULL, NULL, NULL),
(8, 4, 3, 'pan', '2023-04-24 18:45:55', 0, 0, 1, NULL, NULL, '02:50:00', NULL, NULL),
(9, 4, 3, 'cebolla', '2023-04-24 18:45:58', 0, 3, 2, '2023-04-26 18:46:00', '', NULL, NULL, NULL),
(10, 4, 3, 'leche', '2023-04-24 18:46:29', 1, 2, 2, '2023-04-28 23:46:00', 'un item para probar', NULL, NULL, NULL),
(14, 4, 3, 'patatas', '2023-04-25 13:21:59', 0, 0, 1, NULL, NULL, NULL, NULL, NULL),
(15, 4, 3, 'globos', '2023-04-25 13:28:56', 0, 0, 2, '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(33, 30, 6, 'patatas', '2023-05-22 19:36:35', 0, 0, 1, NULL, NULL, NULL, NULL, NULL),
(34, 30, 6, 'arroz', '2023-05-22 19:36:40', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
(35, 30, 6, 'limones', '2023-05-22 19:36:46', 1, 4.75, 2, '0000-00-00 00:00:00', '', NULL, NULL, NULL),
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
(55, 67, 32, 'item', '2023-05-26 22:43:18', 1, 0, 1, NULL, NULL, NULL, NULL, NULL),
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
(4, 3, 'compra', '2023-04-24 18:45:44', '2023-04-24 18:45:44', 0, NULL, NULL, NULL, NULL),
(5, 3, 'estudiar', '2023-04-24 21:17:22', '2023-04-24 21:17:22', 0, NULL, NULL, NULL, NULL),
(6, 3, 'prueba', '2023-04-24 21:36:47', '2023-04-25 19:05:54', 0, NULL, NULL, NULL, NULL),
(10, 3, 'cosas', '2023-04-25 17:45:09', '2023-04-25 17:45:09', 0, NULL, NULL, NULL, NULL),
(30, 6, 'compra', '2023-05-22 19:35:04', '2023-05-22 19:35:04', 0, NULL, NULL, NULL, NULL),
(31, 6, 'Fiesta', '2023-05-22 19:35:17', '2023-05-22 19:35:17', 0, NULL, NULL, NULL, NULL),
(32, 6, 'prueba', '2023-05-22 19:55:14', '2023-05-22 19:55:14', 0, NULL, NULL, NULL, NULL),
(33, 1, 'compra', '2023-05-23 01:10:54', '2023-06-05 19:29:44', 1, NULL, NULL, NULL, NULL),
(36, 1, '2', '2023-05-23 03:49:32', '2023-05-24 10:20:00', 1, NULL, NULL, NULL, NULL),
(37, 1, '3', '2023-05-23 03:49:35', '2023-05-23 14:03:27', 1, NULL, NULL, NULL, NULL),
(62, 1, 'Sonoria', '2023-05-24 10:20:08', '2023-05-24 10:20:08', 0, NULL, NULL, NULL, NULL),
(64, 1, 'Estudiar', '2023-05-24 10:40:29', '2023-05-24 10:40:29', 0, NULL, NULL, NULL, NULL),
(65, 1, 'aaaa', '2023-05-26 21:48:15', '2023-05-26 21:48:17', 1, NULL, NULL, NULL, NULL),
(67, 32, 'pepita', '2023-05-26 22:42:58', '2023-05-26 22:42:58', 0, NULL, NULL, NULL, NULL),
(68, 32, 'compra', '2023-05-26 22:43:03', '2023-05-26 22:43:03', 0, NULL, NULL, NULL, NULL),
(69, 1, 'prueba', '2023-06-05 19:27:08', '2023-06-05 19:27:08', 0, NULL, NULL, NULL, NULL);

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
(3, 'yasmin', 'yas@yas.com', '03e5eca7bca6b5a1981020b60301918577e7d8d7990fd93693da74249acee489324328ddef689408af3eea8d546e35bacae5ec5d54e6fceed4b531d7b5ee9065', '2023-04-24 17:51:59', 2, 'SCAN0043.JPG'),
(6, 'anthony', 'anthony@anthoox.com', '03e5eca7bca6b5a1981020b60301918577e7d8d7990fd93693da74249acee489324328ddef689408af3eea8d546e35bacae5ec5d54e6fceed4b531d7b5ee9065', '2023-05-21 20:02:24', 2, NULL),
(8, 'pruebo', 'prueba@prueba.comd', 'e54ee7e285fbb0275279143abc4c554e5314e7b417ecac83a5984a964facbaad68866a2841c3e83ddf125a2985566261c4014f9f960ec60253aebcda9513a9b4', '2023-05-23 12:53:10', 2, NULL),
(9, 'ads', 'asd@asd.cop', '019eddbd529da0184ba78422db59539454ddc55fb5da3b7595c55a5d241e567d576c5b59711dc95aca290d0ecdd076dce2b121afaca6a2273af2483de5809bd9', '2023-05-23 12:53:25', 2, NULL),
(28, 'nacho', 'prueba@ppp.com', '03e5eca7bca6b5a1981020b60301918577e7d8d7990fd93693da74249acee489324328ddef689408af3eea8d546e35bacae5ec5d54e6fceed4b531d7b5ee9065', '2023-05-24 18:16:27', 2, NULL),
(29, 'pruebo', 'ola@olaa.com', '03e5eca7bca6b5a1981020b60301918577e7d8d7990fd93693da74249acee489324328ddef689408af3eea8d546e35bacae5ec5d54e6fceed4b531d7b5ee9065', '2023-05-26 22:28:42', 2, NULL),
(30, 'prueba', 'prueba@prueaba.com', 'd2764f07ce17b9f8529f26d9d3c95d7a3ccd15c5ffb57f91246dc3afd3ebacd8d6402f75b06dabad60efcac5c017f84871d0b533074fef7183d249efbe6ccd6d', '2023-05-26 22:29:35', 2, NULL),
(32, 'prueba', 'prueba@prueba2.com', '03e5eca7bca6b5a1981020b60301918577e7d8d7990fd93693da74249acee489324328ddef689408af3eea8d546e35bacae5ec5d54e6fceed4b531d7b5ee9065', '2023-05-26 22:36:03', 2, 'SCAN0042.JPG'),
(33, 'yas', 'prueba@prueeba.com', '03e5eca7bca6b5a1981020b60301918577e7d8d7990fd93693da74249acee489324328ddef689408af3eea8d546e35bacae5ec5d54e6fceed4b531d7b5ee9065', '2023-06-05 19:29:21', 2, NULL),
(34, 'pruebita', 'prueba@pruueba.com', '03e5eca7bca6b5a1981020b60301918577e7d8d7990fd93693da74249acee489324328ddef689408af3eea8d546e35bacae5ec5d54e6fceed4b531d7b5ee9065', '2023-06-05 20:32:25', 2, NULL);

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
  MODIFY `id_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
