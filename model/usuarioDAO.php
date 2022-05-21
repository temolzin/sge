<?php
class UsuarioDAO extends Model implements CRUD {
    public function __construct()

    {
            //session_start();
        parent::__construct();

    }

    public function insert($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO usuario values (null, :id_tipo_usuario, :username_usuario, :password_usuario, :activo_usuario)');
        $query->execute([':id_tipo_usuario' => $data['id_tipo_usuario'], ':username_usuario' => $data['username_usuario'],':password_usuario' => $data['password_usuario'], ':activo_usuario' => 1]);

    }

    public function insertReturnId($data)
    {
        $query = $this->db->conectar()->prepare('INSERT INTO usuario values (null, :id_tipo_usuario, :username_usuario, :password_usuario, :activo_usuario)');
        $query->execute([':id_tipo_usuario' => $data['id_tipo_usuario'], ':username_usuario' => $data['username_usuario'],':password_usuario' => $data['password_usuario'], ':activo_usuario' => 1]);

        $query = "SELECT LAST_INSERT_ID() AS id";
        $id_usuario = null;
        foreach ($this->db->consultar($query) as $key => $value) {

            $id_usuario = $value['id'];

        }
        return $id_usuario;
    }

    public function update($data)
    {
        $query = $this->db->conectar()->prepare('UPDATE usuario SET username_usuario = :username_usuario, password_usuario = :password_usuario WHERE id_usuario = :id_usuario');
        $query->execute([':id_usuario' => $data['id_usuario'],':username_usuario' => $data['username_usuario'],':password_usuario' => $data['password_usuario']]);
        echo 'ok';
    }

    public function delete($id)
    {
        $query = $this->db->conectar()->prepare('DELETE FROM usuario where id_usuario = :id_usuario');
        $query->execute([':id_usuario' => $id]);
        echo 'ok';
    }

