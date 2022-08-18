  <?php
  session_start();
  class AdministradorDAO extends Model implements CRUD
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function insert($data)
    {
      $query = $this->db->conectar()->prepare('INSERT INTO administrador values (NULL,  
        :id_usuario,
        :foto_administrador,
        :nombre_administrador,
        :appaterno_administrador,
        :apmaterno_administrador,
        :telefono_administrador,
        :email_administrador,
        :fechanacimiento_administrador)');

      $query->execute([
        ':id_usuario' => $data['id_usuario'],
        ':foto_administrador' => $data['foto_administrador'],
        ':nombre_administrador' => $data['nombre_administrador'],
        ':appaterno_administrador' => $data['appaterno_administrador'],
        ':apmaterno_administrador' => $data['apmaterno_administrador'],
        ':telefono_administrador' => $data['telefono_administrador'],
        ':email_administrador' => $data['email_administrador'],
        ':fechanacimiento_administrador' => $data['fechanacimiento_administrador']
      ]);
      echo 'ok';
    }


    public function update($data)
    {

      $imagen = '';

      $arrayActualizar = [];

      if (isset($data['foto_administrador'])) {

        $imagen = 'foto_administrador = :foto_administrador,';

        $arrayActualizar = [
          ':id_administrador' => $data['id_administrador'],
          ':id_usuario' => $data['id_usuario'],
          ':nombre_administrador' => $data['nombre_administrador'],
          ':foto_administrador' => $data['foto_administrador'],
          ':appaterno_administrador' => $data['appaterno_administrador'],
          ':apmaterno_administrador' => $data['apmaterno_administrador'],
          ':telefono_administrador' => $data['telefono_administrador'],
          ':email_administrador' => $data['email_administrador'],
          ':fechanacimiento_administrador' => $data['fechanacimiento_administrador']
        ];
      } else {
        $arrayActualizar = [
          ':id_administrador' => $data['id_administrador'],
          ':id_usuario' => $data['id_usuario'],
          ':nombre_administrador' => $data['nombre_administrador'],
          ':appaterno_administrador' => $data['appaterno_administrador'],
          ':apmaterno_administrador' => $data['apmaterno_administrador'],
          ':telefono_administrador' => $data['telefono_administrador'],
          ':email_administrador' => $data['email_administrador'],
          ':fechanacimiento_administrador' => $data['fechanacimiento_administrador']
        ];
      }

      

      $query = $this->db->conectar()->prepare('UPDATE administrador SET
       id_usuario = :id_usuario,
       nombre_administrador = :nombre_administrador,
       ' . $imagen . '
       appaterno_administrador = :appaterno_administrador,
       apmaterno_administrador = :apmaterno_administrador,
       telefono_administrador = :telefono_administrador,
       email_administrador = :email_administrador,
       fechanacimiento_administrador = :fechanacimiento_administrador
       WHERE id_administrador = :id_administrador');

      $query->execute($arrayActualizar);
      echo 'ok';
    }

    public function delete($id)
    {
      $query = $this->db->conectar()->prepare('DELETE FROM administrador where id_administrador = :id_administrador');
      $query->execute([':id_administrador' => $id]);
      echo 'ok';
    }

    public function read()
    {
      require_once 'administradorDTO.php';
      $query = "SELECT * FROM administrador
      INNER JOIN usuario on administrador.id_usuario=usuario.id_usuario";
      $objAdministradors = array();

      if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
        foreach ($this->db->consultar($query) as $key => $value) {
          $administrador = new AdministradorDTO();
          $administrador->id_administrador = $value['id_administrador'];
          $administrador->id_usuario = $value['id_usuario'];
          $administrador->foto_administrador = $value['foto_administrador'];
          $administrador->nombre_administrador = $value['nombre_administrador'];
          $administrador->appaterno_administrador = $value['appaterno_administrador'];
          $administrador->apmaterno_administrador = $value['apmaterno_administrador'];
          $administrador->telefono_administrador = $value['telefono_administrador'];
          $administrador->email_administrador = $value['email_administrador'];
          $administrador->fechanacimiento_administrador = $value['fechanacimiento_administrador'];
          $administrador->id_tipo_usuario = $value['id_tipo_usuario'];
          $administrador->username_usuario = $value['username_usuario'];
          $administrador->password_usuario = $value['password_usuario'];
          array_push($objAdministradors, $administrador);
        }
      } else {
        $objAdministradors = null;
      }

      return $objAdministradors;
    }
  }
  ?>
