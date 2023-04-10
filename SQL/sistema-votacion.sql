-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2023 a las 15:47:27
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema-votacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `cod` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`cod`, `nombre`) VALUES
(658745, 'Sebastián Piñera Echenique'),
(665487, 'Gabriel Boric Font'),
(789857, 'Ricardo Froilán Lagos Escobar'),
(984575, 'Michelle Bachellet Jeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadanos`
--

CREATE TABLE `ciudadanos` (
  `rut` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `cod_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudadanos`
--

INSERT INTO `ciudadanos` (`rut`, `nombre`, `alias`, `correo`, `estado`, `cod_region`) VALUES
('18082259-3', 'Francisca ', 'clau1234', 'claudio20fuentes@gmail.com', 1, 1),
('18228214-6', 'Francisca ', 'clau1234', 'claudio20fuentes@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `cod` int(11) NOT NULL,
  `nombre_comuna` varchar(50) NOT NULL,
  `cod_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`cod`, `nombre_comuna`, `cod_region`) VALUES
(1, 'Talca', 7),
(100, 'Alto Hospicio', 1),
(101, 'Colchane', 1),
(102, 'Iquique', 1),
(103, 'Antofagasta', 2),
(104, 'Calama', 2),
(105, 'Tocopilla', 2),
(106, 'Caldera', 3),
(107, 'Copiapo', 3),
(108, 'Vallenar', 3),
(109, 'Coquimbo', 4),
(110, 'La serena', 4),
(111, 'Ovalle', 4),
(112, 'Valparaiso', 5),
(113, 'Viña del Mar', 5),
(114, 'Quintero', 5),
(115, 'Chimbarongo', 6),
(116, 'Rancagua', 6),
(117, 'San Fernando', 6),
(118, 'Talca', 7),
(119, 'Linares', 7),
(120, 'San Clemente', 7),
(121, 'Concepcion', 8),
(122, 'Talcahuano', 8),
(123, 'Lota', 8),
(124, 'Angol', 9),
(125, 'Temuco', 9),
(126, 'Villarica', 9),
(127, 'Valdivia', 14),
(128, 'La union', 14),
(129, 'Futrono', 14),
(130, 'Ancud', 10),
(131, 'Osorno', 10),
(132, 'Castro', 10),
(133, 'Aysen', 11),
(134, 'coyhaique', 11),
(135, 'Cochrane', 11),
(136, 'Antartica', 12),
(137, 'Punta Arenas', 12),
(138, 'Porvenir', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `cod` int(11) NOT NULL,
  `rut_votante` varchar(12) NOT NULL,
  `tv` int(1) NOT NULL,
  `web` int(1) NOT NULL,
  `red_social` int(1) NOT NULL,
  `amigo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`cod`, `rut_votante`, `tv`, `web`, `red_social`, `amigo`) VALUES
(18, '18228214-6', 1, 1, 0, 0),
(20, '18082259-3', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `cod` int(11) NOT NULL,
  `nombre_region` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`cod`, `nombre_region`) VALUES
(1, 'Region de Tarapaca'),
(2, 'Region de Antofagasta'),
(3, 'Region de Atacama'),
(4, 'Region de Coquimbo'),
(5, 'Region de Valparaiso'),
(6, 'Region del libertador Bernardo o\'higgins'),
(7, 'Region del maule'),
(8, 'Region del Bio-bio'),
(9, 'Region de la Araucania'),
(10, 'Region de los Lagos'),
(11, 'Region de Aysen'),
(12, 'Region de de Magallanes y la Antartica Chilena'),
(13, 'Region Metropolitana'),
(14, 'Region de los Rios'),
(15, 'Region de Arica y Parinacota'),
(16, 'Region de Ñuble');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `cod` int(11) NOT NULL,
  `fk_rut_votante` varchar(12) NOT NULL,
  `cod_candidato` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`cod`, `fk_rut_votante`, `cod_candidato`, `fecha`) VALUES
(13, '18228214-6', 658745, '2023-04-10'),
(15, '18082259-3', 658745, '2023-04-10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `fk_region_personas` (`cod_region`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_region_comuna` (`cod_region`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_publicidad_votante` (`rut_votante`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_candidato_voto` (`cod_candidato`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=984576;

--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD CONSTRAINT `fk_region_personas` FOREIGN KEY (`cod_region`) REFERENCES `region` (`cod`);

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `fk_region_comuna` FOREIGN KEY (`cod_region`) REFERENCES `region` (`cod`);

--
-- Filtros para la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD CONSTRAINT `fk_publicidad_votante` FOREIGN KEY (`rut_votante`) REFERENCES `ciudadanos` (`rut`);

--
-- Filtros para la tabla `votos`
--
ALTER TABLE `votos`
  ADD CONSTRAINT `fk_candidato_voto` FOREIGN KEY (`cod_candidato`) REFERENCES `candidatos` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
