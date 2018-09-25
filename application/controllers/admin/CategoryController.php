<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {

	
	public function __construct(){
	  parent::__construct();
		$this->load->helper('form'); 
		$this->load->library('form_validation');
		$this->load->library('session');
	   	$this->load->model('admin/CategoryModel');
      }

	public function index(){
		// Load session library
		if (isset($this->session->userdata['logged_in'])){
		$data['title'] = "Category";
		$data['content'] = 'admin/category';
		$data['getCategory'] = $this->CategoryModel->getCategory(); //retrive all category
		$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	public function addedit(){
		if (isset($this->session->userdata['logged_in'])){
			$category_id = $this->uri->segment(3);// get id form url
			if($category_id==''){
				$data['title'] = "Add Category";
				
			}else{
				$data['title'] = "Edit Category";
			}
			$data['content'] = 'admin/addeditcategory';
			$data['getCategory'] = $this->CategoryModel->getCategoryById($category_id); //retrive all category By Id
			//print_r($data['getCategory']); die;
			$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	/* add edit category in database */
	public function addeditdata(){
		if (isset($this->session->userdata['logged_in'])){
			$config = array(
				array(
	                'field' => 'category',
	                'label' => 'Category',
	                'rules' => 'required|trim|min_length[2]|max_length[100]'
	        )  );   
			
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				//$this->addedit();
				$this->session->set_flashdata('errors', validation_errors());
				$id= $this->input->post('id');
				if($id==''){
					redirect('admin/add-edit-category');
				}else{
					redirect('admin/add-edit-category/'.$id);
				}
				
			}else{
				$id= $this->input->post('id');
				if($id==''){
					$data = array(
					'category' => $this->input->post('category'),
					);
					$result = $this->CategoryModel->insert_category($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Added.');
						redirect('admin/category');
					}else{
						$this->session->set_flashdata('err_message', 'This Category already exist');
						redirect('admin/category');
					}
				}else{
					$data = array(
					'category' => $this->input->post('category'),
					'id' => $this->input->post('id'),
					);
					$result = $this->CategoryModel->updateCategory($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Updated.');
						redirect('admin/add-edit-category/'.$id);
						//echo 'ok'; die;
					}else{
						$this->session->set_flashdata('message', 'Not Updated.');
						redirect('admin/add-edit-category/'.$id);
					}
				}
				
			}
		}else{
			redirect('admin/login');
		}
	}

	public function deleteCategory(){
		if (isset($this->session->userdata['logged_in'])){
			$id = $this->uri->segment(3);
			$dlt = $this->CategoryModel->deleteCategory($id);
					if($dlt == TRUE){
						$this->session->set_flashdata('message', 'Successfully Deleted.');
						redirect('admin/category');
		 			}else{
						$this->session->set_flashdata('err_message', 'not deleted');
						redirect('admin/category');
					}
			
		}else{
			redirect('admin/login');
		}
	}

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
				$result = $this->CategoryModel->updateStatus($data);
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
