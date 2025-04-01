-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2025 a las 12:57:22
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `boxeoproject_crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boxeador`
--

CREATE TABLE `boxeador` (
  `id` int(11) NOT NULL,
  `nombre_boxeador` varchar(60) NOT NULL,
  `apellido_boxeador` varchar(60) NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `fecha_creado` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `boxeador`
--

INSERT INTO `boxeador` (`id`, `nombre_boxeador`, `apellido_boxeador`, `peso`, `fecha_creado`, `id_usuario`) VALUES
(19, ' Canelo', 'Álvarez', '76.00', '2025-02-09', 14),
(20, ' Edgar', 'Berlanga', '80.00', '2025-02-09', 14),
(21, ' Danny', 'García', '63.00', '2025-02-09', 14),
(22, ' Erislandy', 'Lara', '70.00', '2025-02-09', 14),
(23, ' Naoya', 'Inoue', '55.00', '2025-02-09', 14),
(24, ' Sam', 'Goodman', '56.00', '2025-02-09', 14),
(25, ' Artur', 'Beterbiev', '80.00', '2025-02-09', 15),
(26, ' Dmitry', 'Bivol', '79.00', '2025-02-09', 15),
(27, ' Daniel ', 'Dubois', '112.00', '2025-02-09', 15),
(28, ' Joseph', 'Parker', '112.00', '2025-02-09', 15),
(29, ' Carlos', 'Adames', '72.00', '2025-02-09', 15),
(30, ' Hamzah', 'Sheeraz', '72.00', '2025-02-09', 15),
(31, ' Vergil', 'Ortiz Jr', '66.00', '2025-02-09', 15),
(32, ' Israil', 'Madrimov', '70.00', '2025-02-09', 15),
(33, ' Luis', 'Chicaiza', '60.00', '2025-02-10', 18),
(34, 'Agustín', 'García', '62.00', '2025-02-10', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combate`
--

CREATE TABLE `combate` (
  `id` int(11) NOT NULL,
  `id_velada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `combate`
--

INSERT INTO `combate` (`id`, `id_velada`) VALUES
(187, 87),
(188, 87),
(186, 88),
(189, 89),
(190, 89),
(191, 89),
(192, 89),
(197, 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participar`
--

CREATE TABLE `participar` (
  `id_combate` int(11) NOT NULL,
  `id_boxeador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `participar`
--

INSERT INTO `participar` (`id_combate`, `id_boxeador`) VALUES
(186, 23),
(186, 24),
(187, 19),
(187, 20),
(188, 21),
(188, 22),
(189, 25),
(189, 26),
(190, 27),
(190, 28),
(191, 29),
(191, 30),
(192, 31),
(192, 32),
(197, 33),
(197, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(40) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `contrasenia` char(60) NOT NULL,
  `rol` enum('usuario','admin') DEFAULT 'usuario',
  `fecha_creado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_usuario`, `correo`, `contrasenia`, `rol`, `fecha_creado`) VALUES
(14, ' juan', 'juanperez@gmail.com', '$2y$10$5WqNVrfPPy/Uzn5Yks/KVe4IsGfRTYmeNTt2N5bhnq4l3HNWYBb/.', 'usuario', '2025-02-09'),
(15, ' Felipe', 'felipe@gmail.com', '$2y$10$8dUG5g/r55kPMp3oaZ0zj.XiJLHy42Hti3Z0zzREkHj1DsmsQkZl6', 'usuario', '2025-02-09'),
(18, ' Luis', 'luis@gmail.com', '$2y$10$O8qekwq0rKVBBiOi4lGKfeDH.ACOlmrcVYPgUN0ICSTdNeZJZozdK', 'usuario', '2025-02-10'),
(19, ' Demo', 'demo@example.com', '$2y$10$Vs9LxTs098qHfL4nsjB6GeceIgy9HgREl0aoFqK.WhZbHWs0qHm/y', 'usuario', '2025-04-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `velada`
--

CREATE TABLE `velada` (
  `id` int(11) NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `imagen_url` varchar(250) NOT NULL,
  `lugar` varchar(60) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `nombre_promotor` varchar(60) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `fecha_publicada` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `velada`
--

INSERT INTO `velada` (`id`, `tipo`, `imagen_url`, `lugar`, `fecha`, `hora`, `direccion`, `precio`, `nombre_promotor`, `descripcion`, `fecha_publicada`, `id_usuario`) VALUES
(87, 'Campeonato unificado', '3b2d7b128d40f9234c9adfd83e31e506.webp', 'T-Mobile Arena', '2025-02-14', '20:00:00', '3570 S Las Vegas Blvd, Paradise, NV 89109, Estados Unidos', '200.00', 'Canelo Promotions', 'Este combate se llevará a cabo en la Vegas, Nevada entre Canelo y Berlanga para saber que boxeador se hace con los títulos peso supermediano AMB, OMB Y CMB.\r\nAdemás, se disputaron otros combates pero estos fueron los principales.\r\nNOTA: La fecha de esta cartelera es ficticia y es utilizada únicamente para fines académicos.', '2025-02-09', 14),
(88, 'Peso supergallo', '0b071a4e567123f32e2fae230b8e2223.webp', 'Ariake Arena, Tokio', '2025-03-22', '20:00:00', 'Ariake, Koto City, Tokyo 135-0063, Japón', '150.00', 'Ohashi Promotions', 'El boxeador japonés Inoue expone sus títulos del peso supergallo FIB, CMB, AMB y OMB antes el australiano Goodman.\r\nEsta pelea tuvo que realizarse en diciembre de 2024, pero se aplazó para el 24 enero de 2025 por una lesión de Goodman. Finalmente, tuvo que cancelarse ya que no se pudo recuperar de la lesión y el japonés tuvo que enfrentar a otro oponente.\r\nNOTA: La fecha de esta cartelera es ficticia y es utilizada únicamente para fines académicos.', '2025-02-09', 14),
(89, ' Campeonato unificado', '2212841e624532dd5753eed417646804.webp', 'Kingdom Arena, Arabia Saudita', '2025-02-22', '19:00:00', ' Riyadh 13516, Arabia Saudí', '250.00', 'Turki Al-Alshikh ', 'Esta cartelera es una de las más esperadas del 2025. Supone la Revancha entre Beterbiev vs Bivol, quienes se enfrentaron en octubre de 2024 y se llevó la victoria Artur Beterbiev.\r\nEn juego están los cinturones unificados del peso semipesado de la IBF, WBC y WBO.\r\nAdemás, se disputarán más combates con cinturones también en juego.', '2025-02-09', 15),
(90, 'Interclub', '36d91faeee40a8d88490458008829126.webp', 'Centro Deportivo Aitor Nieto', '2025-09-27', '20:30:00', 'Colloto', '10.00', 'Aitor Nieto ', 'NOTA: Esta es una velada que tuvo lugar en el año 2024 en la cual participé.\r\nAhora es una cartelera con una fecha ficticia publicada para fines académicos.\r\n', '2025-02-10', 18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boxeador`
--
ALTER TABLE `boxeador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BOXEADOR_USUARIO` (`id_usuario`);

--
-- Indices de la tabla `combate`
--
ALTER TABLE `combate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_COMBATE_VELADA` (`id_velada`);

--
-- Indices de la tabla `participar`
--
ALTER TABLE `participar`
  ADD PRIMARY KEY (`id_combate`,`id_boxeador`),
  ADD KEY `FK_PARTICIPAR_BOXEADOR` (`id_boxeador`),
  ADD KEY `FK_PARTICIPAR_COMBATE` (`id_combate`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `velada`
--
ALTER TABLE `velada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_VELADA_USUARIO` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boxeador`
--
ALTER TABLE `boxeador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `combate`
--
ALTER TABLE `combate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `velada`
--
ALTER TABLE `velada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boxeador`
--
ALTER TABLE `boxeador`
  ADD CONSTRAINT `FK_BOXEADOR_USUARIO` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `combate`
--
ALTER TABLE `combate`
  ADD CONSTRAINT `FK_COMBATE_VELADA` FOREIGN KEY (`id_velada`) REFERENCES `velada` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `participar`
--
ALTER TABLE `participar`
  ADD CONSTRAINT `FK_PARTICIPAR_BOXEADOR` FOREIGN KEY (`id_boxeador`) REFERENCES `boxeador` (`id`),
  ADD CONSTRAINT `FK_PARTICIPAR_COMBATE` FOREIGN KEY (`id_combate`) REFERENCES `combate` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
