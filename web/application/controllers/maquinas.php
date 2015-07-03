<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 23/06/2015
 * Time: 03:44 PM
 */
class Maquinas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('maquinas_model');
        $this->load->helper(array('url','form'));
        $this->load->helper('url');
        $this->load->database('default');
    }

    public  function insertar()
    {
        $maquina = array('Descripcion' => $this->input->post('Descripcion'));
       if($this->maquinas_model->insertar($maquina))
           redirect('maquinas');
    }

    public function index()
    {
        if($this->session->userdata('perfil') == FALSE)
        {
            redirect(base_url().'login');
        }
        $data['titulo'] = 'Maquinas';
        $data['main_content']='inicio';

        $this->load->model('maquinas_model');
        $data['maquinasGuardadas'] = $this->maquinas_model->leer();

        if($this->uri->segment(3)!=''){
            $id = $this->uri->segment(3);
            $data['actualizarMaquina'] = $this->maquinas_model->consultaMaquina($id);
        }

        $this->load->view('maquinas_view',$data);
    }

    public function actualizar(){
        $maquina = array(
            'Descripcion' => $this->input->post('Descripcion')
        );
        $id = $this->input->post('ID');

        $this->load->model('maquinas_model');
        if($this->maquinas_model->actualizarMaquina($id, $maquina))
            $this->session->set_flashdata('actualizado','La Maquina se actualizó correctamente');
            redirect('maquinas');
    }

    public function eliminar(){
        $id = $this->uri->segment(3);
        $this->load->model('maquinas_model');
        if($this->maquinas_model->eliminarMaquina($id))
            redirect('maquinas');
    }
}