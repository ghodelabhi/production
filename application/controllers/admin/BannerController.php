<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerController extends CI_Controller {

	
	public function __construct(){
	  parent::__construct();
	  	$this->load->model('admin/BannerModel');

      }

	public function index(){
		// Load session library
		if (isset($this->session->userdata['logged_in'])){
		$data['title'] = "Banner Image";
		$data['content'] = 'admin/banner_image';
		$data['get_banner'] = $this->BannerModel->get_banner(); //retrive 
		$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	public function addedit(){
		if (isset($this->session->userdata['logged_in'])){
			$banner_id = $this->uri->segment(4);// get id form url 
			if($banner_id==''){
				$data['title'] = "Add Banner";
				
			}else{
				$data['title'] = "Edit baner";
			}
			$data['content'] = 'admin/add_edit_banner';
			$data['get_banner'] = $this->BannerModel->get_banner_by_id($banner_id); //retrive all category By Id
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
	                'field' => 'banner_title',
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
					redirect('admin/banner/add-edit-banner');
				}else{
					redirect('admin/banner/add-edit-banner/'.$id);
				}
				
			}else{
				$id= $this->input->post('id');
				if($id==''){
					/* image upload */
					$config['upload_path'] = 'assets/img/slides/flexslider/';
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
					'banner_title' => $this->input->post('banner_title'),
					'image' => $image
					);
					$result = $this->BannerModel->insert_banner($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Added.');
						redirect('admin/banner');
					}else{
						$this->session->set_flashdata('err_message', 'This Banner already exist');
						redirect('admin/banner/add-edit-banner');
					}
				}else{
					if(isset($_FILES['image']['name'])){
						$config['upload_path'] = 'assets/img/slides/flexslider/';
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
					'banner_title' => $this->input->post('banner_title'),
					'id' => $this->input->post('id'),
					'image' => $image
					);
					$result = $this->BannerModel->update_banner($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Updated.');
						redirect('admin/banner/add-edit-banner/'.$id);
						//echo 'ok'; die;
					}else{
						$this->session->set_flashdata('message', 'Not Updated.');
						redirect('admin/banner/add-edit-banner/'.$id);
					}
				}
				
			}
		}else{
			redirect('admin/login');
		}
	}

	public function delete_banner(){
		if (isset($this->session->userdata['logged_in'])){
			$id = $this->uri->segment(3);
			$dlt = $this->BannerModel->delete_banner($id);
					if($dlt == TRUE){
						$this->session->set_flashdata('message', 'Successfully Deleted.');
						redirect('admin/banner');
		 			}else{
						$this->session->set_flashdata('err_message', 'not deleted');
						redirect('admin/banner');
					}
			
		}else{
			redirect('admin/login');
		}
	}

	
}
