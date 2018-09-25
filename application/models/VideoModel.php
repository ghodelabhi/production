<?php
class VideoModel extends CI_Model {

	public function __construct(){
                // Call the CI_Model constructor
                parent::__construct();
                $this->load->database();
        }


        //get all videos
        public function getVideo(){
        	$this->db->from('video');
            $this->db->order_by("id", "desc");
            $query = $this->db->get(); 
            return $query->result();
        }

    //get category by id
    public function getVideoById($id){ //print_r($id); die;
        $query = $this->db->get_where('video',array('id' => $id));
        return $query->row();             
    }

    //insert video
    public function insertVideo($data){
    	if($data!=''){
            
            $condition = "title =" . "'" . $data['title'] . "' AND link =" . "'" . $data['link'] . "'";
            $this->db->select('id');
			$this->db->from('video');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

             if ($query->num_rows() == 0) {
                $this->db->insert('video', $data);
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

    //update video
        public function updateVideo($data){
                $update = array(
                        'title' => $data['title'],
                        'link' => $data['link'],
                );
                $this->db->where('id',$data['id']);
                if ($this->db->update('video',$update)) {
                return true;
                } else {
                return false;
                }

        }

    //delete category
        public function deleteVideo($id){
                if($id!=''){
                        $this->db->where('id', $id);
                        if($this->db->delete('video')){
                                return true;
                                } else {
                                return false;
                                }
                       

                }

        }
}
