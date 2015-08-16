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
        $this->db->order_by('FechaRequerido DESC');
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

    public function total_registros()
    {
        return $this->db->count_all('compras');
    }

    public function traer_compras($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('FechaRequerido DESC');
        $query = $this->db->get('compras');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

    }

    public function traer_facturas($limit, $start, $term) {
        $this->db->limit($limit, $start);
        $this->db->order_by('FechaRequerido DESC');
        $sql = "SELECT * FROM compras WHERE NoFactura LIKE '%$term%'";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            $data[] = $query->num_rows();
            return $data;
        }
        return false;


    }

    public function traer_tarjetas($limit, $start, $term)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('FechaRequerido DESC');
        $sql = "
          SELECT c.ID, c.IDProducto, c.Descripcion, c.Cantidad, c.Costo, c.NoFactura,
          c.MetodoPago, c.IDProveedor, c.EstadoDeCompra, c.IDUsuario, c.IDTarjeta,
          c.IDMaquina, c.IDMina, c.FechaRequerido, c.FechaPedido, c.FechaEnviado, c.FechaRecibido
          FROM compras as c INNER JOIN tarjetas as t ON c.IDTarjeta = t.ID
          WHERE t.Descripcion LIKE '%$term%'
          ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            $data[] = $query->num_rows();
            return $data;
        }
        return false;
    }

    public function traer_fechaRequerido($limit, $start, $term)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('FechaRequerido DESC');
        $sql = "
          SELECT * FROM compras WHERE FechaRequerido LIKE '%$term%'
          ";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            $data[] = $query->num_rows();
            return $data;
        }
        return false;
    }
}