<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 3:15 PM
 */
class Compras_model extends  CI_Model{

    public function insertar($compra){
        if($this->db->insert('compras',$compra))
            return true;
        else
            return false;
    }

    public  function  leer(){
        $this->db->order_by('ID DESC');
        $query = $this->db->get('compras');
        return $query->result();
    }

    public function consultaCompra($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('compras');
        return $query->row();
    }

    public function actualizarCompra($id, $compra){
        $this->db->where('ID',$id);
        if($this->db->update('compras',$compra))
            return true;
        else
            return false;
    }

    public function  eliminarCompra($id)
    {
        $this->db->where('id', $id);

        if ($this->db->delete('compras'))
            return true;
        else
            return false;
    }
}