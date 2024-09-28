-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-09-2024 a las 20:21:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jmexpeditions`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `cod_categoria` varchar(6) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `descripcion_categoria` varchar(200) NOT NULL,
  `f_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `cod_categoria`, `nombre_categoria`, `descripcion_categoria`, `f_creacion`) VALUES
(35, 'CANATU', 'Turismo natural', 'Lugares donde el entorno natural es la atracción principal', '2024-08-05 19:46:09'),
(36, 'CACLAL', 'Andinismo', 'Escalada montañas, caminatas por montañas.', '2024-08-05 19:57:05'),
(37, 'CAARQU', 'Turismo cultural', 'Restos arqueológicas, construcciones antiguas, ruinas. ', '2024-08-05 19:59:26'),
(40, 'CATUVI', 'Turismo vivencial ', 'Visitas a comunidades o poblaciones costumbristas, valorando las culturas y promoviendo dichas costumbres.', '2024-08-05 20:07:59'),
(51, 'CACULT', 'Cultural', 'Restos arqueológicos y museos', '2024-08-27 10:29:19'),
(52, 'CATREK', 'Trekking', 'Caminatas por senderos de naturaleza.', '2024-08-27 10:31:41'),
(54, 'CAVOLC', 'Volcanes', 'Montañas en lugares situado sobre la superficie terrestre en el que se produce la expulsión de material magmático, ', '2024-08-27 10:33:47'),
(56, 'CAECOT', 'Ecoturismo', 'Forma de turismo orientada a la conservación y sostenibilidad', '2024-08-27 10:41:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `email_cliente` varchar(255) DEFAULT NULL,
  `telefono_cliente` varchar(20) DEFAULT NULL,
  `direccion_cliente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'Ancash'),
(2, 'Cusco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id_destino` int(11) NOT NULL,
  `codigo_destino` varchar(10) NOT NULL,
  `nombre_destino` varchar(50) NOT NULL,
  `ubicacion_destino` varchar(100) NOT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `dias_destino` int(11) DEFAULT NULL,
  `descripcion_destino` text DEFAULT NULL,
  `imagen1_destino` longblob NOT NULL,
  `imagen2_destino` longblob DEFAULT NULL,
  `imagen3_destino` longblob DEFAULT NULL,
  `parque_reserva_destino` varchar(100) DEFAULT NULL,
  `id_categoria` varchar(6) NOT NULL,
  `f_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `visible` tinyint(1) DEFAULT 1,
  `altitud_destino` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id_destino`, `codigo_destino`, `nombre_destino`, `ubicacion_destino`, `id_departamento`, `id_provincia`, `dias_destino`, `descripcion_destino`, `imagen1_destino`, `imagen2_destino`, `imagen3_destino`, `parque_reserva_destino`, `id_categoria`, `f_creacion`, `visible`, `altitud_destino`) VALUES
(1, 'LAROCOBL69', 'Laguna Rocotuyoc', 'Cordillera Blanca', 1, 6, 1, 'Una caminata de 30 minutos rodeando toda la laguna de Rocotuyoc e inclusive llegando a visitar a la Laguna Congelada', 0x494d472d32303232313131312d5741303030342e6a7067, 0x494d475f32303232313131305f3039303930305f42555253543030315f434f5645522e6a7067, 0x494d472d32303232313131312d5741303034332e6a7067, 'Parque Nacional Huascaran.', '35', '2024-08-06 17:59:44', 1, 4550),
(2, 'LALLCOBL00', 'Laguna Llanganuco', 'Cordillera Blanca', 1, 20, 1, 'Caminata breve de 15 minutos desde la parada', 0x4c6167756e61732d64652d4c6c616e67616e75636f2d363030783430302e6a7067, 0x313933372e4a5047, 0x494d472d32303232303931342d5741303037352e6a7067, 'Parque Nacional Huascaran', '35', '2024-08-09 11:15:07', 1, 3850),
(3, 'LAJACOHU49', 'Laguna Jahuacocha', 'Cordillera Huayhuash', 1, 5, 1, 'Esta laguna de aguas cristalinas, ofrece vistas espectaculares de las paredes occidentales de los picos de la cordillera', 0x31332d303520526f6e646f79204a6972697368616e63612079205965727570616ac3a12e6a7067, 0x576861747341707020496d61676520323032332d30392d313920617420332e34392e343020504d202833292e6a706567, 0x494d475f303731312e6a7067, 'Comunidad Pacllon', '35', '2024-08-16 10:56:14', 1, 4053),
(4, 'LACOCOBL46', 'Laguna Congelada', 'Cordillera Blanca', 1, 6, 1, 'La laguna congelada esta detrás de la laguna congelada', 0x4453434e393632302e4a5047, 0x4453434e393632392e4a5047, 0x4453434e393630392e4a5047, 'Parque Nacional Huascaran', '35', '2024-08-23 09:15:11', 1, 4520),
(5, 'LA69COBL93', 'Laguna 69', 'Cordillera Blanca', 1, 20, 1, 'La Laguna 69, situada en el Parque Nacional Huascarán, es un impresionante espejo de agua turquesa ubicado a 4,600 metros sobre el nivel del mar. Rodeada de imponentes picos nevados y alimentada por el deshielo de los glaciares, es un destino popular para senderistas que buscan paisajes naturales de ensueño en la Cordillera Blanca.', 0x6c6167756e6136395f332e6a7067, 0x4c6167756e612d36392d48756172617a2d373638783334312e6a7067, 0x4c6167756e615f36392c5f59756e6761795f2d5f48756172617a5f2d5f506572c3ba2e6a7067, 'Parque Nacional Huascaran', '35', '2024-09-04 17:14:20', 1, 4604),
(9, 'CASACADE26', 'Campo Santo', 'Callejón de Huaylas', 1, 20, NULL, 'El Campo Santo que se encuentra ubicado en la ciudad de Yungay, uno de los pueblos mas prósperos del Callejón de Huaylas. ', 0x696d6167656e2079756e6761792e6a7067, NULL, NULL, 'Ninguna', '51', '2024-09-23 12:49:39', 1, 2548);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` varchar(11) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `correo_empresa` text NOT NULL,
  `telefono_empresa` varchar(10) NOT NULL,
  `logo_empresa` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `id_paquete` int(11) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `hora_retorno` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_destinos`
