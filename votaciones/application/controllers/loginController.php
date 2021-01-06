<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginController extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->clear_cache();
		$this->load->model('login_model');
	}

	public function index(){

		if ($this->session->userdata('logueado') == TRUE) {
			redirect('Welcome/index','refresh');
		}else{
			$this->load->view('login');	
		}
	}

	public function clear_cache()
	{
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");
	}

	public function iniciar(){
		$datos['correo'] = $_POST['correo'];
		$datos['clave'] = md5($_POST['clave']);
		$data = $this->login_model->validar($datos);
		if($data){
			//variables de sesion
			$datos_usuario = array('id' => $data->id_usuario, 'nombre'=> $data->nombre1.' '.$data->apellido1, 'rol'=> $data->id_rol,'logueado' => TRUE);
			$this->session->set_userdata($datos_usuario);
			redirect('/Welcome/index','refresh');
		}else{
			$data['msj'] = "Error";
			$this->load->view('login',$data);

		}
	}

	//Metodo para cerrar sesion y destruir la variable de sesion
	public function cerrar(){
		$user_data = array('logueado' => FALSE);
		$this->session->set_userdata($user_data);
		$this->session->sess_destroy();
		redirect('loginController/index','refresh');
	}

	//Metodo que recibe el mensaje si el correo no existe, se pudo enviar o NO se pudo enviar
	public function correo($msj){
		
		if ($msj == "errorCorreo") {
			$data['msj'] = "errorCorreo";
		}elseif ($msj == "okCorreo") {
			$data['msj'] = "okCorreo";
		}else{
			$data['msj'] = "errorEnviar";
		}
		
		$this->load->view('login',$data);
	}
}
