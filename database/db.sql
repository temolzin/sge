-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2021 a las 00:36:56
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
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `foto_alumno` varchar(250) NOT NULL,
  `nombre_alumno` varchar(50) NOT NULL,
  `appaterno_alumno` varchar(50) NOT NULL,
  `apmaterno_alumno` varchar(50) NOT NULL,
  `calle_alumno` varchar(50) NOT NULL,
  `noexterior_alumno` varchar(50) NOT NULL,
  `nointerior_alumno` varchar(50) NOT NULL,
  `cp_alumno` int(5) NOT NULL,
  `estado_alumno` varchar(50) NOT NULL,
  `municipio_alumno` varchar(50) NOT NULL,
  `colonia_alumno` varchar(50) NOT NULL,
  `telefono_alumno` varchar(13) NOT NULL,
  `email_alumno` varchar(50) NOT NULL,
  `fechanacimiento_alumno` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `id_grupo`, `id_escuela`, `id_usuario`, `foto_alumno`, `nombre_alumno`, `appaterno_alumno`, `apmaterno_alumno`, `calle_alumno`, `noexterior_alumno`, `nointerior_alumno`, `cp_alumno`, `estado_alumno`, `municipio_alumno`, `colonia_alumno`, `telefono_alumno`, `email_alumno`, `fechanacimiento_alumno`) VALUES

(80, 1, 1, 147, '', 'Camila', 'Jimenez', 'Hernandez', '16 de septiembre', 'Mz 13', 'Lt 4', 43806, 'Hidalgo', 'Tizayuca', 'Geo Villas', '5568650235', 'cjimenezh@gmail.com', '2021-06-25');

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
  `calificacion` int(11) NOT NULL,
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
  `fecha_cobro` date NOT NULL,
  `fechalimite_cobro` date NOT NULL,
  `activo_cobro` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `numexterior_director` varchar(10) NOT NULL,
  `numinterior_director` varchar(10) NOT NULL,
  `cp_director` varchar(50) NOT NULL,
  `estado_director` varchar(50) NOT NULL,
  `municipio_director` varchar(50) NOT NULL,
  `colonia_director` varchar(50) NOT NULL,
  `telefono_director` varchar(13) NOT NULL,
  `email_director` varchar(50) NOT NULL,
  `cedulaprofesional_director` varchar(8) NOT NULL,
  `fechanacimiento_director` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `numxterior_escuela` varchar(10) NOT NULL,
  `numinterior_escuela` varchar(10) NOT NULL,
  `cp_escuela` varchar(50) NOT NULL,
  `estado_escuela` varchar(50) NOT NULL,
  `municipio_escuela` varchar(50) NOT NULL,
  `colonia_escuela` varchar(50) NOT NULL,
  `telefono_escuela` varchar(13) NOT NULL,
  `email_escuela` varchar(50) NOT NULL,
  `observacion_escuela` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id_escuela`, `nombre_escuela`, `rfc_escuela`, `cct_escuela`, `calle_escuela`, `numxterior_escuela`, `numinterior_escuela`, `cp_escuela`, `estado_escuela`, `municipio_escuela`, `colonia_escuela`, `telefono_escuela`, `email_escuela`, `observacion_escuela`) VALUES
(1, 'CECYTE', 'CECYTE01', 'pendiente', 'Av princiapl', '50', '55', '', '', '', '', '55446259', 'cecyte@gmail.com', 'Ninguno');

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
(1, 'Ingeniero', 'nada');

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
(1, 1, 'Primero A', 'Mat'),
(2, 1, 'Segundo A', 'Mat'),
(3, 1, 'Tercero B', 'Mat'),
(4, 1, 'Quinto B', 'Mat'),
(5, 1, 'Sexto B', 'Mat'),
(6, 1, 'Sexto A', 'Mat');

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
(1, 4),
(4, 2),
(1, 4),
(4, 2);

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
(1, NULL, '06:26:18', '09:26:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `fechaincidencia_incidencia` date NOT NULL,
  `horaincidencia_incidencia` time NOT NULL,
  `descripcion_incidencia` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 1, 1, 'Matematicas'),
(3, 1, 1, 'Ingles'),
(4, 1, 1, 'Historia'),
(5, 1, 1, 'Geografia'),
(6, 1, 1, 'Ciencias');

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
(2, 2, 1, 3),
(3, 6, 2, 5),
(8, 5, 1, 5),
(23, 5, 4, 6),
(24, 8, 6, 3),
(25, 7, 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `id_cobro` int(11) NOT NULL,
  `cantidad_pago` int(11) NOT NULL,
  `descripcion_pago` varchar(50) NOT NULL,
  `fecha_pago` date NOT NULL,
  `hora_pago` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial`
