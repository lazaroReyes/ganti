<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 03:02 PM
 */
class Productos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('productos_model');
        $this->load->helper(array('url','form'));
        $this->load->helper('url');
        $this->load->database('default');
    }

    public  function insertar()
    {
        $producto = array(
            'Clave' => $this->input->post('Clave'),
            'Descripcion' => $this->input->post('Descripcion'),
            'Stock' => $this->input->post('Stock')
             );
        if($this->productos_model->insertar($producto))
            redirect('productos');
    }

    public function index()
    {
        if($this->session->userdata('perfil') == FALSE)
        {
            redirect(base_url().'login');
        }
        $data['titulo'] = 'Productos';
        $data['main_content']='inicio';

        $this->load->model('productos_model');
        $data['productosGuardadas'] = $this->productos_model->leer();

        if($this->uri->segment(3)!=''){
            $id = $this->uri->segment(3);
            $data['actualizarProducto'] = $this->productos_model->consultaProducto($id);
        }

        $this->load->view('partials/header_view', $data);
        $this->load->view('productos_view',$data);
        $this->load->view('partials/footer_view');
    }

    public function actualizar(){
        $producto = array(
            'Clave' => $this->input->post('Clave'),
            'Descripcion' => $this->input->post('Descripcion'),
            'Stock' => $this->input->post('Stock')
        );
        $id = $this->input->post('ID');

        $this->load->model('productos_model');
        if($this->productos_model->actualizarProducto($id, $producto))
            $this->session->set_flashdata('actualizado','El producto se actualizó correctamente');
        redirect('productos');
    }

    public function eliminar(){
        $id = $this->uri->segment(3);
        $this->load->model('productos_model');
        if($this->productos_model->eliminarProducto($id))
            redirect('productos');
    }
}