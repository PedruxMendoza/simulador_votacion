<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarioModel extends CI_Model {

	public function get_usuario(){
		$this->db->select('u.id_usuario,u.correo,u.clave,p.DUI_persona,r.nombre_rol');
		$this->db->from('usuario u');
		$this->db->join('persona p', 'p.DUI_persona = u.DUI_persona');
		$this->db->join('rol r','r.id_rol = u.id_rol');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_dui(){

		$query = $this->db->get('persona');
		return $query->result();
	}

	public function get_rol(){
		$query = $this->db->get('rol');
		return $query->result();
	}

	

	public function usu_ingresar($datos){

		$this->db->set('correo', $datos['email']);
		$this->db->set('clave', md5($datos['clave']));
		$this->db->set('DUI_persona', $datos['dui']);
		$this->db->set('id_rol', $datos['rol']);
		$this->db->insert('usuario');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}
	}


	public function eliminar($id){
		$this->db->where('id_usuario', $id);
		$this->db->delete('usuario');

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}

	}

	public function get_datos($id){
		$this->db->where('id_usuario',$id);
		$query = $this->db->get('usuario');
		return $query->result();
	}

	public function set_usuario($datos){
		$this->db->set('correo', $datos['email']);
		$this->db->set('id_rol', $datos['rol']);
		$this->db->where('id_usuario', $datos['id']);
		$this->db->update('usuario');
		
		if ($this->db->affected_rows() > 0) {
			return 'success';
		}

	}
}
?>