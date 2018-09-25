<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EnquiryController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->model('GeneralModel');
		/*master page*/
	   	$this->load->model('admin/CategoryModel');
	   	$this->load->model('admin/SubCategoryModel');
	}

	public function index(){
		$data['title'] = "Enquiry";
		$data['content'] = 'enquiry';

		$values = array(
                'word' => '',
                'word_length' => 8,
                'img_path' => './images/',
                'img_url' =>  base_url() .'images/',
                'font_path'  => base_url() . 'system/fonts/texb.ttf',
                'img_width' => '150',
                'img_height' => 50,
                'expiration' => 3600
               );
        $data['image'] = create_captcha($values); 
        $_SESSION['captchaWord'] = $data['image']['word'];

        /*master page*/
		$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
		$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
		$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();

		$this->load->view('masteruserlayout',$data);
	}


	// For new image on click refresh button.
    public function captcha_refresh(){
                $values = array(
                'word' => '',
                'word_length' => 8,
                'img_path' => './images/',
                'img_url' =>  base_url() .'images/',
                'font_path'  => base_url() . 'system/fonts/texb.ttf',
                'img_width' => '150',
                'img_height' => 50,
                'expiration' => 3600
               );
            $data = create_captcha($values);
            $_SESSION['captchaWord'] = $data['word'];
           echo $data['image'];
        
    }

    //send enquiry
    public function sendEnquery(){
    	$config = array(
				array(
	                'field' => 'name',
	                'label' => 'Name',
	                'rules' => 'required|trim|min_length[2]|max_length[20]'
	    ),
	    array(
	                'field' => 'email',
	                'label' => 'Email',
	                'rules' => 'required|trim|valid_email|is_unique[enquiry.email]'
	    ),
	    array(
	                'field' => 'phone',
	                'label' => 'Phone',
	                'rules' => 'required|trim|numeric|min_length[10]|max_length[10]'
	    ),
	    array(
	                'field' => 'location',
	                'label' => 'Location',
	                'rules' => 'required|trim|min_length[2]|max_length[12]'
	    ),
	    array(
	                'field' => 'message',
	                'label' => 'Message',
	                'rules' => 'required|trim|min_length[2]|max_length[500]'
	    ),
	    array(
	                'field' => 'captcha',
	                'label' => 'Captcha',
	                'rules' => 'required|trim|min_length[2]|max_length[20]|callback_validate_captcha'
	    )  ); 

		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$data['title'] = "Enquiry";
			$data['content'] = 'enquiry';

			$values = array(
	                'word' => '',
	                'word_length' => 8,
	                'img_path' => './images/',
	                'img_url' =>  base_url() .'images/',
	                'font_path'  => base_url() . 'system/fonts/texb.ttf',
	                'img_width' => '150',
	                'img_height' => 50,
	                'expiration' => 3600
	               );
	        $data['image'] = create_captcha($values); 
	        $_SESSION['captchaWord'] = $data['image']['word'];

	        /*master page*/
			$data['getCategory'] = $this->CategoryModel->getCategoryByStatus();
			$data['getSubCategory'] = $this->SubCategoryModel->getSubCategoryByStatus();
			$data['getCategoryFooter'] = $this->CategoryModel->getCategoryByStatusLimit();

			$this->load->view('masteruserlayout',$data);
		}else{
			
				$data = array(
					'user_name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'phone' => $this->input->post('phone'),
					'location' => $this->input->post('location'),
					'message' => $this->input->post('message'),
				);
				$result = $this->GeneralModel->sendEnquiry($data);
				if($result == TRUE){
					$this->session->set_flashdata('message', 'Your Enquiry Successfully Send.');
					redirect('enquiry');
				}else{
					$this->session->set_flashdata('err_message', 'Please Enquiry Send Again');
					redirect('enquiry');
				}
			
		}

    }

    //check captch validate or not
    public function validate_captcha(){
    if($this->input->post('captcha') != $_SESSION['captchaWord'])
    {
        $this->form_validation->set_message('validate_captcha', 'Wrong captcha code');
        return false;
    }else{
        return true;
    }

}
	
}
