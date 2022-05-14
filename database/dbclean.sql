-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2022 a las 07:30:54
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nuevabd`
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
(1, 1, '143952261_1117451125694923_191550161019300068_n.jpg', 'Temolzin', 'Roldan', 'Palacios', '5535092965', 'temolzin@hotmail.com', '1994-07-04');

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
(1, 1, 1, 2, 'WhatsApp Image 2022-05-13 at 10.34.04 PM.jpeg', 'Monserratt', 'Montaño', 'Redonda', '', '', 'Plaza Purificación', '9', 'S/N', '55804', 'México', 'Teotihuacan', 'Purificación', '5567732571', 'monserrattmr@hotmail.com', '', '1994-08-05');

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
(1, 'Kids Brains Teotihuacan', '', '', 'Plaza Purificacion', '9', 'S/N', 55804, 'Edo. Mex.', 'Teotihuacan', 'Purificacion', '5567732571', 'monserratmr@hotmail.com', '');

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
(1, 'Licenciatura', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 1, 'Temolzin', 'root#heim', 1),
(2, 2, 'Monserratt', 'monz_0805', 1);

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
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_director` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario_materia`
--
ALTER TABLE `horario_materia`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_grupo`
--
ALTER TABLE `materia_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_profesor`
--
ALTER TABLE `materia_profesor`
  MODIFY `id_materia_profesor` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarea_alumno`
--
ALTER TABLE `tarea_alumno`
  MODIFY `id_tarea_alumno` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
