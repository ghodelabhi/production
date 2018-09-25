<?php

class LoginModel extends CI_Model {

       

        public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }

       //check user match or not
        public function login($data){
                $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . md5($data['password'] ). "'";
                $this->db->select('id');
                $this->db->from('admin');
                $this->db->where($condition);
                $this->db->limit(1);
                $query = $this->db->get();

                if ($query->num_rows() == 1) {
                return true;
                } else {
                return false;
                }
              
        }

        //get or read user info.
        public function readUserInformation($email){
              $condition = "email =" . "'" . $email . "'";
                $this->db->select('id,email');
                $this->db->from('admin');
                $this->db->where($condition);
                $this->db->limit(1);
                $query = $this->db->get();

                if ($query->num_rows() == 1) {
                return $query->result();
                } else {
                return false;
                }  
        }

}