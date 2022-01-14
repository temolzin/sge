  <?php
  session_start();
  class Profesor_alumno_consultaDAO extends Model implements CRUD {
    public function __construct()
    {
      parent::__construct();
    }

    public function insert($data)
    {
     
    }


    public function update($data)
    {
     
    }

    public function delete($id)
    {
     
    }

    public function read()
    {
      // $id_escuela = $_SESSION['id_escuela'];
      $id_profesor = $_SESSION['id'];
      require_once 'profesor_alumno_consultaDTO.php';
      $query = "SELECT alumno.*, escuela.*, profesor.*, grupo.* FROM alumno alumno, escuela escuela, profesor profesor, grupo grupo WHERE alumno.id_escuela = escuela.id_escuela and profesor.id_escuela = escuela.id_escuela and profesor.id_escuela = alumno.id_escuela and grupo.id_grupo = alumno.id_grupo  AND profesor.id_profesor = '".$id_profesor."'";
      $objAlumnos = array();
      if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
          $alumno = new Profesor_alumno_consultaDTO();
          $alumno->id_alumno = $value['id_alumno'];
          $alumno->id_grupo = $value['id_grupo'];
          $alumno->id_escuela = $value['id_escuela'];
          $alumno->id_usuario = $value['id_usuario'];
          $alumno->nombre_alumno = $value['nombre_alumno'];
          $alumno->foto_alumno = $value['foto_alumno'];
          $alumno->appaterno_alumno = $value['appaterno_alumno'];
          $alumno->apmaterno_alumno = $value['apmaterno_alumno'];
          $alumno->telefono_alumno = $value['telefono_alumno'];  
          $alumno->email_alumno = $value['email_alumno'];
          array_push($objAlumnos, $alumno);
        }
      } else {
        $objAlumnos = null;
      }

      return $objAlumnos;
    }


  }
  ?>
