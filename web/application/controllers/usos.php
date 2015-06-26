<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 03:02 PM
 */
class Usos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usos_model');
        $this->load->helper(array('url','form'));
        $this->load->helper('url');
        $this->load->database('default');
    }

    public  function insertar()
    {
        $uso = array(
            'IDMina' => $this->input->post('IDMina'),
            'IDProducto' => $this->input->post('IDProducto'),
            'Cantidad' => $this->input->post('Cantidad'),
            'IDUsuario' => $this->input->post('IDUsuario'),
            'Fecha' => $this->input->post('Fecha'),
        );
        if($this->usos_model->insertar($uso))
            redirect('usos');
    }

    public function index()
    {
        $data['titulo'] = 'Usos';
        $data['main_content']='inicio';

        $this->load->model('usos_model');
        $data['usosGuardados'] = $this->usos_model->leer();

        if($this->uri->segment(3)!=''){
            $id = $this->uri->segment(3);
            $data['actualizarUso'] = $this->usos_model->consultaUso($id);
        }

        $this->load->model('minas_model');
        $data['minasGuardadas'] = $this->minas_model->leer();
        $this->load->model('productos_model');
        $data['productosGuardados'] = $this->productos_model->leer();
        $this->load->model('login_model');
        $data['usuariosGuardados'] = $this->login_model->leer();


        $this->load->view('usos_view',$data);
    }

    public function actualizar(){
        $uso = array(
            'IDMina' => $this->input->post('IDMina'),
            'IDProducto' => $this->input->post('IDProducto'),
            'Cantidad' => $this->input->post('Cantidad'),
            'IDUsuario' => $this->input->post('IDUsuario'),
            'Fecha' => $this->input->post('Fecha'),
        );
        $id = $this->input->post('ID');

        $this->load->model('usos_model');
        if($this->usos_model->actualizarUso($id, $uso))
            $this->session->set_flashdata('actualizado','El uso se actualizó correctamente');
        redirect('usos');
    }

    public function eliminar(){
        $id = $this->uri->segment(3);
        $this->load->model('usos_model');
        if($this->usos_model->eliminarUso($id))
            redirect('usos');
    }
}