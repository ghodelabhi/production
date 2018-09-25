<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		/*master page*/
	   	$this->load->model('admin/CategoryModel');
	   	$this->load->model('admin/SubCategoryModel');
	}
	
	//show service
	public function index(){
		$data['title'] = "Service";
		$data['content'] = 'service';
		/*master page*/
		$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
		$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
		$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();
		$this->load->view('masteruserlayout',$data);
	}

	
}
