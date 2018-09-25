<?php
class AboutModel extends CI_Model {


	public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
    }

    //get about
        public function getAbout(){
                $this->db->from('about');
                $this->db->order_by("id", "desc");
                $query = $this->db->get(); 
                return $query->result();
        }

        public function get_About(){
                $this->db->from('about');
                $query = $this->db->get(); 
                return $query->row();
        }

       //get about by  id
        public function getAboutById($id){
                //$this->db->select('id,sub_category');
                $query = $this->db->get_where('about',array('id' => $id));
                return $query->row(); 
        }


    //insert about
        public function insert_about($data){
                if($data!=''){
                	$this->db->insert('about', $data);
                                
                  	if($this->db->affected_rows() > 0) {
                          return true;
                                
                    } else {
                          return false;
                    }              
                                
                       
                }
                
        }

    //update
    public function update_about($data){
    	if($data['id']!='' && $data['description']!=''){
                        $this->db->set('description', $data['description']);
                        $this->db->where('id',$data['id']);
                        if ($this->db->update('about')) {
                        return true;
                        } else {
                        return false;
                        }
          }

    }

}
?>