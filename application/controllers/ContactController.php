<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		/*master page*/
	   	$this->load->model('admin/CategoryModel');
	   	$this->load->model('admin/SubCategoryModel');

	}
	
	public function index(){
		$data['title'] = "Contact Us";
		$data['content'] = 'contact';
		/*master page*/
		$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
		$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
		$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();
		$this->load->view('masteruserlayout',$data);
	}

	public function sendMail() { 
		$config = array(
				array(
	                'field' => 'name',
	                'label' => 'Name',
	                'rules' => 'required|trim|min_length[2]|max_length[20]'
	        ),
			
				array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|trim|valid_email|min_length[2]|max_length[60]'
	        ),
				array(
	                'field' => 'subject',
	                'label' => 'Subject',
	                'rules' => 'required|trim|min_length[2]|max_length[60]'
	        ),
				array(
	                'field' => 'message',
	                'label' => 'Message',
	                'rules' => 'required|trim|min_length[2]|max_length[512]'
	        ),
	        	
	    );

		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$data['title'] = "Contact Us";
			$data['content'] = 'contact';
			/*master page*/
			$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
			$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
			$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();
			$this->load->view('masteruserlayout',$data);
		}else{ 
			 $name = $this->input->post('name');
			 $sub = $this->input->post('subject');
			 $msg = $this->input->post('message');
	         $from_email = $this->input->post('email'); 
	         $to_email = "info@pinkcityscales.com"; 

	   		
	   		/*$config = Array(        
            'protocol' => 'pinkcityscales.com/webmail',
            'smtp_host' => 'your domain SMTP host',
            'smtp_port' => 465,
            'smtp_user' => 'info@pinkcityscales.com',
            'smtp_pass' => 'infopinkcity1234',
        	);*/

	         //Load email library 
	         $this->load->library('email'); 

	         $this->email->from($from_email, $name); 
	         $this->email->to($to_email);
	         $this->email->subject($sub); 
	         $this->email->message($msg); 
	   
	         //Send mail 
	         if($this->email->send()) 
	         $this->session->set_flashdata("email_sent","Message sent successfully."); 
	         else 
	         $this->session->set_flashdata("err_message","Error in sending Message."); 
	        redirect('contact-us');
	    }
    } 
}
