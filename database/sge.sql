-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2022 a las 18:28:10
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sge`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `foto_administrador` varchar(100) NOT NULL,
  `nombre_administrador` varchar(30) NOT NULL,
  `appaterno_administrador` varchar(50) NOT NULL,
  `apmaterno_administrador` varchar(50) NOT NULL,
  `telefono_administrador` varchar(50) NOT NULL,
  `email_administrador` varchar(50) NOT NULL,
  `fechanacimiento_administrador` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `id_usuario`, `foto_administrador`, `nombre_administrador`, `appaterno_administrador`, `apmaterno_administrador`, `telefono_administrador`, `email_administrador`, `fechanacimiento_administrador`) VALUES
(4, 63, 'Sin título.png', 'Edwin', 'Martínez', 'Martínez', '5530297992', 'edwin@gmail.com', '2001-12-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `id_escuela` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `foto_alumno` varchar(250) NOT NULL,
  `nombre_alumno` varchar(50) NOT NULL,
  `appaterno_alumno` varchar(50) NOT NULL,
  `apmaterno_alumno` varchar(50) NOT NULL,
  `calle_alumno` varchar(50) NOT NULL,
  `noexterior_alumno` varchar(50) NOT NULL,
  `nointerior_alumno` varchar(50) NOT NULL,
  `cp_alumno` int(11) NOT NULL,
  `estado_alumno` varchar(50) NOT NULL,
  `municipio_alumno` varchar(50) NOT NULL,
  `colonia_alumno` varchar(50) NOT NULL,
  `telefono_alumno` varchar(50) NOT NULL,
  `email_alumno` varchar(50) NOT NULL,
  `fechanacimiento_alumno` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `id_grupo`, `id_escuela`, `id_usuario`, `foto_alumno`, `nombre_alumno`, `appaterno_alumno`, `apmaterno_alumno`, `calle_alumno`, `noexterior_alumno`, `nointerior_alumno`, `cp_alumno`, `estado_alumno`, `municipio_alumno`, `colonia_alumno`, `telefono_alumno`, `email_alumno`, `fechanacimiento_alumno`) VALUES
(20, 11, 19, 67, 'root.png', 'Edgar', 'Ávila', 'Sánchez', 'paseo', '45', '45', 55749, 'México', 'Tecámac', 'Villa', '(545) 454-5454', 'edgar@gmail.com', '2022-04-01'),
(21, 11, 19, 68, 'root.png', 'Gabriela', 'Martínez', 'Hernández', 'paseo', '4', '5', 55749, 'México', 'Tecámac', 'Sierra', '(654) 654-6446', 'gaby@gmail.com', '2022-04-01'),
(22, 11, 19, 69, 'root.png', 'Ximena', 'Martínez', 'Martínez', 'Paseo', '45', '54', 55748, 'México', 'Tecámac', 'Ampliación', '(654) 654-6456', 'ximena@gmail.com', '2022-03-31'),
(23, 11, 19, 70, 'root.png', 'Valeria', 'Hernández', 'Pérez', 'paseo', '8', '8', 55749, 'México', 'Tecámac', 'Ixotitla', '(987) 987-9878', 'valeria@gmail.com', '2022-04-01'),
(24, 11, 19, 71, 'root.png', 'Jeremy', 'Moreno', 'Silva', 'paseo', '4', '4', 55749, 'México', 'Tecámac', '5', '(216) 565-4515', 'jere@gmail.com', '2022-04-12'),
(25, 11, 19, 72, 'root.png', 'Samantha', 'Martínez', 'Ochoa', 'paseo', '5', '2', 55749, 'México', 'Tecámac', '5', '(987) 654-3211', 'sam@gmail.com', '2022-04-12'),
(26, 11, 19, 73, 'root.png', 'Mauricio', 'Pérez', 'Hernández', 'pozo', '5', '7', 55749, 'México', 'Tecámac', 'Sierra', '(654) 132-1635', 'mau@gmail.com', '2022-04-12'),
(27, 11, 19, 74, 'root.png', 'Pablo', 'Gómez', 'Gómez', 'pozo', '8', '4', 55749, 'México', 'Tecámac', 'Ampliación', '(465) 456-4564', 'pablo@gmail.com', '2022-04-13'),
(28, 11, 19, 75, 'root.png', 'Juan', 'Pérez', 'Hernández', 'tezozomoc', '4', '7', 55749, 'México', 'Tecámac', 'Texcaltitla', '(654) 654-6545', 'juan@gmail.com', '2022-04-01'),
(29, 11, 19, 76, 'root.png', 'Jatziry', 'Martínez', 'Martínez', 'tezozomoc', '54', '8', 55743, 'México', 'Tecámac', 'Rancho', '(654) 654-6545', 'jatzy@gmail.com', '2022-04-01'),
(30, 12, 19, 77, 'root.png', 'Alexis', 'Martínez', 'Hernández', 'Pozo', '8', '6', 55743, 'México', 'Tecámac', 'La', '(546) 546-4654', 'Alexis@gmail.com', '2022-04-01'),
(31, 16, 20, 80, 'default.png', 'ALUMNO1M', 'ALUMNO1M', 'ALUMNO1M', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Valle', '(123) 456-789_', 'ALUMNO1M@alumno.com', '2010-01-01'),
(32, 16, 20, 81, 'default.png', 'alumnom2', 'alumnom2', 'alumnom2', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Conjunto', '(555) 936-8986', 'alumnom2@alumno.com', '2010-01-01'),
(33, 16, 20, 82, 'default.png', 'alumno3m', 'alumno3m', 'alumno3m', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Conjunto', '(555) 936-8986', 'alumno3m@alumno.com', '2010-01-01'),
(34, 16, 20, 83, 'default.png', 'alumno4m', 'alumno4m', 'alumno4m', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Conjunto', '(555) 936-8986', 'alumno4m@alumno.com', '2010-02-01'),
(35, 16, 20, 84, 'default.png', 'alumno4m', 'alumno4m', 'alumno4m', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Conjunto', '(555) 936-8986', 'alumno4m@alumno.com', '2010-01-01'),
(36, 16, 20, 85, 'default.png', 'alumno5m', 'alumno5m', 'alumno5m', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Conjunto', '(123) 456-789_', 'alumno5m@gmail.com', '2010-01-01'),
(37, 16, 20, 86, 'default.png', 'alumno6m', 'alumno6m', 'alumno6m', 'calle', '1', '1', 55710, 'México', 'Coacalco', 'Arcos', '(525) 551-8496', 'alumno6m@alumno.com', '2010-01-01'),
(38, 16, 20, 87, 'default.png', 'alumno7m', 'alumno7m', 'alumno7m', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Conjunto', '(555) 936-8986', 'alumno7m@alumno.com', '2010-01-01'),
(39, 16, 20, 88, 'default.png', 'alumno8m', 'alumno8m', 'alumno8m', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Conjunto', '(555) 936-8986', 'alumno8m@alumno.com', '2010-01-01'),
(40, 16, 20, 89, 'default.png', 'alumno9m', 'alumno9m', 'alumno9m', 'calle', '1', '1', 55710, 'México', 'Coacalco', 'Arcos', '(525) 551-8496', 'alumno9m@alumno.com', '2010-01-01'),
(41, 16, 20, 90, 'default.png', 'alumno10m', 'alumno10m', 'alumno10m', 'calle', '1', '1', 43806, 'Hidalgo', 'Tizayuca', 'Ampliación', '(562) 173-8735', 'alumno10m@alumno.com', '2010-01-01'),
(42, 18, 20, 91, 'default.png', 'alumno1v', 'alumno1v', 'alumno1v', 'calle', '1', '1', 43806, 'Hidalgo', 'Tizayuca', 'Ampliación', '(562) 173-8735', 'alumno1v@alumno.com', '2010-01-01'),
(43, 18, 20, 92, 'default.png', 'alumno2v', 'alumno2v', 'alumno2v', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Conjunto', '(555) 936-8986', 'alumno2v@alumno.com', '2010-01-01'),
(44, 18, 20, 93, 'default.png', 'alumno3v', 'alumno3v', 'alumno3v', 'calle', '1', '1', 55710, 'México', 'Coacalco', 'Arcos', '(525) 551-8496', 'alumno3v@alumno.com', '2010-01-01'),
(45, 18, 20, 94, 'default.png', 'alumno4v', 'alumno4v', 'alumno4v', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Conjunto', '(555) 936-8986', 'alumno4v@alumno.com', '2010-01-01'),
(46, 18, 20, 95, 'default.png', 'alumno5v', 'alumno5v', 'alumno5v', 'calle', '1', '1', 43806, 'Hidalgo', 'Tizayuca', 'Ampliación', '(562) 173-8735', 'alumno5v@alumno.com', '2010-01-01'),
(47, 18, 20, 96, 'default.png', 'alumno6v', 'alumno6v', 'alumno6v', 'calle', '1', '1', 43806, 'Hidalgo', 'Tizayuca', 'Ampliación', '(562) 173-8735', 'alumno6v@alumno.com', '2010-01-01'),
(48, 18, 20, 97, 'default.png', 'alumno7v', 'alumno7v', 'alumno7v', 'calle', '1', '1', 43806, 'Hidalgo', 'Tizayuca', 'Ampliación', '(562) 173-8735', 'alumno7v@alumno.com', '2010-01-01'),
(49, 18, 20, 98, 'default.png', 'alumno8v', 'alumno8v', 'alumno8v', 'calle', '1', '1', 55710, 'México', 'Coacalco', 'Arcos', '(525) 551-8496', 'alumno8v@gmail.com', '2010-01-01'),
(50, 18, 20, 99, 'default.png', 'alumno10v', 'alumno10v', 'alumno10v', 'calle', '1', '1', 55710, 'México', 'Coacalco', 'Arcos', '(525) 551-8496', 'alumno10v@ALUMNO.COM', '2010-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id_calificacion` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_parcial` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `calificacion` float NOT NULL,
  `observacion_calificacion` varchar(80) NOT NULL,
  `fecha_calificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

