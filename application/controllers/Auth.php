<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) 
		{
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			/**validasi sukses**/
			$this->_login();

		}
		
	}

	private function _login()
	{
		$user_name = $this->input->post ('user_name');
		$password = $this->input->post ('password');
		$user = $this->db->get_where('user', ['user_name' => $user_name])->row_array(); /** select*from table user where user_name=user_name 
		**/

		if($user){

			/*jika user aktif*/
			if($user['is_active'] == 1)
			{
				/*cek password*/
				if(password_verify($password, $user['password']))
				{
					$data =	[
						'user_name' =>	$user['user_name'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 1) {
						redirect('admin1');
					} else if($user['role_id'] == 2) {
						redirect('user');
					} else if($user['role_id'] == 3) {
						redirect('quality');
					} else {
						redirect('engineering');
					} 
					
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Password!</div>');
					redirect('auth');
				}

			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> User is not activated!</div>');
			redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> User Name is not registered!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|is_unique[user.user_name]', ['is_unique' => 'This user name has already used!']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', ['is_unique' => 'This email has already used!']);
		$this->form_validation->set_rules('departement', 'Departement', 'trim|required');
		$this->form_validation->set_rules('password1','Password', 'trim|required|min_length[5]|matches[password2]', ['matches' => 'Password not matches!', 'min_length' => 'Password too short!']);
		$this->form_validation->set_rules('password2','Password', 'trim|required|matches[password1]');

		if ($this->form_validation->run($this) == false) {
			$data['title'] = 'User Registration ';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {

			/**
			 * echo 'Your data are valid!';
			 */
			
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)), /**htmlspecialchars untuk security**/
				'user_name' => htmlspecialchars($this->input->post('user_name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'departement' => htmlspecialchars($this->input->post('departement', true)),
				'image' => 'default.jpg',
				'password' =>  password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your account has been created. Please Login</div>');
			redirect('auth');
		}
		
	}
	public function logout()
	{
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You have been logged out! </div>');
			redirect('auth');
	}
}