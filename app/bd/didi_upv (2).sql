-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2024 a las 04:02:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `didi_upv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `id_conductor` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `Num_licencia_conducir` varchar(255) DEFAULT NULL,
  `Estado_disponibilidad` int(1) DEFAULT NULL,
  `ID_vehiculo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`id_conductor`, `usuario_id`, `Num_licencia_conducir`, `Estado_disponibilidad`, `ID_vehiculo`) VALUES
(1, 1, 'AA0005', 1, 1),
(2, 6, 'E84NJ', 1, 2),
(3, 3, 'BB0123', 1, 1),
(4, 4, 'CC9876', 1, 2),
(5, 5, 'DD5432', 1, 1),
(6, 6, 'EE2468', 0, 2),
(7, 3, 'BB0123', 1, 1),
(8, 4, 'CC9876', 1, 2),
(9, 5, 'DD5432', 1, 1),
(10, 6, 'EE2468', 0, 2),
(11, 12, 'D84J3', 1, 6),
(12, 70, 'BR37FS', 1, 68);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE `pasajero` (
  `pasajero_id` int(11) NOT NULL,
  `asistencia_req` varchar(36) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pasajero`
--

INSERT INTO `pasajero` (`pasajero_id`, `asistencia_req`, `usuario_id`) VALUES
(1, 'NO', 2),
(2, 'SI', 4),
(3, 'NO', 5),
(4, 'SI', 6),
(5, NULL, 10),
(6, NULL, 11),
(7, NULL, 13),
(34, 'NO', 30),
(35, 'SI', 31),
(36, 'NO', 32),
(37, 'SI', 33),
(38, 'NO', 45),
(39, 'SI', 46),
(40, 'NO', 47),
(41, 'SI', 48),
(42, 'NO', 49),
(43, 'SI', 50),
(44, 'NO', 51),
(45, 'SI', 52),
(46, 'NO', 53),
(47, 'SI', 54),
(48, NULL, 66),
(49, NULL, 71),
(50, NULL, 72);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `origen` varchar(255) DEFAULT NULL,
  `destino` varchar(255) DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `distancia` decimal(10,2) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `costo_viaje` decimal(10,2) DEFAULT 0.00,
  `id_conductor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id_ruta`, `descripcion`, `origen`, `destino`, `duracion`, `distancia`, `estado`, `costo_viaje`, `id_conductor`) VALUES
(1, 'Colonia Tamatan,Soriana Tamatan, Hospital', '23.729563135969542, -99.07691206254108', '23.73563834478406, -99.11450738976382', '10:15:51', 6.20, 'Activo', 0.00, 1),
(2, 'Parque Tangamanga, Plaza Sendero, Hospital Central', '23.729563135969542, -99.07691206254108', '23.741169830091277, -99.13506799145868', '12:30:00', 15.40, 'Activo', 0.00, 2),
(3, 'Centro Histórico, Museo Regional, Plaza de Armas', '23.72937945225149, -99.1571983432046', '23.719849526107215, -99.15328888952538', '10:00:00', 7.80, 'Activo', 0.00, 3),
(4, 'Plaza Citadella, Soriana Citadella, Cinepolis Citadella', '23.728631386965578, -99.1784727370802', '23.729563135969542, -99.07691206254108', '08:45:00', 5.60, 'Activo', 0.00, 4),
(9, 'Hospital Civil Victoria', '23.730128388403738, -99.15767791963084', '23.736863884068914, -99.0755068689144', '00:00:05', 30.00, 'Inactivo', 0.00, 9),
(10, 'Gran Hotel Las Fuentes', '23.716748479440596, -99.13078183345588', '23.736863884068914, -99.0755068689144', '00:00:05', 30.00, 'Activo', 0.00, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido_p` varchar(25) NOT NULL,
  `apellido_m` varchar(25) DEFAULT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(25) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `carrera` varchar(25) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `foto` blob DEFAULT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `matricula`, `nombre`, `apellido_p`, `apellido_m`, `fecha_nac`, `correo`, `contrasena`, `carrera`, `telefono`, `foto`, `rol`) VALUES
