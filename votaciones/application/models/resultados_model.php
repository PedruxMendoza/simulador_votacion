<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class resultados_model extends CI_Model {

	public function get_partido(){
		$this->db->select('nombre_partido, Votos');
		$this->db->from('partido_politico');
		$query = $this->db->get();
		return $query->result(); 
	}
	
}