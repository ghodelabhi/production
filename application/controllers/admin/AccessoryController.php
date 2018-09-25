<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccessoryController extends CI_Controller {

	
	public function __construct(){
	  parent::__construct();
		
	   	$this->load->model('admin/AccessoryModel');
      }

	public function index(){
		// Load session library
		if (isset($this->session->userdata['logged_in'])){
		$data['title'] = "Accessory";
		$data['content'] = 'admin/accessory';
		$data['getAccessory'] = $this->AccessoryModel->getAccessory(); //retrive all Accessory
		$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	public function addedit(){
		if (isset($this->session->userdata['logged_in'])){
			$accessory_id = $this->uri->segment(4);// get id form url 
			if($accessory_id==''){
				$data['title'] = "Add Accessory";
				
			}else{
				$data['title'] = "Edit Accessory";
			}
			$data['content'] = 'admin/add_edit_accessory';
			$data['get_accessory'] = $this->AccessoryModel->get_accessory_by_id($accessory_id); //retrive all category By Id
			//print_r($data['getAbout']); die;
			$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	/* add edit accessory in database */
	public function addeditdata(){
		if (isset($this->session->userdata['logged_in'])){
			$config = array(
				array(
	                'field' => 'title',
	                'label' => 'Accessory',
	                'rules' => 'trim|required'
	        ),
				array(
	                'field' => 'description',
	                'label' => 'Description',
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
					redirect('admin/accessory/add-edit-accessory');
				}else{
					redirect('admin/accessory/add-edit-accessory/'.$id);
				}
				
			}else{
				$id= $this->input->post('id');
				if($id==''){
					/* image upload */
					$config['upload_path'] = 'assets/img/accessory/';
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
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'image' => $image
					);
					$result = $this->AccessoryModel->insert_accessory($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Added.');
						redirect('admin/accessory');
					}else{
						$this->session->set_flashdata('err_message', 'This Banner already exist');
						redirect('admin/accessory/add-edit-accessory');
					}
				}else{
					if(isset($_FILES['image']['name'])){
						$config['upload_path'] = 'assets/img/accessory/';
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
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'image' => $image,
					'id' => $this->input->post('id'),
					
					);
					$result = $this->AccessoryModel->update_accessory($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Updated.');
						redirect('admin/accessory/add-edit-accessory/'.$id);
						//echo 'ok'; die;
					}else{
						$this->session->set_flashdata('message', 'Not Updated.');
						redirect('admin/accessory/add-edit-accessory/'.$id);
					}
				}
				
			}
		}else{
			redirect('admin/login');
		}
	}


	//delete title
	public function deleteTitle(){
		if (isset($this->session->userdata['logged_in'])){
			$id = $this->uri->segment(3);
			$dlt = $this->AccessoryModel->deleteTitle($id);
					if($dlt == TRUE){
						$this->session->set_flashdata('message', 'Successfully Deleted.');
						redirect('admin/accessory/accessory_title');
		 			}else{
						$this->session->set_flashdata('err_message', 'not deleted');
						redirect('admin/accessory/accessory_title');
					}
			
		}else{
			redirect('admin/login');
		}
	}
}
