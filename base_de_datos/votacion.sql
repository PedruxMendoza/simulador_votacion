-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2019 a las 16:11:49
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votacion`
--
CREATE DATABASE IF NOT EXISTS `votacion` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `votacion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `id_candidato` int(11) NOT NULL,
  `DUI_persona` char(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`id_candidato`, `DUI_persona`) VALUES
(5, '00000000-0'),
(2, '02165489-4'),
(1, '12345678-9'),
(3, '32156789-5'),
(4, '56498346-9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`) VALUES
(1, 'Ahuachapán'),
(2, 'Sonsonate'),
(3, 'Santa Ana'),
(4, 'Cabañas'),
(5, 'Chalatenango'),
(6, 'Cuscatlán'),
(7, 'La Libertad'),
(8, 'La Paz'),
(9, 'San Salvador'),
(10, 'San Vicente'),
(11, 'Morazán'),
(12, 'San Miguel'),
(13, 'Usulután'),
(14, 'La Unión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_votacion`
--

CREATE TABLE `detalles_votacion` (
  `id_DV` int(11) NOT NULL,
  `FechaHora` datetime NOT NULL,
  `id_votacion` int(11) NOT NULL,
  `DUI_persona` char(10) COLLATE latin1_spanish_ci NOT NULL,
  `id_candidato` int(11) DEFAULT NULL,
  `id_voto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `detalles_votacion`
--

INSERT INTO `detalles_votacion` (`id_DV`, `FechaHora`, `id_votacion`, `DUI_persona`, `id_candidato`, `id_voto`) VALUES
(26, '2019-12-03 08:54:00', 1, '98765432-1', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_persona`
--

CREATE TABLE `estado_persona` (
  `id_estadoh` int(11) NOT NULL,
  `nombre_estadoh` varchar(15) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estado_persona`
--

INSERT INTO `estado_persona` (`id_estadoh`, `nombre_estadoh`) VALUES
(1, 'Habilitado'),
(2, 'No Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_votacion`
--

CREATE TABLE `estado_votacion` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estado_votacion`
--

INSERT INTO `estado_votacion` (`id_estado`, `nombre_estado`) VALUES
(1, 'Disponible'),
(2, 'No Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_voto`
--

CREATE TABLE `estado_voto` (
  `id_voto` int(11) NOT NULL,
  `descripcion` varchar(7) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estado_voto`
--

INSERT INTO `estado_voto` (`id_voto`, `descripcion`) VALUES
(1, 'Voto'),
(2, 'No Voto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`, `id_departamento`) VALUES
(1, 'San Francisco Menéndez', 1),
(2, 'Acajutla', 2),
(3, 'Coatepeque', 3),
(4, 'Sensuntepeque', 4),
(5, 'La Palma', 5),
(6, 'Cojutepeque', 6),
(7, 'Santa Tecla', 7),
(8, 'Olocuilta', 8),
(9, 'San Salvador', 9),
(10, 'Verapaz', 10),
(11, 'San Francisco Gotera', 11),
(12, 'Chinameca', 12),
(13, 'Santiago de María	', 13),
(14, 'Concepción de Oriente	', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padron`
--

CREATE TABLE `padron` (
  `id_padron` int(11) NOT NULL,
  `id_urnas` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `DUI_persona` char(10) COLLATE latin1_spanish_ci NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `FechaHora_Mod` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `padron`
--

INSERT INTO `padron` (`id_padron`, `id_urnas`, `DUI_persona`, `id_usuario`, `FechaHora_Mod`) VALUES
(1, '00001', '12345678-9', 4, '2019-12-03 08:57:00'),
(2, '00001', '02165489-4', 4, '2019-12-03 08:57:00'),
(3, '00001', '32156789-5', 6, '2019-11-30 10:40:00'),
(13, '00001', '98765432-1', 6, '2019-11-30 10:38:00'),
(14, '00002', '22222222-2', 4, '2019-12-03 08:57:00'),
(15, '0003', '33333333-3', 4, '2019-12-03 08:57:00'),
(16, '00002', '77777777-7', 4, '2019-12-03 08:57:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido_politico`
--

CREATE TABLE `partido_politico` (
  `id_partido` int(11) NOT NULL,
  `nombre_partido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `imagen` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `img` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `id_votacion` int(11) NOT NULL,
  `id_candidato` int(11) NOT NULL,
  `Votos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `partido_politico`
--

INSERT INTO `partido_politico` (`id_partido`, `nombre_partido`, `imagen`, `img`, `id_votacion`, `id_candidato`, `Votos`) VALUES
(1, 'Frente Farabundo Marti para la Liberacion Nacional', '', 'props/partido/F/fm.png', 1, 1, 48),
(2, 'Alianza Republicana Nacionalista', '', 'props/partido/A/are.png', 1, 2, 35),
(3, 'VAMOS', 'VAMOS.png', 'props/partido/VAMOS/VAMOS.png', 1, 3, 56),
(4, 'Partido Concertacion Nacional', 'PCN.png', 'props/partido/PCN/PCN.png', 1, 4, 0),
(5, 'Partido Democrata Cristiano', 'PDC.png', 'props/partido/PDC/PDC.png', 1, 3, 0),
(6, 'Partido Democracia Salvadorena', 'DS.png', 'props/partido/DS/DS.png', 1, 4, 2),
(7, 'Partido Nuevas Ideas', 'NUEVAS-IDEAS.png', 'props/partido/NI/NUEVAS-IDEAS.png', 1, 4, 0),
(8, 'Partido Gran Alianza por la Unidad Nacional', 'GANA.png', 'props/partido/GANA/GANA.png', 1, 1, 0),
(15, 'Voto Nulo', '', 'props/partido/VN/VN.jpg', 1, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `DUI_persona` char(10) COLLATE latin1_spanish_ci NOT NULL,
  `nombre1` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `nombre2` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `nombre3` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre4` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `apellido1` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido2` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido3` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` char(9) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fnacimiento` date NOT NULL,
  `fexpedicion` date NOT NULL,
  `fexpiracion` date NOT NULL,
  `id_estadoh` int(11) NOT NULL,
  `id_estadov` int(11) NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `foto` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`DUI_persona`, `nombre1`, `nombre2`, `nombre3`, `nombre4`, `apellido1`, `apellido2`, `apellido3`, `telefono`, `direccion`, `fnacimiento`, `fexpedicion`, `fexpiracion`, `id_estadoh`, `id_estadov`, `id_sexo`, `id_municipio`, `foto`) VALUES
('00000000-0', 'Nulo', 'Nulo', NULL, NULL, 'Nulo', 'Nulo', NULL, '00000000', 'Ninguna', '0000-00-00', '0000-00-00', '0000-00-00', 2, 1, 1, 11, ''),
('02165489-4', 'Ariel ', 'Isaac ', NULL, NULL, 'Paniagua', 'Guerra', NULL, '21657892', 'aqui por no estar aya', '1990-05-08', '2012-05-05', '2021-05-04', 2, 1, 1, 2, ''),
('12345678-9', 'Aquiles', 'Armando', NULL, NULL, 'Brinco', 'Casas', NULL, '1234-5678', 'Donde este tu corazon', '2019-08-22', '2019-12-26', '2020-06-17', 2, 1, 1, 12, ''),
('22222222-2', 'Merlin', 'Rocio', NULL, NULL, 'Martinez', 'Miranda', NULL, '7773-5000', 'planes de renderos', '2001-03-30', '2019-12-31', '2027-12-31', 2, 1, 2, 9, ''),
('32156789-5', 'anacleto', 'porsisoca', NULL, NULL, 'porsino', 'nose', NULL, '64658959', 'aqui', '1980-05-02', '2015-05-08', '2030-05-07', 2, 1, 1, 6, ''),
('33333333-3', 'Irvin', 'Alexis', NULL, NULL, 'Ruano', 'Hernandez', NULL, '7777-8888', 'San Martin', '1992-05-03', '2019-06-14', '2027-06-14', 2, 1, 1, 9, ''),
('56498346-9', 'Nayib', 'Armando', NULL, NULL, 'Bukele', 'nose', NULL, '78995645', 'nose', '1985-12-15', '2016-04-09', '2030-05-07', 2, 1, 1, 5, ''),
('77777777-7', 'William', 'Danilo', NULL, NULL, 'Quijano', 'Roque', NULL, '7126-4698', 'nose', '1995-08-03', '2017-06-05', '2025-05-05', 2, 1, 1, 5, ''),
('98765432-1', 'Pedro', 'Antonio', NULL, NULL, 'Mendoza', 'Ramirez', NULL, '7730-1602', 'Donde este tu corazon', '1993-03-14', '2019-12-03', '2027-12-03', 2, 1, 1, 9, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_viva`
--

CREATE TABLE `persona_viva` (
  `id_estadov` int(11) NOT NULL,
  `nombre_estadov` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `persona_viva`
--

INSERT INTO `persona_viva` (`id_estadov`, `nombre_estadov`) VALUES
(1, 'Viva'),
(2, 'Muerta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Admin'),
(2, 'Enc. Urnas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(11) NOT NULL,
  `nombre_sede` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nombre_sede`, `direccion`, `id_municipio`) VALUES
(1, 'Escuela Majuahual', 'Donde este tu corazon', 1),
(2, 'COMPLEJO EDUCATIVO JOSE PANTOJA HIJO', 'aqui', 14),
(3, 'CANCHA Y CASA COMUNAL RESIDENCIAL SAN ANTONIO', 'nose', 6),
(4, 'CIFCO PABELLON INTERNACIONAL No. 1 y 2', 'San Martin', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `nombre_sexo` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `nombre_sexo`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urnas`
--

CREATE TABLE `urnas` (
  `id_urnas` char(5) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_urnas` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_sede` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `urnas`
--

INSERT INTO `urnas` (`id_urnas`, `nombre_urnas`, `id_sede`) VALUES
('00001', 'Urna 1', 1),
('00002', 'Urna 1', 3),
('0003', 'Urna 1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `urnas_votacion`
--

CREATE TABLE `urnas_votacion` (
  `id_UV` int(11) NOT NULL,
  `id_votacion` int(11) NOT NULL,
  `id_urnas` char(5) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `urnas_votacion`
--

INSERT INTO `urnas_votacion` (`id_UV`, `id_votacion`, `id_urnas`) VALUES
(1, 1, '00001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `clave` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `DUI_persona` char(10) COLLATE latin1_spanish_ci NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `clave`, `DUI_persona`, `id_rol`) VALUES
(4, 'wdaniloq@gmail.com', '202cb962ac59075b964b07152d234b70', '77777777-7', 2),
(5, 'USAID@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '12345678-9', 1),
(6, 'pdrmendoza007@gmail.com', '202cb962ac59075b964b07152d234b70', '98765432-1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votacion`
--

CREATE TABLE `votacion` (
  `id_votacion` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `id_estado` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime NOT NULL,
  `cantidadvotos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `votacion`
--

INSERT INTO `votacion` (`id_votacion`, `descripcion`, `id_estado`, `fecha_inicio`, `fecha_final`, `cantidadvotos`) VALUES
(1, 'Votacion de Prueba', 1, '2019-11-20 00:00:00', '2019-11-21 00:00:00', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id_candidato`),
  ADD KEY `candidato_persona` (`DUI_persona`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `detalles_votacion`
--
ALTER TABLE `detalles_votacion`
  ADD PRIMARY KEY (`id_DV`),
  ADD KEY `DV1` (`id_votacion`),
  ADD KEY `DV3` (`id_candidato`),
  ADD KEY `DV4` (`id_voto`),
  ADD KEY `DV2` (`DUI_persona`);

--
-- Indices de la tabla `estado_persona`
--
ALTER TABLE `estado_persona`
  ADD PRIMARY KEY (`id_estadoh`);

--
-- Indices de la tabla `estado_votacion`
--
ALTER TABLE `estado_votacion`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estado_voto`
--
ALTER TABLE `estado_voto`
  ADD PRIMARY KEY (`id_voto`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `municipio_departamento` (`id_departamento`);

--
-- Indices de la tabla `padron`
--
ALTER TABLE `padron`
  ADD PRIMARY KEY (`id_padron`),
  ADD KEY `padron_persona` (`DUI_persona`),
  ADD KEY `padron_urnas` (`id_urnas`),
  ADD KEY `padron_usuario` (`id_usuario`);

--
-- Indices de la tabla `partido_politico`
--
ALTER TABLE `partido_politico`
  ADD PRIMARY KEY (`id_partido`),
  ADD KEY `id_votacion` (`id_votacion`,`id_candidato`),
  ADD KEY `id_candidato` (`id_candidato`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`DUI_persona`),
  ADD KEY `sexo_persona` (`id_sexo`),
  ADD KEY `estado_persona` (`id_estadoh`),
  ADD KEY `municipio_persona` (`id_municipio`),
  ADD KEY `id_estadov` (`id_estadov`);

--
-- Indices de la tabla `persona_viva`
--
ALTER TABLE `persona_viva`
  ADD PRIMARY KEY (`id_estadov`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`),
  ADD KEY `sede_municipio` (`id_municipio`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `urnas`
--
ALTER TABLE `urnas`
  ADD PRIMARY KEY (`id_urnas`),
  ADD KEY `urnas_sede` (`id_sede`);

--
-- Indices de la tabla `urnas_votacion`
--
ALTER TABLE `urnas_votacion`
  ADD PRIMARY KEY (`id_UV`),
  ADD KEY `UV2` (`id_votacion`),
  ADD KEY `UV1` (`id_urnas`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuario_rol` (`id_rol`),
  ADD KEY `usuario_persona` (`DUI_persona`);

--
-- Indices de la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD PRIMARY KEY (`id_votacion`),
  ADD KEY `votacion_estado` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `detalles_votacion`
--
ALTER TABLE `detalles_votacion`
  MODIFY `id_DV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `estado_persona`
--
ALTER TABLE `estado_persona`
  MODIFY `id_estadoh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_votacion`
--
ALTER TABLE `estado_votacion`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_voto`
--
ALTER TABLE `estado_voto`
  MODIFY `id_voto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `padron`
--
ALTER TABLE `padron`
  MODIFY `id_padron` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `partido_politico`
--
ALTER TABLE `partido_politico`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `persona_viva`
--
ALTER TABLE `persona_viva`
  MODIFY `id_estadov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `urnas_votacion`
--
ALTER TABLE `urnas_votacion`
  MODIFY `id_UV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `votacion`
--
ALTER TABLE `votacion`
  MODIFY `id_votacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `candidato_persona` FOREIGN KEY (`DUI_persona`) REFERENCES `persona` (`DUI_persona`);

--
-- Filtros para la tabla `detalles_votacion`
--
ALTER TABLE `detalles_votacion`
  ADD CONSTRAINT `DV1` FOREIGN KEY (`id_votacion`) REFERENCES `votacion` (`id_votacion`),
  ADD CONSTRAINT `DV2` FOREIGN KEY (`DUI_persona`) REFERENCES `persona` (`DUI_persona`),
  ADD CONSTRAINT `DV3` FOREIGN KEY (`id_candidato`) REFERENCES `candidatos` (`id_candidato`),
  ADD CONSTRAINT `DV4` FOREIGN KEY (`id_voto`) REFERENCES `estado_voto` (`id_voto`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `padron`
--
ALTER TABLE `padron`
  ADD CONSTRAINT `padron_persona` FOREIGN KEY (`DUI_persona`) REFERENCES `persona` (`DUI_persona`),
  ADD CONSTRAINT `padron_urnas` FOREIGN KEY (`id_urnas`) REFERENCES `urnas` (`id_urnas`),
  ADD CONSTRAINT `padron_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `partido_politico`
--
ALTER TABLE `partido_politico`
  ADD CONSTRAINT `partido_politico_ibfk_1` FOREIGN KEY (`id_candidato`) REFERENCES `candidatos` (`id_candidato`),
  ADD CONSTRAINT `partido_politico_ibfk_2` FOREIGN KEY (`id_votacion`) REFERENCES `votacion` (`id_votacion`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `estado_persona` FOREIGN KEY (`id_estadoh`) REFERENCES `estado_persona` (`id_estadoh`),
  ADD CONSTRAINT `municipio_persona` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `persona_viva` FOREIGN KEY (`id_estadov`) REFERENCES `persona_viva` (`id_estadov`),
  ADD CONSTRAINT `sexo_persona` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`);

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_municipio` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`);

--
-- Filtros para la tabla `urnas`
--
ALTER TABLE `urnas`
  ADD CONSTRAINT `urnas_sede` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`);

--
-- Filtros para la tabla `urnas_votacion`
--
ALTER TABLE `urnas_votacion`
  ADD CONSTRAINT `UV1` FOREIGN KEY (`id_urnas`) REFERENCES `urnas` (`id_urnas`),
  ADD CONSTRAINT `UV2` FOREIGN KEY (`id_votacion`) REFERENCES `votacion` (`id_votacion`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_persona` FOREIGN KEY (`DUI_persona`) REFERENCES `persona` (`DUI_persona`),
  ADD CONSTRAINT `usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `votacion`
--
ALTER TABLE `votacion`
  ADD CONSTRAINT `votacion_estado` FOREIGN KEY (`id_estado`) REFERENCES `estado_votacion` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
