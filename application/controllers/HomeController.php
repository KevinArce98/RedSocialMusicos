<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index()
	{
		$query = $this->db->get('users');
		$data['query'] = $query;
		$this->load->view('principal', $data);
	}
	public function destroy($id)
	{
		$this -> db -> where('id', $id);
 		$this -> db -> delete('users');
        

        $query = $this->db->get('users');
		$data['query'] = $query;
		$this->load->view('principal', $data);
	}

	public function edit($id)
	{
		   $this->db->select('*');
    $this->db->from('users');
    $this->db->where('id', $id);

 		$user = $this->db->get();
		$data['user'] = $user->result()[0];
		$this->load->view('user/edit', $data);
	}

	public function update($id)
	{
		$new = $this->User->encrypt_password($this->input->post('password'), $this->input->post('email'));
		  $data = array (
            'name'   => $this->input->post('name'),
            'email'      => $this->input->post('email'),
            'password' => $new,
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);
        $query = $this->db->get('users');
		$data['query'] = $query;
        $this->load->view('principal', $data);
	}
}
