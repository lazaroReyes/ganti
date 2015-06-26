<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 02:19 PM
 */
class Tarjetas_model extends  CI_Model{

    public function insertar($tarjeta){
        if($this->db->insert('tarjetas',$tarjeta))
            return true;
        else
            return false;
    }

    public  function  leer(){
        $this->db->order_by('ID DESC');
        $query = $this->db->get('tarjetas');
        return $query->result();
    }

    public function consultaNombre($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('tarjetas');
        return $query->Descripcion;
    }

    public function consultaTarjeta($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('tarjetas');
        return $query->row();
    }

    public function actualizarTarjeta($id, $tarjeta){
        $this->db->where('ID',$id);
        if($this->db->update('tarjetas',$tarjeta))
            return true;
        else
            return false;
    }

    public function  eliminarTarjeta($id)
    {
        $this->db->where('id', $id);

        if ($this->db->delete('tarjetas'))
            return true;
        else
            return false;
    }
}