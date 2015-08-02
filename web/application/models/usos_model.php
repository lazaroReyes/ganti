<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 3:15 PM
 */
class Usos_model extends  CI_Model{

    public function insertar($uso){
        if($this->db->insert('usos',$uso))
            return true;
        else
            return false;
    }

    public  function  leer(){
        $this->db->order_by('ID DESC');
        $query = $this->db->get('usos');
        return $query->result();
    }

    public function consultaUso($id){
        $this->db->where('ID',$id);
        $query = $this->db->get('usos');
        return $query->row();
    }

    public function actualizarUso($id, $uso){
        $this->db->where('ID',$id);
        if($this->db->update('usos',$uso))
            return true;
        else
            return false;
    }

    public function  eliminarUso($id)
    {
        $this->db->where('id', $id);

        if ($this->db->delete('usos'))
            return true;
        else
            return false;
    }

    public function total_registros()
    {
        return $this->db->count_all('usos');
    }

    public function traer_usos($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('Fecha DESC');
        $query = $this->db->get('usos');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

    }
}