CREATE TABLE `cobro` (
  `id_cobro` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `cantidad_cobro` int(11) NOT NULL,
  `iva_cobro` int(11) NOT NULL,
  `concepto_cobro` varchar(50) NOT NULL,
  `fechalimite_cobro` date NOT NULL,
  `activo_cobro` tinyint(4) NOT NULL,
  `fecha_cobro` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cobro`
--

INSERT INTO `cobro` (`id_cobro`, `id_alumno`, `cantidad_cobro`, `iva_cobro`, `concepto_cobro`, `fechalimite_cobro`, `activo_cobro`, `fecha_cobro`) VALUES
(7, 31, 12222, 1212, 'Inscripción', '2022-04-20', 1, '2022-04-20'),
(8, 42, 10000, 1, 'Reinscripción', '2022-04-20', 1, '2022-04-20'),
(9, 32, 100000, 1, 'Constancia de estudios', '2022-04-20', 1, '2022-04-20'),
(10, 43, 122, 1, 'Mantenimiento', '2022-04-20', 1, '2022-04-20'),
(11, 33, 12222, 1, 'Titulación', '2022-04-20', 1, '2022-04-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id_director` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_grado_academico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `foto_director` varchar(50) NOT NULL,
  `nombre_director` varchar(50) NOT NULL,
  `appaterno_director` varchar(50) NOT NULL,
  `apmaterno_director` varchar(50) NOT NULL,
  `rfc_director` varchar(13) NOT NULL,
  `curp_director` varchar(18) NOT NULL,
  `calle_director` varchar(50) NOT NULL,
  `numexterior_director` varchar(50) NOT NULL,
  `numinterior_director` varchar(50) NOT NULL,
  `cp_director` varchar(5) NOT NULL,
  `estado_director` varchar(50) NOT NULL,
  `municipio_director` varchar(45) NOT NULL,
  `colonia_director` varchar(45) NOT NULL,
  `telefono_director` varchar(50) NOT NULL,
  `email_director` varchar(50) NOT NULL,
  `cedulaprofesional_director` varchar(50) NOT NULL,
  `fechanacimiento_director` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id_director`, `id_escuela`, `id_grado_academico`, `id_usuario`, `foto_director`, `nombre_director`, `appaterno_director`, `apmaterno_director`, `rfc_director`, `curp_director`, `calle_director`, `numexterior_director`, `numinterior_director`, `cp_director`, `estado_director`, `municipio_director`, `colonia_director`, `telefono_director`, `email_director`, `cedulaprofesional_director`, `fechanacimiento_director`) VALUES
(16, 19, 6, 64, 'root.png', 'Leonardo', 'Moran', 'Jasso', 'abc', 'abc', 'Av. León ', '54', '54', '55748', 'México', 'Tecámac', 'Los', '5574869553', 'Leo@gmail.com', 'abc', '2022-04-01'),
(17, 20, 6, 78, 'default.png', 'asbaje', 'ASBAJE', 'ASBAJE', 'ASBAJE1234567', 'ASBAJE1234567', 'calle', '1', '1', '55710', 'México', 'Coacalco', 'Villa', '123456789', 'ASBAJE@ASBAJE.COM', 'ASBAJE1234567', '2000-01-01'),
(18, 20, 5, 79, 'default.png', 'asbajesegundo', 'asbajesegundo', 'asbajesegundo', 'asbajesegundo', 'asbajesegundo12345', 'a', '1', '1', '43806', 'Hidalgo', 'Tizayuca', 'Fuentes', '12345678', 'asbajesegundo@asbaje.com', 'asbajesegundo123456', '2000-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `id_escuela` int(11) NOT NULL,
  `nombre_escuela` varchar(50) NOT NULL,
  `rfc_escuela` varchar(13) NOT NULL,
  `cct_escuela` varchar(16) NOT NULL,
  `calle_escuela` varchar(50) NOT NULL,
  `numxterior_escuela` varchar(50) NOT NULL,
  `numinterior_escuela` varchar(50) NOT NULL,
  `cp_escuela` int(10) NOT NULL,
  `estado_escuela` varchar(50) NOT NULL,
  `municipio_escuela` varchar(50) NOT NULL,
  `colonia_escuela` varchar(50) NOT NULL,
  `telefono_escuela` varchar(20) NOT NULL,
  `email_escuela` varchar(50) NOT NULL,
  `observacion_escuela` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id_escuela`, `nombre_escuela`, `rfc_escuela`, `cct_escuela`, `calle_escuela`, `numxterior_escuela`, `numinterior_escuela`, `cp_escuela`, `estado_escuela`, `municipio_escuela`, `colonia_escuela`, `telefono_escuela`, `email_escuela`, `observacion_escuela`) VALUES
