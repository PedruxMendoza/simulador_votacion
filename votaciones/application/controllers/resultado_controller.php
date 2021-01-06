<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class resultado_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('resultados_model');
	}

	public function index()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			$datos['result'] = $this->resultados_model->get_partido();
			$datos['titulo'] = 'Votaciones || Resultados';
			$this->load->view('templates/header', $datos);
			$this->load->view('resultados_view');
			$this->load->view('templates/footer');
		}else{
			redirect('loginController/index','refresh');
		}
	}

}