(1, 2130231, 'Dafne', 'Moreno', 'Flores', '2003-10-14', 'dafne@gmail.com', 'dafne123', 'ISA', '8341456299', '', ''),
(2, 2130130, 'Brayan', 'Olivares', 'Rodriguez', '2003-10-11', 'Brayan@gmail.com', 'brayan', 'ITI', '8341173728', '', ''),
(3, 2130225, 'Mario', 'Coyoy', 'Lopez', '2003-01-09', '2130225@upv.edu.mx', 'qwerty123', 'TI', '8342871310', '', ''),
(4, 2030351, 'Pablo', 'Ruiz', 'Martinez', '2001-05-01', 'pablo@gmail.com', '123456', 'ITI', '8341112244', '', ''),
(5, 1530334, 'Juan Diego', 'Lumbreras', ' Vega', '2024-03-13', 'jlumbrerasv@upv.edu.mx', '12345678', 'ITI', '8341234567', '', ''),
(6, 2130072, 'Juan Daniel', 'Torres', 'Colorado', '2003-12-03', '2130072@upv.edu.mx', '123456789', NULL, '8343116686', '', ''),
(10, 21302345, 'Luis Coño', 'Raga', 'Reyes', '2001-12-30', 'luisraga12@gmail.com', 'luisraga12', NULL, '8341173727', '', ''),
(11, 2130073, 'Omar Alejandro', 'Pérez', 'Reyes', '2003-08-03', '2130073@upv.edu.mx', 'password', NULL, '8343413264', '', ''),
(12, 2130067, 'Melchor', 'Hernandez', 'Diaz', '2003-11-14', '2130067@upv.edu.mx', '', NULL, '8342470608', '', ''),
(13, 2130441, 'Brayan', 'Olivares', 'Rodríguez', '2003-03-15', '2130441@upv.edu.mx', '2130441', NULL, '8341264366', '', ''),
(29, 6904801, 'Nombre95', 'ApellidoP74', 'ApellidoM85', '2024-04-07', 'correo52@example.com', 'e6df6ca1', 'ITI', '8343426123', '', ''),
(30, 8264803, 'Nombre23', 'ApellidoP72', 'ApellidoM90', '2023-12-16', 'correo92@example.com', 'ee0bbe9d', 'ITI', '8346443802', '', ''),
(31, 2577642, 'Nombre7', 'ApellidoP79', 'ApellidoM74', '2023-12-19', 'correo35@example.com', 'c83d4d2f', 'TI', '8345020631', '', ''),
(32, 3914770, 'Nombre28', 'ApellidoP43', 'ApellidoM29', '2024-02-18', 'correo86@example.com', 'fb1a527b', 'TI', '8348520468', '', ''),
(33, 2365354, 'Nombre26', 'ApellidoP81', 'ApellidoM27', '2023-05-17', 'correo72@example.com', '1bdb84eb', 'ITI', '8343434063', '', ''),
(45, 2130155, 'Alejandra Carolina', 'Rodriguez', 'Porras', '1990-05-15', 'j2130155@upv.edu.mx', 'contraseña123', 'ITI', '8341233267', '', ''),
(46, 2130350, 'Laura', 'Díaz', 'Ramírez', '1994-07-18', 'laura@example.com', 'laura123', 'ISA', '8343334444', '', ''),
(47, 2130400, 'Javier', 'López', 'Martínez', '1993-02-28', 'javier@example.com', 'javier456', 'TI', '8346667777', '', ''),
(48, 2130450, 'Ana', 'Gutiérrez', 'Pérez', '1996-09-12', 'ana@example.com', 'ana789', 'ITI', '8348889999', '', ''),
(49, 2130500, 'Sara', 'Torres', 'Gómez', '1991-04-05', 'sara@example.com', 'sara321', 'ISA', '8342223333', '', ''),
(50, 2130550, 'Diego', 'Cruz', 'Hernández', '1997-11-30', 'diego@example.com', 'diego654', 'TI', '8347778888', '', ''),
(51, 2130600, 'Elena', 'Ortiz', 'López', '1990-12-15', 'elena@example.com', 'elena987', 'ITI', '8341230000', '', ''),
(52, 2130650, 'Alejandro', 'Vargas', 'Díaz', '1998-05-22', 'alejandro@example.com', 'alejandro123', 'ISA', '8344567890', '', ''),
(53, 2130700, 'Lucía', 'Ruiz', 'Fernández', '1995-08-10', 'lucia@example.com', 'lucia456', 'TI', '8347891234', '', ''),
(54, 2130750, 'Pedro', 'Mendoza', 'García', '1992-03-25', 'pedro@example.com', 'pedro789', 'ITI', '8349876543', '', ''),
(55, 2130800, 'Mónica', 'Jiménez', 'Martínez', '1993-06-20', 'monica@example.com', 'monica321', 'ISA', '8343334444', '', ''),
(56, 2130850, 'Ricardo', 'Castillo', 'Gómez', '1994-09-17', 'ricardo@example.com', 'ricardo654', 'TI', '8346667777', '', ''),
(57, 2130900, 'Carmen', 'Vázquez', 'López', '1991-02-10', 'carmen@example.com', 'carmen987', 'ITI', '8348889999', '', ''),
(58, 2130950, 'Daniel', 'Sánchez', 'Pérez', '1996-05-05', 'daniel@example.com', 'daniel321', 'ISA', '8342223333', '', ''),
(59, 2131000, 'Isabel', 'García', 'Hernández', '1997-08-20', 'isabel@example.com', 'isabel654', 'TI', '8347778888', '', ''),
(60, 2131050, 'Sergio', 'Martínez', 'López', '1990-11-15', 'sergio@example.com', 'sergio987', 'ITI', '8341230000', '', ''),
(61, 2131100, 'Marta', 'López', 'Díaz', '1998-04-22', 'marta@example.com', 'marta123', 'ISA', '8344567890', '', ''),
(62, 2131150, 'Eduardo', 'Fernández', 'Fernández', '1995-07-10', 'eduardo@example.com', 'eduardo456', 'TI', '8347891234', '', ''),
(63, 2131200, 'Laura', 'Gómez', 'García', '1992-02-25', 'lauragomez@example.com', 'laura789', 'ITI', '8349876543', '', ''),
(64, 2131250, 'Javier', 'López', 'Martínez', '1993-05-20', 'javierlopez@example.com', 'javier321', 'ISA', '8343334444', '', ''),
(65, 2131300, 'Ana', 'Pérez', 'Sánchez', '1996-08-17', 'anaperez@example.com', 'ana654', 'TI', '8346667777', '', ''),
(66, 2130441, 'Brayan', 'Olivares', 'Rodríguez', '2003-03-15', '2130441@upv.edu.mx', '2130441', NULL, '8341264366', NULL, ''),
(67, 2130146, 'Dafne', 'Moreno', 'Flores', '0000-00-00', 'df@gmail.com', 'admin', NULL, '8341664163', NULL, 'conductor'),
(68, 12345, 'jauanananusn', 'dewdew', 'wedwe', '2024-04-02', 'jaja@hjbws.com', '11111', NULL, '2583691425', NULL, 'conductor'),
(69, 2130146, 'aldoooo', 'penaaaa', 'cuellllar', '2024-04-01', 'aldo@hjbws.com', '0000', NULL, '8342568888', NULL, 'pasajero'),
(70, 2130211, 'jana', 'jana', 'jana', '2024-04-19', 'jana@gmail.comn', '1111', NULL, '8345632898', NULL, 'conductor'),
(71, 2130215, 'ana', 'ana', 'jana', '2024-04-19', 'ana@gmail.comn', '1111', NULL, '8345632898', NULL, 'pasajero'),
(72, 21302112, 'wsqd', 'dwed', 'dew', '2024-04-08', 'dwe@hbcd', '00000', NULL, '8552369745', NULL, 'pasajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `ID_vehiculo` int(11) NOT NULL,
  `Placas` varchar(255) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Marca` varchar(100) DEFAULT NULL,
  `Modelo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`ID_vehiculo`, `Placas`, `Color`, `Marca`, `Modelo`) VALUES
