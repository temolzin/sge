-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2023 a las 22:08:54
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
-- Base de datos: `roothei3_sgedev`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `id_usuario`, `foto_administrador`, `nombre_administrador`, `appaterno_administrador`, `apmaterno_administrador`, `telefono_administrador`, `email_administrador`, `fechanacimiento_administrador`) VALUES
(1, 51, 'usuario.png', 'Gael', 'Rodríguez', 'López', '5613890236', 'gaelrodriguez@gmail.com', '2001-08-20'),
(5, 50, 'perfil.png', 'Temolzin', 'Roldan', 'Palacios', '5623640302', 'usuario@gmail.com', '1999-01-01'),
(7, 101, '1296677_w724h724c1cx414cy237.jpeg', 'Stephania ', 'Juarez', 'Corral ', '5563832976', 'STPJ@gmail.com', '2023-01-18');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `id_grupo`, `id_escuela`, `id_usuario`, `foto_alumno`, `nombre_alumno`, `appaterno_alumno`, `apmaterno_alumno`, `calle_alumno`, `noexterior_alumno`, `nointerior_alumno`, `cp_alumno`, `estado_alumno`, `municipio_alumno`, `colonia_alumno`, `telefono_alumno`, `email_alumno`, `fechanacimiento_alumno`) VALUES
(1, 1, 8, 37, '2022-11-21_21h27_23.png', 'Aldair', 'Moreno', 'Jurado', 'jardines de morelos', '263', '23', 55070, 'default', 'default', 'default', '5567432139', 'aldairjurado@gmail.com', '1998-01-15'),
(3, 1, 8, 44, '', 'Daniel', 'Horta', 'Delgado', 'Jardines de morelos', '567', '23', 55070, 'México', 'Ecatepec', 'Jardines', '5548243149', 'danielhortadelgado34@gmail.com', '1998-01-01'),
(4, 2, 14, 65, 'perfil (1).png', 'Ricardo', 'Perez', 'Gonzalez', 'Nisperos, Hacienda del Bosque', '1', '36', 55743, 'México', 'Tecámac', 'Hacienda', '12345678910', 'Ricardo1213@gmail.com', '2001-08-20'),
(5, 2, 14, 66, 'perfil.png', 'Fernanda', 'Rodríguez', 'López', 'Av. Bosques', '54', 's/n', 55743, 'México', 'Tecámac', 'La', '5555555', 'ferG1213@gmail.com', '1999-02-13'),
(6, 2, 14, 67, 'H.png', 'Wade', 'Hardwell', 'Watts', 'Nueva Calle', '2', '12', 55743, 'México', 'Tecámac', 'San', '5555555555', 'Wadew43@gmail.com', '1998-09-04'),
(7, 2, 14, 68, 'M.png', 'Evelin', 'Salas', 'Garcia', 'My Street', '7', '21', 55310, 'México', 'Ecatepec', 'Cuauhtémoc', '555555555', 'eve12@gmail.com', '2000-01-31'),
(8, 2, 14, 69, 'H.png', 'Mario', 'Sanchez', 'Cortes', 'Robles, Abedules', 's/n', '1', 55740, 'México', 'Tecámac', 'El', '12345678910', 'mario98@gmail.com', '2000-09-21'),
(9, 3, 14, 70, 'M.png', 'Adriana', 'Rivera', 'Aguilar', 'Camino privado', '4', 's/n', 55743, 'México', 'Tecámac', 'Isidro', '12345678910', 'adri755@gmail.com', '2000-02-12'),
(10, 3, 14, 71, 'H.png', 'Jose', 'Torres', 'Aguilar', 'Privada Castilla', '4', '10', 55740, 'México', 'Tecámac', 'El', '55555555', 'Josse1112@gmail.com', '2000-12-25'),
(11, 3, 14, 72, 'M.png', 'Romina', 'Castillo', 'Oritz', 'Mi Calle ', '1', 's/n', 55310, 'México', 'Ecatepec', 'Cuauhtémoc', '12345678910', 'roomi12@gmail.com', '2000-08-30'),
(12, 3, 14, 73, 'M.png', 'Melissa', 'Castillo', 'Navarrete', 'Gasoducto', 's/n', '32', 55740, 'México', 'Tecámac', 'Galaxias', '1247839304', 'MelliC@gmail.com', '2001-09-15'),
(13, 3, 14, 74, 'H.png', 'Pedro', 'Torres', 'Dominguez', 'Cortes', '6', 's/n', 55310, 'México', 'Ecatepec', 'Cuauhtémoc', '12345678910', 'pedrotorres@gmail.com', '2001-12-15'),
(14, 4, 13, 75, 'H.png', 'Santiago', 'Moreno', 'Galvan', 'Av. Mi calle', '1', 's/n', 55310, 'México', 'Ecatepec', 'Cuauhtémoc', '12345678910', 'santi31@gmail.com', '2000-10-05'),
(15, 4, 13, 76, 'M.png', 'Andrea', 'Vazquez', 'Gimenez', 'Av. Zapata', '1', '19', 55740, 'México', 'Tecámac', 'Galaxias', '555555555', 'andyVaz21@gmail.com', '2001-11-11'),
(16, 4, 13, 77, 'M.png', 'Ximena', 'Reyes', 'Castillo', 'Av. Alameda', '9', 's/n', 55740, 'México', 'Tecámac', 'Tecámac', '12345678910', 'ximrey189210@gmail.com', '2001-08-30'),
(17, 4, 13, 78, 'H.png', 'Matias', 'Méndez', 'Ramos', 'Av. No me acuerdo', 's/n', '3', 55310, 'México', 'Ecatepec', 'San', '12345678910', 'matir1231@gmail.com', '1999-01-29'),
(18, 4, 13, 79, 'M.png', 'Regina', 'Juárez', 'Domínguez', 'Av. La palma', '12', 's/n', 55804, 'México', 'Teotihuacán', 'Purificación', '555555555', 'regin0992@gmail.com', '2001-12-31'),
(19, 5, 13, 80, 'H.png', 'Sebastian', 'Herrera', 'Medina', 'Av. Blecker', '34', '2', 55743, 'México', 'Tecámac', 'Hacienda', '12345678910', 'sebas1281@gmail.com', '2001-04-12'),
(20, 5, 13, 81, 'M.png', 'Valeria', 'Herrera', 'Castro', 'Av. Nueva', 's/n', '9', 55310, 'México', 'Ecatepec', 'San', '12345678910', 'valeri00@gmail.com', '2000-10-11'),
(21, 5, 13, 82, 'H.png', 'Daniel', 'Rojas', 'Salazar', 'Av. Zapata', '3', 's/n', 55740, 'México', 'Tecámac', 'Galaxias', '5555555555', 'danir9898@gmail.com', '2000-02-22'),
(22, 5, 13, 83, 'M.png', 'Victoria', 'Estrada', 'Bautista', 'Av. Mi calle', '8', '2', 55743, 'México', 'Tecámac', 'Rancho', '555555555', 'vickyE101@gmail.com', '1999-10-21'),
(23, 5, 13, 84, 'H.png', 'Angel', 'Espinoza', 'Alvarado', 'Av. Otra calle', 'S/n', '9', 55310, 'México', 'Ecatepec', 'Cuauhtémoc', '56128391930', 'angele321@gmail.com', '2001-05-05'),
(24, 6, 15, 85, 'M.png', 'Ana', 'Cervantes', 'Silva', 'Av. Never', '12', 's/n', 55740, 'México', 'Tecámac', 'El', '555555555', 'anaS123@gmail.com', '2000-04-14'),
(25, 6, 15, 86, 'H.png', 'Fernanda', 'Vega', 'Delgado', 'Av. Otra calle', '1', 's/n', 55743, 'México', 'Tecámac', 'Real', '9871036738', 'ferV10@gmail.com', '2000-11-09'),
(26, 6, 15, 87, 'H.png', 'Alexa', 'Palacios', 'Ruíz', 'Av. Otra calle', '12', 's/n', 55740, 'México', 'Tecámac', 'Tecámac', '99971386861', 'alex102@gmail.com', '2000-09-29'),
(27, 6, 15, 88, 'H.png', 'Rodrigo', 'Sandoval', 'Carrillo', 'Av. Calle Oupesta', '123', 's/n', 55310, 'México', 'Ecatepec', 'Cuauhtémoc', '8907936809', 'rodrS999@gmail.com', '2001-07-31'),
(28, 6, 15, 89, 'M.png', 'Samantha', 'León', 'Solís', 'Av. Zapata', '1', '23', 55310, 'México', 'Ecatepec', 'Cuauhtémoc', '0980746783', 'samsols098@gmail.com', '2000-09-06'),
(29, 7, 15, 90, 'H.png', 'Dylan', 'Riva', 'Palacios', 'Av. Mi calle', 's/n', '1', 55740, 'México', 'Tecámac', 'Galaxias', '129933312', 'dan000@gmail.com', '2001-08-08'),
(30, 7, 15, 91, 'M.png', 'Elizabeth', 'Santos', 'Maldonado', 'Av. Otra calle', '98', 's/n', 55310, 'México', 'Ecatepec', 'San', '12324532', 'Elibeth028@gmail.com', '2001-01-12'),
(31, 7, 15, 92, 'H.png', 'Emilio', 'Acosta', 'Cabrera', 'Av. Otra calle', '12', '3', 55740, 'México', 'Tecámac', 'Tecámac', '98887866', 'EmilioAC219@gmail.com', '2000-08-31'),
(32, 7, 15, 93, 'M.png', 'Fatima', 'Valencia', 'Nava', 'Av. Zapata', '3', '12', 55310, 'México', 'Ecatepec', 'Cuauhtémoc', '76578961', 'fatima123@gmail.com', '2001-09-11'),
(33, 7, 15, 94, 'H.png', 'Elias', 'Rangel', 'Huerta', 'Av. Zapata', '87', 'S/N', 55310, 'México', 'Ecatepec', 'San', '5613890236', 'elias09q@gmail.com', '2000-11-24'),
(34, 2, 14, 103, 'H.png', 'Gael', 'Rodriguez', 'Lopez', 'Nisperos', '20', '1', 55743, 'México', 'Tecámac', 'Hacienda', '5613890236', 'gael123@gmail.com', '0000-00-00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id_calificacion`, `id_profesor`, `id_alumno`, `id_parcial`, `id_materia`, `calificacion`, `observacion_calificacion`, `fecha_calificacion`) VALUES
(3, 2, 1, 1, 1, 3, 'Mal', '2022-11-03'),
(4, 4, 1, 1, 1, 10, 'Excelente', '2022-11-12'),
(5, 2, 1, 1, 1, 9, 'bien', '2022-11-04'),
(6, 6, 4, 1, 4, 10, 'Muy bien hecho', '2023-01-15'),
(7, 6, 5, 1, 4, 8, 'Esfuérzate un poco más', '2023-01-15'),
(11, 6, 7, 1, 3, 9, 'Observación', '2023-01-16'),
(12, 6, 4, 1, 3, 9, 'Puede mejorar', '2023-03-08'),
(13, 12, 34, 1, 4, 9, 'Bien hecho', '2023-03-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

CREATE TABLE `cobro` (
  `id_cobro` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `cantidad_cobro` int(11) NOT NULL,
  `iva_cobro` int(11) NOT NULL,
  `fechalimite_cobro` date NOT NULL,
  `activo_cobro` tinyint(4) NOT NULL,
  `fecha_cobro` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `concepto_cobro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cobro`
--

INSERT INTO `cobro` (`id_cobro`, `id_alumno`, `id_concepto`, `cantidad_cobro`, `iva_cobro`, `fechalimite_cobro`, `activo_cobro`, `fecha_cobro`, `concepto_cobro`) VALUES
(43, 34, 0, 1000, 12, '2023-03-17', 1, '2023-03-16 15:53:19', 'Inscripción'),
(45, 25, 0, 1000, 0, '2023-04-17', 1, '2023-04-13 14:18:12', 'Inscripción'),
(46, 34, 1, 1000, 0, '2023-04-15', 1, '2023-04-13 23:02:17', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

CREATE TABLE `concepto` (
  `id_concepto` int(11) NOT NULL,
  `nombre_concepto` varchar(30) DEFAULT NULL,
  `descripcion_concepto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `concepto`
--

INSERT INTO `concepto` (`id_concepto`, `nombre_concepto`, `descripcion_concepto`) VALUES
(1, 'Reinscripción', 'Reinscripción Cuatrimestral'),
(14, 'Inscripción', 'Inscripción inicial'),
(15, 'Copia', 'Copia de certificado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id_director` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_grado_academico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `foto_director` varchar(255) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id_director`, `id_escuela`, `id_grado_academico`, `id_usuario`, `foto_director`, `nombre_director`, `appaterno_director`, `apmaterno_director`, `rfc_director`, `curp_director`, `calle_director`, `numexterior_director`, `numinterior_director`, `cp_director`, `estado_director`, `municipio_director`, `colonia_director`, `telefono_director`, `email_director`, `cedulaprofesional_director`, `fechanacimiento_director`) VALUES
(14, 8, 1, 46, 'di.png', 'Lorena', 'Ramirez', 'Lopez', 'RRRRRRR#333', 'RRRRRR3333333', '1ra cda de san francisco', '2', '3', '55760', 'México', 'Tecámac', 'Atlautenco', '12347890987', 'lo@gmail.com', '12347890', '2022-12-02'),
(16, 14, 3, 52, 'perfil.png', 'Gael', 'Rodríguez', 'Hernández', '513yq89n81', 'ROLG010820HDFDPLA5', 'Av. Abbie Road', '72', 's/n', '55743', 'México', 'Tecámac', 'Hacienda', '12345678910', 'drG123@gmail.com', '000000000', '2001-08-20'),
(17, 14, 1, 53, 'perfil.png', 'Xool', 'Rodríguez', 'Flores', '000000000', '00000000000000000', 'NCalle', '12', '2', '55310', 'México', 'Ecatepec', 'San', '5555555555', 'xoolf123@gmail.com', '00000000000', '1999-08-31'),
(18, 13, 3, 54, 'perfil (1).png', 'Nombre', 'ApellidoP', 'ApellidoM', '00000000', '000000000000000', 'Otra calle', '12', '2', '55743', 'México', 'Tecámac', 'Rancho', '5555555555', 'dr1n@gmail.com', '0000000000', '1982-04-12'),
(20, 13, 1, 56, 'perfil (1).png', 'DirectorU', 'Numero', 'Dos', '0000000', '000000', 'Otra calle', '3', '12', '55743', 'México', 'Tecámac', 'Hacienda', '5555555555', 'dr2@gmail.com', '000000', '1989-08-20'),
(21, 15, 3, 57, 'perfil.png', 'Angelina', 'Martinez', 'Rios', '', '', 'Av. Paseo', '9', 's/n', '55310', 'México', 'Ecatepec', 'Cuauhtémoc', '5555555555', 'angesup124@gmail.com', '12345678', '1992-05-12'),
(22, 15, 1, 58, 'perfil.png', 'June', 'Valentina', 'Martinez', '', '', 'Av. Quin', '10', '1', '55310', 'México', 'Ecatepec', 'Cuauhtémoc', '12345678910', 'juneA@gmail.com', '123456712', '1991-03-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `id_escuela` int(11) NOT NULL,
  `foto_escuela` varchar(100) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id_escuela`, `foto_escuela`, `nombre_escuela`, `rfc_escuela`, `cct_escuela`, `calle_escuela`, `numxterior_escuela`, `numinterior_escuela`, `cp_escuela`, `estado_escuela`, `municipio_escuela`, `colonia_escuela`, `telefono_escuela`, `email_escuela`, `observacion_escuela`) VALUES
(8, 'colega.jpg', 'Kids Brains Teotihuacan', '00000000', '00000000', 'Plaza Purificacion', '9', 'S/N', 55804, 'México', 'Teotihuacán', 'Purificación', '5567732571', 'monserratmr@gmail.com', 'Educación'),
(10, 'escuela.png', 'Kids Ecatepec', 'JDDSO872728', '13876323', 'Av. Jardines de Morelos', '259', '23', 55070, 'México', 'Ecatepec', 'Jardines', '5548243149', 'jardinesdeseo@gmail.com', 'Ok'),
(11, 'esc.jpg', 'Kids Brains Tecámac', 'TECMC009282', 'CMC009282', 'Tecamac', '34', '23', 55765, 'México', 'Tecámac', 'Granjas', '5566773309', 'KidsTecamac@gmail.com', 'Ok'),
(13, 'colegio.png', 'Uttec', '000000', '000000', 'Caretera federal México-Pachuca', 'km 35', 's/n', 55740, 'México', 'Tecámac', 'Tecámac', '12345678910', 'uttec123@gmail.com', ''),
(14, 'default.jpg', 'ITNEXT', '1234567', '000000', 'Nisperos', '5', 's/n', 55743, 'México', 'Tecámac', 'Hacienda', '5613890236', 'it.next@gmail.com', ''),
(15, 'colega.png', 'Tenológico Superior', '12345678', '123456789', 'Av. Romero', '12', 's/n', 55310, 'México', 'Ecatepec', 'San', '555555555', 'tecSup@gmail.com', ''),
(16, 'colegio.png', 'Nueva escuela', '3456789', '4567890', 'NuevaCalle', '5', 's/n', 55740, 'México', 'Tecámac', 'El', '34567890789', 'nuevaescuela12@gmail.com', ''),
(17, 'cloud-gc77751eb0_1920.jpg', 'liceo lin ', 'RINABS103-3', 'STP78292BS', 'Colonia Del Valle ', '19', '05', 77917, 'Quintana', 'Bacalar', 'El', '56281823739', 'liceolinschool@gmail.com', ''),
(18, 'd.jpg', 'Aprendamos juntos S.C.', 'AJS010101', '12434JFJFN444', 'AVENIDA SIEMPRE VIVA', '13', '', 55810, 'México', 'Teotihuacán', 'Oxtoyáhuatl', '95906732', 'aprendamosjuntos@gmail.com', 'ESCUELA DE PRUEBA ANDY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_academico`
--

CREATE TABLE `grado_academico` (
  `id_grado_academico` int(11) NOT NULL,
  `nombre_grado_academico` varchar(50) NOT NULL,
  `observacion_gradoacademico` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado_academico`
--

INSERT INTO `grado_academico` (`id_grado_academico`, `nombre_grado_academico`, `observacion_gradoacademico`) VALUES
(1, 'Licenciatura', 'Pedagogía'),
(3, 'Ingeniería', 'Desarrollo de Software'),
(4, 'Ingeniería', 'Mecatrónica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `nombre_grupo` varchar(15) NOT NULL,
  `turno_grupo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `id_escuela`, `nombre_grupo`, `turno_grupo`) VALUES
(1, 8, 'a2', 'Matutino'),
(2, 14, 'Grupo1', 'Matutino'),
(3, 14, 'Grupo2', 'Vespertino'),
(4, 13, 'Grupo1', 'Matutino'),
(5, 13, 'Grupo2', 'Vespertino'),
(6, 15, 'Grupo1', 'Matutino'),
(7, 15, 'Grupo2', 'Vespertino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_profesor`
--

CREATE TABLE `grupo_profesor` (
  `id_grupo` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_materia`
--

CREATE TABLE `horario_materia` (
  `id_horario` int(11) NOT NULL,
  `materia_fecha_horario` date DEFAULT NULL,
  `materia_horainicio_horario` time NOT NULL,
  `materia_horafin_horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario_materia`
--

INSERT INTO `horario_materia` (`id_horario`, `materia_fecha_horario`, `materia_horainicio_horario`, `materia_horafin_horario`) VALUES
(1, '2022-07-19', '09:00:00', '13:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `nombre_materia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `id_escuela`, `id_horario`, `nombre_materia`) VALUES
(1, 8, 1, 'Ciencias'),
(2, 8, 1, 'Español'),
(3, 14, 1, 'Cálculo Diferencial'),
(4, 14, 1, 'Programación 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_grupo`
--

CREATE TABLE `materia_grupo` (
  `id_grupo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_profesor`
--

CREATE TABLE `materia_profesor` (
  `id_materia_profesor` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia_profesor`
--

INSERT INTO `materia_profesor` (`id_materia_profesor`, `id_profesor`, `id_grupo`, `id_materia`) VALUES
(1, 2, 1, 2),
(2, 6, 2, 3),
(3, 12, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `id_cobro` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `cantidad_pago` int(11) NOT NULL,
  `descripcion_pago` varchar(50) NOT NULL,
  `hora_pago` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `monto_cobro_pago` int(11) NOT NULL,
  `restante_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `id_cobro`, `id_alumno`, `id_escuela`, `cantidad_pago`, `descripcion_pago`, `hora_pago`, `monto_cobro_pago`, `restante_pago`) VALUES
(53, 43, 0, 14, 500, 'Inscripción', '2023-04-13 21:37:08', 1000, 500),
(54, 43, 0, 14, 500, 'Inscripción', '2023-04-13 21:37:19', 1000, 500),
(55, 43, 0, 14, 500, 'Inscripción', '2023-04-06 20:41:10', 1000, 500),
(56, 43, 0, 14, 500, 'Inscripción', '2023-04-07 22:51:58', 1000, 500),
(57, 43, 0, 14, 1000, 'Inscripción', '2023-04-13 21:37:29', 1780, 780),
(59, 43, 34, 14, 500, 'Inscripción', '2023-04-13 21:37:42', 1000, 500);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parcial`
--

INSERT INTO `parcial` (`id_parcial`, `id_escuela`, `nombre_parcial`, `fechainicio_parcial`, `fechafin_parcial`) VALUES
(1, 8, 'Primero', '2022-11-03', '2022-12-07'),
(2, 13, 'Segundo', '2023-02-02', '2023-02-02');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `id_grado_academico`, `id_escuela`, `id_usuario`, `foto_profesor`, `nombre_profesor`, `appaterno_profesor`, `apmaterno_profesor`, `cedula_profesor`, `calle_profesor`, `numexterior_profesor`, `numinterior_profesor`, `cp_profesor`, `estado_profesor`, `municipio_profesor`, `colonia_profesor`, `telefono_profesor`, `email_profesor`, `fechanacimiento_profesor`) VALUES
(2, 1, 8, 36, 'pexels-sora-shimazaki-5668847.jpg', 'Andrea', 'Aguirre', 'Moreno', 'sdfsdfewfewed', 'Av. Jardines de Morelos', '259', '23', 55070, 'default', 'default', 'default', '5548243149', 'andreahernandez@gmail.com', '0990-01-01'),
(3, 1, 8, 38, 'superman-logo-E555F48FD9-seeklogo.com.png', 'testRepeat', 'test', 'test', '2132312312', 'asdasdas', 'dasda', 'ds', 77800, 'Quintana', 'José', 'Dziuche', '56555555', 'asdsa@dasd.com', '2001-12-01'),
(4, 1, 8, 40, 'di.png', 'Lorena', 'Ramirez', 'Lopez', '12347890', '1ra cda de san francisco', '2', '3', 1234, 'default', 'default', 'default', '12347890987', 'lo@gmail.com', '2022-11-03'),
(5, 1, 8, 47, '0b0e96df34b1bcf9e651636b9c2b2750.jpg', 'Jeronimo', 'Alva', 'Rivero', '798987798', 'hghjhjk', '8', '', 55850, 'México', 'San', 'San', '76876876887678', 'jero@gmail.com', '1990-12-31'),
(6, 3, 14, 59, 'perfil.png', 'Erika', 'Díaz', 'Cruz', '000000000', 'NuevaC', 'S/n', '2', 55740, 'México', 'Tecámac', 'El', '5555555555', 'prof1ITN@gmail.com', '1999-12-12'),
(7, 3, 14, 60, 'perfil (1).png', 'Alin', 'Quintero', 'Ruiz', '0000000', 'New Road', 's/n', '1', 55743, 'México', 'Tecámac', 'San', '5555555555', 'Alinq@gmail.com', '2001-08-20'),
(8, 3, 13, 61, 'perfil (1).png', 'Enrique', 'Salinas', 'Ramirez', '000000000000', 'Street', '1', 's/n', 55740, 'México', 'Tecámac', 'Tecámac', '8555555', 'Enrique123@gmail.com', '1987-01-31'),
(9, 1, 13, 62, 'perfil.png', 'Giocelyn', 'Garcia', 'Flores', '99999999999', 'Av. Insurgentes', '1', '3', 810, '', '', '', '55555555', 'gioce1212@gmail.com', '1999-05-31'),
(10, 3, 15, 63, 'perfil (1).png', 'Ricardo', 'Alvarez', 'Rodriguez', '124546678764', 'Mi calle', '1', 's/n', 55310, 'México', 'Ecatepec', 'Cuauhtémoc', '555555', 'Ric12@gmial.com', '1979-03-21'),
(11, 3, 15, 64, 'perfil.png', 'Susana', 'Hernández', 'Moreno', '121212121212', 'Mi calle', 's/n', '23', 55310, 'México', 'Ecatepec', 'Cuauhtémoc', '5555555555', 'susana656@gmail.com', '1999-09-11'),
(12, 1, 14, 102, 'M.png', 'Xool', 'Flores', 'López', 'rt67890', 'Nisperos', '20', '1', 55743, 'México', 'Tecámac', 'Hacienda', '456789', 'xoolf@gmail.com', '2000-08-31');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarea_alumno`
--

INSERT INTO `tarea_alumno` (`id_tarea_alumno`, `id_grupo`, `id_materia`, `nombre_tarea`, `descripcion_tarea`, `archivo_tarea`, `fecha_entrega`) VALUES
(1, 1, 1, 'Cuidado del Ambiente', 'Con ejemplos', 'PRUEBA.pdf', '2022-11-14'),
(2, 1, 1, 'Cuidado del Ambiente', 'bien', 'PRUEBA.pdf', '2022-11-04'),
(3, 1, 1, 'Cuidado del Ambiente', 'ingresar información', 'PRUEBA.pdf', '2022-11-22'),
(4, 2, 4, 'Revisión de comandos Git', 'Revisa los primeros comandos de git, registra la ejecución de cada uno y su resultado', 'Comandos git.txt', '2023-01-16'),
(5, 2, 4, 'Revisión de comandos Git', 'Revisar los comandos, ejecutarlos uno por uno y registrar su resultado.', 'Comandos git.txt', '2023-01-17'),
(6, 2, 3, 'Tarea de prueba', 'Tarea de prueba', 'SpotifyLogo.svg', '2023-01-17'),
(7, 2, 3, 'Tarea de prueba', 'Tarea de prueba', 'ERN2.png', '2023-03-07');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre_tipo_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre_tipo_usuario`) VALUES
(1, 'administrador'),
(2, 'director'),
(3, 'profesor'),
(4, 'tutor'),
(5, 'alumno');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`id_tutor`, `id_alumno`, `id_escuela`, `id_usuario`, `foto_tutor`, `nombre_tutor`, `appaterno_tutor`, `apmaterno_tutor`, `fechanacimiento_tutor`, `telefono_tutor`, `email_tutor`, `calle_tutor`, `noexterior_tutor`, `nointerior_tutor`, `cp_tutor`, `estado_tutor`, `municipio_tutor`, `colonia_tutor`) VALUES
(1, 1, 8, 39, 'ad.jpg', 'Ignacio', 'López', 'López', '1994-07-21', '12347890987', 'ig@gmail.com', '1ra cda de san francisco', '2', '3', 55070, 'México', 'Ecatepec', 'Jardines'),
(2, 3, 8, 45, 'hombre.png', 'Armando', 'Lopez', 'Dominguez', '1998-06-01', '5566778899', 'armando@gmail.com', 'Jardines de Morelos', '259', '25', 55070, 'México', 'Ecatepec', 'Plan'),
(3, 4, 14, 95, 'H.png', 'Javier', 'Huerta', 'Díaz', '1991-08-20', '6283989217', 'javii127@gmail.com', 'MiCalle', 's/n', '13', 55740, 'México', 'Tecámac', 'Tecámac'),
(4, 9, 14, 96, 'M.png', 'Alicia', 'Rodríguez', 'Ayala', '1989-11-25', '56872398', 'alic237@gmail.com', 'Micalle', 's/n', '23', 55740, 'México', 'Tecámac', 'El'),
(5, 14, 13, 97, 'M.png', 'Emily', 'Sandoval', 'Carrillo', '1999-02-17', '456788790', 'emily178@gmail.com', 'Micalle', '12', 's/n', 55310, 'México', 'Ecatepec', 'Cuauhtémoc'),
(6, 19, 13, 98, 'M.png', 'Esmeralda', 'Carrillo', 'Roldan', '1984-01-31', '345678678', 'esme11@gmail.com', 'Micalle', '1', 's/n', 55740, 'México', 'Tecámac', 'Tecámac'),
(7, 24, 15, 99, 'H.png', 'Nicolas', 'Ávila', 'Silva', '1989-03-20', '4567890567890', 'nic56@gmail.com', 'NuevaCalle', '8', 's/n', 55740, 'México', 'Tecámac', 'Galaxias'),
(8, 29, 15, 100, 'M.png', 'Antonio', 'Domínguez', 'Herrera', '1985-08-07', '345', 'antony63@gmail.com', 'Micalle', '21', 's/n', 55743, 'México', 'Tecámac', 'Isidro');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `username_usuario`, `password_usuario`, `activo_usuario`) VALUES
(37, 5, 'Aldair', 'root#heim', 1),
(38, 3, 'testRepeat', '12345678', 1),
(39, 4, 'TUTOR1', 'Tutor123', 1),
(40, 3, 'PROFESOR1', 'Profesor1', 1),
(43, 5, 'Director11', 'Directivo12', 1),
(44, 5, 'Director12', 'Holasoyalumno12', 1),
(45, 4, 'Tutor1', 'Tutor111', 1),
(46, 2, 'Monserratt', 'root#heim', 1),
(47, 3, 'Jeronimo', 'root1234', 1),
(49, 2, 'Gael1', 'Holasoyunusu', 1),
(50, 1, 'Temolzin', 'root#heim', 1),
(51, 1, 'Gael', 'Imadmin12', 1),
(52, 2, 'DrGael', 'hlasoyunusario', 1),
(53, 2, 'DrXool', 'ImdrXool1234', 1),
(54, 2, 'Dr1', 'Iamdr1234567', 1),
(56, 2, 'Dr2', 'Iamdr2abcd', 1),
(57, 2, 'AngeSup', 'Iamangesup12', 1),
(58, 2, 'June12', 'Iamjune12345', 1),
(59, 3, 'Profesora1', 'Iamprof1234', 1),
(60, 3, 'Profesora2', 'Iamporfesora', 1),
(61, 3, 'ProfU1', 'Iamprof1234', 1),
(62, 3, 'ProfU2', 'Iamprof2131', 1),
(63, 3, 'ProfT1', 'iamprofty124', 1),
(64, 3, 'ProfT2', 'Iamproft123', 1),
(65, 5, 'AlumIT1', 'Iamalumno124', 1),
(66, 5, 'AlumIT2', 'Iamalumt2', 1),
(67, 5, 'AlumIT3', 'Iamalumnt123', 1),
(68, 5, 'AlumIT4', 'Iamalumno124', 1),
(69, 5, 'AlumIT5', 'Iasmalumn32', 1),
(70, 5, 'AlumIT6', 'Iamalumn323', 1),
(71, 5, 'AlumIT7', 'Iamtedanger1', 1),
(72, 5, 'AlumIT8', 'Iamalumn12', 1),
(73, 5, 'AlumIT9', 'Iamalum13', 1),
(74, 5, 'AlumIT10', 'Iamdni12', 1),
(75, 5, 'AlumUT1', 'Imadbuad', 1),
(76, 5, 'AlumUT2', 'Iasmunaid', 1),
(77, 5, 'AlumUT3', 'Iamuttt231', 1),
(78, 5, 'AlumUT4', 'Iamalumnn1', 1),
(79, 5, 'AlumUT5', 'Hiimutt23', 1),
(80, 5, 'AlumUT6', 'I dywb611', 1),
(81, 5, 'AlumUT7', 'Iwqoeñ12´d', 1),
(82, 5, 'AlumUT8', 'Alumyt129', 1),
(83, 5, 'AlumUT9', '1Blablaa9s', 1),
(84, 5, 'AlumUT10', 'oamuneif', 1),
(85, 5, 'AlumTS1', 'Alumtes192', 1),
(86, 5, 'AlumTS2', '1Qnduinewp', 1),
(87, 5, 'AlumTS3', 'Alumts191', 1),
(88, 5, 'AlumTS4', 'Alumst12', 1),
(89, 5, 'AlumTS5', 'Aiqnei12', 1),
(90, 5, 'AlumTS6', 'Alum172133', 1),
(91, 5, 'AlumTS7', 'aLUMDNW75', 1),
(92, 5, 'AlumTS8', 'Alumygsdsuqb', 1),
(93, 5, 'AlumTS9', 'aijnsyb w', 1),
(94, 5, 'AlumTS10', 'Alumts75', 1),
(95, 4, 'Tutor1', 'Iamtutor6198', 1),
(96, 4, 'TutorIT2', 'iAMBUHONDBUO', 1),
(97, 4, 'TutorUT1', 'Aifneue5', 1),
(98, 4, 'TutorUT2', 'Inmaldbuw6', 1),
(99, 4, 'TutorTS1', 'tUTORTS183', 1),
(100, 4, 'TutorTS2', 'Tu1fhyy6', 1),
(101, 1, 'Stephania', '1234567890', 1),
(102, 3, 'ProfIT1', 'iMPROFIT1', 1),
(103, 5, 'Gael Rodriguez', 'Holasoyg12', 1);

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
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_concepto` (`id_concepto`);

--
-- Indices de la tabla `concepto`
--
ALTER TABLE `concepto`
  ADD PRIMARY KEY (`id_concepto`);

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
  ADD KEY `id_cobro` (`id_cobro`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_escuela` (`id_escuela`);

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
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cobro`
--
ALTER TABLE `cobro`
  MODIFY `id_cobro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `concepto`
--
ALTER TABLE `concepto`
  MODIFY `id_concepto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `grado_academico`
--
ALTER TABLE `grado_academico`
  MODIFY `id_grado_academico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `horario_materia`
--
ALTER TABLE `horario_materia`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  MODIFY `id_materia_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `parcial`
--
ALTER TABLE `parcial`
  MODIFY `id_parcial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tarea_alumno`
--
ALTER TABLE `tarea_alumno`
  MODIFY `id_tarea_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tarea_entregada`
--
ALTER TABLE `tarea_entregada`
  MODIFY `id_tarea_entregada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
-- Filtros para la tabla `tarea_alumno`
--
ALTER TABLE `tarea_alumno`
  ADD CONSTRAINT `tarea_alumno_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `tarea_alumno_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
