<?php
class BrandModel extends CI_Model {


	public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
    }

    //get about
        public function get_brand(){
                $this->db->from('brand');
                $this->db->order_by("id", "desc");
                $query = $this->db->get(); 
                return $query->result();
        }

       //get about by  id
        public function get_brand_by_id($id){
                //$this->db->select('id,sub_category');
                $query = $this->db->get_where('brand',array('id' => $id));
                return $query->row(); 
        }


    //insert about
        public function insert_brand($data){
                if($data!=''){
                        $condition = "brand_name =" . "'" . $data['brand_name'] . "'";
                        $this->db->select('id');
                        $this->db->from('brand');
                        $this->db->where($condition);
                        $this->db->limit(1);
                        $query = $this->db->get();

                        if ($query->num_rows() == 0) {
                                $this->db->insert('brand', $data);
                                
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

    //update
    public function update_brand($data){
    	if($data['id']!='' && $data['brand_name']!=''){
                        $update = array(
                                'brand_name' => $data['brand_name'],
                                
                        );
                        //$this->db->set('category_id', $data['category_id']);
                        $this->db->where('id',$data['id']);
                        if ($this->db->update('brand',$update)) {
                                //return $id;
                                if($data['image']!=''){
                                        $this->db->set('image', $data['image']);
                                        $this->db->where('id', $data['id']);
                                        $this->db->update('brand');
                                }

                              
                        return true;
                        } else {
                        return false;
                        }
                }


    }

     //delete brand
        public function delete_brand($id){
                if($id!=''){
                        $this->db->where('id', $id);
                        if($this->db->delete('brand')){
                                return true;
                                } else {
                                return false;
                                }
                       

                }

        }

}
?>