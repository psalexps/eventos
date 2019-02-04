-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2019 a las 08:19:50
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `idLocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `tipo`, `fecha`, `descripcion`, `idLocal`) VALUES
(12, 'Cutum', 'Especial', '2019-02-06', 'Evento especial', 1),
(15, 'Flogman', 'Tenio', '2019-03-23', 'Los fedec', 1),
(16, 'Golic', 'Donit', '2019-01-31', 'Cada uno por su lado amigos del mapolo', 1),
(17, 'Solac', 'Polin', '2019-01-28', 'Hoy es el dÃ­a de brillar', 1),
(18, 'Weting', 'Cena', '2019-04-20', 'Cena con la familia', 1),
(19, 'Qurin', 'CumpleaÃ±os', '2019-01-31', 'Cumple de mi hijita', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `idLocal` int(11) NOT NULL,
  `nombreLocal` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` decimal(9,0) NOT NULL,
  `email` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `img` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`idLocal`, `nombreLocal`, `categoria`, `direccion`, `telefono`, `email`, `img`) VALUES
(1, 'Velino', 'Cena', 'Alfonso 13', '654893874', 'velino@gmail.com', ''),
(2, 'Rodulo', 'Cumple', 'Geino 3', '954673849', 'rodulo@gmail.com', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_locales_eventos` (`idLocal`);

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`idLocal`),
  ADD UNIQUE KEY `id` (`idLocal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `idLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_locales_eventos` FOREIGN KEY (`idLocal`) REFERENCES `locales` (`idLocal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
