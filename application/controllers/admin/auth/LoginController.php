<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	
	public function __construct(){
	  parent::__construct();
		$this->load->helper('form'); 
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('admin/auth/LoginModel');
      }

	public function index(){
		// Load session library
		//$data['title'] = "Login";
		//$data['content'] = 'admin/login';
		//$data['getCategory'] = $this->CategoryModel->getCategory(); //retrive all category
		$this->load->view('admin/auth/login');
	}

	//check login
	public function checkLogin(){
		$config = array(
			array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email'
        ),
        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim'
        )
        
		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
			$this->load->view('admin/dashboard');
			}else{
			$this->load->view('admin/auth/login');
			}
		}else{
			$data = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
			);

			$result = $this->LoginModel->login($data);
			if ($result == TRUE) { 
				$email = $this->input->post('email');
				$result = $this->LoginModel->readUserInformation($email);
				if ($result != false) {
				$session_data = array(
				'userid' => $result[0]->id,
				'email' => $result[0]->email,
				);

				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);
				redirect('admin/dashboard');
				//$data['title'] = "Admin Dashboard";
				//$data['content'] = 'admin/dashboard';
				//$this->load->view('admin/layout/adminmaster',$data);

				}
			}else{ 
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('admin/auth/login', $data);

			}
		}
	}

	//destroy session
	public function destroySession(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}

	
}
