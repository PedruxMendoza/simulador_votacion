<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class partido_controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('partido_model');
	}
	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
		$datos['partido_politico']  = $this->partido_model->get_partido();
		$datos['votacion']  = $this->partido_model->get_votacion();
		$datos['candidato']  = $this->partido_model->get_candidato();
		$datos['titulo'] = 'Votaciones || Partido Politico';
		$this->load->view('templates/header', $datos);
		$this->load->view('partido_view');
		$this->load->view('templates/footer');
		}else{
			redirect('loginController/index','refresh');
		}
	}
	public function ingresar(){
		if ($this->session->userdata('logueado') == TRUE) {
		$limite_kb = 200;

		if ($_FILES["img"]["size"] <= $limite_kb * 1024) { 
			$datos['nombre_partido']     = $_POST['nombre_partido'];
			$img =$_FILES["img"]["name"];
			$ruta =$_FILES["img"]["tmp_name"];
			mkdir("props/partido/".$datos["nombre_partido"]);
			$destino = "props/partido/".$datos["nombre_partido"]."/".$img;
			copy($ruta,$destino);

			$datos["foto"] = $img;
			$datos["ruta"] = $destino;

			$datos['votacion']   = $_POST['votacion'];
			$datos['persona']   = $_POST['persona'];

			$result = $this->partido_model->set_partido($datos);
			if ($result == "success") {
		$datos['partido_politico']  = $this->partido_model->get_partido();
		$datos['votacion']  = $this->partido_model->get_votacion();
		$datos['candidato']  = $this->partido_model->get_candidato();
		$datos['titulo'] = 'Votaciones || Partido Politico';
                  $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index);
		$this->load->view('templates/header', $datos);
		$this->load->view('partido_view');
		$this->load->view('templates/footer');
            }
			
		}else{
				$data = array(
					'titulo' => 'Votación || Personas',
					'persona' => $this->persona_model->get_persona(),
					'estado' => $this->persona_model->get_estado(),
					'estadop' => $this->persona_model->get_estado_persona(),
					'sexo' => $this->persona_model->get_sexo(),
					'municipio' => $this->persona_model->get_municipio(),
					'departamento' => $this->persona_model->get_departamento(),
					'msj' => "seterror");

				$this->load->view('templates/header',$data);
				$this->load->view('persona_view');
				$this->load->view('templates/footer');
		}
		}else{
			redirect('loginController/index','refresh');
		}
	}
		public function eliminar($id){
		if ($this->session->userdata('logueado') == TRUE) {
			$msj = $this->partido_model->eliminar($id);
			if ($msj == "successE") 
                  {
		$datos['partido_politico']  = $this->partido_model->get_partido();
		$datos['votacion']  = $this->partido_model->get_votacion();
		$datos['candidato']  = $this->partido_model->get_candidato();
		$datos['titulo'] = 'Votaciones || Partido Politico';     
                  $datos['msj'] = "successE";  //Esto se agrega (no se encuentra en el index)
		$this->load->view('templates/header', $datos);
		$this->load->view('partido_view');
		$this->load->view('templates/footer');
              }else{
		$datos['partido_politico']  = $this->partido_model->get_partido();
		$datos['votacion']  = $this->partido_model->get_votacion();
		$datos['candidato']  = $this->partido_model->get_candidato();
		$datos['titulo'] = 'Votaciones || Partido Politico';           
                  $datos['msj'] = "errorE";  //Esto se agrega (no se encuentra en el index)
		$this->load->view('templates/header', $datos);
		$this->load->view('partido_view');
		$this->load->view('templates/footer');              
              }
		}else{
			redirect('loginController/index','refresh');
		}
		}
		public function get_datos($id){
			$datos['partido_politico']  = $this->partido_model->get_datos($id);
			$datos['descripcion']   = $this->partido_model->get_votacion($id);
			$datos['persona']   =  $this->partido_model->get_persona($id);
		$this->load->view('partido_view',$datos);
		}
	public function actualizar(){
		$datos['id_partido']  = $_POST['id_partido'];
		$datos['nombre_partido']      =$_POST['nombre_partido'];
		$datos['imagen']      =$_POST['imagen'];
		$datos['descripcion']   = $_POST['descripcion'];
		$datos["DUI_persona"]   = $_POST["DUI_persona"];
		$this->partido_model->actualizar($datos);
		redirect('/partido_controller/index','refresh');
	}
}
?>