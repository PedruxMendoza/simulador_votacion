<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class papeletaController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('papeletaModel');
		$this->load->model('DV_model');
	}

/*			if ($this->session->userdata('rol') == 1 || $this->session->userdata('rol') == 2) {
				redirect('Welcome/index','refresh');
			}else{
				$datos['partido'] = $this->papeletaModel->get_partido();
				$datos['candidato'] = $this->papeletaModel->get_candidato();
				$datos['votacion'] = $this->papeletaModel->get_votacion();

				$this->load->view('papeleta_view',$datos);
			}*/

	public function index()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			$datos['partido'] = $this->papeletaModel->get_partido();
			$datos['candidato'] = $this->papeletaModel->get_candidato();
			$datos['votacion'] = $this->papeletaModel->get_votacion();
			

			$this->load->view('papeleta_view',$datos);
		}else{
			redirect('LoginVotante_controller/index','refresh');
		}
	}

	public function actualizar($id){
		date_default_timezone_set('America/El_Salvador');
		$date = new DateTime(); // Date object using current date and time
		$dt= $date->format('Y-m-d\TH:i');
		$datos["fechahora"] = $dt;
		$datos["votacion"] = $this->session->userdata('Votacion');
		$datos["persona"] = $this->session->userdata('DUI');
		$datos["estado"] = 1;
		if($id == 5)
		{
			$datos["candidato"] = "";
		}else{
			$datos["candidato"] = $this->papeletaModel->return_candidato($id, $datos["votacion"]);
		}
		$this->DV_model->guardar($datos);
		$msj = $this->papeletaModel->set_papeleta($id);
		$user_data = array('logueado' => FALSE);
		$this->session->set_userdata($user_data);
		$this->session->sess_destroy();
		if ($msj == "success") {
			$datos['msj'] = "success"; 
			$this->load->view('Votantes', $datos);
		}
	}

}
