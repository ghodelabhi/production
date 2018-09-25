<?php
class BannerModel extends CI_Model {


	public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
    }

    //get about
        public function get_banner(){
                $this->db->from('banner');
                $this->db->order_by("id", "desc");
                $query = $this->db->get(); 
                return $query->result();
        }

       //get about by  id
        public function get_banner_by_id($id){
                //$this->db->select('id,sub_category');
                $query = $this->db->get_where('banner',array('id' => $id));
                return $query->row(); 
        }


    //insert about
        public function insert_banner($data){
                if($data!=''){
                        $condition = "banner_title =" . "'" . $data['banner_title'] . "'";
                        $this->db->select('id');
                        $this->db->from('banner');
                        $this->db->where($condition);
                        $this->db->limit(1);
                        $query = $this->db->get();

                        if ($query->num_rows() == 0) {
                                $this->db->insert('banner', $data);
                                
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
    public function update_banner($data){
    	if($data['id']!='' && $data['banner_title']!=''){
                        $update = array(
                                'banner_title' => $data['banner_title'],
                                
                        );
                        //$this->db->set('category_id', $data['category_id']);
                        $this->db->where('id',$data['id']);
                        if ($this->db->update('banner',$update)) {
                                //return $id;
                                if($data['image']!=''){
                                        $this->db->set('image', $data['image']);
                                        $this->db->where('id', $data['id']);
                                        $this->db->update('banner');
                                }

                              
                        return true;
                        } else {
                        return false;
                        }
                }


    }

     //delete brand
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
?>