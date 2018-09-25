<?php

class SubCategoryModel extends CI_Model {

       

        public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }

        //get all main sub category
        public function getSubCategory(){

                $this->db->select('sc.*, c.category');
                $this->db->from('sub_category sc, category c');
                $this->db->where('c.id = sc.category_id');
                //$this->db->order_by("id", "desc");
                $query = $this->db->get();
                return $query->result();
        }

        //get category by id
        public function getSubCategoryById($id){ //print_r($id); die;
                $query = $this->db->get_where('sub_category',array('id' => $id));
                return $query->row();               // print_r($query);
        }

        //insert subcategory
        public function insertSubcategory($data){
                 if($data!=''){
                        $data = array(
                        'category_id' => $data['category'],
                        'sub_category' => $data['subcategory'],
                        );
                        $condition = "category_id =" . "'" . $data['category'] . "' AND sub_category =" . "'" . $data['subcategory'] . "'";
                        $this->db->select('id');
                        $this->db->from('sub_category');
                        $this->db->where($condition);
                        $this->db->limit(1);
                        $query = $this->db->get();

                        if ($query->num_rows() == 0) {
                                $this->db->insert('sub_category', $data);
                                
                                if ($this->db->affected_rows() > 0) {
                                return true;
                                
                                } else {
                                return false;
                                }
                        }else{
                                return false;
                        }
                }
        }

        //update sub category
        public function updateSubCategory($data){
                $update = array(
                        'category_id' => $data['category'],
                        'sub_category' => $data['subcategory'],
                );
                $this->db->where('id',$data['id']);
                if ($this->db->update('sub_category',$update)) {
                return true;
                } else {
                return false;
                }

        }

        //delete  sub category
        public function deleteSubCategory($id){
                if($id!=''){
                        $this->db->where('id', $id);
                        if($this->db->delete('sub_category')){
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
                        if ($this->db->update('sub_category')) {
                        return true;
                        } else {
                        return false;
                        }
                }

        }

        //get all sub category by status
        public function getSubCategoryByStatus(){
                $this->db->select('id,category_id,sub_category');
                $this->db->from('sub_category');
                //$this->db->order_by("id", "desc");
                $query = $this->db->get(); 
                return $query->result();
        }

}