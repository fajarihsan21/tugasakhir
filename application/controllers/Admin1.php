<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin1 extends CI_Controller 
{
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
		/**echo 'Selamat Datang ' . $data['user']['name'];**/

		$this->load->view('templates/header', $data);
		$this->load->view('admin1/index', $data);
		$this->load->view('templates/footer');
	}


}