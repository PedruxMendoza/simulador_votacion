<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uv_model extends CI_Model {

	public function get_urnas_votacion(){
		$this->db->select('u.id_UV, v.descripcion, e.nombre_estado, v.fecha_inicio, v.fecha_final, ur.id_urnas, ur.nombre_urnas, s.nombre_sede, m.nombre_municipio, d.nombre');
		$this->db->from('urnas_votacion u');
		$this->db->join('votacion v','v.id_votacion = u.id_votacion');
		$this->db->join('estado_votacion e','e.id_estado = v.id_estado');
		$this->db->join('urnas ur','ur.id_urnas = u.id_urnas');
		$this->db->join('sede s','s.id_sede = ur.id_sede');
		$this->db->join('municipio m','m.id_municipio = s.id_municipio');
		$this->db->join('departamento d','d.id_departamento = m.id_departamento');
		$exe = $this->db->get();
		return $exe->result();
	}
	public function eliminar($id){
		$this->db->where('id_UV',$id);
		$this->db->delete('urnas_votacion');

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}
	}
	public function get_votacion(){		
		$exe = $this->db->get('votacion');
		return $exe->result();
	}
	public function get_urnas(){		
		$exe = $this->db->get('urnas');
		return $exe->result();
	}
	public function set_votacion_urnas($datos){
		$this->db->set('id_votacion',      $datos['votacion']);
		$this->db->set('id_urnas',    $datos['urnas']);
		$this->db->insert('urnas_votacion');

		if ($this->db->affected_rows() > 0) {
			return 'set';
		}
	}
	
}//Fin clase

?>