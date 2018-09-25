<?php

class ProductModel extends CI_Model {

       

        public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }

        //get all category
        public function getAllCategory(){
                $query = $this->db->get('category');
                return $query->result(); 
        }

        //get all categorytype
        public function getSubCategory(){
                $this->db->select('id,sub_category');
                $query = $this->db->get('sub_category');
                return $query->result(); 
                
        }

        //get all product
        public function getProduct(){
                $this->db->select('p.*, sc.sub_category, c.category');
                $this->db->from('product p, category c, sub_category sc');
                $this->db->where('c.id = p.category_id and sc.id = p.sub_category_id ');
                $this->db->order_by("id", "desc");
                $query = $this->db->get();
                return $query->result();              
        }

        //get sub category  by category id
        public function getSubCategoryByCategoryId($id){
                //$this->db->select('id,sub_category');
                $query = $this->db->get_where('sub_category',array('category_id' => $id));
                return $query->result(); 
        }

        //get product by id
        public function getProductById($id){
                $query = $this->db->get_where('product',array('id' => $id));
                return $query->row();               
        }

        //insert category
        public function insertProduct($data){
                if($data!=''){
                       $condition = "title =" . "'" . $data['title'] . "'";
                        $this->db->select('id');
                        $this->db->from('product');
                        $this->db->where($condition);
                        $this->db->limit(1);
                        $query = $this->db->get();

                        if ($query->num_rows() == 0) {
                                $this->db->insert('product', $data);
                                
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

        //update category
        public function updateProduct($data){ 
                if($data['id']!='' && $data['category_id']!='' && $data['title']!=''){
                        $update = array(
                                'category_id' => $data['category_id'],
                                'sub_category_id'  => $data['sub_category_id'],
                                'title'  => $data['title'],
                                'sp1' =>  $data['sp1'],
                                'sp2' =>  $data['sp2'],
                                'sp3' =>  $data['sp3'],
                                'sp4' => $data['sp4'],
                                'description' =>$data['description'],
                        );
                        //$this->db->set('category_id', $data['category_id']);
                        $this->db->where('id',$data['id']);
                        if ($this->db->update('product',$update)) {
                                //return $id;
                                if($data['image']!=''){
                                        $this->db->set('image', $data['image']);
                                        $this->db->where('id', $data['id']);
                                        $this->db->update('product');
                                }

                                if($data['pdf_file']!=''){
                                        $this->db->set('pdf_file', $data['pdf_file']);
                                        $this->db->where('id', $data['id']);
                                        $this->db->update('product');
                                }
                        return true;
                        } else {
                        return false;
                        }
                }

        }

         //delete category
        public function deleteProduct($id){
                if($id!=''){
                        $this->db->where('id', $id);
                        if($this->db->delete('product')){
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
                        if ($this->db->update('product')) {
                        return true;
                        } else {
                        return false;
                        }
                }

        }


        /*front panel*/

        /* get all product */
        public function getAllProduct(){
                $this->db->select('p.id,p.title,p.image,c.category');
                $this->db->from('product p, category c');
                $this->db->where('p.status','t');
                $this->db->where('p.category_id=c.id');
                $this->db->order_by("id", "desc");
                $query = $this->db->get();
                return $query->result(); 
        }

        /* get product by category id */
        public function getProductByCategoryId($category_id){
            if($category_id!=''){
                $this->db->select('id,title,image');
                $this->db->from('product');
                $this->db->where('status','t');
                $this->db->where('category_id',$category_id);
                $this->db->or_where('sub_category_id',$category_id);
                $this->db->where('status','t');
                $this->db->order_by("id", "desc");
                $query = $this->db->get();
                return $query->result(); 
            }

        }

        /* particular prodcut detials */
        public function getProductDetailsById($productId){
            if($productId!=''){
                $this->db->select('id,title,image,pdf_file,sp1,sp2,sp3,sp4,description');
                $query = $this->db->get_where('product',array('id' => $productId));
                return $query->row();  
            }
        }
}