-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2023 a las 19:26:57
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartelera`
--

CREATE TABLE `cartelera` (
  `idCartelera` int(11) NOT NULL,
  `fechaCartelera` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cartelera`
--

INSERT INTO `cartelera` (`idCartelera`, `fechaCartelera`) VALUES
(1, '2022-08-18 00:00:00'),
(2, '2022-01-18 00:00:00'),
(3, '2022-07-13 00:00:00'),
(4, '2022-10-15 00:00:00'),
(5, '2022-11-09 00:00:00'),
(6, '2022-10-31 00:00:00'),
(7, '2022-12-16 00:00:00'),
(8, '2022-08-01 00:00:00'),
(9, '2022-12-09 00:00:00'),
(10, '2022-02-07 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartelera_has_peliculas`
--

CREATE TABLE `cartelera_has_peliculas` (
  `Cartelera_idCartelera` int(11) NOT NULL,
  `Peliculas_idPeliculas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cartelera_has_peliculas`
--

INSERT INTO `cartelera_has_peliculas` (`Cartelera_idCartelera`, `Peliculas_idPeliculas`) VALUES
(1, 12),
(2, 10),
(3, 9),
(4, 1),
(5, 8),
(6, 9),
(7, 13),
(8, 15),
(9, 2),
(10, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `fechaCompra` datetime DEFAULT NULL,
  `tipoProducto` char(20) DEFAULT NULL,
  `Local_idLocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idCompra`, `fechaCompra`, `tipoProducto`, `Local_idLocal`) VALUES
(1, '2022-07-04 00:00:00', 'Ocio', 6),
(2, '2022-06-23 00:00:00', 'Entradas', 5),
(3, '2022-11-11 00:00:00', 'Entradas', 6),
(4, '2022-04-12 00:00:00', 'Entradas', 2),
(5, '2022-08-27 00:00:00', 'Entradas', 7),
(6, '2022-12-23 00:00:00', 'otros', 4),
(7, '2022-07-05 00:00:00', 'Entradas', 9),
(8, '2022-08-10 00:00:00', 'Alimentación', 8),
(9, '2022-04-25 00:00:00', 'otros', 1),
(10, '2022-06-05 00:00:00', 'Entradas', 9),
(11, '2022-04-20 00:00:00', 'otros', 8),
(12, '2022-02-12 00:00:00', 'Merchandising', 8),
(13, '2022-06-10 00:00:00', 'otros', 4),
(14, '2022-10-27 00:00:00', 'Merchandising', 8),
(15, '2022-05-18 00:00:00', 'Alimentación', 1),
(16, '2022-05-02 00:00:00', 'otros', 2),
(17, '2022-12-27 00:00:00', 'Entradas', 5),
(18, '2022-02-07 00:00:00', 'Alimentación', 7),
(19, '2022-05-24 00:00:00', 'Ocio', 7),
(20, '2022-03-05 00:00:00', 'Entradas', 5),
(21, '2022-04-19 00:00:00', 'otros', 4),
(22, '2022-07-07 00:00:00', 'Entradas', 7),
(23, '2022-06-16 00:00:00', 'Ocio', 3),
(24, '2022-02-20 00:00:00', 'Entradas', 1),
(25, '2022-10-08 00:00:00', 'Merchandising', 8),
(26, '2022-05-22 00:00:00', 'otros', 3),
(27, '2022-10-28 00:00:00', 'Entradas', 9),
(28, '2022-09-08 00:00:00', 'Ocio', 4),
(29, '2022-06-22 00:00:00', 'Merchandising', 8),
(30, '2022-11-25 00:00:00', 'Merchandising', 1),
(31, '2022-07-23 00:00:00', 'Entradas', 1),
(32, '2022-07-16 00:00:00', 'Ocio', 1),
(33, '2022-05-08 00:00:00', 'Ocio', 9),
(34, '2022-07-24 00:00:00', 'otros', 3),
(35, '2022-02-21 00:00:00', 'otros', 10),
(36, '2022-06-23 00:00:00', 'Alimentación', 3),
(37, '2022-06-10 00:00:00', 'otros', 4),
(38, '2022-01-22 00:00:00', 'otros', 8),
(39, '2022-11-23 00:00:00', 'Entradas', 5),
(40, '2022-10-06 00:00:00', 'Alimentación', 4),
(41, '2022-02-22 00:00:00', 'Entradas', 9),
(42, '2022-02-25 00:00:00', 'Merchandising', 7),
(43, '2022-10-26 00:00:00', 'Entradas', 9),
(44, '2022-08-23 00:00:00', 'Merchandising', 10),
(45, '2022-10-18 00:00:00', 'Ocio', 10),
(46, '2023-01-06 00:00:00', 'Alimentación', 4),
(47, '2022-07-11 00:00:00', 'Merchandising', 10),
(48, '2022-02-10 00:00:00', 'Merchandising', 8),
(49, '2022-04-13 00:00:00', 'Entradas', 10),
(50, '2022-02-15 00:00:00', 'otros', 4),
(51, '2022-12-19 00:00:00', 'Entradas', 7),
(52, '2022-08-26 00:00:00', 'Ocio', 9),
(53, '2022-07-23 00:00:00', 'Merchandising', 4),
(54, '2022-03-23 00:00:00', 'Alimentación', 7),
(55, '2022-05-22 00:00:00', 'otros', 9),
(56, '2022-04-27 00:00:00', 'Ocio', 4),
(57, '2022-11-15 00:00:00', 'Alimentación', 8),
(58, '2022-11-04 00:00:00', 'otros', 2),
(59, '2022-10-21 00:00:00', 'Entradas', 7),
(60, '2022-09-03 00:00:00', 'Entradas', 1),
(61, '2022-02-28 00:00:00', 'Entradas', 10),
(62, '2022-05-29 00:00:00', 'Alimentación', 1),
(63, '2023-01-02 00:00:00', 'Alimentación', 3),
(64, '2022-05-13 00:00:00', 'Ocio', 9),
(65, '2022-09-03 00:00:00', 'Entradas', 7),
(66, '2022-01-12 00:00:00', 'otros', 1),
(67, '2022-04-02 00:00:00', 'Merchandising', 10),
(68, '2022-04-30 00:00:00', 'Ocio', 5),
(69, '2022-09-27 00:00:00', 'Ocio', 2),
(70, '2022-06-07 00:00:00', 'Merchandising', 3),
(71, '2022-12-16 00:00:00', 'Merchandising', 4),
(72, '2023-01-04 00:00:00', 'otros', 4),
(73, '2022-08-11 00:00:00', 'Ocio', 9),
(74, '2022-07-15 00:00:00', 'Alimentación', 1),
(75, '2022-04-29 00:00:00', 'otros', 3),
(76, '2022-07-27 00:00:00', 'Alimentación', 5),
(77, '2022-03-18 00:00:00', 'Alimentación', 7),
(78, '2022-10-14 00:00:00', 'Merchandising', 6),
(79, '2022-04-06 00:00:00', 'Ocio', 6),
(80, '2022-08-29 00:00:00', 'Merchandising', 7),
(81, '2022-07-21 00:00:00', 'Ocio', 6),
(82, '2022-10-25 00:00:00', 'Alimentación', 4),
(83, '2022-01-18 00:00:00', 'Entradas', 7),
(84, '2022-11-08 00:00:00', 'Alimentación', 1),
(85, '2022-08-22 00:00:00', 'Ocio', 2),
(86, '2022-07-04 00:00:00', 'otros', 9),
(87, '2022-09-06 00:00:00', 'Alimentación', 5),
(88, '2022-09-27 00:00:00', 'Alimentación', 2),
(89, '2022-02-24 00:00:00', 'Alimentación', 3),
(90, '2022-11-01 00:00:00', 'Entradas', 5),
(91, '2022-07-14 00:00:00', 'Merchandising', 4),
(92, '2022-05-01 00:00:00', 'Entradas', 9),
(93, '2022-11-09 00:00:00', 'Alimentación', 4),
(94, '2022-03-13 00:00:00', 'Merchandising', 4),
(95, '2022-08-03 00:00:00', 'Ocio', 1),
(96, '2022-07-22 00:00:00', 'Alimentación', 9),
(97, '2023-01-06 00:00:00', 'otros', 6),
(98, '2022-01-23 00:00:00', 'otros', 5),
(99, '2022-10-04 00:00:00', 'Ocio', 7),
(100, '2022-01-26 00:00:00', 'otros', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleados` int(11) NOT NULL,
  `nombreEmpleado` varchar(15) NOT NULL,
  `apellidosEmpleado` varchar(25) NOT NULL,
  `dni` varchar(16) NOT NULL,
  `Local_idLocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleados`, `nombreEmpleado`, `apellidosEmpleado`, `dni`, `Local_idLocal`) VALUES
(1, 'Othello', 'Campsall', '475-41-5147', 2),
(2, 'Cammy', 'Bruhnicke', '499-32-5551', 8),
(3, 'Putnam', 'Sykora', '574-46-7125', 6),
(4, 'Jens', 'Fateley', '537-10-5334', 8),
(5, 'Guendolen', 'Puttan', '554-89-5504', 9),
(6, 'Gabbey', 'Ruste', '329-51-8191', 1),
(7, 'Dreddy', 'Pendrich', '222-09-5034', 7),
(8, 'Aleen', 'Stansby', '571-07-8787', 5),
(9, 'Pollyanna', 'Biaggi', '673-46-5466', 4),
(10, 'Justina', 'Children', '109-30-2740', 4),
(11, 'Son', 'Catt', '160-80-2684', 4),
(12, 'Dex', 'Weaving', '501-38-1453', 10),
(13, 'Nerte', 'Martinson', '447-53-3441', 3),
(14, 'Les', 'Ivakin', '347-06-0943', 7),
(15, 'Barbara', 'Tapscott', '781-66-6296', 9),
(16, 'Fanya', 'Goodlet', '347-80-1916', 4),
(17, 'Aron', 'Ollerhead', '447-49-5652', 2),
(18, 'Weider', 'Crossingham', '180-90-9906', 7),
(19, 'Giacinta', 'Jagielski', '509-53-5026', 2),
(20, 'Dianne', 'Petrozzi', '348-62-9397', 1),
(21, 'Gretel', 'Prazor', '542-77-8943', 6),
(22, 'Mona', 'Morrish', '760-96-9137', 7),
(23, 'Bordy', 'Downey', '646-23-2768', 3),
(24, 'Timoteo', 'Tift', '767-91-1420', 9),
(25, 'Olga', 'Lindstrom', '253-79-3830', 7),
(26, 'Somerset', 'Blare', '411-81-7978', 10),
(27, 'Noellyn', 'Bolley', '131-04-8483', 7),
(28, 'Henryetta', 'Ramage', '686-99-4785', 8),
(29, 'Baird', 'Milbank', '199-12-6535', 1),
(30, 'Hazel', 'Adamovicz', '733-99-8716', 1),
(31, 'Josee', 'Bootell', '499-09-0639', 6),
(32, 'Kala', 'Bertholin', '717-03-8231', 3),
(33, 'Layney', 'Birdall', '643-86-6498', 5),
(34, 'Mathe', 'Osichev', '297-39-5889', 8),
(35, 'Thain', 'Kundt', '592-27-4857', 4),
(36, 'Dorotea', 'Stoke', '862-99-4015', 9),
(37, 'Harry', 'Mattea', '299-19-1901', 8),
(38, 'Rorie', 'Vertigan', '697-67-8537', 6),
(39, 'Rustie', 'Barge', '530-55-3542', 9),
(40, 'Chelsy', 'Trulock', '419-97-0787', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `idLocal` int(11) NOT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `Cartelera_idCartelera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`idLocal`, `calle`, `ciudad`, `Cartelera_idCartelera`) VALUES
(1, '61075 Hollow Ridge Drive', 'Dahle', 6),
(2, '7 Mayfield Hill', 'Springs', 8),
(3, '8 Summer Ridge Court', 'Bultman', 9),
(4, '132 Eastwood Drive', 'Chive', 8),
(5, '7668 Parkside Pass', 'North', 6),
(6, '0 Autumn Leaf Avenue', 'Eggendart', 5),
(7, '1630 Larry Way', 'Eggendart', 6),
(8, '122 Claremont Trail', 'David', 7),
(9, '83 Farmco Point', 'Sutteridge', 5),
(10, '0 Sunfield Avenue', 'Lien', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `idPelicula` int(11) NOT NULL,
  `nombrePelicula` varchar(45) NOT NULL,
  `fechaEstreno` date NOT NULL,
  `director` varchar(20) DEFAULT NULL,
  `edadMinima` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idPelicula`, `nombrePelicula`, `fechaEstreno`, `director`, `edadMinima`) VALUES
(1, 'Inception', '2022-08-13', 'Arte Kelson', 16),
(2, 'Toy Story', '2022-07-26', 'Joel Bodell', 3),
(3, 'Tenet', '2022-04-04', 'Osmond Amery', 16),
(4, 'Avatar 2', '2022-09-22', 'Cari Bassick', 18),
(5, 'Shrek 2', '2022-09-18', 'Xena Otton', 16),
(6, 'Hereditary', '2022-10-26', 'Pauline Burnand', 16),
(7, 'Vivarium', '2022-08-14', 'Ronny Ambrosini', 18),
(8, 'Scarface', '2022-08-31', 'Christos Breukelman', 3),
(9, 'Álvaro Vera el documental, su vida y logros', '2022-09-05', 'Madelle Shearman', 18),
(10, 'Interstellar', '2022-02-23', 'Ian Lorent', 16),
(11, 'El Padrino 2', '2022-04-30', 'Bronson Hetterich', 18),
(12, 'El Señor de los Anillos', '2022-07-20', 'Cathlene Worrill', 3),
(13, 'Harry potter y las reliquias de la muerte 2', '2022-06-18', 'Janeczka Musterd', 16),
(14, 'Pequeña Gran Vida', '2022-05-02', 'Agnella Marielle', 16),
(15, 'Noche en el museo', '2022-03-04', 'Emmalee Witul', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `idSala` int(11) NOT NULL,
  `capacidadMáxima` varchar(3) NOT NULL,
  `nFilas` int(11) NOT NULL,
  `idLocal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`idSala`, `capacidadMáxima`, `nFilas`, `idLocal`) VALUES
(1, '60', 4, 5),
(2, '40', 6, 5),
(3, '40', 4, 2),
(4, '40', 4, 2),
(5, '40', 20, 8),
(6, '40', 6, 10),
(7, '40', 4, 9),
(8, '60', 4, 6),
(9, '200', 4, 6),
(10, '60', 4, 2),
(11, '60', 6, 9),
(12, '200', 12, 2),
(13, '40', 6, 1),
(14, '120', 12, 10),
(15, '120', 12, 5),
(16, '120', 4, 2),
(17, '60', 4, 4),
(18, '200', 4, 6),
(19, '60', 6, 10),
(20, '200', 4, 6),
(21, '60', 6, 4),
(22, '60', 12, 7),
(23, '60', 4, 1),
(24, '40', 20, 4),
(25, '60', 4, 6),
(26, '40', 4, 9),
(27, '120', 4, 5),
(28, '40', 6, 2),
(29, '40', 12, 3),
(30, '120', 12, 10),
(31, '40', 4, 10),
(32, '120', 4, 1),
(33, '60', 4, 6),
(34, '120', 4, 5),
(35, '200', 4, 1),
(36, '200', 6, 2),
(37, '40', 12, 10),
(38, '60', 6, 3),
(39, '60', 6, 5),
(40, '60', 12, 3),
(41, '60', 12, 7),
(42, '40', 20, 4),
(43, '200', 20, 1),
(44, '60', 12, 10),
(45, '200', 12, 8),
(46, '60', 6, 1),
(47, '120', 20, 3),
(48, '60', 4, 1),
(49, '60', 12, 7),
(50, '60', 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas_has_peliculas`
--

CREATE TABLE `salas_has_peliculas` (
  `Salas_idSala` int(11) NOT NULL,
  `Peliculas_idPeliculas` int(11) NOT NULL,
  `fecha_pelicula` datetime NOT NULL,
  `hora_pelicula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salas_has_peliculas`
--

INSERT INTO `salas_has_peliculas` (`Salas_idSala`, `Peliculas_idPeliculas`, `fecha_pelicula`, `hora_pelicula`) VALUES
(1, 5, '2022-01-21 00:00:00', 19),
(2, 8, '2022-02-09 00:00:00', 17),
(2, 12, '2022-01-13 00:00:00', 15),
(2, 14, '2022-01-28 00:00:00', 17),
(3, 1, '2022-02-07 00:00:00', 13),
(3, 13, '2022-01-16 00:00:00', 23),
(4, 5, '2022-01-31 00:00:00', 23),
(5, 1, '2022-02-09 00:00:00', 20),
(6, 2, '2022-02-04 00:00:00', 12),
(6, 12, '2022-01-15 00:00:00', 12),
(7, 1, '2022-02-01 00:00:00', 22),
(8, 14, '2022-01-19 00:00:00', 10),
(9, 4, '2022-01-19 00:00:00', 18),
(9, 7, '2022-02-02 00:00:00', 18),
(10, 5, '2022-02-02 00:00:00', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `idSocio` int(11) NOT NULL,
  `nombreSocio` varchar(20) NOT NULL,
  `fotoSocio` varchar(20) NOT NULL,
  `apellidoSocio` varchar(45) DEFAULT NULL,
  `Local_idLocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`idSocio`, `nombreSocio`, `fotoSocio`, `apellidoSocio`, `Local_idLocal`) VALUES
(1, 'Álvaro1', '../fotosbd/2f7.jpg', 'Vera2', 7),
(2, 'Cesare', '../fotosbd/162.jpg', 'Shaw', 8),
(3, 'Huntington', '../fotosbd/241.jpg', 'Bradbeer', 6),
(4, 'Kellina', '../fotosbd/284.jpg', 'Berr', 9),
(5, 'Ermin', '../fotosbd/446.jpg', 'Cranefield', 6),
(6, 'Silvester', '../fotosbd/506.jpg', 'Arrigo', 8),
(7, 'Barn', '../fotosbd/606.jpg', 'Jozefowicz', 3),
(8, 'Vera', '../fotosbd/617.jpg', 'Ventum', 10),
(9, 'John', '../fotosbd/639.jpg', 'Kulicke', 10),
(10, 'Stanleigh', '../fotosbd/712.jpg', 'Budleigh', 4),
(11, 'Adrián ', '../fotosbd/925.jpg', 'Pruaño', 2),
(12, 'Jorge', '../fotosbd/91.jpg', 'Rodriguez', 1),
(13, 'Prueba1', 'Nan', 'pruebaAPellido', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cartelera`
--
ALTER TABLE `cartelera`
  ADD PRIMARY KEY (`idCartelera`);

--
-- Indices de la tabla `cartelera_has_peliculas`
--
ALTER TABLE `cartelera_has_peliculas`
  ADD PRIMARY KEY (`Cartelera_idCartelera`,`Peliculas_idPeliculas`),
  ADD KEY `fk_Cartelera_has_Peliculas_Peliculas1` (`Peliculas_idPeliculas`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `fk_Compras_Local1` (`Local_idLocal`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleados`),
  ADD KEY `fk_Empleados_Local1` (`Local_idLocal`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`idLocal`),
  ADD KEY `fk_Local_Cartelera1` (`Cartelera_idCartelera`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`idPelicula`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`idSala`);

--
-- Indices de la tabla `salas_has_peliculas`
--
ALTER TABLE `salas_has_peliculas`
  ADD PRIMARY KEY (`Salas_idSala`,`Peliculas_idPeliculas`),
  ADD KEY `fk_Salas_has_Peliculas_Peliculas1` (`Peliculas_idPeliculas`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`idSocio`,`Local_idLocal`),
  ADD KEY `fk_Socios_Local1` (`Local_idLocal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cartelera`
--
ALTER TABLE `cartelera`
  MODIFY `idCartelera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `idLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `idSala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `idSocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cartelera_has_peliculas`
--
ALTER TABLE `cartelera_has_peliculas`
  ADD CONSTRAINT `fk_Cartelera_has_Peliculas_Cartelera1` FOREIGN KEY (`Cartelera_idCartelera`) REFERENCES `cartelera` (`idCartelera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cartelera_has_Peliculas_Peliculas1` FOREIGN KEY (`Peliculas_idPeliculas`) REFERENCES `peliculas` (`idPelicula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_Compras_Local1` FOREIGN KEY (`Local_idLocal`) REFERENCES `local` (`idLocal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `fk_Empleados_Local1` FOREIGN KEY (`Local_idLocal`) REFERENCES `local` (`idLocal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `fk_Local_Cartelera1` FOREIGN KEY (`Cartelera_idCartelera`) REFERENCES `cartelera` (`idCartelera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salas_has_peliculas`
--
ALTER TABLE `salas_has_peliculas`
  ADD CONSTRAINT `fk_Salas_has_Peliculas_Peliculas1` FOREIGN KEY (`Peliculas_idPeliculas`) REFERENCES `peliculas` (`idPelicula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Salas_has_Peliculas_Salas` FOREIGN KEY (`Salas_idSala`) REFERENCES `salas` (`idSala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `socios`
--
ALTER TABLE `socios`
  ADD CONSTRAINT `fk_Socios_Local1` FOREIGN KEY (`Local_idLocal`) REFERENCES `local` (`idLocal`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