--

CREATE TABLE `parcial` (
  `id_parcial` int(11) NOT NULL,
  `id_escuela` int(11) NOT NULL,
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
  `cedula_profesor` varchar(8) NOT NULL,
  `calle_profesor` varchar(50) NOT NULL,
  `numexterior_profesor` varchar(10) NOT NULL,
  `numinterior_profesor` varchar(10) NOT NULL,
  `cp_profesor` varchar(5) NOT NULL,
  `estado_profesor` varchar(50) NOT NULL,
  `municipio_profesor` varchar(50) NOT NULL,
  `colonia_profesor` varchar(50) NOT NULL,
  `telefono_profesor` varchar(13) NOT NULL,
  `email_profesor` varchar(50) NOT NULL,
  `fechanacimiento_profesor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `id_grado_academico`, `id_escuela`, `id_usuario`, `foto_profesor`, `nombre_profesor`, `appaterno_profesor`, `apmaterno_profesor`, `cedula_profesor`, `calle_profesor`, `numexterior_profesor`, `numinterior_profesor`, `cp_profesor`, `estado_profesor`, `municipio_profesor`, `colonia_profesor`, `telefono_profesor`, `email_profesor`, `fechanacimiento_profesor`) VALUES
(2, 1, 1, 1, 'SA.png', 'Liz', 'Jimenez', 'San Juan', 'ghj56', 'y', '5', '5', '43806', 'Hidalgo', 'Tizayuca', 'Geo Villas', '5568650235', 'aliciasanjuan85@gmail.com', '2021-06-16'),
(4, 1, 1, 130, 'C2.jpeg', 'Mario', 'Hernandez', 'Hernandez', '552455MH', 'Av principal', '5', '5', '43806', 'Hidalgo', 'Tizayuca', 'Geo Villas', '(556) 865-023', 'mhernandezh5@gmail.com', '2001-01-17'),
(5, 1, 1, 130, 'C2.jpeg', 'Adrian', 'Xico', 'Noble', '121212AX', 'Av principal', '5', '5', '43806', 'Hidalgo', 'Tizayuca', 'Ampliación Lázaro Cárdenas', '(556) 865-023', 'axicon@gmail.com', '2001-01-01'),
(6, 1, 1, 130, 'C2.jpeg', 'Julio', 'Martinez', 'Hernandez', '552455JM', 'Av principal', '5', '5', '43806', 'Hidalgo', 'Tizayuca', 'Geo Villas', '(556) 865-023', 'jmartienezh85@gmail.com', '2021-06-23'),
(7, 1, 1, 130, 'SA.png', 'Pedro', 'Hernandez', 'Hernandez', '55485PHH', 'Av principal', '5', '5', '43806', 'Hidalgo', 'Tizayuca', 'Florencia', '(556) 865-023', 'phernandezh@gmail.com', '2021-06-23'),
(8, 1, 1, 130, 'SA.png', 'Ximena', 'Hernandez', 'San Juan', 'ghj56', 'Av principal', '5', '5', '43806', 'Hidalgo', 'Tizayuca', 'Geo Villas', '(556) 865-023', 'aliciasanjuan85@gmail.com', '2013-01-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id_tarea` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `descripcion_tarea` text NOT NULL,
  `archivos_tarea` varchar(300) NOT NULL
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
(1, 'alumno'),
(2, 'profesor'),
(3, 'tutor');

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
(1056, 3, 2, 181, '', 'Pablo', 'Back', 'Silva', '2021-07-10', '5586964574', 'pabloBack@gmail.com', 'Plata', 's/n', '50', 55607, 'México', 'Zumpango', 'Nuevo Paseos de San Juan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `username_usuario` varchar(50) NOT NULL,
  `password_usuario` varchar(100) NOT NULL,
  `activo_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipo_usuario`, `username_usuario`, `password_usuario`, `activo_usuario`) VALUES

(189, 3, 'Sebastian', 'Sebastian', 1),
(190, 3, 'mariana', 'mariana', 1),
(191, 3, 'gus', 'gus', 1),
(192, 3, 'Lety', 'Lety', 1),
(193, 3, 'Luz', 'Luz', 1),
(194, 3, 'Mari', 'Mari', 1),
(195, 3, 'Mariana', 'Mariana', 1),
(196, 3, 'Juancgo', 'Juancgo', 1),
(197, 3, 'zarel', 'zarel', 1),
(198, 3, 'Gael', 'Gael', 1),
(199, 3, 'Yael', 'Yael', 1),
(200, 3, 'Lola', 'Lola', 1),
(201, 3, 'Sergio', 'Sergio', 1),
(202, 3, 'Carmen', 'Carmen', 1),
(203, 3, 'Carmen', 'Carmen', 1),
(204, 3, 'Pedro', 'Pedro', 1),
(205, 3, 'Pedro', 'Pedro', 1),
(207, 3, 'Rous', 'Rous', 1),
(208, 3, 'Samara', 'Samara', 1),
(209, 3, 'Samy', 'Samy', 1),
(210, 3, 'Frann', 'Frann', 1),
(212, 3, 'Cesar', 'Cesar', 1),
(213, 3, 'Samira', 'Samira', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_escuela` (`id_escuela`),
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
  ADD KEY `id_profesor` (`id_profesor`);

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
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_profesor_ibfk` (`id_profesor`),
  ADD KEY `id_grupo_ibfk` (`id_grupo`);

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
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `id_grupoFK` (`id_grupo`),
  ADD KEY `id_materiaFK` (`id_materia`);

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
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cobro`
--
ALTER TABLE `cobro`
  MODIFY `id_cobro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grado_academico`
--
ALTER TABLE `grado_academico`
  MODIFY `id_grado_academico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  MODIFY `id_materia_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parcial`
--
ALTER TABLE `parcial`
  MODIFY `id_parcial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1057;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`),
  ADD CONSTRAINT `alumno_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`),
  ADD CONSTRAINT `calificacion_ibfk_3` FOREIGN KEY (`id_parcial`) REFERENCES `parcial` (`id_parcial`),
  ADD CONSTRAINT `calificacion_ibfk_4` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `cobro`
