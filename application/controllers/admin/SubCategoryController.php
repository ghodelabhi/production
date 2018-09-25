<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubCategoryController extends CI_Controller {

	
	public function __construct(){
	  parent::__construct();
	  $this->load->model('admin/CategoryModel');
	   	$this->load->model('admin/SubCategoryModel');
      }

	public function index(){
		// Load session library
		if (isset($this->session->userdata['logged_in'])){
		$data['title'] = "Sub Category";
		$data['content'] = 'admin/subcategory';
		$data['getSubCategory'] = $this->SubCategoryModel->getSubCategory(); //retrive all sub category
		$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	public function addEditSubCategory(){
		if (isset($this->session->userdata['logged_in'])){
			$subcategory_id = $this->uri->segment(3);// get id form url
			if($subcategory_id==''){
				$data['title'] = "Add Sub-Category";
				
			}else{
				$data['title'] = "Edit Sub-Category";
			}
			$data['content'] = 'admin/addeditsubcategory';
			$data['getCategory'] = $this->CategoryModel->getCategoryByStatus(); //get category where status is true in subcategroy
			$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryById($subcategory_id); //retrive all category By Id
			//print_r($data['getCategory']); die;
			$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}
	
	//add edit data in db
	public function addEditData(){
		if (isset($this->session->userdata['logged_in'])){
			$config = array(
				array(
	                'field' => 'category',
	                'label' => 'Category',
	                'rules' => 'required|trim'
	        ),
	        array(
	                'field' => 'subcategory',
	                'label' => 'Sub Category',
	                'rules' => 'required|trim|min_length[2]|max_length[100]'
	        )  );   

	        $this->form_validation->set_rules($config);
	        if($this->form_validation->run() == FALSE){
	        	$this->session->set_flashdata('errors', validation_errors());
				$id= $this->input->post('id');
				if($id==''){
					redirect('admin/add-edit-subcategory');
				}else{
					redirect('admin/add-edit-subcategory/'.$id);
				}

	        }else{
	        	$id= $this->input->post('id');
				if($id==''){
					$data = array(
					'category' => $this->input->post('category'),
					'subcategory' => $this->input->post('subcategory'),
					);
					$result = $this->SubCategoryModel->insertSubcategory($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Added.');
						redirect('admin/sub-category');
					}else{
						$this->session->set_flashdata('err_message', 'This Sub Category already exist');
						redirect('admin/sub-category');
					}
				}else{
					$data = array(
					'category' => $this->input->post('category'),
					'subcategory' => $this->input->post('subcategory'),
					'id' => $this->input->post('id'),
					);
					$result = $this->SubCategoryModel->updateSubCategory($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Updated.');
						redirect('admin/add-edit-subcategory/'.$id);
						//echo 'ok'; die;
					}else{
						$this->session->set_flashdata('message', 'Not Updated.');
						redirect('admin/add-edit-subcategory/'.$id);
					}
				}

	        }
			
		}else{
			redirect('admin/login');
		}
	}

	//delete sub category
	public function deleteSubCategory(){
		if (isset($this->session->userdata['logged_in'])){
			$id = $this->uri->segment(3);
			$dlt = $this->SubCategoryModel->deleteSubCategory($id);
					if($dlt == TRUE){
						$this->session->set_flashdata('message', 'Successfully Deleted.');
						redirect('admin/sub-category');
		 			}else{
						$this->session->set_flashdata('err_message', 'not deleted');
						redirect('admin/sub-category');
					}
			
		}else{
			redirect('admin/login');
		}
	}

	//change status
	public function changeStatus(){
		if (isset($this->session->userdata['logged_in'])){
			$id = $this->input->post('id');
			$status = $this->input->post('status');
			if($status=='t'){
				$status ='f';
			}else{
				$status ='t';
			}

			$data = array(
					'id' => $id,
					'status' => $status,
			);
				$result = $this->SubCategoryModel->updateStatus($data);
					if($result == TRUE){
						echo $status;
					}else{
						echo 'no';
					}

		}else{
			redirect('admin/login');
		}

	}
}