(19, 'Universidad Tecnológica de Tecámac', 'abcd', 'abcd', 'Av. Héroes ', '54', '54', 55749, 'México', 'Tecámac', '5', '552225698', 'UTTEC@gmail.com', 'Ninguno'),
(20, 'Juana de Asbaje', 'asbaje12345', '1234', 'prueba', '12', '12', 55767, 'México', 'Tecámac', 'Real', '123456789', 'asbaje@asbaje.com', 'es una escuela de color azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_academico`
--

CREATE TABLE `grado_academico` (
  `id_grado_academico` int(11) NOT NULL,
  `nombre_grado_academico` varchar(50) NOT NULL,
  `observacion_gradoacademico` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grado_academico`
--

INSERT INTO `grado_academico` (`id_grado_academico`, `nombre_grado_academico`, `observacion_gradoacademico`) VALUES
(4, 'Técnico Superior Universitario', 'TSU'),
(5, 'Licenciatura', 'Lic.'),
(6, 'Ingeniería', 'Ing.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `nombre_grupo` varchar(15) NOT NULL,
  `turno_grupo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `id_escuela`, `nombre_grupo`, `turno_grupo`) VALUES
(11, 19, '1A', 'Matutino'),
(12, 19, '1B', 'Matutino'),
(13, 19, '2A', 'Matutino'),
(14, 19, '2B', 'Matutino'),
(15, 19, '3A', 'Matutino'),
(16, 20, '1TSM1', 'Matutino'),
(18, 20, '1TSV1', 'Vespertino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_profesor`
--

CREATE TABLE `grupo_profesor` (
  `id_grupo` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_materia`
--

CREATE TABLE `horario_materia` (
  `id_horario` int(11) NOT NULL,
  `materia_fecha_horario` date DEFAULT NULL,
  `materia_horainicio_horario` time NOT NULL,
  `materia_horafin_horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario_materia`
--

INSERT INTO `horario_materia` (`id_horario`, `materia_fecha_horario`, `materia_horainicio_horario`, `materia_horafin_horario`) VALUES
(4, '2022-05-02', '08:00:00', '10:00:00'),
(5, '2022-05-02', '10:00:00', '12:00:00'),
(6, '2022-04-20', '10:00:00', '23:00:00'),
(7, '2022-04-20', '15:00:00', '16:00:00'),
(8, '2022-04-20', '14:02:00', '15:03:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `fechaincidencia_incidencia` date NOT NULL,
  `horaincidencia_incidencia` time NOT NULL,
  `descripcion_incidencia` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `id_alumno`, `id_profesor`, `id_grupo`, `fechaincidencia_incidencia`, `horaincidencia_incidencia`, `descripcion_incidencia`) VALUES
(1, 35, 16, 16, '2022-04-20', '11:21:00', 'PELEA'),
(2, 46, 17, 18, '2022-04-20', '11:21:00', 'PELEA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `nombre_materia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `id_escuela`, `id_horario`, `nombre_materia`) VALUES
(20, 19, 4, 'Matematicas'),
(21, 19, 5, 'Español'),
(22, 20, 6, 'materia1'),
(23, 20, 7, 'materia2'),
(24, 20, 8, 'materia3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_grupo`
--

CREATE TABLE `materia_grupo` (
  `id_grupo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_profesor`
--

CREATE TABLE `materia_profesor` (
  `id_materia_profesor` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia_profesor`
--

INSERT INTO `materia_profesor` (`id_materia_profesor`, `id_profesor`, `id_grupo`, `id_materia`) VALUES
(1, 14, 11, 21),
(2, 15, 12, 20),
(3, 16, 16, 22),
(4, 17, 18, 23),
(5, 18, 16, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `id_cobro` int(11) NOT NULL,
  `cantidad_pago` int(11) NOT NULL,
  `descripcion_pago` varchar(50) NOT NULL,
  `fecha_pago` date NOT NULL DEFAULT current_timestamp(),
  `hora_pago` time NOT NULL DEFAULT current_timestamp(),
  `monto_cobro_pago` int(11) NOT NULL,
  `restante_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `id_cobro`, `cantidad_pago`, `descripcion_pago`, `fecha_pago`, `hora_pago`, `monto_cobro_pago`, `restante_pago`) VALUES
(1, 7, 12222, 'Inscripción', '2022-04-20', '11:15:18', 1111, -11111),
(2, 8, 100, 'Reinscripción', '2022-04-20', '11:17:52', 100, 0),
(3, 9, 12222, 'Constancia de estudios', '2022-04-20', '11:18:04', 12222, 0),
(4, 10, 122, 'Constancia de estudios', '2022-04-20', '11:18:24', 122, 0),
(5, 11, 122222, 'Mantenimiento', '2022-04-20', '11:18:39', 12222, -110000),
(6, 11, 1000, 'Titulación', '2022-04-20', '11:19:20', 1000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial`
--

CREATE TABLE `parcial` (
  `id_parcial` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `nombre_parcial` varchar(20) NOT NULL,
  `fechainicio_parcial` date NOT NULL,
  `fechafin_parcial` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` int(11) NOT NULL,
  `id_grado_academico` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `foto_profesor` varchar(50) NOT NULL,
  `nombre_profesor` varchar(50) NOT NULL,
  `appaterno_profesor` varchar(50) NOT NULL,
  `apmaterno_profesor` varchar(50) NOT NULL,
  `cedula_profesor` varchar(50) NOT NULL,
  `calle_profesor` varchar(50) NOT NULL,
  `numexterior_profesor` varchar(50) NOT NULL,
  `numinterior_profesor` varchar(50) NOT NULL,
  `cp_profesor` int(5) NOT NULL,
  `estado_profesor` varchar(50) NOT NULL,
  `municipio_profesor` varchar(50) NOT NULL,
  `colonia_profesor` varchar(50) NOT NULL,
  `telefono_profesor` varchar(50) NOT NULL,
  `email_profesor` varchar(50) NOT NULL,
  `fechanacimiento_profesor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `id_grado_academico`, `id_escuela`, `id_usuario`, `foto_profesor`, `nombre_profesor`, `appaterno_profesor`, `apmaterno_profesor`, `cedula_profesor`, `calle_profesor`, `numexterior_profesor`, `numinterior_profesor`, `cp_profesor`, `estado_profesor`, `municipio_profesor`, `colonia_profesor`, `telefono_profesor`, `email_profesor`, `fechanacimiento_profesor`) VALUES
(14, 5, 19, 65, 'root.png', 'Erika', 'García', 'Reséndiz ', 'abc', 'Av. Tezozomoc', '45', '45', 55749, 'México', 'Tecámac', 'La', '5547896321', 'eri@gmail.com', '2001-04-06'),
(15, 6, 19, 66, 'root.png', 'Alexis', 'Rueda', 'Martínez', 'abc', 'Colmillo', '45', '54', 55748, 'México', 'Tecámac', 'Ampliación', '5478963214', 'alex@gmail.com', '2022-04-01'),
(16, 4, 20, 105, 'default.png', 'PROFESOR1', 'PROFESOR1', 'PROFESOR1', 'PROFESOR1', 'calle', '12', '12', 55770, 'México', 'Tecámac', 'El', '123456789', 'PROFESOR1@PROFESOR.COM', '2010-01-01'),
(17, 5, 20, 108, 'default.png', 'PROFESOR2', 'PROFESOR2', 'PROFESOR2', 'PROFESOR2', 'calle', '12', '12', 55767, 'México', 'Tecámac', 'Conjunto', '12346789', 'PROFESOR2@PROFESOR.COM', '2010-01-01'),
(18, 6, 20, 109, 'default.png', 'PROFESOR3', 'PROFESOR3', 'PROFESOR3', 'PROFESOR3', 'calle', '12', '12', 55770, 'México', 'Tecámac', 'El', '12346789', 'PROFESOR3@PROFESOR.COM', '2010-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_alumno`
--

CREATE TABLE `tarea_alumno` (
  `id_tarea_alumno` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `nombre_tarea` varchar(50) NOT NULL,
  `descripcion_tarea` varchar(100) NOT NULL,
  `archivo_tarea` varchar(200) NOT NULL,
  `fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarea_alumno`
--

INSERT INTO `tarea_alumno` (`id_tarea_alumno`, `id_grupo`, `id_materia`, `nombre_tarea`, `descripcion_tarea`, `archivo_tarea`, `fecha_entrega`) VALUES
(8, 16, 22, 'TAREA1', 'TAREA1', 'default.png', '2022-04-20'),
(9, 18, 23, 'TAREA2', 'TAREA2', 'default.png', '2022-04-20'),
(10, 18, 24, 'TAREA3', 'TAREA3', 'default.png', '2022-04-20'),
(11, 16, 22, 'TAREA2', 'TAREA2', 'default.png', '2022-04-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_entregada`
--

CREATE TABLE `tarea_entregada` (
  `id_tarea_entregada` int(11) NOT NULL,
  `id_tarea_alumno` int(11) NOT NULL,
  `archivo_tarea_entregada` varchar(200) NOT NULL,
  `comentarios_tarea` varchar(200) NOT NULL,
  `calificacion_tarea` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre_tipo_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre_tipo_usuario`) VALUES
(1, 'Administrador'),
(2, 'director'),
(3, 'Profesor'),
(4, 'Tutor'),
(5, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `id_tutor` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `foto_tutor` varchar(250) NOT NULL,
  `nombre_tutor` varchar(50) NOT NULL,
  `appaterno_tutor` varchar(50) NOT NULL,
  `apmaterno_tutor` varchar(50) NOT NULL,
  `fechanacimiento_tutor` date DEFAULT NULL,
  `telefono_tutor` varchar(13) NOT NULL,
  `email_tutor` varchar(50) NOT NULL,
  `calle_tutor` varchar(50) NOT NULL,
  `noexterior_tutor` varchar(50) NOT NULL,
  `nointerior_tutor` varchar(50) NOT NULL,
  `cp_tutor` int(5) NOT NULL,
  `estado_tutor` varchar(50) NOT NULL,
  `municipio_tutor` varchar(50) NOT NULL,
  `colonia_tutor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`id_tutor`, `id_alumno`, `id_escuela`, `id_usuario`, `foto_tutor`, `nombre_tutor`, `appaterno_tutor`, `apmaterno_tutor`, `fechanacimiento_tutor`, `telefono_tutor`, `email_tutor`, `calle_tutor`, `noexterior_tutor`, `nointerior_tutor`, `cp_tutor`, `estado_tutor`, `municipio_tutor`, `colonia_tutor`) VALUES
(1, 31, 20, 100, 'default.png', 'TUTOR1', 'TUTOR1', 'TUTOR1', '2010-01-01', '123456789', 'TUTOR1@TUTOR.COM', 'calle', '1', '1', 55767, 'México', 'Tecámac', 'Conjunto'),
(2, 42, 20, 101, 'default.png', 'TUTOR2', 'TUTOR2', 'TUTOR2', '2010-01-01', '123456789', 'TUTOR2@TUTOR.COM', 'calle', '1', '1', 43806, 'Hidalgo', 'Tizayuca', 'Ampliación'),
(3, 32, 20, 102, 'default.png', 'TUTOR3', 'TUTOR3', 'TUTOR3', '2010-01-01', '12346789', 'TUTOR3@TUTOR.COM', 'calle', '1', '1', 55770, 'México', 'Tecámac', 'El'),
(4, 43, 20, 103, 'default.png', 'TUTOR4', 'TUTOR4', 'TUTOR4', '2010-01-01', '123456789', 'TUTOR4@TUTOR.COM', 'calle', '1', '1', 43806, 'Hidalgo', 'Tizayuca', 'Ampliación'),
(5, 33, 20, 104, 'default.png', 'TUTOR5', 'TUTOR5', 'TUTOR5', '2010-01-01', '123456789', 'TUTOR5@TUTOT.COM', 'calle', '1', '1', 55710, 'México', 'Coacalco', 'Arcos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `username_usuario` varchar(50) NOT NULL,
  `password_usuario` varchar(100) NOT NULL,
  `activo_usuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `username_usuario`, `password_usuario`, `activo_usuario`) VALUES
(63, 1, 'admin', '12345678', 1),
(64, 2, 'director', '12345678', 1),
(65, 3, 'ErikaM', '12345678', 1),
(66, 3, 'AlexisM', '12345678', 1),
(67, 5, 'Alumno1', '12345678', 1),
(68, 5, 'Alumno2', '12345678', 1),
(69, 5, 'Alumno3', '12345678', 1),
(70, 5, 'Alumno4', '12345678', 1),
(71, 5, 'Alumno5', '12345678', 1),
(72, 5, 'Alumno6', '12345678', 1),
(73, 5, 'Alumno7', '12345678', 1),
(74, 5, 'Alumno8', '12345678', 1),
(75, 5, 'Alumno9', '12345678', 1),
(76, 5, 'Alumno10', '12345678', 1),
(77, 5, 'Alumno11', '12346578', 1),
(78, 2, 'DirectivoAsbaje', '12345678', 1),
(79, 2, 'DirectivoAsbaje2', '12345678', 1),
(80, 5, 'ALUMNO1M', '12345678', 1),
(81, 5, 'alumnom2', '12345678', 1),
(82, 5, 'alumno3m', '12345678', 1),
(83, 5, 'alumno4m', '12345678', 1),
(84, 5, 'alumno4m', '12345678', 1),
(85, 5, 'alumno5m', '12345678', 1),
(86, 5, 'alumno6m', '12345678', 1),
(87, 5, 'alumno7m', '12345678', 1),
(88, 5, 'alumno8m', '12345678', 1),
(89, 5, 'alumno9m', '12345678', 1),
(90, 5, 'alumno10m', '12345678', 1),
(91, 5, 'alumno1v', '12345678', 1),
(92, 5, 'alumno2v', '12345678', 1),
(93, 5, 'alumno3v', '12345678', 1),
(94, 5, 'alumno4v', '12345678', 1),
(95, 5, 'alumno5v', '12345678', 1),
(96, 5, 'alumno6v', '12345678', 1),
(97, 5, 'alumno7v', '12345678', 1),
(98, 5, 'alumno8v', '12345678', 1),
(99, 5, 'alumno10v', '12345678', 1),
(100, 4, 'TUTOR1', '12345678', 1),
(101, 4, 'TUTOR2', '12345678', 1),
(102, 4, 'TUTOR3', '12345678', 1),
(103, 4, 'TUTOR4', '12345678', 1),
(104, 4, 'TUTOR5', '12345678', 1),
(105, 3, 'PROFESOR1', '12345678', 1),
(106, 3, 'PROFESOR2', '12345678', 1),
(107, 3, 'PROFESOR2', '12345678', 1),
(108, 3, 'PROFESOR2', '12345678', 1),
(109, 3, 'PROFESOR3', '12345678', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_escuela` (`id_escuela`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_parcial` (`id_parcial`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `cobro`
--
ALTER TABLE `cobro`
  ADD PRIMARY KEY (`id_cobro`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id_director`),
  ADD KEY `id_escuela` (`id_escuela`),
  ADD KEY `id_grado_academico` (`id_grado_academico`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`id_escuela`);

--
-- Indices de la tabla `grado_academico`
--
ALTER TABLE `grado_academico`
  ADD PRIMARY KEY (`id_grado_academico`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_escuela` (`id_escuela`);

--
-- Indices de la tabla `grupo_profesor`
--
ALTER TABLE `grupo_profesor`
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `horario_materia`
--
ALTER TABLE `horario_materia`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `id_escuela` (`id_escuela`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  ADD PRIMARY KEY (`id_materia_profesor`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_cobro` (`id_cobro`);

--
-- Indices de la tabla `parcial`
--
ALTER TABLE `parcial`
  ADD PRIMARY KEY (`id_parcial`),
  ADD KEY `id_escuela` (`id_escuela`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_profesor`),
  ADD KEY `id_escuela` (`id_escuela`),
  ADD KEY `id_grado_academico` (`id_grado_academico`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tarea_alumno`
--
ALTER TABLE `tarea_alumno`
  ADD PRIMARY KEY (`id_tarea_alumno`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `tarea_entregada`
--
ALTER TABLE `tarea_entregada`
  ADD PRIMARY KEY (`id_tarea_entregada`),
  ADD KEY `id_tarea_alumno` (`id_tarea_alumno`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_escuela` (`id_escuela`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `cobro`
--
ALTER TABLE `cobro`
  MODIFY `id_cobro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `grado_academico`
--
ALTER TABLE `grado_academico`
  MODIFY `id_grado_academico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `horario_materia`
--
ALTER TABLE `horario_materia`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  MODIFY `id_materia_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `parcial`
--
ALTER TABLE `parcial`
  MODIFY `id_parcial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tarea_alumno`
--
ALTER TABLE `tarea_alumno`
  MODIFY `id_tarea_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tarea_entregada`
--
ALTER TABLE `tarea_entregada`
  MODIFY `id_tarea_entregada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`),
  ADD CONSTRAINT `calificacion_ibfk_3` FOREIGN KEY (`id_parcial`) REFERENCES `parcial` (`id_parcial`),
  ADD CONSTRAINT `calificacion_ibfk_4` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `director_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE,
  ADD CONSTRAINT `director_ibfk_2` FOREIGN KEY (`id_grado_academico`) REFERENCES `grado_academico` (`id_grado_academico`) ON DELETE CASCADE,
  ADD CONSTRAINT `director_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE;

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `incidencias_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`) ON DELETE CASCADE,
  ADD CONSTRAINT `incidencias_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE,
  ADD CONSTRAINT `materia_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario_materia` (`id_horario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  ADD CONSTRAINT `materia_grupo_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE;

--
-- Filtros para la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  ADD CONSTRAINT `materia_profesor_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `materia_profesor_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE,
  ADD CONSTRAINT `materia_profesor_ibfk_3` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`) ON DELETE CASCADE;

--
-- Filtros para la tabla `parcial`
--
ALTER TABLE `parcial`
  ADD CONSTRAINT `parcial_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`id_grado_academico`) REFERENCES `grado_academico` (`id_grado_academico`) ON DELETE CASCADE,
  ADD CONSTRAINT `profesor_ibfk_2` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE,
  ADD CONSTRAINT `profesor_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tarea_alumno`
--
ALTER TABLE `tarea_alumno`
  ADD CONSTRAINT `tarea_alumno_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `tarea_alumno_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tarea_entregada`
--
ALTER TABLE `tarea_entregada`
  ADD CONSTRAINT `tarea_entregada_ibfk_1` FOREIGN KEY (`id_tarea_alumno`) REFERENCES `tarea_alumno` (`id_tarea_alumno`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutor_ibfk_2` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutor_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
