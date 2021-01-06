<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class candidatos_model extends CI_Model {


	public function get_candidato(){
		$this->db->select('c.id_candidato, p.nombre_partido, pe.nombre1, pe.nombre2, pe.apellido1, pe.apellido2');
		$this->db->from('partido_politico p');
		$this->db->join('candidatos c','c.id_candidato = p.id_candidato');	
		$this->db->join('persona pe','pe.DUI_persona = c.DUI_persona');		
		$exe = $this->db->get();
		return $exe->result();
	}
	public function get_persona(){		
		$exe = $this->db->get('persona');
		return $exe->result();
	}
	public function set_candidato($datos){
		
		$this->db->set('DUI_persona',     $datos['DUI_persona']);
		$this->db->insert('candidatos');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}
		
	}
	public function eliminar($id){
		$this->db->where('id_candidato',$id);
		return ($this->db->delete('candidatos'));
	}

	public function get_datos($id){
		$this->db->where('id_candidato',$id);
		$exe = $this->db->get('candidatos');
		return $exe->result();
	}

	public function actualizar($datos){
		$this->db->set('DUI_persona',    $datos['DUI_persona']);
		$this->db->where('id_candidato', $datos['id_candidato']);
		$this->db->update('candidatos');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}
	}
}

?>