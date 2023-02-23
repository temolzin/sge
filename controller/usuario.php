<?php
class Usuario extends Controller
{
  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->view->render('login/index');
  }

  function insert()
  {

    $id_tipo_usuario = $_POST['id_tipo_usuario'];
    $username_usuario = $_POST['username_usuario'];
    $password_usuario = $_POST['password_usuario'];
    $data = array(
      'id_tipo_usuario' => $id_tipo_usuario,
      'username_usuario' => $username_usuario,
      'password_usuario' => $password_usuario
    );

    require 'model/usuarioDAO.php';
    $this->loadModel('UsuarioDAO');
    $usuarioDAO = new UsuarioDAO();
    echo $usuarioDAO->insertReturnId($data);
  }

  function update()
  {
    $id_usuario = $_POST['id_usuarioActualizar'];
    $username_usuario = $_POST['username_usuarioActualizar'];
    $password_usuario = $_POST['password_usuarioActualizar'];
    $data = array('id_usuario' => $id_usuario, 'username_usuario' => $username_usuario, 'password_usuario' => $password_usuario);

    require 'model/usuarioDAO.php';
    $this->loadModel('UsuarioDAO');
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->update($data);
  }

  function updatePassword()
  {
    $id_usuario = $_POST['id_usuario'];
    $password = $_POST['nueva_password'];
    $confirm_password = $_POST['repite_password'];
  
    if ($password != $confirm_password) {
      echo "Las contraseñas no coinciden";
      return;
    }
  
    $data = array('id_usuario' => $id_usuario, 'nueva_password' => $password);
  
    require 'model/usuarioDAO.php';
    $this->loadModel('UsuarioDAO');
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->updatePassword($data);
  }
    
  function delete()
  {
    $id_usuario = $_POST['idEliminarUsuario'];

    require 'model/usuarioDAO.php';
    $this->loadModel('UsuarioDAO');
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->delete($id_usuario);
  }

  function login()
  {
    $username_usuario = $_POST['username_usuario'];
    $password_usuario = $_POST['password_usuario'];
    $data = array('username_usuario' => $username_usuario, 'password_usuario' => $password_usuario);

    require 'model/usuarioDAO.php';
    $this->loadModel('UsuarioDAO');
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->login($username_usuario, $password_usuario);
  }
  function readBlock()
  {
    require 'model/usuarioDAO.php';
    $this->loadModel('UsuarioDAO');
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO = $usuarioDAO->readBlock();

    echo json_encode($usuarioDAO);
  }

  function read()
  {
    require 'model/usuarioDAO.php';
    $this->loadModel('UsuarioDAO');
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO = $usuarioDAO->read();

    echo json_encode($usuarioDAO);
  }
}
