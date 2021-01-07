<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quality extends CI_Controller 
{
	public function index()
	{
		$data['title'] = 'Quality';
		$data['user'] = $this->db->get_where('user', ['user_name' => $this->session->userdata('user_name')])->row_array();
		/**echo 'Selamat Datang ' . $data['user']['name'];**/

		$this->load->view('templates/headerq', $data);
		$this->load->view('quality/index', $data);
		$this->load->view('templates/footer');
	}

}