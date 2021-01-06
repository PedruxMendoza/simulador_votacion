<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class padronModel extends CI_Model {

	public function get_padron(){
		$this->db->select('p.id_padron,u.id_urnas,u.nombre_urnas,pe.DUI_persona,pe.nombre1,pe.nombre2,pe.nombre3,pe.nombre4,pe.apellido1,pe.apellido2,pe.apellido3,us.id_usuario,p.FechaHora_Mod,pe.id_estadoh');
		$this->db->from('padron p');
		$this->db->join('urnas u','u.id_urnas = p.id_urnas', 'left');
		$this->db->join('persona pe', 'pe.DUI_persona = p.DUI_persona', 'left');
		$this->db->join('usuario us', 'us.id_usuario = p.id_usuario', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_urna(){

		$query = $this->db->get('urnas');
		return $query->result();
	}

	public function get_persona(){
		$query = $this->db->get('persona');
		return $query->result();
	}

	public function get_usuario(){
		$query = $this->db->get('usuario');
		return $query->result();
	}
	

	public function padron_ingresar($datos){

		$this->db->set('id_urnas', $datos['urna']);
		$this->db->set('DUI_persona', $datos['dui']);
		$this->db->set('id_usuario',"NULL", FALSE);
		$this->db->set('FechaHora_Mod', $datos['FechaHora']);
		$this->db->insert('padron');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}
	}


	public function eliminar($id){
		$this->db->where('id_padron', $id);
		$this->db->delete('padron');

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}

	}

	public function get_datos($id){
		$this->db->where('id_padron',$id);
		$query = $this->db->get('padron');
		return $query->result();
	}

	public function set_padron($datos){
		$this->db->set('id_urnas', $datos['urna']);
		$this->db->set('DUI_persona', $datos['dui']);
		$this->db->set('id_usuario',"NULL", FALSE);
		$this->db->set('FechaHora_Mod', $datos['FechaHora']);
		$this->db->where('id_padron', $datos['id']);
		$this->db->update('padron');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}

	}

	public function cancelar($datos){
		$this->db->select('DUI_persona');
		$this->db->where('id_padron', $datos['id']);
		$this->db->from('padron');
		$exe = $this->db->get();

		foreach ($exe->result() as $votante) {
			$DUI = $votante->DUI_persona;
		}

		$this->db->set('id_estadoh', 2);
		$this->db->where('DUI_persona', $DUI);
		$this->db->update('persona');

		if ($this->db->affected_rows() > 0) {
			$this->db->set('id_usuario', $datos['usuario']);
			$this->db->set('FechaHora_Mod', $datos['fechahora']);
			$this->db->where('id_padron', $datos['id']);
			$this->db->update('padron');

			if ($this->db->affected_rows() > 0) {
				return 'cancel';
			}else{
				return 'errorC';
			}
		}
	}

	public function activar($datos){
		$this->db->select('DUI_persona');
		$this->db->where('id_padron', $datos['id']);
		$this->db->from('padron');
		$exe = $this->db->get();

		foreach ($exe->result() as $votante) {
			$DUI = $votante->DUI_persona;
		}

		$this->db->set('id_estadoh', 1);
		$this->db->where('DUI_persona', $DUI);
		$this->db->update('persona');

		if ($this->db->affected_rows() > 0) {
			$this->db->set('id_usuario', $datos['usuario']);
			$this->db->set('FechaHora_Mod', $datos['fechahora']);
			$this->db->where('id_padron', $datos['id']);
			$this->db->update('padron');

			if ($this->db->affected_rows() > 0) {
				return 'active';
			}else{
				return 'errorA';
			}
		}
	}
}
?>