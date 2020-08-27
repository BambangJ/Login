<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {
	public function __construct()
	{
	parent::__construct();
	$this->load->helper('url');
	$this->load->library('form_validation');
	
	}

	public function index()
	{
		$this->load->view('include/auth_header');

		$this->load->view('auth/login');

		$this->load->view('include/auth_footer');

	}

	public function Register()
	{
		$this->form_validation->set_rules('name','Name','trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('email','Email','trim|required|min_length[8]|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('repeat_password','Repeat_password', 'trim|required|matches[password]');
			
		if($this->form_validation->run() == false){
		$this->load->view('include/auth_header');

		$this->load->view('auth/register');

		$this->load->view('include/auth_footer');

	}else{
		$data = [
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'image'=>'default.jpg',
			'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'id_role'=> 2,
			'is_active'=> 1,
			'date_created'=> time(),
			'date_modified'=>NULL];
			$this->db->insert('user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Congratulation! Your Account Is Now Ready!');
			redirect('auth');

	}
	}

}
