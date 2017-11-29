<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	public function index()
	{
		$this->load->view('user/register');
	}
	public function create()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$new = $this->User->encrypt_password($password, $email);
		$data = array(
		   'email' => $email ,
		   'name' => $name ,
		   'password' => $new
		);

		$result = $this->db->insert('users', $data); 
		if ($result) {
			redirect('');
		}else{
			redirect('register');
		}
	}
}
