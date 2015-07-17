<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 06:41 PM
 */
class Compras extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('compras_model');
        $this->load->helper(array('url','form'));
        $this->load->helper('url');
        $this->load->database('default');
    }

    public  function insertar()
    {
        $compra = array(
           'IDProducto' => $this->input->post('IDProducto'),
            'Descripcion' => $this->input->post('Descripcion'),
            'Cantidad' => $this->input->post('Cantidad'),
            'Costo' => $this->input->post('Costo'),
            'NoFactura' => $this->input->post('NoFactura'),
            'MetodoPago' => $this->input->post('MetodoPago'),
            'IDProveedor' => $this->input->post('IDProveedor'),
            'EstadoDeCompra' => $this->input->post('EstadoDeCompra'),
            'IDUsuario' => $this->input->post('IDUsuario'),
            'IDTarjeta' => $this->input->post('IDTarjeta'),
            'IDMaquina' => $this->input->post('IDMaquina'),
            'IDMina' => $this->input->post('IDMina'),
            'FechaRequerido' => date("Y")."-".date("m")."-".date("d"),
            'FechaPedido' => '',
            'FechaEnviado' => '',
            'FechaRecibido' => ''
        );
        if($this->compras_model->insertar($compra))
            redirect('compras');
    }

    public function index()
    {
        if($this->session->userdata('perfil') == FALSE)
        {
            redirect(base_url().'login');
        }
        $data['titulo'] = 'Compras';
        $data['main_content']='inicio';

        $this->load->model('compras_model');
        $data['comprasGuardados'] = $this->compras_model->leer();

        if($this->uri->segment(3)!=''){
            $id = $this->uri->segment(3);
            $data['actualizarCompra'] = $this->compras_model->consultaCompra($id);
        }

        $this->load->model('minas_model');
        $data['minasGuardadas'] = $this->minas_model->leer();
        $this->load->model('productos_model');
        $data['productosGuardados'] = $this->productos_model->leer();
        $this->load->model('login_model');
        $data['usuariosGuardados'] = $this->login_model->leer();
        $this->load->model('proveedores_model');
        $data['proveedoresGuardados'] = $this->proveedores_model->leer();
        $this->load->model('tarjetas_model');
        $data['tarjetasGuardadas'] = $this->tarjetas_model->leer();
        $this->load->model('maquinas_model');
        $data['maquinasGuardadas'] = $this->maquinas_model->leer();



        $this->load->view('partials/header_view', $data);
        $this->load->view('compras_view',$data);
        $this->load->view('partials/footer_view');
    }

    public function actualizar(){
        $compra = array(
            'IDProducto' => $this->input->post('IDProducto'),
            'Descripcion' => $this->input->post('Descripcion'),
            'Cantidad' => $this->input->post('Cantidad'),
            'Costo' => $this->input->post('Costo'),
            'NoFactura' => $this->input->post('NoFactura'),
            'MetodoPago' => $this->input->post('MetodoPago'),
            'IDProveedor' => $this->input->post('IDProveedor'),
            'EstadoDeCompra' => $this->input->post('EstadoDeCompra'),
            'IDUsuario' => $this->input->post('IDUsuario'),
            'IDTarjeta' => $this->input->post('IDTarjeta'),
            'IDMaquina' => $this->input->post('IDMaquina'),
            'IDMina' => $this->input->post('IDMina'),
            'FechaRequerido' => $this->input->post('FechaRequerido'),
            'FechaPedido' => $this->input->post('FechaPedido'),
            'FechaEnviado' => $this->input->post('FechaEnviado'),
            'FechaRecibido' => $this->input->post('FechaRecibido')
        );
        if ($compra['EstadoDeCompra']=="Pedido"){
            $compra['FechaPedido'] = date("Y")."-".date("m")."-".date("d");
        }elseif($compra['EstadoDeCompra']=="Enviado"){
            $compra['FechaEnviado'] = date("Y")."-".date("m")."-".date("d");
        }else{
            $compra['FechaRecibido'] = date("Y")."-".date("m")."-".date("d");
        }
        $id = $this->input->post('ID');{

        }

        $this->load->model('compras_model');
        if($this->compras_model->actualizarCompra($id, $compra))
            $this->session->set_flashdata('actualizado','La compra se actualizó correctamente');
        redirect('compras');
    }

    public function eliminar(){
        $id = $this->uri->segment(3);
        $this->load->model('compras_model');
        if($this->compras_model->eliminarCompra($id))
            redirect('compras');
    }
}