--
ALTER TABLE `cobro`
  ADD CONSTRAINT `cobro_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`);

--
-- Filtros para la tabla `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `director_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`),
  ADD CONSTRAINT `director_ibfk_2` FOREIGN KEY (`id_grado_academico`) REFERENCES `grado_academico` (`id_grado_academico`),
  ADD CONSTRAINT `director_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`);

--
-- Filtros para la tabla `grupo_profesor`
--
ALTER TABLE `grupo_profesor`
  ADD CONSTRAINT `grupo_profesor_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `grupo_profesor_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`),
  ADD CONSTRAINT `incidencias_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`),
  ADD CONSTRAINT `materia_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario_materia` (`id_horario`);

--
-- Filtros para la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  ADD CONSTRAINT `materia_grupo_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  ADD CONSTRAINT `id_grupo_ibfk` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `id_profesor_ibfk` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`),
  ADD CONSTRAINT `materia_profesor_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`id_cobro`) REFERENCES `cobro` (`id_cobro`);

--
-- Filtros para la tabla `parcial`
--
ALTER TABLE `parcial`
  ADD CONSTRAINT `parcial_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`);

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`),
  ADD CONSTRAINT `profesor_ibfk_2` FOREIGN KEY (`id_grado_academico`) REFERENCES `grado_academico` (`id_grado_academico`),
  ADD CONSTRAINT `profesor_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `id_grupoFK` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`),
  ADD CONSTRAINT `id_materiaFK` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
