<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') == 'login') {
			redirect('app');
		}
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function signup()
	{
		$this->load->view('signup');
	}

	public function pro_signup()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('fullname');
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$email = $this->input->post('email');
		$pass2 = $this->input->post('pass2');
		$btn = $this->input->post('btn');
		$since = date('Y-m-d');
		$check_email = $this->m_user->check_user('email', $email);
		$check_user = $this->m_user->check_user('username', $user);

		if ($email == NULL OR $pass == NULL OR $name == NULL OR $user == NULL OR $pass == NULL) {
			$this->session->set_flashdata('emptyall', 'Please complete the Registration Form');
			redirect('signup');
		}else{
			if ($pass2 != $pass) {
				$this->session->set_flashdata('wrongpass', 'The Password doesn\'t match');
				redirect('signup');
			}else{
				if ($check_email == 1) {
					$this->session->set_flashdata('wrongpass', 'The Email is registered');
					redirect('signup');
				}else{
					if ($check_user == 1) {
						$this->session->set_flashdata('wrongpass', 'The Username is registered');
						redirect('signup');
					}else{
						$data = array(
							"id_user" => '',
							"username" => $user,
							"password" => $pass,
							"fullname" => $name,
							"email" => $email,
							"since" => $since,
							"holiday" => 0
						);
						$this->m_user->add_user($data);
						$array = array(
							"id" => $this->db->insert_id(),
							"username" => $user,
							"password" => $pass,
							"fullname" => $name,
							"email" => $email,
							"since" => $since,
							"holiday" => 0,
							"status" => 'login'
						);
						
						$this->session->set_userdata($array);
						// print_r($array);
						$this->var['title'] = 'Success Signed up'
						$this->var['redir'] = 'ulala';
						$this->var['content'] = ('success_signup');
						$this->load->view('user/home', $this->var);
					}
				}
			}
		}
	}

	public function pro_login()
	{
		$id = $this->input->post('id');
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		if ($email == NULL AND $pass != NULL) {
			$this->session->set_flashdata('emptyemail', 'The Email is empty');
			redirect('login');
		}elseif ($email != NULL AND $pass == NULL) {
			$this->session->set_flashdata('emptypass', 'The Password is empty');
			redirect('login');
		}elseif ($email == NULL AND $pass == NULL) {
			$this->session->set_flashdata('emptyall', 'Please fill all the login form');
			redirect('login');
		}else{
			$var = $this->m_user->check_user('email', $email);
			if ($var != 1) {
				$this->session->set_flashdata('doubemail', 'The Email is not registered yet');
				redirect('login');
			}elseif($var == 1){
				if ($email == $var->email AND $pass == $var->password) {
					
					$array = array(
						"id" => $var->id_user,
						"username" => $var->username,
						"password" => $var->password,
						"fullname" => $var->fullname,
						"email" => $var->email,
						"since" => $var->since,
						"holiday" => $var->holiday,
						"status" => 'login'
					);
					
					$this->session->set_userdata($array);
					
					redirect('app');
				}elseif ($email != $var->email OR $pass != $var->password) {
					$this->session->set_flashdata('doubemail', 'Wrong Email or Password');
					redirect('login');
				}
			}	
		}

	}
}

/*
* End of this Controller
*/
