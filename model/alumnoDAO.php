  <?php
  class AlumnoDAO extends Model implements CRUD
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function insert($data)
    {
      $query = $this->db->conectar()->prepare('INSERT INTO alumno values (NULL,  
        :id_grupo, 
        :id_escuela, 
        :id_usuario,
        :foto_alumno,
        :nombre_alumno,
        :appaterno_alumno,
        :apmaterno_alumno,
        :calle_alumno,
        :noexterior_alumno,
        :nointerior_alumno,
        :cp_alumno,
        :estado_alumno,
        :municipio_alumno,
        :colonia_alumno,
        :telefono_alumno,
        :email_alumno,
        :fechanacimiento_alumno)');

      $query->execute([
        ':id_grupo' => $data['id_grupo'],
        ':id_escuela' => $data['id_escuela'],
        ':id_usuario' => $data['id_usuario'],
        ':foto_alumno' => $data['foto_alumno'],
        ':nombre_alumno' => $data['nombre_alumno'],
        ':appaterno_alumno' => $data['appaterno_alumno'],
        ':apmaterno_alumno' => $data['apmaterno_alumno'],
        ':calle_alumno' => $data['calle_alumno'],
        ':noexterior_alumno' => $data['noexterior_alumno'],
        ':nointerior_alumno' => $data['nointerior_alumno'],
        ':cp_alumno' => $data['cp_alumno'],
        ':estado_alumno' => $data['estado_alumno'],
        ':municipio_alumno' => $data['municipio_alumno'],
        ':colonia_alumno' => $data['colonia_alumno'],
        ':telefono_alumno' => $data['telefono_alumno'],
        ':email_alumno' => $data['email_alumno'],
        ':fechanacimiento_alumno' => $data['fechanacimiento_alumno']
      ]);
      echo 'ok';
    }


    public function update($data)
    {
      $query = $this->db->conectar()->prepare('UPDATE alumno SET
       id_grupo = :id_grupo,
       id_escuela = :id_escuela,
       id_usuario = :id_usuario,
       nombre_alumno = :nombre_alumno,
       foto_alumno = :foto_alumno,
       appaterno_alumno = :appaterno_alumno,
       apmaterno_alumno = :apmaterno_alumno,
       calle_alumno = :calle_alumno,
       noexterior_alumno = :noexterior_alumno,
       nointerior_alumno = :nointerior_alumno,
       cp_alumno = :cp_alumno,
       estado_alumno = :estado_alumno,
       municipio_alumno = :municipio_alumno,
       colonia_alumno = :colonia_alumno,
       telefono_alumno = :telefono_alumno,
       email_alumno = :email_alumno,
       fechanacimiento_alumno = :fechanacimiento_alumno
       WHERE id_alumno = :id_alumno');
      $query->execute([
        ':id_alumno' => $data['id_alumno'],
        ':id_grupo' => $data['id_grupo'],
        ':id_escuela' => $data['id_escuela'],
        ':id_usuario' => $data['id_usuario'],
        ':nombre_alumno' => $data['nombre_alumno'],
        ':foto_alumno' => $data['foto_alumno'],
        ':appaterno_alumno' => $data['appaterno_alumno'],
        ':apmaterno_alumno' => $data['apmaterno_alumno'],
        ':calle_alumno' => $data['calle_alumno'],
        ':noexterior_alumno' => $data['noexterior_alumno'],
        ':nointerior_alumno' => $data['nointerior_alumno'],
        ':cp_alumno' => $data['cp_alumno'],
        ':estado_alumno' => $data['estado_alumno'],
        ':municipio_alumno' => $data['municipio_alumno'],
        ':colonia_alumno' => $data['colonia_alumno'],
        ':telefono_alumno' => $data['telefono_alumno'],
        ':email_alumno' => $data['email_alumno'],
        ':fechanacimiento_alumno' => $data['fechanacimiento_alumno']
      ]);
      echo 'ok';
    }

    public function delete($id)
    {
      $query = $this->db->conectar()->prepare('DELETE FROM alumno where id_alumno = :id_alumno');
      $query->execute([':id_alumno' => $id]);
      echo 'ok';
    }

    public function read()
    {
      $id_escuela = $_SESSION['id_escuela'];
      require_once 'alumnoDTO.php';
      $query = "SELECT alumno.*, usuario.* from alumno alumno, escuela escuela, usuario usuario, director director WHERE usuario.id_usuario = alumno.id_usuario and alumno.id_escuela = escuela.id_escuela and director.id_escuela = escuela.id_escuela and director.id_escuela and alumno.id_escuela and director.id_escuela = '" . $id_escuela . "'";
      $objAlumnos = array();
      if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
          $alumno = new AlumnoDTO();
          $alumno->id_alumno = $value['id_alumno'];
          $alumno->id_grupo = $value['id_grupo'];
          $alumno->id_escuela = $value['id_escuela'];
          $alumno->id_usuario = $value['id_usuario'];
          $alumno->foto_alumno = $value['foto_alumno'];
          $alumno->nombre_alumno = $value['nombre_alumno'];
          $alumno->appaterno_alumno = $value['appaterno_alumno'];
          $alumno->apmaterno_alumno = $value['apmaterno_alumno'];
          $alumno->calle_alumno = $value['calle_alumno'];
          $alumno->noexterior_alumno = $value['noexterior_alumno'];
          $alumno->nointerior_alumno = $value['nointerior_alumno'];
          $alumno->cp_alumno  = $value['cp_alumno'];
          $alumno->estado_alumno  = $value['estado_alumno'];
          $alumno->municipio_alumno  = $value['municipio_alumno'];
          $alumno->colonia_alumno  = $value['colonia_alumno'];
          $alumno->telefono_alumno = $value['telefono_alumno'];
          $alumno->email_alumno = $value['email_alumno'];
          $alumno->id_tipo_usuario = $value['id_tipo_usuario'];
          $alumno->fechanacimiento_alumno = $value['fechanacimiento_alumno'];
          $alumno->username_usuario = $value['username_usuario'];
          $alumno->password_usuario = $value['password_usuario'];
          array_push($objAlumnos, $alumno);
        }
      } else {
        $objAlumnos = null;
      }

      return $objAlumnos;
    }

    //*********************************** ALUMNO DETALLE PROFESOR **************************************************

    public function readAlumnoProfesor()
    {
      $id_profesor = $_SESSION['id'];
      require_once 'alumnoDTO.php';
      $query = "SELECT alumno.*, escuela.*, profesor.*, grupo.* 
                FROM alumno alumno, escuela escuela, profesor profesor, grupo grupo 
                WHERE alumno.id_escuela = escuela.id_escuela 
                and profesor.id_escuela = escuela.id_escuela 
                and profesor.id_escuela = alumno.id_escuela 
                and grupo.id_grupo = alumno.id_grupo 
                AND profesor.id_profesor = '" . $id_profesor . "'";
      $objAlumnos = array();
      if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
          $alumno = new AlumnoDTO();
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
