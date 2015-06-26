<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 3:26 PM
 */
class Proveedores_model extends  CI_Model{

    public function insertar($proveedor){
        if($this->db->insert('proveedores',$proveedor))
            return true;
        else
            return false;
    }

    public  function  leer(){
        $this->db->order_by('ID DESC');
        $query = $this->db->get('proveedores');
        return $query->result();
    }

    public function consultaNombre($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('proveedores');
        return $query->Nombre;
    }

    public function consultaProveedor($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('proveedores');
        return $query->row();
    }

    public function actualizarProveedor($id, $proveedor){
        $this->db->where('ID',$id);
        if($this->db->update('proveedores',$proveedor))
            return true;
        else
            return false;
    }

    public function  eliminarProveedor($id)
    {
        $this->db->where('id', $id);

        if ($this->db->delete('proveedores'))
            return true;
        else
            return false;
    }
}