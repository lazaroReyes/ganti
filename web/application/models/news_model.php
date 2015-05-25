<?php
/**
 * Created by PhpStorm.
 * User: Lazaro
 * Date: 23/05/2015
 * Time: 04:16 PM
 */

class news_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_users($id = FALSE)
    {
        if($id === FALSE):
        $query = $this->db->get('system_users');
        return $query->result();
        endif;

        $query = $this->db->get_where('system_users', array('id' => $id),1);
        return $query->result();
    }

}