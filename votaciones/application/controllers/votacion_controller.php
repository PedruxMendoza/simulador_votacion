<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class votacion_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('votacion_model');
	}

	public function index()
	{
            if ($this->session->userdata('logueado') == TRUE) {
                  $datos['votacion'] = $this->votacion_model->get_votacion();
                  $datos['estado'] = $this->votacion_model->get_estado();
                  $datos['titulo'] = 'Votaciones || Votaciones';
                  $this->load->view('templates/header', $datos);
                  $this->load->view('votacion_view');
                  $this->load->view('templates/footer');
            }else{
                  redirect('loginController/index','refresh');
            }

      }

      public function eliminar($id)
      {
        if ($this->session->userdata('logueado') == TRUE) {
            $msj = $this->votacion_model->eliminar($id);
            if ($msj == "successE") 
            {
                  $datos['votacion'] = $this->votacion_model->get_votacion();
                  $datos['estado'] = $this->votacion_model->get_estado();  
                  $datos['titulo'] = 'Votaciones || Votaciones';           
                        $datos['msj'] = "successE";  //Esto se agrega (no se encuentra en el index)
                        $this->load->view('templates/header', $datos);
                        $this->load->view('votacion_view');
                        $this->load->view('templates/footer');
                  }else{
                        $datos['votacion'] = $this->votacion_model->get_votacion();
                        $datos['estado'] = $this->votacion_model->get_estado(); 
                        $datos['titulo'] = 'Votaciones || Votaciones';            
                        $datos['msj'] = "errorE";  //Esto se agrega (no se encuentra en el index)
                        $this->load->view('templates/header', $datos);
                        $this->load->view('votacion_view');
                        $this->load->view('templates/footer');                
                  }
            }else{
                  redirect('loginController/index','refresh');
            }
      }

      public function ingresar()
      {
            if ($this->session->userdata('logueado') == TRUE) {
                  $datos["descripcion"] = $_POST["descripcion"];
                  $datos["finicial"] = $_POST["finicial"];
                  $datos["ffinal"] = $_POST["ffinal"];
                  $datos["cantvoto"] = $_POST["cantvoto"];
                  $datos["estado"] = $_POST["estado"];

                  $msj = $this->votacion_model->guardar($datos);
                  if ($msj == "success")
                  {
                        $datos['votacion'] = $this->votacion_model->get_votacion();
                        $datos['estado'] = $this->votacion_model->get_estado();
                        $datos['titulo'] = 'Votaciones || Votaciones';
                        $datos['msj'] = "success";
                        $this->load->view('templates/header', $datos);
                        $this->load->view('votacion_view');
                        $this->load->view('templates/footer');
                  }
            }else{
                  redirect('loginController/index','refresh');
            }
      }

      public function get_datos($id)
      {
            if ($this->session->userdata('logueado') == TRUE) {
                  $datos['votacion'] = $this->votacion_model->get_datos(base64_decode($id));
                  $datos['estado'] = $this->votacion_model->get_all_estado();
                  $datos['titulo'] = 'Votaciones || Votaciones';
                  $this->load->view('templates/header', $datos);
                  $this->load->view('votacion_viewact');
                  $this->load->view('templates/footer');
            }else{
                  redirect('loginController/index','refresh');
            }
      }

      public function actualizar()
      {
            if ($this->session->userdata('logueado') == TRUE) {
                  $datos["id"] = $_POST["id"];
                  $datos["descripcion"] = $_POST["descripcion"];
                  $datos["finicial"] = $_POST["finicial"];
                  $datos["ffinal"] = $_POST["ffinal"];
                  $datos["cantvoto"] = $_POST["cantvoto"];
                  $datos["estado"] = $_POST["estado"];

                  $msj = $this->votacion_model->actualizar($datos);
                  if ($msj == "modi") {
                        $datos['votacion'] = $this->votacion_model->get_votacion();
                        $datos['estado'] = $this->votacion_model->get_all_estado();
                        $datos['titulo'] = 'Votaciones || Votaciones';
                        $datos['msj'] = "modi";;
                        $this->load->view('templates/header', $datos);
                        $this->load->view('votacion_view');
                        $this->load->view('templates/footer');
                  }else{
                        $datos['votacion'] = $this->votacion_model->get_votacion();
                        $datos['estado'] = $this->votacion_model->get_all_estado();
                        $datos['titulo'] = 'Votaciones || Votaciones';
                        $datos['msj'] = "ErrorM";
                        $this->load->view('templates/header', $datos);
                        $this->load->view('votacion_view');
                        $this->load->view('templates/footer');
                  }
            }else{
                  redirect('loginController/index','refresh');
            }

      }

      public function cancelar($id)
      {
            if ($this->session->userdata('logueado') == TRUE) {
                  $msj = $this->votacion_model->cancelar($id);
                  if ($msj == "cancel") {
                        $datos['votacion'] = $this->votacion_model->get_votacion();
                        $datos['estado'] = $this->votacion_model->get_estado();
                        $datos['titulo'] = 'Votaciones || Votaciones';
                        $datos['msj'] = "cancel";
                        $this->load->view('templates/header', $datos);
                        $this->load->view('votacion_view');
                        $this->load->view('templates/footer');
                  }
            }else{
                  redirect('loginController/index','refresh');
            }
      }

      public function activar($id)
      {
            if ($this->session->userdata('logueado') == TRUE) {
                  $msj = $this->votacion_model->activar($id);
                  if ($msj == "active") {
                        $datos['votacion'] = $this->votacion_model->get_votacion();
                        $datos['estado'] = $this->votacion_model->get_estado();
                        $datos['titulo'] = 'Votaciones || Votaciones';
                        $datos['msj'] = "active";
                        $this->load->view('templates/header', $datos);
                        $this->load->view('votacion_view');
                        $this->load->view('templates/footer');
                  }
            }else{
                  redirect('loginController/index','refresh');
            }
      }
}
