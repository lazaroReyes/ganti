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
        $this->load->library('pagination');
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
        //$data['comprasGuardados'] = $this->compras_model->leer();

        $config = array();
        $config["base_url"] = base_url() . "compras/index/pag";
        $config["total_rows"] = $this->compras_model->total_registros();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["comprasGuardados"] = $this->compras_model->
        traer_compras($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();




        if($this->uri->segment(3) !='' && $this->uri->segment(3) != 'pag'){
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

    public function recibidos()
    {
        if($this->session->userdata('perfil') == FALSE)
        {
            redirect(base_url().'login');
        }
        $data['titulo'] = 'Compras';
        $data['main_content']='inicio';

        $this->load->model('compras_model');
        //$data['comprasGuardados'] = $this->compras_model->leer();

        $config = array();
        $config["base_url"] = base_url() . "compras/index/pag";
        $config["total_rows"] = $this->compras_model->total_recibidos();
        $config["per_page"] = 5;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data["comprasGuardados"] = $this->compras_model->
        traer_compras_recibidas($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();




        if($this->uri->segment(3) !='' && $this->uri->segment(3) != 'pag'){
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
        $id = $this->input->post('ID');

        $this->load->model('compras_model');
        if($this->compras_model->actualizarCompra($id, $compra))
            $this->session->set_flashdata('actualizado','La compra se actualizó correctamente');

        if ($compra['EstadoDeCompra']=='Recibido'){
            $this->load->model('productos_model');
            $producto = $this->productos_model->consultaProducto($compra['IDProducto']);
            $producto->Stock = $producto->Stock + $compra['Cantidad'];
            $this->productos_model->actualizarProducto($compra['IDProducto'], $producto);
        }
        redirect('compras');
    }

    public function eliminar(){
        $id = $this->uri->segment(3);
        $this->load->model('compras_model');
        if($this->compras_model->eliminarCompra($id))
            redirect('compras');
    }

    public function fetchByInvoice()
    {
        $data['titulo'] = 'Compras';
        $data['main_content']='inicio';

        $term = '';

        if($this->input->post('term')) {
            $term = $this->input->post('term');
            $this->session->set_userdata('search_term', $term);
        } else if($this->session->userdata('search_term')) {
            $term = $this->session->userdata('search_term');
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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->load->model('compras_model');

        $config = array();
        $config["base_url"] = base_url() . "compras/fetchByInvoice/pag";
        $config["per_page"] = 5;
        $results = $this->compras_model->traer_facturas($config['per_page'], $page, $term);
        $config["total_rows"] = !empty($results) ? array_pop($results) : 0;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        $data["comprasGuardados"] = !empty($results) ? $results : null;
        $data["links"] = $this->pagination->create_links();

        $this->load->view('partials/header_view', $data);
        $this->load->view('compras_view',$data);
        $this->load->view('partials/footer_view');
    }

    public function fetchByCard()
    {
        $data['titulo'] = 'Compras';
        $data['main_content']='inicio';

        $term = '';

        if($this->input->post('term')) {
            $term = $this->input->post('term');
            $this->session->set_userdata('search_term', $term);
        } else if($this->session->userdata('search_term')) {
            $term = $this->session->userdata('search_term');
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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->load->model('compras_model');

        $config = array();
        $config["base_url"] = base_url() . "compras/fetchByCard/pag";
        $config["per_page"] = 5;
        $results = $this->compras_model->traer_tarjetas($config['per_page'], $page, $term);
        $config["total_rows"] = !empty($results) ? array_pop($results) : 0;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        $data["comprasGuardados"] = !empty($results) ? $results : null;
        $data["links"] = $this->pagination->create_links();

        $this->load->view('partials/header_view', $data);
        $this->load->view('compras_view',$data);
        $this->load->view('partials/footer_view');

    }

    public function fetchByDate()
    {
        $data['titulo'] = 'Compras';
        $data['main_content']='inicio';

        $term = '';

        if($this->input->post('datepicker')) {
            $term = $this->input->post('datepicker');
            $this->session->set_userdata('search_term', $term);
        } else if($this->session->userdata('search_term')) {
            $term = $this->session->userdata('search_term');
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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->load->model('compras_model');

        $config = array();
        $config["base_url"] = base_url() . "compras/fetchByDate/pag";
        $config["per_page"] = 5;
        $results = $this->compras_model->traer_fechaRequerido($config['per_page'], $page, $term);
        $config["total_rows"] = !empty($results) ? array_pop($results) : 0;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        $data["comprasGuardados"] = !empty($results) ? $results : null;
        $data["links"] = $this->pagination->create_links();

        $this->load->view('partials/header_view', $data);
        $this->load->view('compras_view',$data);
        $this->load->view('partials/footer_view');
    }

    public function fetchByProduct()
    {
        $data['titulo'] = 'Compras';
        $data['main_content']='inicio';

        $term = '';

        if($this->input->post('term')) {
            $term = $this->input->post('term');
            $this->session->set_userdata('search_term', $term);
        } else if($this->session->userdata('search_term')) {
            $term = $this->session->userdata('search_term');
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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->load->model('compras_model');

        $config = array();
        $config["base_url"] = base_url() . "compras/fetchByProduct/pag";
        $config["per_page"] = 5;
        $results = $this->compras_model->traer_producto($config['per_page'], $page, $term);
        $config["total_rows"] = !empty($results) ? array_pop($results) : 0;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        $data["comprasGuardados"] = !empty($results) ? $results : null;
        $data["links"] = $this->pagination->create_links();

        $this->load->view('partials/header_view', $data);
        $this->load->view('compras_view',$data);
        $this->load->view('partials/footer_view');
    }

    public function fetchByMine()
    {
        $data['titulo'] = 'Compras';
        $data['main_content'] = 'inicio';

        $term = '';

        if ($this->input->post('term')) {
            $term = $this->input->post('term');
            $this->session->set_userdata('search_term', $term);
        } else if ($this->session->userdata('search_term')) {
            $term = $this->session->userdata('search_term');
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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->load->model('compras_model');

        $config = array();
        $config["base_url"] = base_url() . "compras/fetchByMine/pag";
        $config["per_page"] = 5;
        $results = $this->compras_model->traer_mina($config['per_page'], $page, $term);
        $config["total_rows"] = !empty($results) ? array_pop($results) : 0;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        $data["comprasGuardados"] = !empty($results) ? $results : null;
        $data["links"] = $this->pagination->create_links();

        $this->load->view('partials/header_view', $data);
        $this->load->view('compras_view', $data);
        $this->load->view('partials/footer_view');
    }

    public function fetchByDeliver()
    {
        $data['titulo'] = 'Compras';
        $data['main_content']='inicio';

        $term = '';

        if($this->input->post('datepicker')) {
            $term = $this->input->post('datepicker');
            $this->session->set_userdata('search_term', $term);
        } else if($this->session->userdata('search_term')) {
            $term = $this->session->userdata('search_term');
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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->load->model('compras_model');

        $config = array();
        $config["base_url"] = base_url() . "compras/fetchByDeliver/pag";
        $config["per_page"] = 5;
        $results = $this->compras_model->traer_entregado($config['per_page'], $page, $term);
        $config["total_rows"] = !empty($results) ? array_pop($results) : 0;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        $data["comprasGuardados"] = !empty($results) ? $results : null;
        $data["links"] = $this->pagination->create_links();

        $this->load->view('partials/header_view', $data);
        $this->load->view('compras_view',$data);
        $this->load->view('partials/footer_view');
    }

    public function fetchByUser()
    {
        $data['titulo'] = 'Compras';
        $data['main_content'] = 'inicio';

        $term = '';

        if ($this->input->post('term')) {
            $term = $this->input->post('term');
            $this->session->set_userdata('search_term', $term);
        } else if ($this->session->userdata('search_term')) {
            $term = $this->session->userdata('search_term');
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

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->load->model('compras_model');

        $config = array();
        $config["base_url"] = base_url() . "compras/fetchByUser/pag";
        $config["per_page"] = 5;
        $results = $this->compras_model->traer_usuario($config['per_page'], $page, $term);
        $config["total_rows"] = !empty($results) ? array_pop($results) : 0;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);


        $data["comprasGuardados"] = !empty($results) ? $results : null;
        $data["links"] = $this->pagination->create_links();

        $this->load->view('partials/header_view', $data);
        $this->load->view('compras_view', $data);
        $this->load->view('partials/footer_view');
    }
}