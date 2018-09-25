<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

	
	public function __construct(){
	  parent::__construct();
	  	$this->load->model('admin/CategoryModel');
	   	$this->load->model('admin/ProductModel');
      }

	public function index(){
		// Load session library
		if (isset($this->session->userdata['logged_in'])){
		$data['title'] = "Product";
		$data['content'] = 'admin/product';
		$data['getProduct'] = $this->ProductModel->getProduct(); //retrive all product 
		$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	public function addedit(){
		if (isset($this->session->userdata['logged_in'])){
			$product_id = $this->uri->segment(4);// get id form url
			if($product_id==''){
				$data['title'] = "Add Product";
				
			}else{
				$data['title'] = "Edit Product";
			}
			$data['content'] = 'admin/addeditproduct';
			$data['getCategory'] = $this->CategoryModel->getCategoryByStatus(); //get category where status is true in subcategroy
			$data['getSubCategory'] = $this->ProductModel->getSubCategory(); //get all category type
			//print_r($data['getSubCategory']); die;
			$data['getProduct'] = $this->ProductModel->getProductById($product_id);
			//print_r($data['getCategory']); die;
			$this->load->view('admin/layout/adminmaster',$data);
		}else{
			redirect('admin/login');
		}
	}

	//load category type 
	public function loadSubCategory(){
		if (isset($this->session->userdata['logged_in'])){
			$id= $this->input->post('id');
			$data['subCategory'] = $this->ProductModel->getSubCategoryByCategoryId($id); //load category type by category id
			$this->load->view('admin/loadsubcategory',$data);
		}else{
			redirect('admin/login');
		}
	}

	/* add edit category in database */
	public function addEditData(){ 
		if (isset($this->session->userdata['logged_in'])){
			$config = array(
				array(
	                'field' => 'category',
	                'label' => 'Category',
	                'rules' => 'required|trim'
	        ),
			
				array(
	                'field' => 'product',
	                'label' => 'Product',
	                'rules' => 'required|trim|min_length[2]|max_length[60]'
	        )
	        	
	          );   
			
			if($this->input->post('id')==''){
		        if (empty($_FILES['image']['name']))
				{
	    		$this->form_validation->set_rules('image', 'Image', 'required');
				}
			}

			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				//$this->addedit();
				$this->session->set_flashdata('errors', validation_errors());
				$id= $this->input->post('id');
				if($id==''){
					redirect('admin/product/add-edit-product');
				}else{
					redirect('admin/product/add-edit-product/'.$id);
				}
				
			}else{
				$id= $this->input->post('id');
				// add product
				if($id==''){

					/* image upload */
					$config['upload_path'] = 'assets/img/products/';
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
	                /* close image upload */

	                /* pdf upload */
					$config['upload_path'] = 'assets/pdf/';
	                $config['allowed_types'] = 'pdf';
	                $config['file_name'] = $_FILES['pdf']['name'];
	                
	                //Load upload library and initialize configuration
	                $this->load->library('upload',$config);
	                $this->upload->initialize($config);
	                
	                if($this->upload->do_upload('pdf')){
	                    $uploadData = $this->upload->data();
	                    $pdf = $uploadData['file_name'];
	                }else{
	                    $pdf = '';
	                }
	                /* close pdf upload */

					$data = array(
					'category_id' => $this->input->post('category'),
					'sub_category_id' => $this->input->post('subcategory'),
					'title' => $this->input->post('product'),
					'sp1' => $this->input->post('sp1'),
					'sp2' => $this->input->post('sp2'),
					'sp3' => $this->input->post('sp3'),
					'sp4' => $this->input->post('sp4'),
					'description' => $this->input->post('description'),
					'pdf_file' => $pdf,
					'image' => $image
					);
					$result = $this->ProductModel->insertProduct($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Added.');
						redirect('admin/product');
					}else{
						$this->session->set_flashdata('err_message', 'This Product already exist');
						redirect('admin/product');
					}
				}else{
					//update product
					if(isset($_FILES['image']['name'])){
						$config['upload_path'] = 'assets/img/products/';
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

		            if(isset($_FILES['pdf']['name'])){
						$config['upload_path'] = 'assets/pdf/';
		                $config['allowed_types'] = 'pdf';
		                $config['file_name'] = $_FILES['pdf']['name'];
		                
		                //Load upload library and initialize configuration
		                $this->load->library('upload',$config);
		                $this->upload->initialize($config);
		                
		                if($this->upload->do_upload('pdf')){
		                    $uploadData = $this->upload->data();
		                    $pdf = $uploadData['file_name'];
		                }else{
		                    $pdf = '';
		                }
		            }else{
		            	$pdf = '';
		            }

					$data = array(
					'id' => $this->input->post('id'),
					'category_id' => $this->input->post('category'),
					'sub_category_id' => $this->input->post('subcategory'),
					'title' => $this->input->post('product'),
					'sp1' => $this->input->post('sp1'),
					'sp2' => $this->input->post('sp2'),
					'sp3' => $this->input->post('sp3'),
					'sp4' => $this->input->post('sp4'),
					'description' => $this->input->post('description'),
					'pdf_file' => $pdf,
					'image' => $image
					);
					$result = $this->ProductModel->updateProduct($data);
					if($result == TRUE){
						$this->session->set_flashdata('message', 'Successfully Updated.');
						redirect('admin/product/add-edit-product/'.$id);
						//echo 'ok'; die;
					}else{
						$this->session->set_flashdata('message', 'Not Updated.');
						redirect('admin/product/add-edit-product/'.$id);
					}
				}
				
			}
		}else{
			redirect('admin/login');
		}
	}

	public function deleteProduct(){
		if (isset($this->session->userdata['logged_in'])){
			$id = $this->uri->segment(3);
			$dlt = $this->ProductModel->deleteProduct($id);
					if($dlt == TRUE){
						$this->session->set_flashdata('message', 'Successfully Deleted.');
						redirect('admin/product');
		 			}else{
						$this->session->set_flashdata('err_message', 'not deleted');
						redirect('admin/product');
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
				$result = $this->ProductModel->updateStatus($data);
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
