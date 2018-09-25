<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		/*master page*/
	   	$this->load->model('admin/CategoryModel');
	   	$this->load->model('admin/SubCategoryModel');
	   	$this->load->model('admin/ProductModel');
	   	$this->load->model('admin/AccessoryModel');
	}

	public function index(){
		/*master page*/
		$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
		$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
		$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();

		$data['title'] = "Product";
		$data['content'] = 'product';
		$data['categoryName'] = $this->uri->segment(2); 
		$categoryId = $this->uri->segment(3); 
		$data['getAllProduct'] = $this->ProductModel->getProductByCategoryId($categoryId);
		$this->load->view('masteruserlayout',$data);
	}

	public function productDetail(){
		/*master page*/
		$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
		$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
		$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();

		$data['title'] = "Product Details";
		$data['content'] = 'productdetails';
		$data['categoryName'] = $this->uri->segment(2); 
		$data['productName'] = $this->uri->segment(3); 
		$productId = $this->uri->segment(4);
		$data['getProductDetails'] = $this->ProductModel->getProductDetailsById($productId);
		//print_r($data['getProductDetails']); die;
		$this->load->view('masteruserlayout',$data);
	}

	public function accessories(){
		/*master page*/
		$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
		$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
		$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();

		$data['title'] = "Accessories";
		$data['content'] = 'accessories';
		$data['categoryName'] = $this->uri->segment(2); 
		$data['productName'] = $this->uri->segment(3); 
		
		$data['getTitle'] = $this->AccessoryModel->getAccessory();
		//print_r($data['getProductDetails']); die;
		$this->load->view('masteruserlayout',$data);
	}
}
