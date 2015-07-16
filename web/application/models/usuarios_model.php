<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 16/07/2015
 * Time: 3:15 PM
 */
class Usuarios_model extends  CI_Model{

    public function insertar($usuario){
        if($this->db->insert('users',$usuario))
            return true;
        else
            return false;
    }

    public  function  leer(){
        $this->db->order_by('ID DESC');
        $query = $this->db->get('users');
        return $query->result();
    }

    public function consultaUsuario($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function actualizarUsuario($id, $usuario){
        $this->db->where('ID',$id);
        if($this->db->update('users',$usuario))
            return true;
        else
            return false;
    }

    public function  eliminarUsuario($id)
    {
        $this->db->where('id', $id);

        if ($this->db->delete('users'))
            return true;
        else
            return false;
    }
}