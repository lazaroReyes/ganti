<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Saul
 * Date: 25/06/2015
 * Time: 02:18 PM
 */
class Tarjetas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tarjetas_model');
        $this->load->helper(array('url','form'));
        $this->load->helper('url');
        $this->load->database('default');
    }

    public  function insertar()
    {
        $tarjeta = array('Descripcion' => $this->input->post('Descripcion'));
        if($this->tarjetas_model->insertar($tarjeta))
            redirect('tarjetas');
    }

    public function index()
    {
        if($this->session->userdata('perfil') == FALSE)
        {
            redirect(base_url().'login');
        }
        $data['titulo'] = 'Tarjetas';
        $data['main_content']='inicio';

        $this->load->model('tarjetas_model');
        $data['tarjetasGuardadas'] = $this->tarjetas_model->leer();

        if($this->uri->segment(3)!=''){
            $id = $this->uri->segment(3);
            $data['actualizarTarjeta'] = $this->tarjetas_model->consultaTarjeta($id);
        }

        $this->load->view('tarjetas_view',$data);
    }

    public function actualizar(){
        $tarjeta = array(
            'Descripcion' => $this->input->post('Descripcion')
        );
        $id = $this->input->post('ID');

        $this->load->model('tarjetas_model');
        if($this->tarjetas_model->actualizarTarjeta($id, $tarjeta))
            $this->session->set_flashdata('actualizado','La tarjeta se actualizó correctamente');
        redirect('tarjetas');
    }

    public function eliminar(){
        $id = $this->uri->segment(3);
        $this->load->model('tarjetas_model');
        if($this->tarjetas_model->eliminarTarjeta($id))
            redirect('tarjetas');
    }
}