<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DV_model extends CI_Model {

	public function get_DV()
	{
		$this->db->select("dv.FechaHora, v.descripcion, CONCAT(p.nombre1, ' ',p.nombre2, ' ',p.apellido1,' ',p.apellido2, ' ---> ', p.DUI_persona) as persona,CONCAT(pc.nombre1, ' ',pc.nombre2, ' ',pc.apellido1,' ',pc.apellido2) as candidatos, pp.nombre_partido, ev.descripcion as estado, dv.id_DV");
		$this->db->from('detalles_votacion dv');
		$this->db->join('votacion v','dv.id_votacion = v.id_votacion','left');
		$this->db->join('persona p','dv.DUI_persona = p.DUI_persona','left');
		$this->db->join('candidatos c','c.id_candidato = dv.id_candidato','left');
		$this->db->join('persona pc','pc.DUI_persona = c.DUI_persona','left');
		$this->db->join('partido_politico pp','pp.id_candidato = c.id_candidato','left');
		$this->db->join('estado_voto ev','ev.id_voto = dv.id_voto','left');

		$exe = $this->db->get();

		return $exe->result();
	}

	public function eliminar($id)
	{
		$this->db->where('id_DV', $id);
		$this->db->delete('detalles_votacion');

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}
	}

	public function get_votacion()
	{
		$exe = $this->db->get('votacion');
		return $exe->result();	
	}

	public function get_personas()
	{
		$this->db->select('p.DUI_persona, p.nombre1, p.nombre2, p.apellido1, p.apellido2, id_estadoh');
		$this->db->from('persona p');
		$this->db->where('id_estadoh', 1);
		$exe = $this->db->get();

		return $exe->result();
	}

	public function get_all_personas()
	{
		$exe = $this->db->get('persona');
		return $exe->result();	
	}

	public function get_candidatos()
	{
		$this->db->select('c.id_candidato, pp.id_votacion, pc.nombre1, pc.nombre2, pc.apellido1, pc.apellido2, pp.id_partido, pp.nombre_partido'); 
		$this->db->from('candidatos c');
		$this->db->join('persona pc','pc.DUI_persona = c.DUI_persona');
		$this->db->join('partido_politico pp','pp.id_candidato = c.id_candidato');
		$exe = $this->db->get();

		return $exe->result();	
	}

	public function get_estado()
	{
		$this->db->where('id_voto', 1);
		$exe = $this->db->get('estado_voto');
		return $exe->result();		
	}

	public function get_all_estado()
	{
		$exe = $this->db->get('estado_voto');
		return $exe->result();		
	}

	public function guardar($datos)
	{
		$this->db->set('FechaHora',$datos["fechahora"]);
		$this->db->set('id_votacion',$datos["votacion"]);
		$this->db->set('DUI_persona',$datos["persona"]);
		$this->db->set('id_voto',$datos["estado"]);
		if (empty($datos["candidato"])) {
			$this->db->set('id_candidato',"NULL", FALSE);
		}else{
			$this->db->set('id_candidato',$datos["candidato"]);
		}
		$this->db->insert('detalles_votacion');

		if ($this->db->affected_rows() > 0) {
			$this->db->select('DUI_persona, id_estadoh'); 
			$this->db->from('persona');
			$this->db->where('DUI_persona',$datos["persona"]);
			$exe = $this->db->get();

			foreach ($exe->result() as $votante) {
				$DUI = $votante->DUI_persona;
				$estado = $votante->id_estadoh;
			}
			$this->db->set('id_estadoh', 2);
			$this->db->where('DUI_persona', $DUI);
			$this->db->update('persona');

			if ($this->db->affected_rows() > 0) {
				return 'success';
			}
		} 
	}

	public function get_datos_DV($id)
	{
		$this->db->where('id_DV', $id);
		$exe = $this->db->get('detalles_votacion');
		return $exe->result();	
	}

	public function actualizar($datos)
	{
		$this->db->set('FechaHora',$datos["fechahora"]);
		$this->db->set('id_votacion',$datos["votacion"]);
		$this->db->set('DUI_persona',$datos["persona"]);
		$this->db->set('id_voto',$datos["estado"]);
		if (empty($datos["candidato"])) {
			$this->db->set('id_candidato',"NULL", FALSE);
		}else{
			$this->db->set('id_candidato',$datos["candidato"]);
		}
		$this->db->where('id_DV', $datos["id"]);
		$this->db->update('detalles_votacion');

		if ($this->db->affected_rows() > 0) {
			return 'modi';
		}
	}
}
