<?php

class GeneralModel extends CI_Model {

       

        public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }


        //insert category
        public function sendEnquiry($data){
                if($data!=''){
                        $this->db->insert('enquiry', $data);
                        if ($this->db->affected_rows() > 0) {
                        return true;        
                        } else {
                        return false;
                        }
                 }
                
        }

        //get all enquiry user
        public function getEnquiry(){
            $this->db->from('enquiry');
            $this->db->order_by("id", "desc");
            $query = $this->db->get(); 
            return $query->result();
        }

        //get enquiry user bye id
        public function getEnquiryById($id){
            $query = $this->db->get_where('enquiry',array('id' => $id));
            return $query->row();
        }
        

}