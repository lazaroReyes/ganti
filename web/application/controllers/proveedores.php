<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 03:02 PM
 */
class Proveedores extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('proveedores_model');
        $this->load->helper(array('url','form'));
        $this->load->helper('url');
        $this->load->database('default');
    }

    public  function insertar()
    {
        $proveedor = array(
            'RFC' => $this->input->post('RFC'),
            'Nombre' => $this->input->post('Nombre'));
        if($this->proveedores_model->insertar($proveedor))
            redirect('proveedores');
    }

    public function index()
    {
        if($this->session->userdata('perfil') == FALSE)
        {
            redirect(base_url().'login');
        }
        $data['titulo'] = 'Proveedores';
        $data['main_content']='inicio';

        $this->load->model('proveedores_model');
        $data['proveedoresGuardadas'] = $this->proveedores_model->leer();

        if($this->uri->segment(3)!=''){
            $id = $this->uri->segment(3);
            $data['actualizarProveedor'] = $this->proveedores_model->consultaProveedor($id);
        }

        $this->load->view('proveedores_view',$data);
    }

    public function actualizar(){
        $proveedor = array(
            'RFC' => $this->input->post('RFC'),
            'Nombre' => $this->input->post('Nombre')
        );
        $id = $this->input->post('ID');

        $this->load->model('proveedores_model');
        if($this->proveedores_model->actualizarProveedor($id, $proveedor))
            $this->session->set_flashdata('actualizado','El proveedor se actualizó correctamente');
        redirect('proveedores');
    }

    public function eliminar(){
        $id = $this->uri->segment(3);
        $this->load->model('proveedores_model');
        if($this->proveedores_model->eliminarProveedor($id))
            redirect('proveedores');
    }
}