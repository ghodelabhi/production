<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VideoController extends CI_Controller {

	public function __construct(){
	  parent::__construct();
	   	$this->load->model('VideoModel');
      }

	public function index(){
		// Load session library
		if (isset($this->session->userdata['logged_in'])){
		$data['title'] = "Video";
		$data['content'] = 'admin/video';
		$data['getVideo'] = $this->VideoModel->getVideo(); //retrive all video
		$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}
	
	//show add edit view
	public function addEdit(){
		if (isset($this->session->userdata['logged_in'])){
			$video_id = $this->uri->segment(4);// get id form url
			if($video_id==''){
				$data['title'] = "Add Video";
				
			}else{
				$data['title'] = "Edit Video";
			}
			$data['content'] = 'admin/addeditvideo';
			$data['getVideo'] = $this->VideoModel->getVideoById($video_id); //retrive all category By Id
			//print_r($data['getVideo']); die;
			$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	/* add edit video in database */
	public function addEditData(){
		if (isset($this->session->userdata['logged_in'])){
			$config = array(
				array(
	                'field' => 'title',
	                'label' => 'Title',
	                'rules' => 'required|trim|min_length[2]|max_length[12]'
	        ),
	        array(
	                'field' => 'link',
	                'label' => 'Link',
	                'rules' => 'required|trim'
	        )
	          );   
			
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				//$this->addedit();
				$this->session->set_flashdata('errors', validation_errors());
				$id= $this->input->post('id');
				if($id==''){
					redirect('admin/video/add-edit-video');
				}else{
					redirect('admin/video/add-edit-video/'.$id);
				}
				
			}else{
				$id= $this->input->post('id');
				if($id==''){
					$data = array(
					'title' => $this->input->post('title'),
					'link' => $this->input->post('link'),
					);
					$result = $this->VideoModel->insertVideo($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Added.');
						redirect('admin/video');
					}else{
						$this->session->set_flashdata('err_message', 'This Video already exist');
						redirect('admin/video');
					}
				}else{
					$data = array(
					'title' => $this->input->post('title'),
					'link' => $this->input->post('link'),
					'id' => $this->input->post('id'),
					);
					$result = $this->VideoModel->updateVideo($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Updated.');
						redirect('admin/video/add-edit-video/'.$id);
						//echo 'ok'; die;
					}else{
						$this->session->set_flashdata('message', 'Not Updated.');
						redirect('admin/video/add-edit-video/'.$id);
					}
				}
				
			}
		}else{
			redirect('admin/login');
		}
	}

	public function deleteVideo(){
		if (isset($this->session->userdata['logged_in'])){
			$id = $this->uri->segment(4);
			$dlt = $this->VideoModel->deleteVideo($id);
					if($dlt == TRUE){
						$this->session->set_flashdata('message', 'Successfully Deleted.');
						redirect('admin/video');
		 			}else{
						$this->session->set_flashdata('err_message', 'not deleted');
						redirect('admin/video');
					}
			
		}else{
			redirect('admin/login');
		}
	}
}
