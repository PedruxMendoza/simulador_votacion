<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class candidatos_controller extends CI_Controller {
public function __construct(){
		parent:: __construct();
		$this->load->model('candidatos_model');
	}


	public function index(){ 
		if ($this->session->userdata('logueado') == TRUE) {
		$datos['candidato']    = $this->candidatos_model->get_candidato();
		$datos['persona']    = $this->candidatos_model->get_persona();
		$datos['titulo']='votaciones|| candidatos';
		$this->load->view('templates/header',$datos);
		$this->load->view('candidatos_view');
		$this->load->view('templates/footer');
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function ingresar(){
		if ($this->session->userdata('logueado') == TRUE) {
		$datos['DUI_persona']     = $_POST['DUI_persona'];
		$result = $this->candidatos_model->set_candidato($datos);
		if ($result == "success") {
			$this->load->view('templates/header',$data);
			$this->load->view('candidatos_view');
			$this->load->view('templates/footer');
		}
		}else{
			redirect('loginController/index','refresh');
		}		
	}

public function eliminar($id){
		if ($this->session->userdata('logueado') == TRUE) {
		$this->candidatos_model->eliminar($id);
		redirect('/candidatos_controller/index','refresh');
		}else{
			redirect('loginController/index','refresh');
		}	
	}
	public function get_datos($id){
		if ($this->session->userdata('logueado') == TRUE) {
		$datos['DUI_persona']    = $this->candidatos_model->get_persona();
		$datos['titulo']='votaciones|| candidatos';
		$this->load->view('templates/header',$datos);
		$this->load->view('candidatos_view');
		$this->load->view('templates/footer');
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function actualizar(){
		if ($this->session->userdata('logueado') == TRUE) {
		$datos['DUI_persona']     = $_POST['DUI_persona'];
		$result = $this->candidatos_model->actualizar($datos);
		if ($result == "success") {
			
			$datos['DUI_persona']    = $this->candidatos_model->get_persona();
			$datos['titulo']='votaciones|| candidatos';
			$datos['msj']     = "modi";
		}else{
			$datos['DUI_persona']    = $this->candidatos_model->get_persona();
			$datos['titulo']='votaciones|| candidatos';
			$datos['msj']     = "ErrorM";
			$this->load->view('templates/header',$datos);
			$this->load->view('candidatos_view');
			$this->load->view('templates/footer');
	}
		}else{
			redirect('loginController/index','refresh');
		}
	}
}
?>