<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 02:38 PM
 */
class Minas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('minas_model');
        $this->load->helper(array('url','form'));
        $this->load->helper('url');
        $this->load->database('default');
    }

    public  function insertar()
    {
        $mina = array(
            'Nombre' => $this->input->post('Nombre'),
            'Descripcion' => $this->input->post('Descripcion'));
        if($this->minas_model->insertar($mina))
            redirect('minas');
    }

    public function index()
    {
        if($this->session->userdata('perfil') == FALSE)
        {
            redirect(base_url().'login');
        }
        $data['titulo'] = 'Minas';
        $data['main_content']='inicio';

        $this->load->model('minas_model');
        $data['minasGuardadas'] = $this->minas_model->leer();

        if($this->uri->segment(3)!=''){
            $id = $this->uri->segment(3);
            $data['actualizarMina'] = $this->minas_model->consultaMina($id);
        }

        $this->load->view('minas_view',$data);
    }

    public function actualizar(){
        $mina = array(
            'Nombre' => $this->input->post('Nombre'),
            'Descripcion' => $this->input->post('Descripcion')
        );
        $id = $this->input->post('ID');

        $this->load->model('minas_model');
        if($this->minas_model->actualizarMina($id, $mina))
            $this->session->set_flashdata('actualizado','La mina se actualizó correctamente');
        redirect('minas');
    }

    public function eliminar(){
        $id = $this->uri->segment(3);
        $this->load->model('minas_model');
        if($this->minas_model->eliminarMina($id))
            redirect('minas');
    }
}