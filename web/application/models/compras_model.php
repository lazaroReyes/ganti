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
        $sql = "SELECT * FROM compras WHERE EstadoDeCompra != 'Recibido'";
        $query = $this->db->query($sql);
        $num = $query->num_rows();
        return $num;
    }
    public function total_recibidos()
    {
        $sql = "SELECT * FROM compras WHERE EstadoDeCompra = 'Recibido'";
        $query = $this->db->query($sql);
        $num = $query->num_rows();
        return $num;
    }

    public function traer_compras($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('EstadoDeCompra !=','Recibido');
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

    public function traer_compras_recibidas($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('EstadoDeCompra','Recibido');
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

    public function traer_producto($limit, $start, $term)
    {
        $sql = "SELECT ID FROM productos WHERE Clave = '$term'";

        $query = $this->db->query($sql);

        $obj = $query->row();
        if(!empty($obj)) {
            $this->db->limit($limit, $start);
            $this->db->order_by('FechaRequerido DESC');
            $sql = "
          SELECT * FROM compras WHERE IDProducto = '$obj->ID'
          ";
            $query = $this->db->query($sql);

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                $data[] = $query->num_rows();
                return $data;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function traer_mina($limit, $start, $term)
    {
        $sql = "SELECT ID FROM minas WHERE Nombre = '$term'";

        $query = $this->db->query($sql);

        $obj = $query->row();
        if(!empty($obj)) {
            $this->db->limit($limit, $start);
            $this->db->order_by('FechaRequerido DESC');
            $sql = "
          SELECT * FROM compras WHERE IDMina = '$obj->ID'
          ";
            $query = $this->db->query($sql);

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                $data[] = $query->num_rows();
                return $data;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function traer_entregado($limit, $start, $term)
    {
        $this->db->limit($limit, $start);
        $this->db->order_by('FechaRecibido DESC');
        $sql = "
          SELECT * FROM compras WHERE FechaRecibido LIKE '%$term%'
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

    public function traer_usuario($limit, $start, $term)
    {
        $sql = "SELECT ID FROM users WHERE username = '$term'";

        $query = $this->db->query($sql);

        $obj = $query->row();
        if(!empty($obj)) {
            $this->db->limit($limit, $start);
            $this->db->order_by('FechaRequerido DESC');
            $sql = "
          SELECT * FROM compras WHERE IDUsuario = '$obj->ID'
          ";
            $query = $this->db->query($sql);

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                $data[] = $query->num_rows();
                return $data;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }
}