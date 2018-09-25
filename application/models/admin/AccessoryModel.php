<?php

class AccessoryModel extends CI_Model {

       

        public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }

        //get accessory
        public function getAccessory(){
                $this->db->from('accessory');
                $this->db->order_by("id", "desc");
                $query = $this->db->get(); 
                return $query->result();
        }

       //get accessory by  id
        public function get_accessory_by_id($id){
                //$this->db->select('id,sub_category');
                $query = $this->db->get_where('accessory',array('id' => $id));
                return $query->row(); 
        }

        //insert accessory
        public function insert_accessory($data){
                if($data!=''){
                        $condition = "title =" . "'" . $data['title'] . "'";
                        $this->db->select('id');
                        $this->db->from('accessory');
                        $this->db->where($condition);
                        $this->db->limit(1);
                        $query = $this->db->get();

                        if ($query->num_rows() == 0) {
                                $this->db->insert('accessory', $data);
                                
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
    public function update_accessory($data){
        if($data['id']!='' && $data['title']!=''){
                        $update = array(
                                'title' => $data['title'],
                                'description' => $data['description'],
                                
                        );
                        //$this->db->set('category_id', $data['category_id']);
                        $this->db->where('id',$data['id']);
                        if ($this->db->update('accessory',$update)) {
                                //return $id;
                                if($data['image']!=''){
                                        $this->db->set('image', $data['image']);
                                        $this->db->where('id', $data['id']);
                                        $this->db->update('accessory');
                                }

                              
                        return true;
                        } else {
                        return false;
                        }
                }


    }

     //delete 
        public function delete_banner($id){
                if($id!=''){
                        $this->db->where('id', $id);
                        if($this->db->delete('banner')){
                                return true;
                                } else {
                                return false;
                                }
                       

                }

        }

}