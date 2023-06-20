-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2023 a las 22:36:43
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_hotel`
--

CREATE TABLE `datos_hotel` (
  `id_hotel` int(20) NOT NULL,
  `nombre_hotel` varchar(40) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `ciudad` varchar(40) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `numero_personas` int(11) NOT NULL,
  `numero_habitaciones` int(11) NOT NULL,
  `fotos` longtext NOT NULL,
  `descripcion` text NOT NULL,
  `precio_dia` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_hotel`
--

INSERT INTO `datos_hotel` (`id_hotel`, `nombre_hotel`, `pais`, `ciudad`, `direccion`, `telefono`, `numero_personas`, `numero_habitaciones`, `fotos`, `descripcion`, `precio_dia`) VALUES
(1, 'Hotel Spa Amaltea by Executive Sport', 'España', 'Lorca', 'Carretera de Granada 147', '111111111', 2, 2, 'hotel_Amaltea.jpg', 'El Hotel Spa Amaltea by Executive Sport se encuentra en Lorca y ofrece alojamiento de 4 estrellas con jardín y salón compartido. Este hotel de 4 estrellas cuenta con centro de fitness y habitaciones con aire acondicionado, WiFi gratuita y baño privado. El hotel dispone de habitaciones familiares.\nTodas las habitaciones incluyen escritorio y TV de pantalla plana. Las habitaciones del Hotel Spa Amaltea by Executive Sport incluyen ropa de cama y toallas.\nTodos los días se sirve un desayuno buffet y continental.\nEl Hotel Spa Amaltea by Executive Sport alberga un solárium.\nEl aeropuerto más cercano es el aeropuerto internacional Región de Murcia, ubicado a 70 km del hotel.', '80.00'),
(2, 'Hotel Turia', 'España', 'Valencia', 'Profesor Beltran Baguena, 2, Campanar, 46009', '222222222', 2, 2, 'hotel_Turia.jpg', 'El Hotel Turia se encuentra junto a la estación de autobuses de Valencia y a 350 metros de la estación de metro Turia. El alojamiento está situado frente al jardín del Turia y el jardín botánico de Valencia, a 20 minutos a pie de la catedral.\r\nTodas las habitaciones del Turia Hotel disponen de aire acondicionado y TV. La mayoría están equipadas con balcón privado. Todas las habitaciones incluyen caja fuerte y baño privado con secador de pelo.\r\nEl hotel se halla frente al centro comercial Nuevo Centro y los grandes almacenes El Corte Inglés. El alojamiento también está bien comunicado en transporte público con la Ciudad de las Artes y las Ciencias, el aeropuerto y el centro de convenciones.\r\nEl Turia cuenta con bar, mostrador de información turística y recepción 24 horas.\r\nHay WiFi gratuita en todas las instalaciones. Se facilita aparcamiento por un suplemento.\r\nSe están llevando a cabo obras de reforma en el hotel. Debido a ello, puede haber ruido durante el día.', '85.00'),
(3, 'Hotel Azur', 'Francia', 'Cap d\'Agde', '18 Avenue Des Iles D\'Amérique', '123456789', 2, 2, 'hotel_Azur.jpg', 'El Hôtel Azur ofrece alojamiento, WiFi gratuita y una piscina al aire libre en Cap d\'Agde, a 1 km de la playa más cercana. El establecimiento alberga un bar. Hay aparcamiento privado gratuito.\n\nTodas las habitaciones del hotel están insonorizadas y disponen de aire acondicionado y TV de pantalla plana vía satélite. Las habitaciones disponen de baño privado con bañera. Hay artículos de aseo gratuitos y secador de pelo.\n\nLa recepción está abierta las 24 horas. El Hôtel Azur también dispone de salas de reuniones.\n\nEl aeropuerto de Béziers Cap d\'Agde, el aeropuerto más cercano, está a 14 km.\n\nNuestros clientes dicen que esta parte de Cap d\'Agde es su favorita, según los comentarios independientes.\n\nA las parejas les encanta la ubicación — Le han puesto un 8,8 para viajes de dos personas.', '120.00'),
(4, 'Hotel Archie Living', 'España', 'barcelona', '3 Avinguda de Vilanova, Eixample, 08018 Barcelona,', '68829234', 2, 3, 'hotel_Archie.jpg', 'El Archie Living se encuentra a 2,1 km de la playa de Nova Icaria y ofrece piscina al aire libre, terraza y alojamiento con aire acondicionado, balcón y WiFi gratuita.\n\nEl alojamiento cuenta con TV de pantalla plana, baño privado con ducha, bañera de hidromasaje y artículos de aseo gratuitos y cocina con nevera, horno y lavavajillas. Hay microondas, fogones, tostadora, cafetera y hervidor de agua.\n\nEl aparthotel está cerca del Museo Picasso, el Palau de la Música Catalana y el teatro Tivoli. El aeropuerto más cercano es el de Barcelona-El Prat, ubicado a 14 km del Archie Living.\n\nNuestros clientes dicen que esta parte de Barcelona es su favorita, según los comentarios independientes.', '90.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_reserva`
--

CREATE TABLE `datos_reserva` (
  `id_reserva` int(20) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dni` varchar(30) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fecha_inicio` varchar(20) NOT NULL,
  `fecha_fin` varchar(20) NOT NULL,
  `nombre_hotel` varchar(255) NOT NULL,
  `num_personas` int(5) NOT NULL,
  `num_habitaciones` int(5) NOT NULL,
  `total_dias` int(5) NOT NULL,
  `precio_total` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_reserva`
--

INSERT INTO `datos_reserva` (`id_reserva`, `id_hotel`, `id_usuario`, `dni`, `nombre`, `apellidos`, `correo`, `telefono`, `fecha_inicio`, `fecha_fin`, `nombre_hotel`, `num_personas`, `num_habitaciones`, `total_dias`, `precio_total`) VALUES
(1, 2, 2, '12345678p', 'daniel', 'lorente', 'daniel132364@gmail.com', '54856498', '2023-06-19', '2023-06-23', 'Hotel Turia', 2, 2, 4, '340.00'),
(2, 2, 2, '12345678p', 'daniel', 'lorente', 'daniel132364@gmail.com', '54856498', '2023-06-19', '2023-06-23', 'Hotel Turia', 2, 2, 4, '340.00'),
(8, 0, 2, '12345678p', 'daniel', 'lorente', 'Myhotel@gmail.com', '54856498', '2023-06-20', '2023-06-21', 'Hotel Turia', 2, 2, 1, '0.00'),
(9, 2, 2, '12345678p', 'daniel', 'lorente', 'daniel132364@gmail.com', '54856498', '2023-06-19', '2023-06-23', 'Hotel Turia', 2, 2, 4, '340.00'),
(18, 1, 3, '12345678p', 'daniel', 'lorente', '', '54856498', '2023-06-22', '2023-06-24', 'Hotel Azur', 2, 2, 2, '240.00'),
(21, 4, 3, '12345678p', 'daniel', 'lorente', '', '54856498', '2023-06-22', '2023-06-29', 'Hotel Azur', 2, 2, 7, '840.00'),
(23, 4, 3, '12345678p', 'daniel', 'lorente', '', '54856498', '2023-06-20', '2023-06-21', 'Hotel Azur', 2, 2, 1, '120.00'),
(31, 2, 2, '12345678p', 'daniel', 'lorente', '', '54856498', '2023-06-21', '2023-06-22', 'Hotel Spa Amaltea by Executive Sport', 2, 2, 1, '80.00'),
(32, 1, 1, '12345678p', 'dani', 'lorente', 'daniel132364@gmail.com', '54856498', '2023-06-19', '2023-06-21', 'Hotel Spa Amaltea by Executive Sport', 2, 2, 2, '160.00'),
(33, 1, 1, '12345678p', 'daniel', 'lorente', '', '54856498', '2023-06-20', '2023-06-23', 'Hotel Archie Living', 2, 3, 3, '270.00'),
(35, 1, 1, '12345678p', 'daniel', 'lorente', '', '54856498', '2023-06-21', '2023-06-29', 'Hotel Spa Amaltea by Executive Sport', 2, 2, 8, '640.00'),
(37, 3, 121, '12345678p', 'daniel', 'lorente', 'user1@gmail.com', '54856498', '2023-06-20', '2023-06-21', 'Hotel Azur', 2, 2, 1, '120.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuario`
--

CREATE TABLE `datos_usuario` (
  `id_usuario` int(6) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_usuario`
--

INSERT INTO `datos_usuario` (`id_usuario`, `email`, `pass`) VALUES
(1, 'daniel132364@gmail.com', 'admin1234'),
(2, 'Myhotel@gmail.com', 'admin1111'),
(3, 'usuario1@gmail.com', '$2y$10$1nqJC9/ngt/ub'),
(4, 'prueba1@gmail.com', 'prueba1234'),
(90, 'daniel132364@gmail.com', '$2y$10$AjA//IwSb85FG'),
(91, 'prueba2@gmail.com', '$2y$10$iF.UDOXCAisoH'),
(92, 'prueba3@gmail.com', '$2y$10$s4ZtihfGwMgAW'),
(93, 'prueba4@gmail.com', '$2y$10$npm.mRDmbME/l'),
(94, 'prueba5@gmail.com', '$2y$10$3le8esBeBteFj'),
(95, 'prueba6@gmail.com', '$2y$10$lRuwL0PuX1dbz'),
(96, 'usuario2@gmail.com', '$2y$10$nYXC2ISVEw1n.'),
(97, 'usuario3@gmail.com', '$2y$10$03QYTuj4SdviO'),
(98, 'usuario7@gmail.com', '$2y$10$v8Ik.vfbnpTis'),
(99, 'usuario10@gmail.com', '$2y$10$iHIDBuxSVGwvj'),
(100, 'usuario11@gmail.com', '$2y$10$Zs0iwM9jGSe3G'),
(101, 'usuario11@gmail.com', 'admin12345'),
(102, 'usuario12@gmail.com', 'user1234'),
(103, 'prueba12@gmail.com', 'prueba12'),
(104, 'prueba20@gmail.com', '$2y$10$TD66BNGfWAhhE'),
(105, 'prueba30@gmail.com', '$2y$10$dY0kN7Jl0s4G2'),
(106, 'prueba40@gmail.com', '$2y$10$smuOM2KlIsJY4'),
(107, 'Myhotel2@gmail.com', '$2y$10$vSasn6oekNosO'),
(108, 'prueba25@gmail.com', '$2y$10$ihYTqgU6v1mKW'),
(110, 'Myhotel10@gmail.com', '$2y$10$/24ARiKpRH4Vm'),
(112, 'prueba90@gmail.com', '9ba41df46c6b44aa8f4c'),
(113, 'prueba100@gmail.com', 'c94afe2dfac199e633b3'),
(114, 'usuario40@gmail.com', '16472f957f36587f609f'),
(115, 'prueba101@gmail.com', 'fc1840c493fe4408fc69'),
(116, 'prueba101@gmail.com', 'fc1840c493fe4408fc69'),
(117, 'prueba103@gmail.com', '62c7bfdefe920e61f2a4'),
(118, 'prueba150@gmail.com', '36ed09570c1a81a8bff4'),
(119, 'prueba150@gmail.com', '36ed09570c1a81a8bff4'),
(120, 'prueba200@gmail.com', '6eea167afdaaecae4b05'),
(121, 'user1@gmail.com', 'user1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_hotel`
--
ALTER TABLE `datos_hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indices de la tabla `datos_reserva`
--
ALTER TABLE `datos_reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `datos_usuario`
--
ALTER TABLE `datos_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_hotel`
--
ALTER TABLE `datos_hotel`
  MODIFY `id_hotel` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `datos_reserva`
--
ALTER TABLE `datos_reserva`
  MODIFY `id_reserva` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `datos_usuario`
--
ALTER TABLE `datos_usuario`
  MODIFY `id_usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
