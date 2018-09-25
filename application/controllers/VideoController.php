<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoController extends CI_Controller {

	public function __construct(){
	  parent::__construct();
	   	$this->load->model('VideoModel');
	   	/*master page*/
	   	$this->load->model('admin/CategoryModel');
	   	$this->load->model('admin/SubCategoryModel');
    }

	public function index(){
		$data['title'] = "Videos";
		$data['content'] = 'video';
		$data['getVideo'] = $this->VideoModel->getVideo();
		/*master page*/
		$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
		$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
		$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();
		$this->load->view('masteruserlayout',$data);
	}

	
}
