<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class votacion_model extends CI_Model {

	public function get_votacion()
	{
		$this->db->select('v.descripcion, v.fecha_inicio, v.fecha_final, v.cantidadvotos, ev.nombre_estado, v.id_votacion, v.id_estado');
		$this->db->from('votacion v');
		$this->db->join('estado_votacion ev', 'ev.id_estado = v.id_estado');

		$exe = $this->db->get();

		return $exe->result();
	}

	public function eliminar($id)
	{
		$this->db->where('id_votacion', $id);
		$this->db->delete('votacion');

/*		$errors = $this->db->error();

		if($errors == 1451)
		{
			return 'errorE';
		}else{
			return 'successE';
		}*/

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}

	}

	public function get_estado()
	{
		$this->db->where('id_estado', 1);
		$exe = $this->db->get('estado_votacion');
		return $exe->result();		
	}

	public function get_all_estado()
	{
		$exe = $this->db->get('estado_votacion');
		return $exe->result();		
	}

	public function guardar($datos)
	{
		$this->db->set('descripcion',$datos["descripcion"]);
		$this->db->set('fecha_inicio',$datos["finicial"]);
		$this->db->set('fecha_final',$datos["ffinal"]);
		$this->db->set('cantidadvotos',$datos["cantvoto"]);
		$this->db->set('id_estado',$datos["estado"]);
		$this->db->insert('votacion');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}
	}

	public function get_datos($id)
	{
		$this->db->where('id_votacion', $id);
		$exe = $this->db->get('votacion');
		return $exe->result();
	}

	public function actualizar($datos)
	{
		$this->db->set('descripcion',$datos["descripcion"]);
		$this->db->set('fecha_inicio',$datos["finicial"]);
		$this->db->set('fecha_final',$datos["ffinal"]);
		$this->db->set('cantidadvotos',$datos["cantvoto"]);
		$this->db->set('id_estado',$datos["estado"]);
		$this->db->where('id_votacion',$datos["id"]);
		$this->db->update('votacion');

		if ($this->db->affected_rows() > 0) {
			return 'modi';
		}
	}

	public function cancelar($id){
		$this->db->set('id_estado',2);
		$this->db->where('id_votacion', $id);
		$this->db->update('votacion');

		if ($this->db->affected_rows() > 0) {
			return 'cancel';
		}
	}

	public function activar($id){
		$this->db->set('id_estado',1);
		$this->db->where('id_votacion', $id);
		$this->db->update('votacion');

		if ($this->db->affected_rows() > 0) {
			return 'active';
		}
	}
}
