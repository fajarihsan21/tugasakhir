<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
        /**echo 'Selamat Datang ' . $data['user']['name'];**/

        $this->load->view('templates/headerppc', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

}