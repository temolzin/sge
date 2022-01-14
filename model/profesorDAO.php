<?php
session_start();

class ProfesorDAO extends Model implements CRUD {
  public function __construct()
  {
    parent::__construct();
  }

  public function insert($data)
  {
    $query = $this->db->conectar()->prepare('INSERT INTO profesor values (NULL,  
      :id_grado_academico, 
      :id_escuela, 
      :id_usuario,
      :foto_profesor,
      :nombre_profesor,
      :appaterno_profesor,
      :apmaterno_profesor,
      :cedula_profesor,
      :calle_profesor,
      :numexterior_profesor,
      :numinterior_profesor,
      :cp_profesor,
      :estado_profesor,
      :municipio_profesor,
      :colonia_profesor,
      :telefono_profesor,
      :email_profesor,
      :fechanacimiento_profesor)');

    $query->execute([
      ':id_grado_academico' => $data['id_grado_academico'],
      ':id_escuela' => $data['id_escuela'],
      ':id_usuario' => $data['id_usuario'],
      ':foto_profesor' => $data['foto_profesor'],
      ':nombre_profesor' => $data['nombre_profesor'],
      ':appaterno_profesor' => $data['appaterno_profesor'],
      ':apmaterno_profesor' => $data['apmaterno_profesor'],
      ':cedula_profesor' => $data['cedula_profesor'],
      ':calle_profesor' => $data['calle_profesor'],
      ':numexterior_profesor' => $data['numexterior_profesor'],
      ':numinterior_profesor' => $data['numinterior_profesor'],
      ':cp_profesor' => $data['cp_profesor'],
      ':estado_profesor' => $data['estado_profesor'],
      ':municipio_profesor' => $data['municipio_profesor'],
      ':colonia_profesor' => $data['colonia_profesor'],
      ':telefono_profesor' => $data['telefono_profesor'],
      ':email_profesor' => $data['email_profesor'],
      ':fechanacimiento_profesor' => $data['fechanacimiento_profesor']]);
    echo 'ok';
  }


