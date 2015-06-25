<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 23/06/2015
 * Time: 04:28 PM
 */
class Maquinas_model extends  CI_Model{

    public function insertar($maquina){
        if($this->db->insert('maquinas',$maquina))
            return true;
        else
            return false;
    }

    public  function  leer(){
        $this->db->order_by('ID DESC');
        $query = $this->db->get('maquinas');
        return $query->result();
    }

    public function consultaMaquina($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('maquinas');
        return $query->row();
    }

    public function actualizarMaquina($id, $maquina){
        $this->db->where('ID',$id);
        if($this->db->update('maquinas',$maquina))
            return true;
        else
            return false;
    }

    public function  eliminarMaquina($id)
    {
        $this->db->where('id', $id);

        if ($this->db->delete('maquinas'))
            return true;
        else
            return false;
    }
}