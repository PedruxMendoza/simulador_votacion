<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginV_model extends CI_Model {

	public function validar($datos){
		//validamos que el usuario y la clave enviada pertenezcan al usuario
		$this->db->select('p.DUI_persona, p.nombre1, p.apellido1, p.fexpiracion ,p.id_estadoh, dv.id_voto, uv.id_votacion, pa.id_padron, us.id_rol');
		$this->db->from('persona p');
		$this->db->join('detalles_votacion dv','dv.DUI_persona = p.DUI_persona','left');
		$this->db->join('padron pa','pa.DUI_persona = p.DUI_persona','left');
		$this->db->join('urnas u','u.id_urnas = pa.id_urnas','left');
		$this->db->join('urnas_votacion uv','uv.id_urnas = u.id_urnas','left');
		$this->db->join('usuario us','us.DUI_persona = p.DUI_persona','left');
		$this->db->where('p.DUI_persona',$datos['DUI']);
		$exe = $this->db->get();

		if ($this->db->affected_rows() > 0) {
			return $exe->row();
		}else{
			return false;
		}

	}
}
