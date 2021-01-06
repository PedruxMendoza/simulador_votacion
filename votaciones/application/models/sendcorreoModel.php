<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sendcorreoModel extends CI_Model {

	public function validarcorreo($data){

        //Verificamos si el correo ingresado existe en la base de datos
        $this->db->select('u.id_usuario, CONCAT(p.nombre1 , " ", p.nombre2, " ", p.apellido1, " ", p.apellido2) as nombre, u.correo');
        $this->db->from('usuario u');
        $this->db->join('persona p','p.DUI_persona = u.DUI_persona');
        $this->db->where('correo',$data['email']);
        $exe = $this->db->get();

        // Si el correo ingresado existe en la BD intentara enviar el correo
        if ($this->db->affected_rows()>0){
            return $exe->result();
        }else{
            return false;
        }
    }

    public function cambiarclave($id,$nueva){
        $this->db->set('clave',md5($nueva));
        $this->db->where('id_usuario',$id);
        $this->db->update('usuario');
    }
}