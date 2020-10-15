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
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		if($this->form_validation->run() == false){
		$this->load->view('include/auth_header');

		$this->load->view('auth/login');

		$this->load->view('include/auth_footer');
		}else{
			$this->_login();
		}
	}

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user =$this->db->get_where('user',['email' => $email])->row_array();
		if($user){
				if($user['is_active'] == 1){
					if(password_verify($password,$user['password'])){
						$data = [
							'email' => $user['email'],
							'id_role'=> $user['id_role']
							];
						$this->session->set_userdata($data);
						redirect('user');
					}else{
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password!</div>');
						redirect('auth');
					}
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">This Email not active for long time!</div>');
					redirect('auth');
		
				}
			
		}else{
		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered!</div>');
		redirect('auth');
		}	



	}


	public function Register()
	{
		$this->form_validation->set_rules('name','Name','trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('email','Email','trim|required|min_length[8]|is_unique[user.email]');
		$this->form_validation->set_rules('password1','Password', 'trim|required|min_length[4]|matches[password2]');
		$this->form_validation->set_rules('password2','password', 'trim|required|matches[password1]');
			
		if($this->form_validation->run() == false){
		$this->load->view('include/auth_header');

		$this->load->view('auth/register');

		$this->load->view('include/auth_footer');

	}else{
		$data = [
			'name'=>htmlspecialchars($this->input->post('name',TRUE)),
			'email'=>htmlspecialchars($this->input->post('email',TRUE)),
			'image'=>'default.jpg',
			'password'=>password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'id_role'=> 2,
			'is_active'=> 1,
			'date_created'=> time(),
			'date_modified'=>NULL];
			$this->db->insert('user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Congratulation! Your Account Is Now Ready!');
			redirect('auth');

	}
	}
	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');
			
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> >////<');
		redirect('auth');
	}

}
