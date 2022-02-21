  <?php
  session_start();
  class TareaDAO extends Model implements CRUD
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function insert($data)
    {
      $query = $this->db->conectar()->prepare('INSERT INTO tarea_alumno values (NULL, 
        :id_grupo,
        :id_materia,
        :nombre_tarea,
        :descripcion_tarea,
        :archivo_tarea,
        :fecha_entrega)');
      $query->execute([
        ':id_grupo' => $data['id_grupo'],
        ':id_materia' => $data['id_materia'],
        ':nombre_tarea' => $data['nombre_tarea'],
        ':descripcion_tarea' => $data['descripcion_tarea'],
        ':archivo_tarea' => $data['archivo_tarea'],
        ':fecha_entrega' => $data['fecha_entrega']
      ]);
      echo 'ok';
    }

    public function update($data)
    {
      $query = $this->db->conectar()->prepare('UPDATE tarea_alumno SET 
       id_grupo = :id_grupo, 
       id_materia = :id_materia,
       nombre_tarea = :nombre_tarea,  
       descripcion_tarea = :descripcion_tarea,
       archivo_tarea = :archivo_tarea,
       fecha_entrega = :fecha_entrega
       WHERE id_tarea_alumno = :id_tarea_alumno');
      $query->execute([
        ':id_tarea_alumno' => $data['id_tarea_alumno'],
        ':id_grupo' => $data['id_grupo'],
        ':id_materia' => $data['id_materia'],
        ':nombre_tarea' => $data['nombre_tarea'],
        ':descripcion_tarea' => $data['descripcion_tarea'],
        ':archivo_tarea' => $data['archivo_tarea'],
        ':fecha_entrega' => $data['fecha_entrega']
      ]);
      echo 'ok';
    }

    public function delete($id)
    {
      $query = $this->db->conectar()->prepare('DELETE FROM tarea_alumno where id_tarea_alumno = :id_tarea_alumno');
      $query->execute([':id_tarea_alumno' => $id]);
      echo 'ok';
    }

    public function read()
    {
      $id_profesor = $_SESSION['id'];
      require_once 'tareaDTO.php';
      $query = "SELECT tarea_alumno.*,  materia.*, grupo.*, profesor.*, escuela.*, materia_profesor.*
    FROM tarea_alumno  tarea_alumno,  materia materia, grupo grupo, profesor profesor, escuela escuela, materia_profesor materia_profesor where  escuela.id_escuela = materia.id_escuela 
    and tarea_alumno.id_materia=materia.id_materia
    and  tarea_alumno.id_grupo=grupo.id_grupo
    and materia.id_materia = materia_profesor.id_materia
    and 
    profesor.id_escuela = escuela.id_escuela and profesor.id_profesor =   '" . $id_profesor . "'";
      $objTareas = array();
      if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
          $tarea = new tareaDTO();
          $tarea->id_tarea_alumno = $value['id_tarea_alumno'];
          $tarea->id_grupo = $value['nombre_grupo'];
          $tarea->id_materia = $value['nombre_materia'];
          $tarea->nombre_tarea = $value['nombre_tarea'];
          $tarea->descripcion_tarea = $value['descripcion_tarea'];
          $tarea->archivo_tarea = $value['archivo_tarea'];
          $tarea->fecha_entrega = $value['fecha_entrega'];
          $tarea->nombre = $value['fecha_entrega'];
          //$objTareas['data'][] = $tarea;
          array_push($objTareas, $tarea);
        }
      } else {
        $objTareas = null;
      }

      return $objTareas;
    }

    //***************************************************************TAREA ENTREGADA************************************************

    public function insertTareaEntregada($data)
    {
      $query = $this->db->conectar()->prepare('INSERT INTO tarea_entregada values (NULL, 
          :id_tarea_alumno, 
          :archivo_tarea_entregada, 
          :comentarios_tarea,
          :calificacion_tarea)');
      $query->execute([
        ':id_tarea_alumno' => $data['id_tarea_alumno'],
        ':archivo_tarea_entregada' => $data['archivo_tarea_entregada'],
        ':comentarios_tarea' => $data['comentarios_tarea'],
        ':calificacion_tarea' => $data['calificacion_tarea']
      ]);
      echo 'ok';
    }

    public function updateTareaEntregada($data)
    {
      $query = $this->db->conectar()->prepare('UPDATE tarea_entregada SET  calificacion_tarea = :calificacion_tarea  WHERE id_tarea_entregada = :id_tarea_entregada');
      $query->execute([
        ':id_tarea_entregada' => $data['id_tarea_entregada'],
        ':calificacion_tarea' => $data['calificacion_tarea']
      ]);
      echo 'ok';
    }

    public function deleteTareaEntregada($id)
    {
      $query = $this->db->conectar()->prepare('DELETE FROM tarea_entregada where id_tarea_entregada = :id_tarea_entregada');
      $query->execute([':id_tarea_entregada' => $id]);
      echo 'ok';
    }

    public function readTareaEntregada()
    {
      $id_profesor = $_SESSION['id'];
      require_once 'tareaDTO.php';
      $query = "SELECT tarea_entregada.*, tarea_alumno.*, grupo.*, materia.*, materia_profesor.*, profesor.* FROM tarea_entregada tarea_entregada, tarea_alumno tarea_alumno, grupo grupo, materia materia, materia_profesor materia_profesor, profesor profesor where tarea_alumno.id_grupo = grupo.id_grupo AND tarea_alumno.id_materia = materia.id_materia AND tarea_entregada.id_tarea_alumno = tarea_alumno.id_tarea_alumno and profesor.id_profesor = materia_profesor.id_profesor and materia_profesor.id_grupo = tarea_alumno.id_grupo and grupo.id_grupo = materia_profesor.id_grupo and materia_profesor.id_materia = materia.id_materia and tarea_alumno.id_materia = materia_profesor.id_materia and profesor.id_profesor =  '" . $id_profesor . "'";


      $objrTareasEntregada = array();
      if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
          $tareaEntregada = new TareaDTO();
          $tareaEntregada->id_tarea_entregada = $value['id_tarea_entregada'];
          $tareaEntregada->id_tarea_alumno = $value['id_tarea_alumno'];
          $tareaEntregada->id_grupo = $value['id_grupo'];
          $tareaEntregada->id_materia = $value['id_materia'];
          $tareaEntregada->archivo_tarea_entregada = $value['archivo_tarea_entregada'];
          $tareaEntregada->comentarios_tarea = $value['comentarios_tarea'];
          $tareaEntregada->calificacion_tarea = $value['calificacion_tarea'];

          $tareaEntregada->nombre_grupo = $value['nombre_grupo'];
          $tareaEntregada->nombre_materia = $value['nombre_materia'];
          $tareaEntregada->nombre_tarea = $value['nombre_tarea'];

          array_push($objrTareasEntregada, $tareaEntregada);
        }
      } else {
        $objrTareasEntregada = null;
      }

      return $objrTareasEntregada;
    }
  }
  ?>
