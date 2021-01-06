<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarioController extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('usuarioModel');
	}

	public function index()
	{
        if ($this->session->userdata('logueado') == TRUE) {
        $datos['votacion'] = $this->usuarioModel->get_usuario();
        $datos['dui'] = $this->usuarioModel->get_dui();
        $datos['rol'] = $this->usuarioModel->get_rol();
        $datos['titulo'] = 'Elecciones || Usuario';
        $this->load->view('templates/header', $datos);
        $this->load->view('usuario_view');
        $this->load->view('templates/footer');
        }else{
            redirect('loginController/index','refresh');
        }
	}

	public function ingresar(){
        if ($this->session->userdata('logueado') == TRUE) {
        $datos['email'] = $_POST['email'];
        $datos['clave'] = $_POST['clave'];
        $datos['dui'] = $_POST['s1'];
        $datos['rol'] = $_POST['s2'];

        $result = $this->usuarioModel->usu_ingresar($datos);

        if ($result == 'success') {
            $data = array(
                'titulo'   => 'Elecciones || Usuario', 
                'votacion'  => $this->usuarioModel->get_usuario(),
                'dui'    => $this->usuarioModel->get_dui(),
                'rol' => $this->usuarioModel->get_rol(),
                'msj'     => "success");}

            $this->load->view('templates/header', $data);
            $this->load->view('usuario_view');
            $this->load->view('templates/footer');
        }else{
            redirect('loginController/index','refresh');
        }			
			
		}

		public function eliminar($id){
        if ($this->session->userdata('logueado') == TRUE) {
            $msj = $this->usuarioModel->eliminar($id);
            if ($msj == "successE") 
            {
                $datos['votacion'] = $this->usuarioModel->get_usuario();
                $datos['dui'] = $this->usuarioModel->get_dui();
                $datos['rol'] = $this->usuarioModel->get_rol();
                $datos['titulo'] = 'Elecciones || Usuario';       
                $datos['msj'] = "successE";  //Esto se agrega (no se encuentra en el index)
                $this->load->view('templates/header', $datos);
                $this->load->view('usuario_view');
                $this->load->view('templates/footer');
            }else{
                $datos['votacion'] = $this->usuarioModel->get_usuario();
                $datos['dui'] = $this->usuarioModel->get_dui();
                $datos['rol'] = $this->usuarioModel->get_rol();
                $datos['titulo'] = 'Elecciones || Usuario';           
                $datos['msj'] = "errorE";  //Esto se agrega (no se encuentra en el index)
                $this->load->view('templates/header', $datos);
                $this->load->view('usuario_view');
                $this->load->view('templates/footer');              
            }
        }else{
            redirect('loginController/index','refresh');
        }			
        }

        public function get_datos($id)
        {

        if ($this->session->userdata('logueado') == TRUE) {
            $datos['votacion'] = $this->usuarioModel->get_datos(base64_decode($id));
            $datos['dui'] = $this->usuarioModel->get_dui();
            $datos['rol'] = $this->usuarioModel->get_rol();
            $datos['titulo'] = 'Elecciones || Usuario';
            $this->load->view('templates/header', $datos);
            $this->load->view('actualizar_usuario');
            $this->load->view('templates/footer');
        }else{
            redirect('loginController/index','refresh');
        }
        }

        public function actualizar(){
        if ($this->session->userdata('logueado') == TRUE) {
            $datos['id'] = $_POST['ide'];
            $datos['email'] = $_POST['correo'];
            $datos['rol'] = $_POST['s22'];

            $result = $this->usuarioModel->set_usuario($datos);
            if($result == 'success'){ 
                $data = array(
                    'titulo'   => 'Elecciones || Usuario', 
                    'votacion'  => $this->usuarioModel->get_usuario(),
                    'dui'    => $this->usuarioModel->get_dui(),
                    'rol' => $this->usuarioModel->get_rol(),
                    'msj'     => "modi");
            }else{
                $data = array(

                    'titulo'   => 'Elecciones || Usuario', 
                    'votacion'  => $this->usuarioModel->get_usuario(),
                    'dui'    => $this->usuarioModel->get_dui(),
                    'rol' => $this->usuarioModel->get_rol(),
                    'msj'     => "ErrorM");

            }

            $this->load->view('templates/header', $data);
            $this->load->view('usuario_view');
            $this->load->view('templates/footer');
        }else{
            redirect('loginController/index','refresh');
        }

        }
    }
    ?>