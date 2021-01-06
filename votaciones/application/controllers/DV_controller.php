<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DV_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DV_model');
	}

	public function index()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			$datos['DV'] = $this->DV_model->get_DV();
			$datos['votacion'] = $this->DV_model->get_votacion();
			$datos['persona'] = $this->DV_model->get_personas();
			$datos['candidato'] = $this->DV_model->get_candidatos();
			$datos['estado'] = $this->DV_model->get_estado();
			$datos['titulo'] = 'Votaciones || Detalles Votaciones';
			$this->load->view('templates/header', $datos);
			$this->load->view('DV_view');
			$this->load->view('templates/footer');
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function eliminar($id)
	{
		if ($this->session->userdata('logueado') == TRUE) {
			$msj = $this->DV_model->eliminar($id);;
			if ($msj == "successE") 
			{
				$datos['DV'] = $this->DV_model->get_DV();
				$datos['votacion'] = $this->DV_model->get_votacion();
				$datos['persona'] = $this->DV_model->get_personas();
				$datos['candidato'] = $this->DV_model->get_candidatos();
				$datos['estado'] = $this->DV_model->get_estado();
				$datos['titulo'] = 'Votaciones || Detalles Votaciones';          
                $datos['msj'] = "successE";  //Esto se agrega (no se encuentra en el index)
                $this->load->view('templates/header', $datos);
                $this->load->view('DV_view');
                $this->load->view('templates/footer');
              }else{
				$datos['DV'] = $this->DV_model->get_DV();
				$datos['votacion'] = $this->DV_model->get_votacion();
				$datos['persona'] = $this->DV_model->get_personas();
				$datos['candidato'] = $this->DV_model->get_candidatos();
				$datos['estado'] = $this->DV_model->get_estado();
				$datos['titulo'] = 'Votaciones || Detalles Votaciones';           
                $datos['msj'] = "errorE";  //Esto se agrega (no se encuentra en el index)
                $this->load->view('templates/header', $datos);
                $this->load->view('DV_view');
                $this->load->view('templates/footer');                
              }	
          }else{
          	redirect('loginController/index','refresh');
          }
      }

      public function ingresar()
      {
      	if ($this->session->userdata('logueado') == TRUE) {
      		$datos["fechahora"] = $_POST["fechahora"];
      		$datos["votacion"] = $_POST["votacion"];
      		$datos["persona"] = $_POST["persona"];
      		$datos["estado"] = $_POST["estado"];
      		$datos["candidato"] = $_POST["candidato"];

      		$msj = $this->DV_model->guardar($datos);
      		if ($msj == "success")
      		{
      			$datos['DV'] = $this->DV_model->get_DV();
      			$datos['votacion'] = $this->DV_model->get_votacion();
      			$datos['persona'] = $this->DV_model->get_personas();
      			$datos['candidato'] = $this->DV_model->get_candidatos();
      			$datos['estado'] = $this->DV_model->get_estado();
      			$datos['msj'] = "success";
      			$datos['titulo'] = 'Votaciones || Detalles Votaciones';
      			$this->load->view('templates/header', $datos);
      			$this->load->view('DV_view');
      			$this->load->view('templates/footer');
      		}
      	}else{
      		redirect('loginController/index','refresh');
      	}
      }

      public function get_datos($id)
      {
      	if ($this->session->userdata('logueado') == TRUE) {
      		$datos['DV'] = $this->DV_model->get_datos_DV(base64_decode($id));
      		$datos['votacion'] = $this->DV_model->get_votacion();
      		$datos['persona'] = $this->DV_model->get_all_personas();
      		$datos['candidato'] = $this->DV_model->get_candidatos();
      		$datos['estado'] = $this->DV_model->get_all_estado();
      		$datos['titulo'] = 'Votaciones || Detalles Votaciones';
      		$this->load->view('templates/header', $datos);
      		$this->load->view('DV_viewact');
      		$this->load->view('templates/footer');	
      	}else{
      		redirect('loginController/index','refresh');
      	}	

      }

      public function actualizar()
      {
      	if ($this->session->userdata('logueado') == TRUE) {
      		$datos["id"] = $_POST["id"];
      		$datos["fechahora"] = $_POST["fechahora"];
      		$datos["votacion"] = $_POST["votacion"];
      		$datos["persona"] = $_POST["persona"];
      		$datos["estado"] = $_POST["estado"];
      		$datos["candidato"] = $_POST["candidato"];

      		$msj = $this->DV_model->actualizar($datos);
      		if ($msj == "modi") {
      			$datos['DV'] = $this->DV_model->get_DV();
      			$datos['votacion'] = $this->DV_model->get_votacion();
      			$datos['persona'] = $this->DV_model->get_personas();
      			$datos['candidato'] = $this->DV_model->get_candidatos();
      			$datos['estado'] = $this->DV_model->get_estado();
      			$datos['titulo'] = 'Votaciones || Detalles Votaciones';
      			$datos['msj'] = "modi";;
      			$this->load->view('templates/header', $datos);
      			$this->load->view('DV_view');
      			$this->load->view('templates/footer');
      		}else{
      			$datos['DV'] = $this->DV_model->get_DV();
      			$datos['votacion'] = $this->DV_model->get_votacion();
      			$datos['persona'] = $this->DV_model->get_personas();
      			$datos['candidato'] = $this->DV_model->get_candidatos();
      			$datos['estado'] = $this->DV_model->get_estado();
      			$datos['titulo'] = 'Votaciones || Detalles Votaciones';
      			$datos['msj'] = "ErrorM";
      			$this->load->view('templates/header', $datos);
      			$this->load->view('DV_view');
      			$this->load->view('templates/footer');
      		}
      	}else{
      		redirect('loginController/index','refresh');
      	}
      }
  }
