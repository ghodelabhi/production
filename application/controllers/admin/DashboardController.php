<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

	public function __construct(){
	  parent::__construct();
	   	$this->load->model('admin/CategoryModel');
	   	$this->load->model('admin/SubCategoryModel');
	   	$this->load->model('GeneralModel');
     }

	public function index()
	{
		// Load session library
	   $this->load->library('session');
		//$this->load->helper('url');
		if (isset($this->session->userdata['logged_in'])){
			$data['title'] = "Admin Dashboard";
			$data['content'] = 'admin/dashboard';
			$data['totalCategory'] = count($this->CategoryModel->getCategory());
			$data['totalSubCategory'] = count($this->SubCategoryModel->getSubCategory());
			$data['totalEnquiryUsers'] = count($this->GeneralModel->getEnquiry());
			$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}
}
