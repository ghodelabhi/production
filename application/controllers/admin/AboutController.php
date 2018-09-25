<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutController extends CI_Controller {

	
	public function __construct(){
	  parent::__construct();
		
	   	$this->load->model('admin/AboutModel');
      }

	public function index(){
		// Load session library
		if (isset($this->session->userdata['logged_in'])){
		$data['title'] = "About";
		$data['content'] = 'admin/about';
		$data['getAbout'] = $this->AboutModel->getAbout(); //retrive 
		$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	public function addedit(){
		if (isset($this->session->userdata['logged_in'])){
			$about_id = $this->uri->segment(4);// get id form url 
			if($about_id==''){
				$data['title'] = "Add About";
				
			}else{
				$data['title'] = "Edit About";
			}
			$data['content'] = 'admin/addeditabout';
			$data['getAbout'] = $this->AboutModel->getAboutById($about_id); //retrive all category By Id
			//print_r($data['getAbout']); die;
			$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	/* add edit about in database */
	public function addeditdata(){
		if (isset($this->session->userdata['logged_in'])){
			$config = array(
				array(
	                'field' => 'description',
	                'label' => 'Description',
	                'rules' => 'trim|required|min_length[100]'
	        )  );   
			
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				$id= $this->input->post('id');
				if($id==''){
					redirect('admin/about/add-edit-about');
				}else{
					redirect('admin/about/add-edit-about/'.$id);
				}
				
			}else{
				$id= $this->input->post('id');
				if($id==''){
					$data = array(
					'description' => $this->input->post('description'),
					);
					$result = $this->AboutModel->insert_about($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Added.');
						redirect('admin/about/add-edit-about');
					}else{
						$this->session->set_flashdata('err_message', 'This Category already exist');
						redirect('admin/about/add-edit-about');
					}
				}else{
					$data = array(
					'description' => $this->input->post('description'),
					'id' => $this->input->post('id'),
					);
					$result = $this->AboutModel->update_about($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Updated.');
						redirect('admin/about/add-edit-about/'.$id);
						//echo 'ok'; die;
					}else{
						$this->session->set_flashdata('message', 'Not Updated.');
						redirect('admin/about/add-edit-about/'.$id);
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
