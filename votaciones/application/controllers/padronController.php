<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class padronController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('padronModel');
	}

	public function index()
	{
		if ($this->session->userdata('logueado') == TRUE) {
			$datos['padron'] = $this->padronModel->get_padron();
			$datos['persona'] = $this->padronModel->get_persona();
			$datos['urna'] = $this->padronModel->get_urna();
			$datos['usuario'] = $this->padronModel->get_usuario();
			$datos['titulo'] = 'Votaciones || Padron';
			$this->load->view('templates/header', $datos);
			$this->load->view('padron_view');
			$this->load->view('templates/footer');
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function ingresar(){
		if ($this->session->userdata('logueado') == TRUE) {
			$datos['urna'] = $_POST['urna'];
			$datos['dui'] = $_POST['DUI'];
			$datos['usuario'] = $_POST['usuario'];
			$datos['FechaHora'] = $_POST['fecha'];

			$result = $this->padronModel->padron_ingresar($datos);

			if ($result == "success") {
				$data = array(
					'titulo'   => 'Votaciones || Padron', 
					'padron'  => $this->padronModel->get_padron(),
					'persona'    => $this->padronModel->get_persona(),
					'urna' => $this->padronModel->get_urna(),
					'usuario'  => $this->padronModel->get_usuario(),
					'msj'     => "success");
				$this->load->view('templates/header', $data);
				$this->load->view('padron_view');
				$this->load->view('templates/footer');

			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function eliminar($id){
		if ($this->session->userdata('logueado') == TRUE) {
			$msj = $this->padronModel->eliminar($id);
			if ($msj == "successE"){
				$datos['padron'] = $this->padronModel->get_padron();
				$datos['persona'] = $this->padronModel->get_persona();
				$datos['urna'] = $this->padronModel->get_urna();
				$datos['usuario'] = $this->padronModel->get_usuario();
				$datos['titulo'] = 'Votaciones || Padron';      
                  $datos['msj'] = "successE";  //Esto se agrega (no se encuentra en el index)
                  $this->load->view('templates/header', $datos);
                  $this->load->view('padron_view');
                  $this->load->view('templates/footer');
                }else{
                 $datos['padron'] = $this->padronModel->get_padron();
                 $datos['persona'] = $this->padronModel->get_persona();
                 $datos['urna'] = $this->padronModel->get_urna();
                 $datos['usuario'] = $this->padronModel->get_usuario();
                 $datos['titulo'] = 'Votaciones || Padron';           
                  $datos['msj'] = "errorE";  //Esto se agrega (no se encuentra en el index)
                  $this->load->view('templates/header', $datos);
                  $this->load->view('padron_view');
                  $this->load->view('templates/footer');             
                }	
              }else{
               redirect('loginController/index','refresh');
             }	
           }

           public function get_datos($id)
           {	
             if ($this->session->userdata('logueado') == TRUE) {
              $datos['padron'] = $this->padronModel->get_datos(base64_decode($id));
              $datos['persona'] = $this->padronModel->get_persona();
              $datos['urna'] = $this->padronModel->get_urna();
              $datos['usuario'] = $this->padronModel->get_usuario();
              $datos['titulo'] = 'Votaciones || Padron';
              $this->load->view('templates/header',$datos);
              $this->load->view('actualizar_padron');
              $this->load->view('templates/footer');
            }else{
              redirect('loginController/index','refresh');
            }
          }

          public function actualizar(){
           if ($this->session->userdata('logueado') == TRUE) {
            $datos['id'] = $_POST['ide'];
            $datos['urna'] = $_POST['urna1'];
            $datos['dui'] = $_POST['DUI1'];
            $datos['usuario'] = $_POST['usuario1'];
            $datos['FechaHora'] = $_POST['fecha1'];

            $result = $this->padronModel->set_padron($datos);
            if($result == "success"){ 
             $data = array(
              'titulo'   => 'Votaciones || Alumnos', 
              'padron'  => $this->padronModel->get_padron(),
              'persona'    => $this->padronModel->get_persona(),
              'urna' => $this->padronModel->get_urna(),
              'usuario'  => $this->padronModel->get_usuario(),
              'msj'     => "modi");
           }else{
             $data = array(
              'titulo'   => 'Votaciones || Alumnos', 
              'padron'  => $this->padronModel->get_padron(),
              'persona'    => $this->padronModel->get_persona(),
              'urna' => $this->padronModel->get_urna(),
              'usuario'  => $this->padronModel->get_usuario(),
              'msj'     => "ErrorM");

           }

           $this->load->view('templates/header', $data);
           $this->load->view('padron_view');
           $this->load->view('templates/footer');
         }else{
          redirect('loginController/index','refresh');
        }

      }

      public function cancelar($id)
      {
        if ($this->session->userdata('logueado') == TRUE) {
          date_default_timezone_set('America/El_Salvador');
          $date = new DateTime(); // Date object using current date and time
          $dt= $date->format('Y-m-d\TH:i');
          $datos['id'] = $id;
          $datos['usuario'] = $this->session->userdata('id');
          $datos['fechahora'] = $dt;
          $msj = $this->padronModel->cancelar($datos);
          if ($msj == "cancel") {
            $datos['padron'] = $this->padronModel->get_padron();
            $datos['persona'] = $this->padronModel->get_persona();
            $datos['urna'] = $this->padronModel->get_urna();
            $datos['usuario'] = $this->padronModel->get_usuario();
            $datos['titulo'] = 'Votaciones || Padron';
            $datos['msj'] = "cancel";
            $this->load->view('templates/header', $datos);
            $this->load->view('padron_view');
            $this->load->view('templates/footer');
          }else{
            $datos['padron'] = $this->padronModel->get_padron();
            $datos['persona'] = $this->padronModel->get_persona();
            $datos['urna'] = $this->padronModel->get_urna();
            $datos['usuario'] = $this->padronModel->get_usuario();
            $datos['titulo'] = 'Votaciones || Padron';
            $datos['msj'] = "cancel";
            $this->load->view('templates/header', $datos);
            $this->load->view('padron_view');
            $this->load->view('templates/footer');
          }
        }else{
          redirect('loginController/index','refresh');
        }
      }

      public function activar($id)
      {
        if ($this->session->userdata('logueado') == TRUE) {
          date_default_timezone_set('America/El_Salvador');
          $date = new DateTime(); // Date object using current date and time
          $dt= $date->format('Y-m-d\TH:i');
          $datos['id'] = $id;
          $datos['usuario'] = $this->session->userdata('id');
          $datos['fechahora'] = $dt;
          $msj = $this->padronModel->activar($datos);
          if ($msj == "active") {
            $datos['padron'] = $this->padronModel->get_padron();
            $datos['persona'] = $this->padronModel->get_persona();
            $datos['urna'] = $this->padronModel->get_urna();
            $datos['usuario'] = $this->padronModel->get_usuario();
            $datos['titulo'] = 'Votaciones || Padron';
            $datos['msj'] = "active";
            $this->load->view('templates/header', $datos);
            $this->load->view('padron_view');
            $this->load->view('templates/footer');
          }else{
            $datos['padron'] = $this->padronModel->get_padron();
            $datos['persona'] = $this->padronModel->get_persona();
            $datos['urna'] = $this->padronModel->get_urna();
            $datos['usuario'] = $this->padronModel->get_usuario();
            $datos['titulo'] = 'Votaciones || Padron';
            $datos['msj'] = "active";
            $this->load->view('templates/header', $datos);
            $this->load->view('padron_view');
            $this->load->view('templates/footer');
          }
        }else{
          redirect('loginController/index','refresh');
        }
      }
    }
    ?>