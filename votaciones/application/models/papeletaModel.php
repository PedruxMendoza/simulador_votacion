<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class papeletaModel extends CI_Model {

	public function get_partido(){
		$query = $this->db->get('partido_politico');
		return $query->result(); 
	}

	public function get_candidato(){
		$query = $this->db->get('candidatos');
		return $query->result(); 
	}

	public function get_votacion(){
		$query = $this->db->get('votacion');
		return $query->result(); 
	}

	public function return_candidato($id, $votacion){
		$this->db->select('id_candidato');
		$this->db->where('id_partido',$id);
		$this->db->where('id_votacion',$votacion);
		$query = $this->db->get('partido_politico');

		foreach ($query->result() as $candidatos) {
			$id = $candidatos->id_candidato;
		}
		return $id;
	}

	public function set_papeleta($id){
		$this->db->select('Votos');
		$this->db->where('id_partido',$id);
		$a = $this->db->get('partido_politico');

		foreach ($a->result() as $c) {
			$this->db->where('id_partido',$id);
			$this->db->set('Votos', $c->Votos+1);
			$this->db->update('partido_politico');

			if ($this->db->affected_rows() > 0) {
				return 'success';
			}
		}
		
		

		
		}

	}
