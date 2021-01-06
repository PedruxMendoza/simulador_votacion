<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class urnas_controller extends CI_Controller{

	public function __construct(){
		parent ::__construct();
		$this->load->model('urnas_model');
	}
	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			$datos['urnas'] = $this->urnas_model->get_urnas();
			$datos['sede']  = $this->urnas_model->get_sede();
			$datos['titulo'] = 'Votaciones || Urnas';
			$this->load->view('templates/header', $datos);
			$this->load->view('urnas_view');
			$this->load->view('templates/footer');
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function eliminar($id){
		if ($this->session->userdata('logueado') == TRUE) {
			  $msj = $this->urnas_model->eliminar($id);
                  if ($msj == "successE") 
                  {
				  $datos['urnas'] = $this->urnas_model->get_urnas();
			      $datos['sede']  = $this->urnas_model->get_sede();
			      $datos['titulo'] = 'Votaciones || Urnas';       
                  $datos['msj'] = "successE";  //Esto se agrega (no se encuentra en el index)
				  $this->load->view('templates/header', $datos);
				  $this->load->view('urnas_view');
				  $this->load->view('templates/footer');
              }else{
				  $datos['urnas'] = $this->urnas_model->get_urnas();
			      $datos['sede']  = $this->urnas_model->get_sede();
			      $datos['titulo'] = 'Votaciones || Urnas';           
                  $datos['msj'] = "errorE";  //Esto se agrega (no se encuentra en el index)
				  $this->load->view('templates/header', $datos);
				  $this->load->view('urnas_view');
				  $this->load->view('templates/footer');              
              }
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function insertar(){
		if ($this->session->userdata('logueado') == TRUE) {
			$datos['id_urnas']  = $_POST['id_urnas'];
			$datos['nombre_urnas'] = $_POST['nombre_urnas'];
			$datos['sede']         = $_POST['sede'];
			$msj = $this->urnas_model->insertar($datos);
			if ($msj == "success") {
      $datos['urnas'] = $this->urnas_model->get_urnas(); //Estos esta en la funcion indexs
      $datos['sede']  = $this->urnas_model->get_sede();
      $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
      $datos['titulo'] = 'Votaciones || Urnas';
      $this->load->view('templates/header', $datos);
      $this->load->view('urnas_view');
      $this->load->view('templates/footer');
  }else{
  	redirect('loginController/index','refresh');
  }
}
		//redirect('/urnas_controller/index','refresh');
}

public function get_datos($id){
	if ($this->session->userdata('logueado') == TRUE) {
		$datos['urnas'] = $this->urnas_model->get_datos(base64_decode($id));
		$datos['sede']  = $this->urnas_model->get_sede();
		$datos['titulo'] = 'Votaciones || Urnas';
		$this->load->view('templates/header', $datos);
		$this->load->view('urnas_viewact');
		$this->load->view('templates/footer');
	}else{
		redirect('loginController/index','refresh');
	}

}

public function actualizar(){
	if ($this->session->userdata('logueado') == TRUE) {
		$datos['id_urnas']  = $_POST['id_urnas'];
		$datos['nombre_urnas'] = $_POST['nombre_urnas'];
		$datos['sede']         = $_POST['sede'];

		$msj = $this->urnas_model->actualizar($datos);
		if ($msj == 'modi') {
			$datos['urnas'] = $this->urnas_model->get_urnas();
			$datos['sede']  = $this->urnas_model->get_sede();
			$datos['titulo'] = 'Votaciones || Urnas';
			$datos['msj'] = 'modi';
			$this->load->view('templates/header', $datos);
			$this->load->view('urnas_view');
			$this->load->view('templates/footer');
		}else{
			$datos['urnas'] = $this->urnas_model->get_urnas();
			$datos['sede']  = $this->urnas_model->get_sede();
			$datos['titulo'] = 'Votaciones || Urnas';
			$datos['msj'] = 'ErrorM';
			$this->load->view('templates/header', $datos);
			$this->load->view('urnas_view');
			$this->load->view('templates/footer');
		}
	}else{
		redirect('loginController/index','refresh');
	}

}
}
?>