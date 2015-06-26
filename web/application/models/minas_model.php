<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 02:36 PM
 */
class Minas_model extends  CI_Model{

    public function insertar($mina){
        if($this->db->insert('minas',$mina))
            return true;
        else
            return false;
    }

    public  function  leer(){
        $this->db->order_by('ID DESC');
        $query = $this->db->get('minas');
        return $query->result();
    }

    public function consultaMina($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('minas');
        return $query->row();
    }

    public function consultaNombre($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('minas');
        return $query->Nombre;
    }

    public function actualizarMina($id, $mina){
        $this->db->where('ID',$id);
        if($this->db->update('minas',$mina))
            return true;
        else
            return false;
    }

    public function  eliminarMina($id)
    {
        $this->db->where('id', $id);

        if ($this->db->delete('minas'))
            return true;
        else
            return false;
    }
}