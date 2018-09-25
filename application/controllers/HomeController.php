<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		/*master page*/
	   	$this->load->model('admin/CategoryModel');
	   	$this->load->model('admin/SubCategoryModel');
	   	$this->load->model('admin/ProductModel');
	   	$this->load->model('admin/BrandModel');
	   	$this->load->model('admin/AboutModel');
	}

	public function index(){
		/*master page*/
		$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
		$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
		$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();

		$data['title'] = "Home";
		$data['content'] = 'home';
		$data['getProduct'] = $this->ProductModel->getAllProduct();
		$data['getBrand'] = $this->BrandModel->get_brand(); //print_r($data['getBrand']); die;
		$data['get_about'] = $this->AboutModel->get_About();
		//print_r($data['getProduct']); die;
		$this->load->view('masteruserlayout',$data);
	}
}
