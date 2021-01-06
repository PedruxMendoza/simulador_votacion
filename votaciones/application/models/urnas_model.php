<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class urnas_model extends CI_Model{

	public function get_urnas(){
		$this->db->SELECT('u.id_urnas,u.nombre_urnas,s.nombre_sede');
		$this->db->FROM('urnas u');
		$this->db->JOIN('sede s','s.id_sede = u.id_sede');
		//$this->db->ORDERBY('DESC');

		$exe = $this->db->get();

		return $exe->result();
	}

	public function eliminar($id){
		$this->db->where('id_urnas',$id);
		$this->db->delete('urnas');

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}
	}

	public function get_sede(){
		$exe = $this->db->get('sede');
		return $exe->result();
	}
	public function insertar($datos){
		$this->db->set('id_urnas', $datos['id_urnas']);
		$this->db->set('nombre_urnas', $datos['nombre_urnas']);
		$this->db->set('id_sede', $datos['sede']);
		$this->db->insert('urnas');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}
	}

	public function get_datos($id){
		$this->db->where('id_urnas',$id);
		$exe = $this->db->get('urnas');
		return $exe->result();
	}
	public function actualizar($datos){
		
		$this->db->set('nombre_urnas', $datos['nombre_urnas']);
		$this->db->set('id_sede', $datos['sede']);
		$this->db->where('id_urnas',$datos['id_urnas']);
		$this->db->update('urnas');
		if ($this->db->affected_rows() > 0) {
			return 'modi';
		}
	}

}
?>