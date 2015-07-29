<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 3:15 PM
 */
class Productos_model extends  CI_Model{

    public function insertar($producto){
        if($this->db->insert('productos',$producto))
            return true;
        else
            return false;
    }

    public  function  leer(){
        $this->db->order_by('ID DESC');
        $query = $this->db->get('productos');
        return $query->result();
    }

    public function consultaProducto($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('productos');
        return $query->row();
    }

    public function consultaNombre($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('productos');
        return $query->Descripcion;
    }

    public function actualizarProducto($id, $producto){
        $this->db->where('ID',$id);
        if($this->db->update('productos',$producto))
            return true;
        else
            return false;
    }

    public function  eliminarProducto($id)
    {
        $this->db->where('id', $id);

        if ($this->db->delete('productos'))
            return true;
        else
            return false;
    }
}