<?php
session_start();
class TareaAlumnoDAO extends Model implements CRUD {
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare
        ('INSERT INTO tarea_entregada values (NULL, 
            :id_tarea_alumno, 
            :archivo_tarea_entregada, 
            :comentarios_tarea,
            :calificacion_tarea)');
        $query->execute([':id_tarea_alumno' => $data['id_tarea_alumnoDetalle'],
            ':archivo_tarea_entregada' => $data['archivo_tarea_entregada'],
            ':comentarios_tarea' => $data['comentarios_tarea'],
            ':calificacion_tarea' => $data['calificacion_tarea']]);
        echo 'ok';
    }

    public function update($data)
    {
     
    }

    public function delete($id)
    {
     
    }

    public function read()
    {
        $id_grupo = $_SESSION['id_grupo'];
        require_once 'tareaalumnoDTO.php';
        $query = "SELECT t.id_tarea_alumno,g.nombre_grupo,m.nombre_materia,t.nombre_tarea,t.descripcion_tarea,t.archivo_tarea,t.fecha_entrega FROM grupo g, materia m, tarea_alumno t WHERE t.id_grupo = g.id_grupo AND m.id_materia = t.id_materia and t.id_grupo  =  '".$id_grupo."'";
        $objTareaAlumno = array();

        if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {

            foreach ($this->db->consultar($query) as $key => $value) {
                $tareaalumno= new TareaAlumnoDTO();
                $tareaalumno->id_tarea_alumno = $value['id_tarea_alumno'];
                $tareaalumno->id_grupo = $value['nombre_grupo'];
                $tareaalumno->id_materia = $value['nombre_materia'];
                $tareaalumno->nombre_tarea = $value['nombre_tarea'];
                $tareaalumno->descripcion_tarea = $value['descripcion_tarea'];
                $tareaalumno->archivo_tarea = $value['archivo_tarea'];
                $tareaalumno->fecha_entrega = $value['fecha_entrega'];
                
                array_push($objTareaAlumno, $tareaalumno);
            }
        } else {
            $objTareaAlumno = null;
        }

        return $objTareaAlumno;
    }
}
?>