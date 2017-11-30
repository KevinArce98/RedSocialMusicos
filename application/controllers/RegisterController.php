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
		$lastname = $this->input->post('lastName');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$genres = $this->input->post('genres');
		$instruments = $this->input->post('instruments');
		//Check whether user upload picture
            if(!empty($_FILES['avatar']['name'])){
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['avatar']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('avatar')){
                    $uploadData = $this->upload->data();
                    $picture = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
		$new = $this->User->encrypt_password($password, $email);
		$data = array(
		   'email' => $email ,
		   'name' => $name ,
		   'lastname' => $lastname ,
		   'address' => $address ,
		   'avatar' => $picture ,
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
