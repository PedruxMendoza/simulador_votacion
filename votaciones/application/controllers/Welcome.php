<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent:: __construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			$this->load->view('welcome_message');
		}else{
			redirect('loginController/index','refresh');
		}

	}

	public function cambiarcontra()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			$datos['usuario'] = $_POST['usuario'];
			$datos['clave'] = md5($_POST['clave']);
			$datos['newclave'] = md5($_POST['newclave']);
			$msj = $this->login_model->change_pass($datos);
			if ($msj == "success")
			{
				$datos["msj"] = "success";
				$this->load->view('welcome_message', $datos);
			}else{
				$datos["msj"] = "ErrorCP";
				$this->load->view('welcome_message', $datos);		
			}			
		}else{
			redirect('loginController/index','refresh');
		}
	}
}
