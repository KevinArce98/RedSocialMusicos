<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function index()
	{
		$this->load->view('user/index');
	}
	public function auth()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$query = $this->db->get('musicians');

		foreach ($query->result() as $row)
		{
	        if ($email == $row->email) {
	        	if ($this->User->is_valid_password($password,$row->password)) {
	        		$_SESSION['user'] = $row;
	        		redirect('home');
	        	}
	        }
		}
		redirect('');

	}
	public function logout()
	{
		session_destroy();
		redirect('');
	}
}
