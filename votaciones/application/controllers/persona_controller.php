<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class persona_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('persona_model');
	}

	public function index(){
		if ($this->session->userdata('logueado') == TRUE) {
			$data = array(
				'titulo' => 'Votación || Personas',
				'persona' => $this->persona_model->get_persona(),
				'estado' => $this->persona_model->get_estado(),
				'estadop' => $this->persona_model->get_estado_persona(),
				'sexo' => $this->persona_model->get_sexo(),
				'municipio' => $this->persona_model->get_municipio(),
				'departamento' => $this->persona_model->get_departamento());

			$this->load->view('templates/header',$data);
			$this->load->view('persona_view');
			$this->load->view('templates/footer');
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function eliminar($id){
		if ($this->session->userdata('logueado') == TRUE) {
			foreach ($this->persona_model->get_datos($id) as $k){
				unlink($k->foto);
				rmdir("props/persona/".$k->DUI_persona);
			}

			$msj = $this->persona_model->eliminar($id);
			if ($msj == "successE") 
			{
				$data = array(
					'titulo' => 'Votación || Personas',
					'persona' => $this->persona_model->get_persona(),
					'estado' => $this->persona_model->get_estado(),
					'estadop' => $this->persona_model->get_estado_persona(),
					'sexo' => $this->persona_model->get_sexo(),
					'municipio' => $this->persona_model->get_municipio(),
					'departamento' => $this->persona_model->get_departamento(),
					'msj' => "successE");
				$this->load->view('templates/header',$data);
				$this->load->view('persona_view');
				$this->load->view('templates/footer');
			}else{
				$data = array(
					'titulo' => 'Votación || Personas',
					'persona' => $this->persona_model->get_persona(),
					'estado' => $this->persona_model->get_estado(),
					'estadop' => $this->persona_model->get_estado_persona(),
					'sexo' => $this->persona_model->get_sexo(),
					'municipio' => $this->persona_model->get_municipio(),
					'departamento' => $this->persona_model->get_departamento(),
					'msj' => "errorE");
				$this->load->view('templates/header',$data);
				$this->load->view('persona_view');
				$this->load->view('templates/footer');              
			}
		}else{
			redirect('loginController/index','refresh');
		}
	}

	public function ingresar(){
		if ($this->session->userdata('logueado') == TRUE) {
			$limite_kb = 200;

			if ($_FILES["img"]["size"] <= $limite_kb * 1024){

				$datos["DUI_persona"] = $_POST["DUI_persona"];
				$datos["nombre1"] = $_POST["nombre1"];
				$datos["nombre2"] = $_POST["nombre2"];
				$datos["nombre3"] = $_POST["nombre3"];
				$datos["nombre4"] = $_POST["nombre4"];
				$datos["apellido1"] = $_POST["apellido1"];
				$datos["apellido2"] = $_POST["apellido2"];
				$datos["apellido3"] = $_POST["apellido3"];
				$datos["telefono"] = $_POST["telefono"]; 
				$datos["direccion"] = $_POST["direccion"]; 
				$datos["fnacimiento"] = $_POST["fnacimiento"]; 
				$fa = date("Y-m-d"); 
				$fe = date("Y-m-d", strtotime('+ 8 years'));
				$datos["estado"] = $_POST["estado"];
				$datos["estadop"] = $_POST["estadop"];
				$datos["sexo"] = $_POST["sexo"]; 
				$datos["municipio"] = $_POST["municipio"];


				$img =$_FILES["img"]["name"];
				$ruta =$_FILES["img"]["tmp_name"];
				mkdir("props/persona/".$datos["DUI_persona"]);
				$destino = "props/persona/".$datos["DUI_persona"]."/".$img;
				copy($ruta,$destino);

				
				$datos["ruta"] = $destino;


				$result = $this->persona_model->set_persona($datos, $fa, $fe);
				if ($result == 'set'){
					$data = array(
						'titulo' => 'Votación || Personas',
						'persona' => $this->persona_model->get_persona(),
						'estado' => $this->persona_model->get_estado(),
						'estadop' => $this->persona_model->get_estado_persona(),
						'sexo' => $this->persona_model->get_sexo(),
						'municipio' => $this->persona_model->get_municipio(),
						'departamento' => $this->persona_model->get_departamento(),
						'msj' => "set");

					$this->load->view('templates/header',$data);
					$this->load->view('persona_view');
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

	public function get_datos($id){
		if ($this->session->userdata('logueado') == TRUE) {
			$data = array(
				'titulo' => 'Votación || Personas',
				'persona' => $this->persona_model->get_datos(base64_decode($id)),
				'estado' => $this->persona_model->get_estado(),
				'estadop' => $this->persona_model->get_estado_persona(),
				'sexo' => $this->persona_model->get_sexo(),
				'municipio' => $this->persona_model->get_municipio(),
				'departamento' => $this->persona_model->get_departamento());

			$this->load->view('templates/header',$data);
			$this->load->view('persona_viewact');
			$this->load->view('templates/footer');
		}else{
			redirect('loginController/index','refresh');
		}		
	}

	public function actualizar(){

		if ($_FILES["img"]["name"] == ""){

			$datos["DUI_persona"] = $_POST["DUI_persona"];
			$datos["nombre1"] = $_POST["nombre1"];
			$datos["nombre2"] = $_POST["nombre2"];
			$datos["nombre3"] = $_POST["nombre3"];
			$datos["nombre4"] = $_POST["nombre4"];
			$datos["apellido1"] = $_POST["apellido1"];
			$datos["apellido2"] = $_POST["apellido2"];
			$datos["apellido3"] = $_POST["apellido3"];
			$datos["telefono"] = $_POST["telefono"]; 
			$datos["direccion"] = $_POST["direccion"]; 
			$datos["fnacimiento"] = $_POST["fnacimiento"]; 
			$fa = date("Y-m-d"); 
			$fe = date("Y-m-d", strtotime('+ 8 years'));
			$datos["estado"] = $_POST["estado"];
			$datos["estadop"] = $_POST["estadop"]; 
			$datos["sexo"] = $_POST["sexo"]; 
			$datos["municipio"] = $_POST["municipio"];
			$datos["ruta"] = "n";

			$result = $this->persona_model->act_persona($datos, $fa, $fe);

			if ($result == 'act'){
				$data = array(
					'titulo' => 'Votación || Personas',
					'persona' => $this->persona_model->get_persona(),
					'estado' => $this->persona_model->get_estado(),
					'estadop' => $this->persona_model->get_estado_persona(),
					'sexo' => $this->persona_model->get_sexo(),
					'municipio' => $this->persona_model->get_municipio(),
					'departamento' => $this->persona_model->get_departamento(),
					'msj' => 'act');

				$this->load->view('templates/header',$data);
				$this->load->view('persona_view');
				$this->load->view('templates/footer');
			}else{
				$data = array(
					'titulo' => 'Votación || Personas',
					'persona' => $this->persona_model->get_persona(),
					'estado' => $this->persona_model->get_estado(),
					'estadop' => $this->persona_model->get_estado_persona(),
					'sexo' => $this->persona_model->get_sexo(),
					'municipio' => $this->persona_model->get_municipio(),
					'departamento' => $this->persona_model->get_departamento(),
					'msj' => 'noact');

				$this->load->view('templates/header',$data);
				$this->load->view('persona_view');
				$this->load->view('templates/footer');
			}
			
		}else{
			foreach ($this->persona_model->get_datos($_POST["DUI_persona"]) as $k) {
				unlink($k->foto);
			}


			$limite_kb = 200;

			if ($_FILES["img"]["size"] <= $limite_kb * 1024){

				$datos["DUI_persona"] = $_POST["DUI_persona"];
				$datos["nombre1"] = $_POST["nombre1"];
				$datos["nombre2"] = $_POST["nombre2"];
				$datos["nombre3"] = $_POST["nombre3"];
				$datos["nombre4"] = $_POST["nombre4"];
				$datos["apellido1"] = $_POST["apellido1"];
				$datos["apellido2"] = $_POST["apellido2"];
				$datos["apellido3"] = $_POST["apellido3"];
				$datos["telefono"] = $_POST["telefono"]; 
				$datos["direccion"] = $_POST["direccion"]; 
				$datos["fnacimiento"] = $_POST["fnacimiento"]; 
				$fa = date("Y-m-d"); 
				$fe = date("Y-m-d", strtotime('+ 8 years'));
				$datos["estado"] = $_POST["estado"];
				$datos["estadop"] = $_POST["estadop"]; 
				$datos["sexo"] = $_POST["sexo"]; 
				$datos["municipio"] = $_POST["municipio"];

				$img =$_FILES["img"]["name"];
				$ruta =$_FILES["img"]["tmp_name"];
				$destino = "props/persona/".$datos["DUI_persona"]."/".$img;
				copy($ruta,$destino);

				$datos["ruta"] = $destino;

				$result = $this->persona_model->act_persona($datos, $fa, $fe);

				if ($result == 'act'){
					$data = array(
						'titulo' => 'Votación || Personas',
						'persona' => $this->persona_model->get_persona(),
						'estado' => $this->persona_model->get_estado(),
						'estadop' => $this->persona_model->get_estado_persona(),
						'sexo' => $this->persona_model->get_sexo(),
						'municipio' => $this->persona_model->get_municipio(),
						'departamento' => $this->persona_model->get_departamento(),
						'msj' => 'act');

					$this->load->view('templates/header',$data);
					$this->load->view('persona_view');
					$this->load->view('templates/footer');
				}else{
					$data = array(
						'titulo' => 'Votación || Personas',
						'persona' => $this->persona_model->get_persona(),
						'estado' => $this->persona_model->get_estado(),
						'estadop' => $this->persona_model->get_estado_persona(),
						'sexo' => $this->persona_model->get_sexo(),
						'municipio' => $this->persona_model->get_municipio(),
						'departamento' => $this->persona_model->get_departamento(),
						'msj' => 'noact');

					$this->load->view('templates/header',$data);
					$this->load->view('persona_view');
					$this->load->view('templates/footer');
				}
			}
		}
	}


}//Fin de la clase

?>