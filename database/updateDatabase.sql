TRUNCATE table grupo_profesor;
TRUNCATE table incidencias;
TRUNCATE table materia_profesor;
TRUNCATE table materia_grupo;
TRUNCATE table pago;
TRUNCATE table tarea_entregada;
TRUNCATE table tutor;

DELETE FROM alumno;
DELETE FROM escuela; 
DELETE FROM grado_academico; 
DELETE FROM grupo;
DELETE FROM horario_materia;
DELETE FROM materia;
DELETE FROM profesor;
DELETE FROM tarea_alumno;
DELETE FROM usuario;
DELETE FROM administrador;
DELETE FROM calificacion;
DELETE FROM cobro;
DELETE FROM director;


ALTER TABLE escuela ADD foto_escuela VARCHAR(50) AFTER nombre_escuela;