<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		/*master page*/
	   	$this->load->model('admin/CategoryModel');
	   	$this->load->model('admin/SubCategoryModel');
	   	$this->load->model('admin/AboutModel');
	}

	public function index(){
		$data['title'] = "About Us";
		$data['content'] = 'aboutus';
		/*master page*/
		$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
		$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
		$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();
		$data['get_about'] = $this->AboutModel->get_About();
		$this->load->view('masteruserlayout',$data);
	}

	
} 
