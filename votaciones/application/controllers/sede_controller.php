<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class sede_controller extends CI_Controller{

	public function __construct(){
		parent :: __construct();
		$this->load->model('sede_model');
	}

	public function index(){
            if ($this->session->userdata('logueado') == TRUE) {
                  $datos['sede'] = $this->sede_model->get_sede();
                  $datos['municipio']  = $this->sede_model->get_municipio();
                  $datos['titulo'] = 'Votaciones || Sede';
                  $this->load->view('templates/header', $datos);
                  $this->load->view('sede_view');
                  $this->load->view('templates/footer');
            }else{
                  redirect('loginController/index','refresh');
            }
      }

      public function eliminar($id){
            if ($this->session->userdata('logueado') == TRUE) {
                  $msj = $this->sede_model->eliminar($id);
                  if ($msj == "successE") 
                  {
                  $datos['sede'] = $this->sede_model->get_sede();
                  $datos['municipio']  = $this->sede_model->get_municipio();
                  $datos['titulo'] = 'Votaciones || Sede';          
                  $datos['msj'] = "successE";  //Esto se agrega (no se encuentra en el index)
                  $this->load->view('templates/header', $datos);
                  $this->load->view('sede_view');
                  $this->load->view('templates/footer');
              }else{
                  $datos['sede'] = $this->sede_model->get_sede();
                  $datos['municipio']  = $this->sede_model->get_municipio();
                  $datos['titulo'] = 'Votaciones || Sede';           
                  $datos['msj'] = "errorE";  //Esto se agrega (no se encuentra en el index)
                  $this->load->view('templates/header', $datos);
                  $this->load->view('sede_view');
                  $this->load->view('templates/footer');               
              }                     
            }else{
                  redirect('loginController/index','refresh');
            }
      }

      public function insertar(){
            if ($this->session->userdata('logueado') == TRUE) {
                  $datos['nombre_sede'] = $_POST['nombre_sede'];
                  $datos['direccion'] = $_POST['direccion'];
                  $datos['nombre_municipio'] = $_POST['nombre_municipio'];

                  $msj = $this->sede_model->insertar($datos);
                  if ($msj == "success") {
                  $datos['sede'] = $this->sede_model->get_sede(); //Estos esta en la funcion indexs
                  $datos['municipio']  = $this->sede_model->get_municipio();
                  $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
                  $datos['titulo'] = 'Votaciones || Sede';
                  $this->load->view('templates/header', $datos);
                  $this->load->view('sede_view');
                  $this->load->view('templates/footer');
            }
      }else{
            redirect('loginController/index','refresh');
      }
}

public function get_datos($id){
      if ($this->session->userdata('logueado') == TRUE) {
            $datos['sede'] = $this->sede_model->get_datos(base64_decode($id));
            $datos['municipio']  = $this->sede_model->get_municipio();
            $datos['titulo'] = 'Votaciones || Sede';
            $this->load->view('templates/header', $datos);
            $this->load->view('sede_viewact');
            $this->load->view('templates/footer');
      }else{
            redirect('loginController/index','refresh');
      }
}

public function actualizar(){
      if ($this->session->userdata('logueado') == TRUE) {
            $datos['id'] = $_POST['id'];
            $datos['nombre_sede'] = $_POST['nombre_sede'];
            $datos['direccion'] = $_POST['direccion'];
            $datos['nombre_municipio'] = $_POST['nombre_municipio'];

            $msj = $this->sede_model->actualizar($datos);
            if($msj == 'modi') {
                  $datos['sede'] = $this->sede_model->get_sede();
                  $datos['municipio']  = $this->sede_model->get_municipio();
                  $datos['msj'] = 'modi';
                  $datos['titulo'] = 'Votaciones || Sede';
                  $this->load->view('templates/header', $datos);
                  $this->load->view('sede_view');
                  $this->load->view('templates/footer');
            }else{
                  $datos['sede'] = $this->sede_model->get_sede();
                  $datos['municipio']  = $this->sede_model->get_municipio();
                  $datos['msj'] = 'ErrorM';
                  $datos['titulo'] = 'Votaciones || Sede';
                  $this->load->view('templates/header', $datos);
                  $this->load->view('sede_view');
                  $this->load->view('templates/footer');

            }
      }else{
            redirect('loginController/index','refresh');
      }
}
}

?>   