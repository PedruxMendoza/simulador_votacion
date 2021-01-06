<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

	public function validar($datos){
		//validamos que el usuario y la clave enviada pertenezcan al usuario
		$this->db->select('u.id_usuario, p.nombre1, p.apellido1, u.id_rol');
		$this->db->from('usuario u');
		$this->db->join('persona p','p.DUI_persona = u.DUI_persona');
		$this->db->where('correo',$datos['correo']);
		$this->db->where('clave',$datos['clave']);
		$exe = $this->db->get();

		if ($this->db->affected_rows() > 0) {
			return $exe->row();
		}else{
			return false;
		}

	}

	public function change_pass($datos)
	{
		$this->db->set('clave',$datos['newclave']);
		$this->db->where('id_usuario',$datos['usuario']);
		$this->db->where('clave',$datos['clave']);
		$this->db->update('usuario');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}else{
			return 'ErrorCP';
		}
	}

}

?>