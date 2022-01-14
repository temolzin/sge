-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2021 a las 00:09:52
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

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
(2, 51, 'cristian.jpg', 'Cristian', 'Garcia', 'Espinoza', '(555) 497-4848', 'cris@gmail.com', '1999-10-13'),
(3, 52, 'jesus.jpg', 'Jesus', 'Federico', 'Villeda', '(555) 497-4848', 'jesus@gmail.com', '2000-12-20');

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
(1, 2, 9, 25, 'hombre1.jpeg', 'Sergio', 'Parra', 'López', 'Callle Moreno Mijares', 's/n', '78', 55607, 'México', 'Zumpango', 'Paseos del Lago', '(558) 256-9374', 'sergio@gmail.com', '2021-06-29'),
(2, 5, 11, 26, 'user-3.png', 'Elli', 'Martínez', 'Silva', 'Lagunas pien', 's/n', '767', 55607, 'México', 'Zumpango', 'Paseos del Lago', '(555) 555-5555', 'mayra@gmail.com', '2021-07-04'),
(17, 2, 9, 40, 'user-h.jpeg', 'Angel', 'Hernandez', 'Hernandez', 'Ferrocarril', 's/n', 'Lt4', 43806, 'Hidalgo', 'Tizayuca', 'Geo Villas', '(562) 173-8735', 'angelsas@gmail.com', '2021-08-11'),
(18, 2, 9, 49, 'mujer1.jpeg', 'Arely', 'Jimenez', 'Martinez', 'nose ', '4', '45', 55748, 'México', 'Tecámac', 'San José', '(555) 555-6565', 'arely@gmail.com', '2001-05-11');

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

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id_calificacion`, `id_profesor`, `id_alumno`, `id_parcial`, `id_materia`, `calificacion`, `observacion_calificacion`, `fecha_calificacion`) VALUES
(3, 7, 2, 3, 14, 10, 'Ninguna', '2021-08-10'),
(8, 7, 1, 3, 2, 9, 'Buena :D', '2021-08-18'),
(9, 7, 1, 6, 15, 8, 'Pasaste perro', '2021-08-08'),
(10, 7, 1, 8, 15, 5, 'Te mamaste perro', '2021-08-19');

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
(2, 1, 4045, 11, 'Inscripción', '2021-09-10', 1, '2021-08-05'),
(3, 2, 58, 5, 'Constancia de estudios', '2021-08-06', 1, '2021-08-05'),
(6, 16, 15, 2, 'Constancia de estudios', '2021-08-19', 1, '2021-08-16');

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
(5, 9, 2, 30, 'h-user3.jpeg', 'Marioo', 'Jiménez', 'Silva', 'LSGY5465G15', 'LSHJFN65215231', 'Ferrocarril', 's/n', '478', '55607', 'México', 'Zumpango', 'Primero de Mayo', '5541258963', 'luis@gmail.com', 'LSFYDHJSF45', '2021-07-30'),
(6, 14, 2, 39, 'user6.jpg', 'Julian', 'Jiménez', 'Hernandez', 'sdssdjaja12', 'asas1213', 'Ferrocarril', 's/n', '3', '55607', 'México', 'Zumpango', 'Paseos del Lago', '5541258963', 'luis@gmail.com', 'ewae232', '2021-08-11'),
(13, 8, 2, 48, 'h-user1.jpeg', 'Gerardo', 'Rellez', 'Rosas', 'rrrr', 'rrr', 'No se ', '4', '6', '42184', 'Hidalgo', 'Mineral de la Reforma', 'Valle del Álamo', '55544', 'gerard@gamil.com', '555', '2005-10-12'),
(14, 17, 1, 61, 'user-2H.jpeg', 'Lizbeth', 'Rosas', 'Rosas ', '323', '12312', 'sdsd', '8', '7', '42181', 'Hidalgo', 'Mineral de la Reforma', 'San Guillermo la Reforma', '455454', 'liz@gmail.com', '555', '2021-08-03'),
(15, 18, 1, 62, 'user-h.jpeg', 'Alejandro', 'Hernandez', 'Hernandez', 'sdssdjaja12', 'asdasdsa', 'Ferrocarril', 's/n', '3', '43806', 'Hidalgo', 'Tizayuca', 'Geo Villas', '5621738735', 'angelsas@gmail.com', 'ewae232', '2021-08-17');

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
(8, 'Felipe Villanueva', 'GG656', '545', '1ra Cerrada de Jalisco', '7', '3', 43806, 'Hidalgo', 'Tizayuca', 'Geo Villas', '5548799', 'felipe@gmail.com', 'Es una buena escuela'),
(9, 'Miguel Hidalgo', '5454', '8787', 'Morelos', '7', '7', 55748, 'México', 'Tecámac', 'San Martín Azcatepec', '5565943615', 'miguel@gmail.com', 'Esta bonita'),
(11, 'ESTIC 21', 'HGY878', '548', 'Av lazaro cardenas ', '8', '7', 55747, 'México', 'Tecámac', 'San Isidro Citlalcóatl', '5565943615', 'estic22@gmail.com', 'Es una bonita Secundaria '),
(14, 'UAEH', '444', '8787', 'SS', 'SS', '5', 42184, 'Hidalgo', 'Mineral de la Reforma', 'Campestre Villas del Álamo', '65645', 'uaeh@gmail.com', 'esta rebonita'),
(17, 'CECYTEM ECATEPEC', '4444', '6566', 'sdsd', '8', '7', 42184, 'Hidalgo', 'Mineral de la Reforma', 'Valle del Álamo', '545454545', 'cecy@gmail.com', 'ESTA BONITA'),
(18, 'Primaria Velazco', 'PrimariaVelaz', '6552515625', 'Ferrocarril', '7', '15', 43806, 'Hidalgo', 'Tizayuca', 'Geo Villas', '5621738735', 'PrimariaVelazco@gmail.com', 'Escuela primaria');

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
(1, 'Ingeniería', 'Computación '),
(2, 'Licenciatura', 'Derecho');

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
(1, 8, '1A', 'Vespertino'),
(2, 9, '2B', 'Vespertino'),
(5, 11, '3B', 'Matutino'),
(6, 11, '4A', 'Matutino'),
(8, 8, '1A', 'Matutino'),
(9, 8, '1A', 'Vespertino'),
(10, 8, '4B', 'Matutino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_profesor`
--

