<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index()
	{
		$instruments=$this->Instrument->all();
		$data['instruments'] = $instruments;
		$genres=$this->MusicalGenre->all();
		$data['genres'] = $genres;
		$users=$this->User->all();
		$data['users'] = $users;
		$this->load->view('principal', $data);
	
	}
	

	public function search(){
		$genres= $this->input->post('genre');
		$tools= $this->input->post('instruments');
		
		$data['users']=$this->User->search($genres, $tools);
		$instruments=$this->Instrument->all();
		$data['instruments'] = $instruments;
		$genres=$this->MusicalGenre->all();
		$data['genres'] = $genres;
		$this->load->view('principal', $data);
	}

	public function show($id)
	{
		$data['user'] = $this->User->find($id)[0];
		$data['instruments']=$this->Instrument->select($data['user']->id);
		$data['genres']=$this->MusicalGenre->select($data['user']->id);
		$this->load->view('user/show', $data);
	}
}
