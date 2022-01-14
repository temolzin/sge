<?php

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		Session::init();
	}

	public function run()
	{
		
		$user_name=$_POST['username'];
		$password=($_POST['password']);
		
		$res= $this->db->select("SELECT * FROM usario WHERE username_usuario = '".$username."' AND password_usuario = '".$password."'");
		$count = count($res);
		
		if ($count > 0) {
			
			Session::init();
			
			Session::set('id_usuario', true);
			Session::set('username_usuario', $user_name);
			Session::set('password_usuario', $res[0]['password']);
			header('location: '.URL.'login/index');
		} 
		   else {
			Session::set('loggedIn', false);
			header('location: '.URL);
		}
		
		
	}
		
}