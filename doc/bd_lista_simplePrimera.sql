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

-------------------------

-- CREATE TRIGGER sum_work_break_time
-- BEFORE INSERT ON items
-- FOR EACH ROW
-- BEGIN
--   IF NEW.work_time IS NOT NULL THEN
--     SEC_TO_TIME(SUM(TIME_TO_SEC(work_time) + IFNULL(TIME_TO_SEC(break_time), 0)));
--   END IF;
-- END;


--CREATE TRIGGER update_total_time AFTER UPDATE ON items 
--FOR EACH ROW
--BEGIN
--  IF NEW.work_time IS NOT NULL THEN
--    SET NEW.total_time = ADDTIME(NEW.work_time, COALESCE(NEW.break_time, '00:00:00'));
--  END IF;
--END;//probando

-- DELIMITER//
-- CREATE TRIGGER sum_work_break_time 
-- BEFORE INSERT ON items 
-- FOR EACH ROW 
-- BEGIN 
--   IF NEW.work_time IS NOT NULL THEN
--    SET NEW.total_time = ADDTIME(NEW.work_time, COALESCE(NEW.break_time, '00:00:00'));
--   END IF; 
-- END;
-- DELIMITER;

DELIMITER //
CREATE TRIGGER update_total_time AFTER UPDATE ON items
FOR EACH ROW
BEGIN
    IF NEW.work_time IS NOT NULL THEN
        UPDATE items SET total_time = IFNULL(NEW.work_time, 0) + IFNULL(break_time, 0) WHERE id_item = NEW.id_item;
    END IF;
END //
DELIMITER ;

DELIMITER //
CREATE TRIGGER update_total_time AFTER UPDATE ON items
FOR EACH ROW
BEGIN
    UPDATE item_times
    SET total_time = 
        CASE 
            WHEN NEW.break_time IS NOT NULL 
            THEN NEW.work_time + NEW.break_time
            ELSE NEW.work_time
        END
    WHERE id_item = NEW.id_item;
END
DELIMITER ;