(1, 'TAM-1317-A', 'Azul', 'Nissan', 'Altima'),
(2, 'ABX-123', 'Amarillo', 'Chevrolet', 'Matiz'),
(3, 'ABC-987', 'Blanco', 'Ford', 'Fiesta'),
(4, 'XYZ-321', 'Gris', 'Volkswagen', 'Jetta'),
(5, 'JKL-567', 'Negro', 'Honda', 'Civic'),
(6, 'xka-47B-23', 'red', 'xxxxxx', 'xxxxxx'),
(50, 'HAK-892-E', 'Negro', 'Nissan', 'Altima'),
(51, 'OQD-700-R', 'Rojo', 'Toyota', 'Matiz'),
(52, 'PYR-133-N', 'Azul', 'Honda', 'Fiesta'),
(53, 'BWE-612-J', 'Blanco', 'Ford', 'Jetta'),
(54, 'IGP-924-K', 'Gris', 'Volkswagen', 'Civic'),
(55, 'VLF-254-K', 'Negro', 'Nissan', 'Sentra'),
(56, 'GKL-740-R', 'Rojo', 'Toyota', 'Corolla'),
(57, 'LQN-952-G', 'Azul', 'Honda', 'Accord'),
(58, 'AJC-817-T', 'Blanco', 'Ford', 'Focus'),
(59, 'RMT-321-P', 'Gris', 'Volkswagen', 'Passat'),
(60, 'MVS-669-D', 'Amarillo', 'Chevrolet', 'Cruze'),
(61, 'HSF-503-Q', 'Verde', 'Hyundai', 'Elantra'),
(62, 'UEK-896-L', 'Negro', 'Kia', 'Optima'),
(63, 'OHJ-172-W', 'Blanco', 'Mazda', 'Mazda6'),
(64, 'IXG-208-M', 'Azul', 'Subaru', 'Legacy'),
(65, 'IYS-780-K', 'Negro', 'Nissan', 'Versa'),
(66, 'EVD-491-H', 'Rojo', 'Toyota', 'Camry'),
(67, 'NAP-944-T', 'Azul', 'Honda', 'Civic'),
(68, 'BRX-352-R', 'Blanco', 'Ford', 'Fusion'),
(69, 'AHO-892-P', 'Gris', 'Volkswagen', 'Golf'),
(70, 'VXC-615-K', 'Amarillo', 'Chevrolet', 'Spark'),
(71, 'QMO-299-G', 'Verde', 'Hyundai', 'Sonata'),
(72, 'CGB-416-L', 'Negro', 'Kia', 'Forte'),
(73, 'UFB-633-W', 'Blanco', 'Mazda', 'Mazda3'),
(74, 'IWO-904-D', 'Azul', 'Subaru', 'Impreza'),
(75, 'DXN-834-J', 'Negro', 'Nissan', 'Maxima'),
(76, 'CKW-176-N', 'Rojo', 'Toyota', 'Yaris'),
(77, 'CWL-548-G', 'Azul', 'Honda', 'Fit'),
(78, 'HPK-601-L', 'Blanco', 'Ford', 'Taurus'),
(79, 'KYC-278-J', 'Gris', 'Volkswagen', 'Tiguan'),
(80, 'JQN-920-Q', 'Amarillo', 'Chevrolet', 'Equinox'),
(81, 'OPL-323-T', 'Verde', 'Hyundai', 'Accent'),
(82, 'ZJL-295-K', 'Negro', 'Kia', 'Rio'),
(83, 'NYB-197-M', 'Blanco', 'Mazda', 'CX-5'),
(84, 'DHQ-782-K', 'Azul', 'Subaru', 'Forester'),
(85, 'NBL-540-Q', 'Negro', 'Nissan', 'Rogue'),
(86, 'IMF-659-R', 'Rojo', 'Toyota', 'Highlander'),
(87, 'ZVX-645-R', 'Azul', 'Honda', 'CR-V'),
(88, 'TXN-507-P', 'Blanco', 'Ford', 'Escape'),
(89, 'JVB-381-G', 'Gris', 'Volkswagen', 'Atlas'),
(90, 'YTG-964-Q', 'Amarillo', 'Chevrolet', 'Traverse'),
(91, 'SJN-582-D', 'Verde', 'Hyundai', 'Tucson'),
(92, 'PTC-801-W', 'Negro', 'Kia', 'Soul'),
(93, 'YKO-930-L', 'Blanco', 'Mazda', 'CX-9'),
(94, 'EVD-157-D', 'Azul', 'Subaru', 'Outback'),
(95, 'NXT-715-P', 'Negro', 'Nissan', 'Armada'),
(96, 'YVB-621-R', 'Rojo', 'Toyota', 'RAV4'),
(97, 'ZKR-802-J', 'Azul', 'Honda', 'Pilot');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `fecha_viaje` date DEFAULT NULL,
  `hora_viaje` time DEFAULT NULL,
  `punto_encuentro` varchar(255) DEFAULT NULL,
  `id_conductor` int(11) DEFAULT NULL,
  `id_pasajero` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `id_ruta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `fecha_viaje`, `hora_viaje`, `punto_encuentro`, `id_conductor`, `id_pasajero`, `estado`, `id_ruta`) VALUES
(1, '2024-03-05', '08:14:11', 'Estacionamiento de ITI', 1, 1, 0, 1),
(2, '2024-03-06', '11:00:00', 'Tamatan', 2, 2, 0, 1),
(3, '2024-03-07', '13:45:00', 'Hospital infantil', 3, 3, 0, 2),
(4, '2024-03-08', '09:30:00', 'Plaza', 4, 4, 0, 3),
(14, '2024-04-12', '08:00:00', 'Plaza de Armas', 3, 1, 0, 1),
(15, '2024-04-13', '14:30:00', 'Plaza Sendero', 2, 2, 0, 2),
(16, '2024-04-14', '10:45:00', 'Centro Histórico', 1, 3, 0, 3),
(17, '2024-04-15', '12:15:00', 'Soriana Citadella', 4, 4, 0, 4),
(18, '2024-04-16', '09:00:00', 'Gran Hotel Las Fuentes', 5, 5, 0, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`id_conductor`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `ID_vehiculo` (`ID_vehiculo`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD PRIMARY KEY (`pasajero_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id_ruta`),
  ADD KEY `id_conductor` (`id_conductor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`ID_vehiculo`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `id_conductor` (`id_conductor`),
  ADD KEY `id_pasajero` (`id_pasajero`),
  ADD KEY `id_ruta` (`id_ruta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `id_conductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  MODIFY `pasajero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `ID_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `conductor_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`),
  ADD CONSTRAINT `conductor_ibfk_2` FOREIGN KEY (`ID_vehiculo`) REFERENCES `vehiculo` (`ID_vehiculo`);

--
-- Filtros para la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD CONSTRAINT `pasajero_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductor` (`id_conductor`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductor` (`id_conductor`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`id_pasajero`) REFERENCES `pasajero` (`pasajero_id`),
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