    public function login($username, $password)
    {
        session_start();

        $query = $this->db->consultar("SELECT t.nombre_tipo_usuario, u.* FROM tipo_usuario t, usuario u WHERE t.id_tipo_usuario = u.id_tipo_usuario AND u.username_usuario = '".$username."' and password_usuario = '".$password."'");
        $rows = count($query);

        if ($rows > 0){
         $tipo = '';
         $id = '';
         $id_usuario = 0;
         $activo_usuario = 0;
         foreach (($query) as $key => $value) {
            $tipo = $value["nombre_tipo_usuario"];
            $id_usuario = $value["id_usuario"];
            $activo_usuario = $value["activo_usuario"];
            $_SESSION['tipo'] = $tipo;
        }
            
       if($activo_usuario==1){
           
           $id = $id_usuario;
           if ($tipo == 'alumno'){
                
                
                $query = $this->db->consultar("SELECT es.*, al.*, gr.* from escuela es, alumno al, grupo gr WHERE es.id_escuela = al.id_escuela and gr.id_grupo = al.id_grupo and gr.id_escuela = al.id_escuela and id_usuario = '".$id."'"); 
         
                 foreach (($query) as $key => $value){
                    
                     //Info alumno
                     $_SESSION['id'] = $value['id_alumno'];
                     $_SESSION['id_grupo'] = $value['id_grupo'];
                     $_SESSION['id_escuela'] = $value['id_escuela'];
                     $_SESSION['foto'] = $value['foto_alumno'];
                     $_SESSION['nombre'] = $value['nombre_alumno'];
                     $_SESSION['appaterno'] = $value['appaterno_alumno'];
                     $_SESSION['apmaterno'] = $value['apmaterno_alumno'];
                     $_SESSION['calle'] = $value['calle_alumno'];
                     $_SESSION['num_exterior'] = $value['noexterior_alumno'];
                     $_SESSION['num_interior'] = $value['nointerior_alumno'];
                     $_SESSION['cp'] = $value['cp_alumno'];
                     $_SESSION['estado'] = $value['estado_alumno'];
                     $_SESSION['municipio'] = $value['municipio_alumno'];
                     $_SESSION['colonia'] = $value['colonia_alumno'];
                     $_SESSION['telefono'] = $value['telefono_alumno'];
                     $_SESSION['email'] = $value['email_alumno'];
                     $_SESSION['fecha_nacimiento'] = $value['fechanacimiento_alumno'];
                     
                     //info escuela 
                     
                     $_SESSION['id_escuela'] = $value['id_escuela'];
                     $_SESSION['nombre_escuela']=$value['nombre_escuela'];
                     $_SESSION['rfc_escuela'] = $value['rfc_escuela'];
                     $_SESSION['cct_escuela'] = $value['cct_escuela'];
                     $_SESSION['calle_escuela'] = $value['calle_escuela'];
                     $_SESSION['numxterior_escuela'] = $value['numxterior_escuela'];
                     $_SESSION['numinterior_escuela'] = $value['numinterior_escuela'];
                     $_SESSION['cp_escuela'] = $value['cp_escuela'];
                     $_SESSION['estado_escuela'] = $value['estado_escuela'];
                     $_SESSION['municipio_escuela'] = $value['municipio_escuela'];
                     $_SESSION['colonia_escuela'] = $value['colonia_escuela'];
                     $_SESSION['telefono_escuela'] = $value['telefono_escuela'];
                     $_SESSION['email_escuela'] = $value['email_escuela'];
                     $_SESSION['observacion_escuela'] =  $value['observacion_escuela'];

                     //info grupo

                     $_SESSION['id_grupo'] = $value['id_grupo'];
                     $_SESSION['id_escuela'] = $value['id_escuela'];
                     $_SESSION['nombre_grupo'] = $value['nombre_grupo'];
                     $_SESSION['turno_grupo'] = $value['turno_grupo'];
                 
                 }
                
                 echo $rows;
               
                } else if($tipo == 'administrador'){
          
             $query = $this->db->consultar("SELECT * FROM administrador where id_usuario = '".$id."'");
             foreach (($query) as $key => $value){
                 
                $_SESSION['id'] = $value['id_administrador'];
                $_SESSION['foto'] = $value['foto_administrador'];
                $_SESSION['nombre'] = $value['nombre_administrador'];
                $_SESSION['appaterno'] = $value['appaterno_administrador'];
                $_SESSION['apmaterno'] = $value['apmaterno_administrador'];
                $_SESSION['telefono'] = $value['telefono_administrador'];
                $_SESSION['email'] = $value['email_administrador'];
                $_SESSION['fecha_nacimiento'] = $value['fechanacimiento_administrador'];
             }
            //Contar Escuelas
              $query = $this->db->consultar("SELECT * FROM escuela");
              $esc = count($query);
             
              $_SESSION['can_esc'] = $esc;
           //Contar directores
              $query = $this->db->consultar("SELECT * FROM director");
              $dir = count($query);
             
              $_SESSION['can_dir'] = $dir;
           //Contar Usuarios
              $query = $this->db->consultar("SELECT * FROM usuario");
              $usu = count($query);
             
              $_SESSION['can_usu'] = $usu;
           //Contar Alumnos
              $query = $this->db->consultar("SELECT * FROM alumno");
              $alu = count($query);
             
              $_SESSION['can_alu'] = $alu;
              
          
          echo $rows;
            
                }else if($tipo == 'tutor'){

        $query = $this->db->consultar("SELECT es.*,al.*,tu.*,gp.* from escuela es, alumno al, tutor tu, grupo gp where al.id_alumno = tu.id_alumno and al.id_escuela = tu.id_escuela and al.id_escuela = es.id_escuela and al.id_grupo = gp.id_grupo and tu.id_usuario = '".$id."'"); 

        foreach (($query) as $key => $value){
            
                     //Info Escuela
                     $_SESSION['id_escuela'] = $value['id_escuela'];
                     $_SESSION['nombre_escuela']=$value['nombre_escuela'];
                     $_SESSION['rfc_escuela'] = $value['rfc_escuela'];
                     $_SESSION['cct_escuela'] = $value['cct_escuela'];
                     $_SESSION['calle_escuela'] = $value['calle_escuela'];
                     $_SESSION['numxterior_escuela'] = $value['numxterior_escuela'];
                     $_SESSION['numinterior_escuela'] = $value['numinterior_escuela'];
                     $_SESSION['cp_escuela'] = $value['cp_escuela'];
                     $_SESSION['estado_escuela'] = $value['estado_escuela'];
                     $_SESSION['municipio_escuela'] = $value['municipio_escuela'];
                     $_SESSION['colonia_escuela'] = $value['colonia_escuela'];
                     $_SESSION['telefono_escuela'] = $value['telefono_escuela'];
                     $_SESSION['email_escuela'] = $value['email_escuela'];
                     $_SESSION['observacion_escuela'] =  $value['observacion_escuela'];
                        
                     //Info Alumno
                     $_SESSION['id_alumno'] = $value['id_alumno'];
                     $_SESSION['id_grupo'] = $value['id_grupo'];
                     $_SESSION['id_escuela'] = $value['id_escuela'];
                     $_SESSION['foto_alumno'] = $value['foto_alumno'];
                     $_SESSION['nombre_alumno'] = $value['nombre_alumno'];
                     $_SESSION['appaterno_alumno'] = $value['appaterno_alumno'];
                     $_SESSION['apmaterno_alumno'] = $value['apmaterno_alumno'];
                     $_SESSION['calle_alumno'] = $value['calle_alumno'];
                     $_SESSION['num_exterior_alumno'] = $value['noexterior_alumno'];
                     $_SESSION['num_interior_alumno'] = $value['nointerior_alumno'];
                     $_SESSION['cp_alumno'] = $value['cp_alumno'];
                     $_SESSION['estado_alumno'] = $value['estado_alumno'];
                     $_SESSION['municipio_alumno'] = $value['municipio_alumno'];
                     $_SESSION['colonia_alumno'] = $value['colonia_alumno'];
                     $_SESSION['telefono_alumno'] = $value['telefono_alumno'];
                     $_SESSION['email_alumno'] = $value['email_alumno'];
                     $_SESSION['fecha_nacimiento_alumno'] = $value['fechanacimiento_alumno'];
                        
                     

                     //Info tutor
                     $_SESSION['id'] = $value['id_tutor'];
                     $_SESSION['id_alumno'] = $value['id_alumno'];
                     $_SESSION['id_escuela'] = $value['id_escuela'];
                     $_SESSION['foto'] = $value['foto_tutor'];
                     $_SESSION['nombre'] = $value['nombre_tutor'];
                     $_SESSION['appaterno'] = $value['appaterno_tutor'];
                     $_SESSION['apmaterno'] = $value['apmaterno_tutor'];
                     $_SESSION['fecha_nacimiento'] = $value['fechanacimiento_tutor'];
                     $_SESSION['telefono'] = $value['telefono_tutor'];
                     $_SESSION['email'] = $value['email_tutor'];
                     $_SESSION['calle'] = $value['calle_tutor'];
                     $_SESSION['num_exterior'] = $value['noexterior_tutor'];
                     $_SESSION['num_interior'] = $value['nointerior_tutor'];
                     $_SESSION['cp'] = $value['cp_tutor'];
                     $_SESSION['estado'] = $value['estado_tutor'];
                     $_SESSION['municipio'] = $value['municipio_tutor'];
                     $_SESSION['colonia'] = $value['colonia_tutor'];
                    
                     //Grupo
                     $_SESSION['id_grupo'] = $value['id_grupo'];
                     $_SESSION['id_escuela'] = $value['id_escuela'];
                     $_SESSION['nombre_grupo'] = $value['nombre_grupo'];
                     $_SESSION['turno_grupo'] = $value['turno_grupo'];
                     
                 
  
     }

     echo $rows;
    }else if($tipo == 'profesor'){

    $query = $this->db->consultar("SELECT es.*, pr.* from escuela es, profesor pr where pr.id_escuela = es.id_escuela and id_usuario = '".$id."'"); 

    foreach (($query) as $key => $value){
        
                    $_SESSION['id'] = $value['id_profesor'];
                    $_SESSION['id_grado_academico'] = $value['id_grado_academico'];
                    $_SESSION['id_escuela'] = $value['id_escuela'];
                    //$_SESSION['id_usuario'] = $value['id_usuario'];
                    $_SESSION['foto'] = $value['foto_profesor'];
                    $_SESSION['nombre'] = $value['nombre_profesor'];
                    $_SESSION['appaterno'] = $value['appaterno_profesor'];
                    $_SESSION['apmaterno'] = $value['apmaterno_profesor'];
                    $_SESSION['cedula'] = $value['cedula_profesor'];
                    $_SESSION['calle'] = $value['calle_profesor'];
                    $_SESSION['num_exterior'] = $value['numexterior_profesor'];
                    $_SESSION['num_interior'] = $value['numinterior_profesor'];
                    $_SESSION['cp'] = $value['cp_profesor'];
                    $_SESSION['estado'] = $value['estado_profesor'];
                    $_SESSION['municipio'] = $value['municipio_profesor'];
                    $_SESSION['colonia'] = $value['colonia_profesor'];
                    $_SESSION['telefono'] = $value['telefono_profesor'];
                    $_SESSION['email'] = $value['email_profesor'];
                    $_SESSION['fecha_nacimiento'] = $value['fechanacimiento_profesor'];
        
         //Info Escuela
                     $_SESSION['id_escuela'] = $value['id_escuela'];
                     $_SESSION['nombre_escuela']=$value['nombre_escuela'];
                     $_SESSION['rfc_escuela'] = $value['rfc_escuela'];
                     $_SESSION['cct_escuela'] = $value['cct_escuela'];
                     $_SESSION['calle_escuela'] = $value['calle_escuela'];
                     $_SESSION['numxterior_escuela'] = $value['numxterior_escuela'];
                     $_SESSION['numinterior_escuela'] = $value['numinterior_escuela'];
                     $_SESSION['cp_escuela'] = $value['cp_escuela'];
                     $_SESSION['estado_escuela'] = $value['estado_escuela'];
                     $_SESSION['municipio_escuela'] = $value['municipio_escuela'];
                     $_SESSION['colonia_escuela'] = $value['colonia_escuela'];
                     $_SESSION['telefono_escuela'] = $value['telefono_escuela'];
                     $_SESSION['email_escuela'] = $value['email_escuela'];
                     $_SESSION['observacion_escuela'] =  $value['observacion_escuela'];

    }


    echo $rows;
               
                }else if($tipo == 'director'){

 $query = $this->db->consultar("SELECT es.*, dr.* from escuela es, director dr where dr.id_escuela = es.id_escuela and id_usuario = '".$id."'"); 
 foreach (($query) as $key => $value){

                 $_SESSION['id'] = $value['id_director'];
                 $_SESSION['id_escuela'] = $value['id_escuela'];
                 $_SESSION['id_grado_academico'] = $value['id_grado_academico'];
                 $_SESSION['foto'] = $value['foto_director'];
                 $_SESSION['nombre'] = $value['nombre_director'];
                 $_SESSION['appaterno'] = $value['appaterno_director'];
                 $_SESSION['apmaterno'] = $value['apmaterno_director'];
                 $_SESSION['rfc'] = $value['rfc_director'];
                 $_SESSION['curp'] = $value['curp_director'];
                 $_SESSION['calle'] = $value['calle_director'];
                 $_SESSION['num_exterior'] = $value['numexterior_director'];
                 $_SESSION['num_interior'] = $value['numinterior_director'];
                 $_SESSION['cp'] = $value['cp_director'];
                 $_SESSION['estado'] = $value['estado_director'];
                 $_SESSION['municipio'] = $value['municipio_director'];
                 $_SESSION['colonia'] = $value['colonia_director'];
                 $_SESSION['telefono'] = $value['telefono_director'];
                 $_SESSION['cedulaprofesional'] = $value['cedulaprofesional_director'];
                 $_SESSION['email'] = $value['email_director'];
                 $_SESSION['fecha_nacimiento'] = $value['fechanacimiento_director'];
     
     
                 //info escuela 
                 $_SESSION['id_escuela'] = $value['id_escuela'];
                 $_SESSION['nombre_escuela']=$value['nombre_escuela'];
                 $_SESSION['rfc_escuela'] = $value['rfc_escuela'];
                 $_SESSION['cct_escuela'] = $value['cct_escuela'];
                 $_SESSION['calle_escuela'] = $value['calle_escuela'];
                 $_SESSION['numxterior_escuela'] = $value['numxterior_escuela'];
                 $_SESSION['numinterior_escuela'] = $value['numinterior_escuela'];
                 $_SESSION['cp_escuela'] = $value['cp_escuela'];
                 $_SESSION['estado_escuela'] = $value['estado_escuela'];
                 $_SESSION['municipio_escuela'] = $value['municipio_escuela'];
                 $_SESSION['colonia_escuela'] = $value['colonia_escuela'];
                 $_SESSION['telefono_escuela'] = $value['telefono_escuela'];
                 $_SESSION['email_escuela'] = $value['email_escuela'];
                 $_SESSION['observacion_escuela'] =  $value['observacion_escuela'];
            }

            echo $rows;
        }else{

           // echo 'No se pudo ingresar';   
}


  }else{
       
               
               //cierre
           
       }
            
             
  
            

}





            //echo $rows;
            //echo $id_usuario;





}



public function read()
{
    require_once 'usuarioDTO.php';
    $query = "SELECT t.nombre_tipo_usuario, u.* FROM tipo_usuario t, usuario u where t.id_tipo_usuario = u.id_tipo_usuario  and u.activo_usuario = '1' ORDER by u.id_usuario DESC";
    $objUsuarios = array();
    foreach ($this->db->consultar($query) as $key => $value) {
        $usuario = new UsuarioDTO();
        $usuario ->nombre_tipo_usuario = $value['nombre_tipo_usuario'];
        $usuario->id_usuario = $value['id_usuario'];
        $usuario->username_usuario = $value['username_usuario'];
        $usuario->password_usuario = $value['password_usuario'];
        $usuario->activo_usuario = $value['activo_usuario'];
        array_push($objUsuarios, $usuario);
    }
    return $objUsuarios;
}
    public function readBlock()
{
    require_once 'usuarioDTO.php';
    $query = "SELECT t.nombre_tipo_usuario, u.* FROM tipo_usuario t, usuario u where t.id_tipo_usuario = u.id_tipo_usuario and u.activo_usuario = '2' ORDER by u.id_usuario DESC";
    $objUsuarios = array();
    foreach ($this->db->consultar($query) as $key => $value) {
        $usuario = new UsuarioDTO();
        $usuario ->nombre_tipo_usuario = $value['nombre_tipo_usuario'];
        $usuario->id_usuario = $value['id_usuario'];
        $usuario->username_usuario = $value['username_usuario'];
        $usuario->password_usuario = $value['password_usuario'];
        $usuario->activo_usuario = $value['activo_usuario'];
        array_push($objUsuarios, $usuario);
    }
    return $objUsuarios;
}
    
}
?>
