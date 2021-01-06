<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uv_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('uv_model');
	}


	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
		$data = array(
			'titulo'   => 'Votación || Urnas Votacion', 
			'urnas_votacion'  => $this->uv_model->get_urnas_votacion(),
			'votacion'    => $this->uv_model->get_votacion(),
			'urnas' => $this->uv_model->get_urnas());
		$this->load->view('templates/header',$data);
		$this->load->view('uv_view');
		$this->load->view('templates/footer');
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function eliminar($id){
		if ($this->session->userdata('logueado') == TRUE) {
                  $msj = $this->uv_model->eliminar($id);
                  if ($msj == "successE") 
                  {
                  $data = array(
			'titulo'   => 'Votación || Urnas Votacion', 
			'urnas_votacion'  => $this->uv_model->get_urnas_votacion(),
			'votacion'    => $this->uv_model->get_votacion(),
			'urnas' => $this->uv_model->get_urnas(),
					'msj' => "successE"); //Esto se agrega (no se encuentra en el index)
		$this->load->view('templates/header',$data);
		$this->load->view('uv_view');
		$this->load->view('templates/footer');
              }else{
                  $data = array(
			'titulo'   => 'Votación || Urnas Votacion', 
			'urnas_votacion'  => $this->uv_model->get_urnas_votacion(),
			'votacion'    => $this->uv_model->get_votacion(),
			'urnas' => $this->uv_model->get_urnas(),
					'msj' => "errorE"); //Esto se agrega (no se encuentra en el index)
		$this->load->view('templates/header',$data);
		$this->load->view('uv_view');
		$this->load->view('templates/footer');;               
              } 
		}else{
			redirect('loginController/index','refresh');
		}		
	}


	public function ingresar(){
		if ($this->session->userdata('logueado') == TRUE) {
		$datos['votacion']       = $_POST['votacion'];
		$datos['urnas']     = $_POST['urnas'];
		
		$result = $this->uv_model->set_votacion_urnas($datos);
		if ($result == "set") {
			$data = array(
				'titulo'   => 'Votación || Urnas Votacion', 
				'urnas_votacion'  => $this->uv_model->get_urnas_votacion(),
				'votacion'    => $this->uv_model->get_votacion(),
				'urnas' => $this->uv_model->get_urnas(),
				'msj'     => "set");
			$this->load->view('templates/header',$data);
			$this->load->view('uv_view');
			$this->load->view('templates/footer');
		}
		}else{
			redirect('loginController/index','refresh');
		}

	}


}

?>