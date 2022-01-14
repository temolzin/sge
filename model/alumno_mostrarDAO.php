<?php
session_start();
class Alumno_mostrarDAO extends Model implements CRUD {
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
        $query = $this->db->conectar()->prepare('UPDATE tarea_alumno SET nombre_tareaalumno = :nombre_tareaalumno,rfc_tareaalumno = :rfc_tareaalumno,cct_tareaalumno = :cct_tareaalumno,calle_tareaalumno = :calle_tareaalumno,numxterior_tareaalumno = :numxterior_tareaalumno,numinterior_tareaalumno= :numinterior_tareaalumno,cp_tareaalumno = :cp_tareaalumno,estado_tareaalumno = :estado_tareaalumno,municipio_tareaalumno = :municipio_tareaalumno, colonia_tareaalumno = :colonia_tareaalumno, telefono_tareaalumno = :telefono_tareaalumno,email_tareaalumno = :email_tareaalumno,observacion_tareaalumno = :observacion_tareaalumno WHERE id_tareaalumno = :id_tareaalumno');

        $query->execute([':id_tareaalumno' => $data['id_tareaalumno'],
           ':nombre_tareaalumno' => $data['nombre_tareaalumno'],
           ':rfc_tareaalumno' => $data['rfc_tareaalumno'],
           ':cct_tareaalumno' => $data['cct_tareaalumno'],
           ':calle_tareaalumno' => $data['calle_tareaalumno'],
           ':numxterior_tareaalumno' => $data['numxterior_tareaalumno'],
           ':numinterior_tareaalumno' => $data['numinterior_tareaalumno'],
           ':cp_tareaalumno' => $data['cp_tareaalumno'],
           ':estado_tareaalumno' => $data['estado_tareaalumno'],
           ':municipio_tareaalumno' => $data['municipio_tareaalumno'],
           ':colonia_tareaalumno' => $data['colonia_tareaalumno'],
           ':numinterior_tareaalumno' => $data['numinterior_tareaalumno'],
           ':telefono_tareaalumno' => $data['telefono_tareaalumno'],
           ':email_tareaalumno' => $data['email_tareaalumno'],
           ':observacion_tareaalumno' => $data['observacion_tareaalumno']]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM tareaalumno where id_tareaalumno = :id_tareaalumno');
        $query->execute([':id_tareaalumno' => $id]);
        echo 'ok';
    }

    public function read()
  {
            require_once 'alumno_motrarDTO.php';
            $query = "SELECT * FROM  tarea_alumno  WHERE id_grupo =  '".$id_grupo."' ";
            $objTareaAlumno = array();
            foreach ($this->db->consultar($query) as $key => $value) {
                $tareaalumno= new Alumno_mostrarDTO();
                $tareaalumno->id_tarea_alumno = $value['id_tarea_alumno'];
                $tareaalumno->id_grupo = $value['nombre_grupo'];
                $tareaalumno->id_materia = $value['nombre_materia'];
                $tareaalumno->nombre_tarea = $value['nombre_tarea'];
                $tareaalumno->descripcion_tarea = $value['descripcion_tarea'];
                $tareaalumno->archivo_tarea = $value['archivo_tarea'];
                $tareaalumno->fecha_entrega = $value['fecha_entrega'];
               
                
               
                $objTareaAlumno['data'][] = $tareaalumno;
            }
            echo json_encode($objTareaAlumno, JSON_UNESCAPED_UNICODE);
        }
}
?>
 