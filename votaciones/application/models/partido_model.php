<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class partido_model extends CI_Model {


	public function get_partido(){

		$this->db->select('p.id_partido, p.nombre_partido, p.imagen, p.img, v.descripcion, pe.nombre1, pe.nombre2, pe.apellido1, pe.apellido2');
		$this->db->from('partido_politico p');
		$this->db->join('votacion v','v.id_votacion = p.id_votacion');
		$this->db->join('candidatos c','c.id_candidato = p.id_candidato');
		$this->db->join('persona pe','pe.DUI_persona = c.DUI_persona');
		$exe = $this->db->get();
		return $exe->result();
	}
	public function get_votacion(){		
		$exe = $this->db->get('votacion');
		return $exe->result();
	}
	public function get_candidato(){
		$this->db->select('c.id_candidato, pe.DUI_persona,  pe.nombre1, pe.nombre2, pe.apellido1, pe.apellido2');
		$this->db->from('candidatos c');
		$this->db->join('persona pe','pe.DUI_persona = c.DUI_persona');		
		$exe = $this->db->get();
		return $exe->result();
	}
	public function set_partido($datos){
		$datos['nombre_partido'];
		$datos['foto'];
		$datos['ruta'];

		$this->db->set('nombre_partido', $datos['nombre_partido']);
		$this->db->set('imagen', $datos["foto"]);
		$this->db->set('img',   $datos['ruta']);
		$this->db->set('id_votacion', $datos['votacion']);
		$this->db->set('id_candidato', $datos['persona']);
		$this->db->insert('partido_politico');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}
	}
	public function eliminar($id){
		$this->db->where('id_partido',$id);
		$this->db->delete('partido_politico');

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}
	}
	public function get_datos($id){
		$datos['partido_politico']  = $this->partido_model->get_datos($id);
		$this->load->view('partidoact_view',$datos);
		return $exe->result();

	}
	public function actualizar(){
		$datos['id_partido']   = $_POST['id_partido'];
		$datos['nombre']        =$_POST['nombre_partido'];
		$datos['imagen']          =$_POST['imagen'];
		$datos['descripcion']   = $_POST['descripcion'];
		$datos['nombre1']   = $_POST['nombre1'];
		$datos['nombre2']   = $_POST['nombre2'];
		$datos['apellido1']   = $_POST['apellido1'];
		$datos['apellido2']   = $_POST['apellido2'];


		$this->db->update('partido_politico');

	}
}