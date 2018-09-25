<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrandController extends CI_Controller {

	
	public function __construct(){
	  parent::__construct();
	  	$this->load->model('admin/BrandModel');

      }

	public function index(){
		// Load session library
		if (isset($this->session->userdata['logged_in'])){
		$data['title'] = "Brand";
		$data['content'] = 'admin/brand';
		$data['getAbout'] = $this->BrandModel->get_brand(); //retrive 
		$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	public function addedit(){
		if (isset($this->session->userdata['logged_in'])){
			$brand_id = $this->uri->segment(4);// get id form url 
			if($brand_id==''){
				$data['title'] = "Add Brand";
				
			}else{
				$data['title'] = "Edit Brand";
			}
			$data['content'] = 'admin/addeditbrand';
			$data['get_brand'] = $this->BrandModel->get_brand_by_id($brand_id); //retrive all category By Id
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
	                'field' => 'brand_name',
	                'label' => 'Brand',
	                'rules' => 'trim|required'
	        ),
	        );

			if($this->input->post('id')==''){
		        if (empty($_FILES['image']['name']))
				{
	    		$this->form_validation->set_rules('image', 'Image', 'required');
				}
			}
			
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('errors', validation_errors());
				$id= $this->input->post('id');
				if($id==''){
					redirect('admin/brand/add-edit-brand');
				}else{
					redirect('admin/brand/add-edit-brand/'.$id);
				}
				
			}else{
				$id= $this->input->post('id');
				if($id==''){
					/* image upload */
					$config['upload_path'] = 'assets/img/brand/';
	                $config['allowed_types'] = 'jpg|jpeg|png|gif';
	                $config['file_name'] = $_FILES['image']['name'];
	                //print_r($config['file_name']); die;
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('image')){
	                    $uploadData = $this->upload->data();
	                    $image = $uploadData['file_name'];
	                }else{
	                    $image = '';
	                }
	                /* close image upload */
					$data = array(
					'brand_name' => $this->input->post('brand_name'),
					'image' => $image
					);
					$result = $this->BrandModel->insert_brand($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Added.');
						redirect('admin/brand');
					}else{
						$this->session->set_flashdata('err_message', 'This Brand already exist');
						redirect('admin/brand/add-edit-brand');
					}
				}else{
					if(isset($_FILES['image']['name'])){
						$config['upload_path'] = 'assets/img/brand/';
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
		                $config['file_name'] = $_FILES['image']['name'];
		                
		                //Load upload library and initialize configuration
		                $this->load->library('upload',$config);
		                $this->upload->initialize($config);
		                
		                if($this->upload->do_upload('image')){
		                    $uploadData = $this->upload->data();
		                    $image = $uploadData['file_name'];
		                }else{
		                    $image = '';
		                }
		            }else{
		            	$image = '';
		            }

					$data = array(
					'brand_name' => $this->input->post('brand_name'),
					'id' => $this->input->post('id'),
					'image' => $image
					);
					$result = $this->BrandModel->update_brand($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Updated.');
						redirect('admin/brand/add-edit-brand/'.$id);
						//echo 'ok'; die;
					}else{
						$this->session->set_flashdata('message', 'Not Updated.');
						redirect('admin/brand/add-edit-brand/'.$id);
					}
				}
				
			}
		}else{
			redirect('admin/login');
		}
	}

	public function delete_brand(){
		if (isset($this->session->userdata['logged_in'])){
			$id = $this->uri->segment(3);
			$dlt = $this->BrandModel->delete_brand($id);
					if($dlt == TRUE){
						$this->session->set_flashdata('message', 'Successfully Deleted.');
						redirect('admin/brand');
		 			}else{
						$this->session->set_flashdata('err_message', 'not deleted');
						redirect('admin/brand');
					}
			
		}else{
			redirect('admin/login');
		}
	}

	
}
