<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class sede_model extends CI_Model{

	public function get_sede(){
		$this->db->SELECT(' s.id_sede,s.nombre_sede,s.direccion,m.nombre_municipio');
		$this->db->FROM('sede s');
		$this->db->JOIN('municipio m','m.id_municipio = s.id_municipio');

		$exe = $this->db->get();

		return $exe->result();
	}
	public function eliminar($id){
		$this->db->where('id_sede',$id);
		$this->db->delete('sede');

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}
	}

	public function get_municipio(){
		$exe = $this->db->get('municipio');
		return $exe->result();
	}

	public function insertar($datos){
		$this->db->set('nombre_sede', $datos['nombre_sede']);
		$this->db->set('direccion', $datos['direccion']);
		$this->db->set('id_municipio', $datos['nombre_municipio']);
		$this->db->insert('sede');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}
	}

	public function get_datos($id){
		$this->db->where('id_sede',$id);
		$exe = $this->db->get('sede');
		return $exe->result();
	}

	public function actualizar($datos){
		$this->db->set('nombre_sede', $datos['nombre_sede']);
		$this->db->set('direccion', $datos['direccion']);
		$this->db->set('id_municipio', $datos['nombre_municipio']);
		$this->db->where('id_sede', $datos['id']);
		$this->db->update('sede');

		if ($this->db->affected_rows() > 0) {
			return 'modi';
		}
	}
}

?>