<?php

class ServicesModel extends CI_Model {

       

        public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }

        //get all category
        public function getCC(){
                $this->db->from('service_cc');
                $this->db->order_by("id", "desc");
                $query = $this->db->get(); 
                return $query->result();
        }

        //get all category by status
        public function getCategoryByStatus(){
                $this->db->select('id,category');
                $this->db->from('category');
                $this->db->where('status','t');
                $this->db->order_by("id", "desc");
                $query = $this->db->get(); 
                return $query->result();
        }

        //get category by id
        public function getCategoryById($id){ //print_r($id); die;
                $query = $this->db->get_where('category',array('id' => $id));
                return $query->row();               // print_r($query);
        }

        //insert category
        public function insert_image($data){
                if($data!=''){
                        

                       
                                $this->db->insert('accessory_image', $data);
                                
                                if ($this->db->affected_rows() > 0) {
                                return true;
                                
                                } else {
                                return false;
                                }
                       
                }
                
        }

        //update category
        public function updateCategory($data){
                if($data['id']!='' && $data['category']!=''){
                        $this->db->set('category', $data['category']);
                        $this->db->where('id',$data['id']);
                        if ($this->db->update('category')) {
                        return true;
                        } else {
                        return false;
                        }
                }

        }

        //delete category
        public function deleteCategory($id){
                if($id!=''){
                        $this->db->where('id', $id);
                        if($this->db->delete('category')){
                                return true;
                                } else {
                                return false;
                                }
                       

                }

        }

        //update status
        public function updateStatus($data){
                if($data['id']!='' && $data['status']!=''){
                        $this->db->set('status', $data['status']);
                        $this->db->where('id',$data['id']);
                        if ($this->db->update('category')) {
                        return true;
                        } else {
                        return false;
                        }
                }

        }

        //get all category by status
        public function getCategoryByStatusLimit(){
                $this->db->select('id,category');
                $this->db->from('category');
                $this->db->where('status','t');
                $this->db->order_by("id", "desc");
                $this->db->limit('5');
                $query = $this->db->get(); 
                return $query->result();
        }

        /*---------------------title-----------------*/
        //get all title
        public function getTitle(){
                $this->db->from('accessory_title');
                $this->db->order_by("id", "desc");
                $query = $this->db->get(); 
                return $query->result();
        }


        //insert title
        public function insert_title($data){ 
                if($data!=''){
                        

                       
                                $this->db->insert('accessory_title', $data);
                                
                                if ($this->db->affected_rows() > 0) {
                                return true;
                                
                                } else {
                                return false;
                                }
                       
                }
                
        }

        //get title by id
        public function getTitleById($id){ //print_r($id); die;
                $query = $this->db->get_where('accessory_title',array('id' => $id));
                return $query->row();               // print_r($query);
        }

        //update title
        public function updateTitle($data){
                if($data['id']!='' && $data['title']!=''){
                        $this->db->set('title', $data['title']);
                        $this->db->where('id',$data['id']);
                        if ($this->db->update('accessory_title')) {
                        return true;
                        } else {
                        return false;
                        }
                }

        }

        //delete title
        public function deleteTitle($id){
                if($id!=''){
                        $this->db->where('id', $id);
                        if($this->db->delete('accessory_title')){
                                return true;
                                } else {
                                return false;
                                }
                       

                }

        }


}