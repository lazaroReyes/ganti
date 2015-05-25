<?php
/**
 * Created by PhpStorm.
 * User: Lazaro
 * Date: 23/05/2015
 * Time: 04:36 PM
 */

class news extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index()
    {
        $data['news'] = $this->news_model->get_users();
        $data['title'] = 'Users';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id)
    {
        $data['news_item'] = $this->news_model->get_users($id);

        if (empty($data['news_item'])):
            show_404();
        endif;

        $data['title'] = $data['news_item'][0]->email;

        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
}