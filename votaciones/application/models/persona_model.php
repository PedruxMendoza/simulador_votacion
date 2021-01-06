<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class persona_model extends CI_model {
	
	public function get_persona(){
		$this->db->select('p.DUI_persona, p.nombre1, p.nombre2, p.nombre3, p.nombre4, p.apellido1, p.apellido2, p.apellido3, p.telefono, p.direccion, p.fnacimiento, p.fexpedicion, p.fexpiracion, e.nombre_estadoh, s.nombre_sexo, m.nombre_municipio, d.nombre, p.foto');
		$this->db->from('persona p');
		$this->db->join('estado_persona e', 'e.id_estadoh = p.id_estadoh');
		$this->db->join('sexo s', 's.id_sexo = p.id_sexo');
		$this->db->join('municipio m', 'm.id_municipio = p.id_municipio');
		$this->db->join('departamento d', 'd.id_departamento = m.id_departamento');

		$exe = $this->db->get();
		return $exe->result();
	}

	public function eliminar($id){
		$this->db->where('DUI_persona',$id);
		$this->db->delete('persona');

		if ($this->db->affected_rows() > 0) {
			return 'successE';
		}else{
			return 'errorE';
		}
	}

	public function get_estado(){
		$exe = $this->db->get('estado_persona');
		return $exe->result();
	}

	public function get_estado_persona(){
		$exe = $this->db->get('persona_viva');
		return $exe->result();
	}

	public function get_sexo(){
		$exe = $this->db->get('sexo');
		return $exe->result();
	}

	public function get_municipio(){
		$exe = $this->db->get('municipio');
		return $exe->result();
	}

	public function get_departamento(){
		$exe = $this->db->get('departamento');
		return $exe->result();
	}


	public function set_persona($datos, $fa, $fe){

		$this->db->set('DUI_persona', $datos['DUI_persona']);
		$this->db->set('nombre1', $datos['nombre1']);
		$this->db->set('nombre2', $datos['nombre2']);
		if (empty($datos['nombre3'])){
			$this->db->set('nombre3', "NULL", FALSE);
		}else{
			$this->db->set('nombre3', $datos['nombre3']);
		}
		if (empty($datos['nombre4'])){
			$this->db->set('nombre4', "NULL", FALSE);
		}else{
			$this->db->set('nombre4', $datos['nombre4']);
		}
		$this->db->set('apellido1', $datos['apellido1']);
		if (empty($datos['apellido2'])){
			$this->db->set('apellido2', "NULL", FALSE);
		}else{
			$this->db->set('apellido2', $datos['apellido2']);
		}
		if (empty($datos['apellido3'])){
			$this->db->set('apellido3', "NULL", FALSE);
		}else{
			$this->db->set('apellido3', $datos['apellido3']);
		}
		$this->db->set('telefono', $datos['telefono']);
		$this->db->set('direccion', $datos['direccion']);
		$this->db->set('fnacimiento', $datos['fnacimiento']);
		$this->db->set('fexpedicion', $fa);
		$this->db->set('fexpiracion', $fe);
		$this->db->set('id_estadoh', $datos['estado']);
		$this->db->set('id_estadov', $datos['estadop']);
		$this->db->set('id_sexo', $datos['sexo']);
		$this->db->set('id_municipio', $datos['municipio']);
		$this->db->set('foto', $datos['ruta']);
		$this->db->insert('persona');

		if ($this->db->affected_rows() > 0) {
			return 'set';
		}
	}

	public function get_datos($id){
		$this->db->where('DUI_persona', $id);
		$exe = $this->db->get('persona');
		return $exe->result();
	}

	public function act_persona($datos, $fa, $fe){

		if ($datos["ruta"] == "n") {
			$this->db->set('nombre1', $datos['nombre1']);
			$this->db->set('nombre2', $datos['nombre2']);
			if (empty($datos['nombre3'])){
				$this->db->set('nombre3', "NULL", FALSE);
			}else{
				$this->db->set('nombre3', $datos['nombre3']);
			}
			if (empty($datos['nombre4'])){
				$this->db->set('nombre4', "NULL", FALSE);
			}else{
				$this->db->set('nombre4', $datos['nombre4']);
			}
			$this->db->set('apellido1', $datos['apellido1']);
			if (empty($datos['apellido2'])){
				$this->db->set('apellido2', "NULL", FALSE);
			}else{
				$this->db->set('apellido2', $datos['apellido2']);
			}
			if (empty($datos['apellido3'])){
				$this->db->set('apellido3', "NULL", FALSE);
			}else{
				$this->db->set('apellido3', $datos['apellido3']);
			}
			$this->db->set('telefono', $datos['telefono']);
			$this->db->set('direccion', $datos['direccion']);
			$this->db->set('fnacimiento', $datos['fnacimiento']);
			$this->db->set('fexpedicion', $fa);
			$this->db->set('fexpiracion', $fe);
			$this->db->set('id_estadoh', $datos['estado']);
			$this->db->set('id_estadov', $datos['estadop']);
			$this->db->set('id_sexo', $datos['sexo']);
			$this->db->set('id_municipio', $datos['municipio']);
			$this->db->where('DUI_persona', $datos['DUI_persona']);
			$this->db->update('persona');

			if ($this->db->affected_rows() > 0){
				return 'act';
			}else{
				return 'noact';
			}

		}else{

			$this->db->set('nombre1', $datos['nombre1']);
			$this->db->set('nombre2', $datos['nombre2']);
			if (empty($datos['nombre3'])){
				$this->db->set('nombre3', "NULL", FALSE);
			}else{
				$this->db->set('nombre3', $datos['nombre3']);
			}
			if (empty($datos['nombre4'])){
				$this->db->set('nombre4', "NULL", FALSE);
			}else{
				$this->db->set('nombre4', $datos['nombre4']);
			}
			$this->db->set('apellido1', $datos['apellido1']);
			$this->db->set('apellido2', $datos['apellido2']);
			if (empty($datos['apellido3'])){
				$this->db->set('apellido3', "NULL", FALSE);
			}else{
				$this->db->set('apellido3', $datos['apellido3']);
			}
			$this->db->set('telefono', $datos['telefono']);
			$this->db->set('direccion', $datos['direccion']);
			$this->db->set('fnacimiento', $datos['fnacimiento']);
			$this->db->set('fexpedicion', $fa);
			$this->db->set('fexpiracion', $fe);
			$this->db->set('id_estadoh', $datos['estado']);
			$this->db->set('id_estadov', $datos['estadop']);
			$this->db->set('id_sexo', $datos['sexo']);
			$this->db->set('id_municipio', $datos['municipio']);
			$this->db->set('foto', $datos['ruta']);
			$this->db->where('DUI_persona', $datos["DUI_persona"]);
			$this->db->update('persona');

			if ($this->db->affected_rows() > 0){
				return 'act';
			}else{
				return 'noact';
			}
		}


	}


}//Fin de la clase

?>