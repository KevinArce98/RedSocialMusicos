<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	public function index()
	{
		$genres = $this->MusicalGenre->all();
		$instruments = $this->Instrument->all();
		$data['genres'] = $genres;
		$data['instruments'] = $instruments;
		$this->load->view('user/register', $data);
	}
	public function create()
	{	
		$name = $this->input->post('name');
		$lastname = $this->input->post('lastname');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$genres = $this->input->post('genres');
		$instruments = $this->input->post('instruments');
		$config = array(
		'upload_path' => "./uploads/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024"
		);
		$this->load->library('upload', $config);
print_r($config);die;
		$new = $this->User->encrypt_password($password, $email);
		$data = array(
		   'email' => $email ,
		   'name' => $name ,
		   'lastname' => $lastname ,
		   'address' => $address ,
		   'avatar' => $avatar ,
		   'password' => $new
		);

		$result = $this->db->insert('musicians', $data); 
		if ($result) {
			redirect('');
		}else{
			redirect('register');
		}
	}
}