  public function update($data)
  {
    $query = $this->db->conectar()->prepare('UPDATE profesor SET
     id_grado_academico = :id_grado_academico,
     id_escuela = :id_escuela,
     id_usuario = :id_usuario,
     foto_profesor = :foto_profesor,
     nombre_profesor = :nombre_profesor,
     appaterno_profesor = :appaterno_profesor,
     apmaterno_profesor = :apmaterno_profesor,
     cedula_profesor = :cedula_profesor,
     calle_profesor = :calle_profesor,
     numexterior_profesor = :numexterior_profesor,
     numinterior_profesor = :numinterior_profesor,
     cp_profesor = :cp_profesor,
     estado_profesor = :estado_profesor,
     municipio_profesor = :municipio_profesor,
     colonia_profesor = :colonia_profesor,
     telefono_profesor = :telefono_profesor,
     email_profesor = :email_profesor,
     fechanacimiento_profesor = :fechanacimiento_profesor
     WHERE id_profesor = :id_profesor');
    $query->execute([
      ':id_profesor' => $data['id_profesor'],
      ':id_grado_academico' => $data['id_grado_academico'],
      ':id_escuela' => $data['id_escuela'],
      ':id_usuario' => $data['id_usuario'],
      ':foto_profesor' => $data['foto_profesor'],
      ':nombre_profesor' => $data['nombre_profesor'],
      ':appaterno_profesor' => $data['appaterno_profesor'],
      ':apmaterno_profesor' => $data['apmaterno_profesor'],
      ':cedula_profesor' => $data['cedula_profesor'],
      ':calle_profesor' => $data['calle_profesor'],
      ':numexterior_profesor' => $data['numexterior_profesor'],
      ':numinterior_profesor' => $data['numinterior_profesor'],
      ':cp_profesor' => $data['cp_profesor'],
      ':estado_profesor' => $data['estado_profesor'],
      ':municipio_profesor' => $data['municipio_profesor'],
      ':colonia_profesor' => $data['colonia_profesor'],
      ':telefono_profesor' => $data['telefono_profesor'],
      ':email_profesor' => $data['email_profesor'],
      ':fechanacimiento_profesor' => $data['fechanacimiento_profesor']]);
    echo 'ok';
  }

  public function delete($id)
  {
    $query = $this->db->conectar()->prepare('DELETE FROM profesor where id_profesor = :id_profesor');
    $query->execute([':id_profesor' => $id]);
    echo 'ok';
  }

  public function read()
  {
    
    $id_escuela = $_SESSION['id_escuela'];
    
    require_once 'profesorDTO.php';
    $query = "SELECT profesor.*, usuario.* from profesor profesor, escuela escuela, usuario usuario, director director WHERE usuario.id_usuario = profesor.id_usuario and profesor.id_escuela = escuela.id_escuela and director.id_escuela = escuela.id_escuela and director.id_escuela and profesor.id_escuela and  director.id_escuela = '".$id_escuela."'";
    $objProfesores = array();
    if (is_array($this->db->consultar($query)) || is_object($this->db->consultar($query))) {
      foreach ($this->db->consultar($query) as $key => $value) {
        $profesor = new ProfesorDTO();
        $profesor->id_profesor = $value['id_profesor'];
        $profesor->id_grado_academico = $value['id_grado_academico'];
        $profesor->id_escuela = $value['id_escuela'];
        $profesor->id_usuario = $value['id_usuario'];
        $profesor->foto_profesor = $value['foto_profesor'];
        $profesor->nombre_profesor = $value['nombre_profesor'];
        $profesor->appaterno_profesor = $value['appaterno_profesor'];
        $profesor->apmaterno_profesor = $value['apmaterno_profesor'];
        $profesor->cedula_profesor = $value['cedula_profesor'];
        $profesor->calle_profesor = $value['calle_profesor'];
        $profesor->numexterior_profesor = $value['numexterior_profesor'];
        $profesor->numinterior_profesor = $value['numinterior_profesor'];
        $profesor->cp_profesor  = $value['cp_profesor'];
        $profesor->estado_profesor  = $value['estado_profesor'];
        $profesor->municipio_profesor  = $value['municipio_profesor'];
        $profesor->colonia_profesor  = $value['colonia_profesor'];
        $profesor->telefono_profesor = $value['telefono_profesor'];  
        $profesor->email_profesor = $value['email_profesor'];
        $profesor->fechanacimiento_profesor= $value['fechanacimiento_profesor'];


        $profesor->username_usuario = $value['username_usuario'];
        $profesor->password_usuario= $value['password_usuario'];


        array_push($objProfesores, $profesor);
      }
    } else {
      $objProfesores = null;
    }

    return $objProfesores;
  }
  
  public function readCrudDirectivos()
  {
   
    
    require_once 'profesorDTO.php';
    $query = "SELECT profesor.*, usuario.* from profesor profesor, escuela escuela, usuario usuario, director director WHERE usuario.id_usuario = profesor.id_usuario and profesor.id_escuela = escuela.id_escuela and director.id_escuela = escuela.id_escuela and director.id_escuela and profesor.id_escuela and  director.id_escuela = '".$id_escuela."'";
    $objProfesores = array();
    foreach ($this->db->consultar($query) as $key => $value) {
      $profesor = new ProfesorDTO();
      $profesor->id_profesor = $value['id_profesor'];
      $profesor->id_grado_academico = $value['id_grado_academico'];
      $profesor->id_escuela = $value['id_escuela'];
      $profesor->id_usuario = $value['id_usuario'];
      $profesor->foto_profesor = $value['foto_profesor'];
      $profesor->nombre_profesor = $value['nombre_profesor'];
      $profesor->appaterno_profesor = $value['appaterno_profesor'];
      $profesor->apmaterno_profesor = $value['apmaterno_profesor'];
      $profesor->cedula_profesor = $value['cedula_profesor'];
      $profesor->calle_profesor = $value['calle_profesor'];
      $profesor->numexterior_profesor = $value['numexterior_profesor'];
      $profesor->numinterior_profesor = $value['numinterior_profesor'];
      $profesor->cp_profesor  = $value['cp_profesor'];
      $profesor->estado_profesor  = $value['estado_profesor'];
      $profesor->municipio_profesor  = $value['municipio_profesor'];
      $profesor->colonia_profesor  = $value['colonia_profesor'];
      $profesor->telefono_profesor = $value['telefono_profesor'];  
      $profesor->email_profesor = $value['email_profesor'];
      $profesor->fechanacimiento_profesor= $value['fechanacimiento_profesor'];
      
      $profesor->username_usuario = $value['username_usuario'];
      $profesor->password_usuario= $value['password_usuario'];
      


      array_push($objProfesores, $profesor);
    }
    return $objProfesores;
  }
}
?>