--

CREATE TABLE `imagenes_destinos` (
  `id_imagen` int(11) NOT NULL,
  `id_destino` int(11) DEFAULT NULL,
  `url_imagen` varchar(255) DEFAULT NULL,
  `descripcion_imagen` text DEFAULT NULL,
  `f_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `f_editado` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_destinos`
--

INSERT INTO `imagenes_destinos` (`id_imagen`, `id_destino`, `url_imagen`, `descripcion_imagen`, `f_creacion`, `f_editado`) VALUES
(1, 3, 'Imagen10 - copia.jpg', 'vista de quebrada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 'Imagen7 - copia.jpg', 'Rodeo (full day)', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 'DSCN8880.JPG', 'En la boca de la laguna Jahuacocha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'montana-laguna-llanganuco.jpg', 'Desde la quebrada.', '2024-08-28 23:31:24', '0000-00-00 00:00:00'),
(7, 4, 'Imagen de WhatsApp 2024-08-09 a las 21.43.37_173d392e.jpg', '', '2024-08-28 23:31:58', '0000-00-00 00:00:00'),
(10, 2, '9c.jpg', '', '2024-08-28 23:33:29', '0000-00-00 00:00:00'),
(11, 1, 'laguna-rocotuyoc-laguna-congelada.jpg', 'Vista desde la entrada.', '2024-08-28 23:33:47', '2024-09-23 16:16:53'),
(12, 3, 'DSCN8971 (1).JPG', 'Caminata a la laguna.', '2024-09-03 11:42:07', '2024-09-03 11:43:18'),
(13, 5, '69.jpg', 'vista con el nevado', '2024-09-04 21:44:58', '0000-00-00 00:00:00'),
(14, 5, 'laguna69-in-huaraz-1.jpg', 'Vista desde el camino', '2024-09-04 21:45:23', '0000-00-00 00:00:00'),
(15, 5, 'LAGUNA-69-1.jpg', 'Vista panoramica de la laguna', '2024-09-04 21:45:46', '0000-00-00 00:00:00'),
(16, 3, 'DSCN8889.JPG', 'pampa vista a jerupaja', '2024-09-11 15:23:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itinerarios`
--

CREATE TABLE `itinerarios` (
  `id_itinerario` int(11) NOT NULL,
  `id_paquete` int(11) DEFAULT NULL,
  `id_destino` int(11) DEFAULT NULL,
  `orden_itinerario` int(11) DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `tipo_destino` varchar(24) NOT NULL,
  `descripcion_actividad` text DEFAULT NULL,
  `f_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `itinerarios`
--

INSERT INTO `itinerarios` (`id_itinerario`, `id_paquete`, `id_destino`, `orden_itinerario`, `hora_salida`, `tipo_destino`, `descripcion_actividad`, `f_creacion`) VALUES
(1, 1, 5, 1, '09:00:00', 'Final', 'Avistamiento y caminata alrededor de la laguna 69', '2024-09-04'),
(2, NULL, 2, 1, '00:20:00', 'Final', 'Aventurate en las quebradas de llanganuco y mas.', '2024-09-23'),
(3, 4, 9, 1, '01:00:00', 'Final', 'Destino final', '2024-09-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id_paquete` int(11) NOT NULL,
  `nombre_paquete` varchar(255) DEFAULT NULL,
  `descripcion_paquete` text DEFAULT NULL,
  `duracion_paquete` int(11) DEFAULT NULL,
  `precio_paquete` decimal(10,2) DEFAULT NULL,
  `disponibilidad_paquete` tinyint(1) DEFAULT NULL,
  `f_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `tipo_paquete` enum('FullDay','Varios días') NOT NULL,
  `f_actualizacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `noches_paquete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id_paquete`, `nombre_paquete`, `descripcion_paquete`, `duracion_paquete`, `precio_paquete`, `disponibilidad_paquete`, `f_creacion`, `tipo_paquete`, `f_actualizacion`, `noches_paquete`) VALUES
(1, 'Aventura a la laguna 69', 'Un emocionante recorrido por las maravillas naturales y culturales de Áncash', 1, 50.00, 1, '2024-09-04 16:56:32', 'FullDay', '0000-00-00 00:00:00', 0),
(2, 'Aventura a la laguna Llanganuco', 'Un emocionante recorrido por las maravillas naturales y culturales de Áncash pasando por Yungay', 1, 60.00, 1, '2024-09-04 16:58:59', 'FullDay', '0000-00-00 00:00:00', 0),
(3, 'Aventura a la laguna Jahuacocha', 'Un emocionante recorrido por las maravillas naturales y culturales de Bolognesi en la cordillera Huayhuash pasando por Chiquian espejito del cielo', 1, 300.00, 1, '2024-09-04 17:01:30', 'FullDay', '0000-00-00 00:00:00', 0),
(4, 'Aventura a campo santos', 'Caminata por ciudad sepultada de Yungay con el nombre de campo santos', 1, 40.00, 1, '2024-09-23 12:49:26', 'FullDay', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(11) NOT NULL,
  `nombre_provincia` varchar(255) NOT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre_provincia`, `id_departamento`) VALUES
(1, 'Huaraz', 1),
(2, 'Aija', 1),
(3, 'Antonio Raymondi', 1),
(4, 'Asunción', 1),
(5, 'Bolognesi', 1),
(6, 'Carhuaz', 1),
(7, 'Carlos Fermín Fitzcarrald', 1),
(8, 'Casma', 1),
(9, 'Corongo', 1),
(10, 'Huari', 1),
(11, 'Huarmey', 1),
(12, 'Huaylas', 1),
(13, 'Mariscal Luzuriaga', 1),
(14, 'Ocros', 1),
(15, 'Pallasca', 1),
(16, 'Pomabamba', 1),
(17, 'Recuay', 1),
(18, 'Santa', 1),
(19, 'Sihuas', 1),
(20, 'Yungay', 1),
(21, 'Cusco', 2),
(22, 'Acomayo', 2),
(23, 'Anta', 2),
(24, 'Calca', 2),
(25, 'Canas', 2),
(26, 'Canchis', 2),
(27, 'Chumbivilcas', 2),
(28, 'Espinar', 2),
(29, 'La Convención', 2),
(30, 'Paruro', 2),
(31, 'Paucartambo', 2),
(32, 'Quispicanchi', 2),
(33, 'Urubamba', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_paquete` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `estado_reserva` varchar(20) DEFAULT NULL,
  `cantidad_personas` int(11) DEFAULT NULL,
  `precio_total` decimal(10,2) DEFAULT NULL,
  `f_creacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `cod_categoria` (`cod_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_destino`),
  ADD UNIQUE KEY `codigo_destino` (`codigo_destino`),
  ADD KEY `fk_destino_categoria` (`id_categoria`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_paquete` (`id_paquete`);

--
-- Indices de la tabla `imagenes_destinos`
--
ALTER TABLE `imagenes_destinos`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_destino` (`id_destino`);

--
-- Indices de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  ADD PRIMARY KEY (`id_itinerario`),
  ADD KEY `id_paquete` (`id_paquete`),
  ADD KEY `id_destino` (`id_destino`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id_paquete`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_paquete` (`id_paquete`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_destinos`
--
ALTER TABLE `imagenes_destinos`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  MODIFY `id_itinerario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id_paquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`);

--
-- Filtros para la tabla `imagenes_destinos`
--
ALTER TABLE `imagenes_destinos`
  ADD CONSTRAINT `imagenes_destinos_ibfk_1` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id_destino`);

--
-- Filtros para la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  ADD CONSTRAINT `itinerarios_ibfk_1` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`),
  ADD CONSTRAINT `itinerarios_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id_destino`);

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `provincias_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id_departamento`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_paquete`) REFERENCES `paquetes` (`id_paquete`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
