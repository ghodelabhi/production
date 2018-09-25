<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EnquiryController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('GeneralModel');
	}

	public function index(){
		$data['title'] = "Enquiry Users";
		$data['content'] = 'admin/enquiry';
		$data['enquiry'] = $this->GeneralModel->getEnquiry(); //get all enquiry users
		$this->load->view('admin/layout/adminmaster',$data);
	}

	//show popup enquiry
	public function showEnquiry(){
		$id= $this->input->post('id');
		$data['enquiry'] = $this->GeneralModel->getEnquiryById($id); //get  enquiry users by id
		$this->load->view('admin/showenquiry',$data);
	}
}
