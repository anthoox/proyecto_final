--
-- Base de datos: `bd_lista_simple`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL PRIMARY KEY,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registration_date` datetime NOT NULL,
  `rol` int(11) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  FOREIGN KEY (`rol`) REFERENCES roles(id_rol)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lists`
--

CREATE TABLE `lists` (
  `id_list` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_user` int(11) NOT NULL,
  `list_name` varchar(100) NOT NULL,
  `total_price` int(100) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `modif_date` datetime NOT NULL,
  `filled_date` datetime DEFAULT NULL,
  `in_trash` varchar(10) DEFAULT NULL,
  `total_time` time DEFAULT NULL,
  `work_time` time DEFAULT NULL,
  `break_time` time DEFAULT NULL,
  FOREIGN KEY (id_user) REFERENCES users(id_user)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_list` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `creation_date` datetime NOT NULL,
  `check` varchar(10) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `alarm_date` datetime DEFAULT NULL,
  `notess` varchar(500) DEFAULT NULL,
  `total_time` time DEFAULT NULL,
  `work_time` time DEFAULT NULL,
  `break_time` time DEFAULT NULL,
  FOREIGN KEY (id_list) REFERENCES lists (id_list)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_items`
--

CREATE TABLE `users_items` (
  `id_user` int(11) NOT NULL,
  `item_came` varchar(100) NOT NULL,
  FOREIGN KEY (id_user) REFERENCES users (id_user)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

