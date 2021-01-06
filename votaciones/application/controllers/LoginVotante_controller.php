<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginVotante_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('loginV_model');
	}

	public function index()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			redirect('papeletaController/index','refresh');
		}else{
			$this->load->view('Votantes');
		}
	}

	public function iniciar(){
		date_default_timezone_set('America/El_Salvador');
		$fechaactual = date("Y-m-d");
		$datos['DUI'] = $_POST['DUI'];
		$data = $this->loginV_model->validar($datos);
		if($data){
			//variables de sesion
			if ($data->id_estadoh == 2) {
				$dato['msj'] = "Error1";
				$this->load->view('Votantes',$dato);
			}elseif ($data->fexpiracion <= $fechaactual) {
				$dato['msj'] = "Error2";
				$this->load->view('Votantes',$dato);
			}elseif ($data->id_voto == 1) {
				$dato['msj'] = "Error3";
				$this->load->view('Votantes',$dato);
			}elseif ($data->id_padron == "") {
				$dato['msj'] = "Error4";
				$this->load->view('Votantes',$dato);
			}else{
				$datos_usuario = array('DUI' => $data->DUI_persona, 'Nombre'=> $data->nombre1.' '.$data->apellido1, 'Estado'=> $data->id_estadoh, 'Votacion'=> $data->id_votacion,'rol'=> $data->id_rol,'logueado' => TRUE);
				$this->session->set_userdata($datos_usuario);
				redirect('/papeletaController/index','refresh');
			}
		}else{
			$data['msj'] = "Error";
			$this->load->view('Votantes',$data);

		}
	}

	//Metodo para cerrar sesion y destruir la variable de sesion
	public function cerrar(){
		$user_data = array('logueado' => FALSE);
		$this->session->set_userdata($user_data);
		$this->session->sess_destroy();
		redirect('LoginVotante_controller/index','refresh');
	}

}