CREATE TABLE `grupo_profesor` (
  `id_grupo` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo_profesor`
--

INSERT INTO `grupo_profesor` (`id_grupo`, `id_profesor`) VALUES
(1, 1),
(1, 1),
(1, 1),
(1, 1);

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
(1, '2021-07-08', '13:00:00', '14:00:00'),
(2, '2021-06-25', '07:00:00', '08:00:00'),
(3, '2021-08-07', '13:55:00', '08:50:00');

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
(3, 1, 7, 2, '2021-08-02', '07:40:11', 'Entro tarde a la escuela, por 40 minutos. '),
(4, 2, 7, 2, '2021-08-09', '07:08:00', 'Entrada tarde');

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
(1, 9, 2, 'Español'),
(2, 11, 1, 'Historia'),
(14, 11, 1, 'Ciencias'),
(15, 8, 1, 'Música'),
(16, 8, 1, 'Física'),
(17, 11, 1, 'Derecho'),
(19, 9, 1, 'Ciencias Naturales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_grupo`
--

CREATE TABLE `materia_grupo` (
  `id_grupo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia_grupo`
--

INSERT INTO `materia_grupo` (`id_grupo`, `id_materia`) VALUES
(1, 1),
(3, 1),
(2, 2),
(4, 2);

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
(3, 7, 2, 2),
(7, 7, 5, 14),
(9, 7, 5, 17),
(11, 7, 2, 1),
(12, 12, 2, 19);

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
(13, 3, 15, 'Mantenimiento', '2021-08-16', '23:00:09', 58, 43);

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

--
-- Volcado de datos para la tabla `parcial`
--

INSERT INTO `parcial` (`id_parcial`, `id_escuela`, `nombre_parcial`, `fechainicio_parcial`, `fechafin_parcial`) VALUES
(3, 9, '1 Bimestre', '2021-01-06', '2021-03-11'),
(6, 8, '2 Bimestre', '2021-07-02', '2021-08-07'),
(8, 11, '3 Bimestre', '2021-06-30', '2021-07-30');

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
(7, 2, 9, 31, 'user-2H.jpeg', 'Fernando', 'Méndez', 'Gutiérrez', 'MAYU2489652', 'Lagunas', 's/n', '48', 55604, 'México', 'Zumpango', 'Hombres Ilustres', '5541258963', 'karika@outlook.es', '2021-08-04'),
(12, 1, 9, 56, 'mujer2.jpeg', 'Rocio', 'Hernandez', 'Juarez', 'ssss', 'sdsd', '8', '8', 42184, 'Hidalgo', 'Mineral de la Reforma', 'Valle del Álamo', '45645454', 'rocio@gmail.com', '2002-06-03');

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
(1, 5, 2, 'La independencia', 'Hacer una investigación sobre la independencia ', '', '2021-06-30'),
(2, 2, 1, 'Verbos', 'Una tarea de verbos', 'Pa la liz.pdf', '2021-06-30'),
(3, 5, 14, '2da Guerra Mundial ', 'Porque empezo la Guerra ', 'No hay', '2021-06-09');

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

--
-- Volcado de datos para la tabla `tarea_entregada`
--

INSERT INTO `tarea_entregada` (`id_tarea_entregada`, `id_tarea_alumno`, `archivo_tarea_entregada`, `comentarios_tarea`, `calificacion_tarea`) VALUES
(28, 2, 'trabajo2', 'No me gusto la tarea profe', 0),
(30, 2, 'user6.jpg', 'se me fue el internet', 10);

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
(2, 'Director'),
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
(1060, 17, 9, 5, 'user-4.png', 'Minerva', 'López', 'Silva', '2021-08-07', '5586964532', 'minerva@gmail.com', 'Lagunas', 's/n', '82', 55604, 'México', 'Zumpango', 'Hombres Ilustres'),
(1071, 1, 9, 50, 'WhatsApp Image 2021-01-05 at 8.45.38 PM.jpeg', 'Cristina', 'Lopez', 'Morales', '2002-06-27', '5555454', 'cris@gmail.com', 'no se ', '7', '9', 55748, 'México', 'Tecámac', 'San Martín Azcatepec');

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
(5, 4, 'MinervaLop', 'asdfghjk', 1),
(25, 5, 'Sergio', 'sergiodhujkl', 1),
(26, 5, 'Mayra', 'sdfghjkl', 1),
(30, 2, 'Luiss', 'ssnfjk651', 1),
(31, 3, 'Karika', 'dfghjk', 1),
(39, 2, 'Julian', 'asassde434', 1),
(40, 5, 'Angel', 'Angelasas', 1),
(45, 2, 'rodrigo', '12345678', 2),
(46, 2, 'clau', '12345678', 1),
(47, 2, 'liz', '12345678', 1),
(48, 2, 'gerard', '123456789', 1),
(49, 5, 'Arely', '12345678', 1),
(50, 4, 'cristina', '12345678', 1),
(51, 1, 'AdminCris', '12345678', 1),
(52, 1, 'AdminJesus', '12345678', 1),
(56, 3, 'ProfMiguelHidalgo2', '12345678', 1),
(57, 3, 'ProfConalep2', '12345678', 1),
(58, 4, 'TutorMiguelHdg', '12345678', 1),
(61, 2, 'LizDirectivo', '12345678', 1),
(62, 2, 'Alejandro', 'Alejandro', 1);

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
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cobro`
--
ALTER TABLE `cobro`
  MODIFY `id_cobro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `grado_academico`
--
ALTER TABLE `grado_academico`
  MODIFY `id_grado_academico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `horario_materia`
--
ALTER TABLE `horario_materia`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  MODIFY `id_materia_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `parcial`
--
ALTER TABLE `parcial`
  MODIFY `id_parcial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tarea_alumno`
--
ALTER TABLE `tarea_alumno`
  MODIFY `id_tarea_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tarea_entregada`
--
ALTER TABLE `tarea_entregada`
  MODIFY `id_tarea_entregada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1074;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
