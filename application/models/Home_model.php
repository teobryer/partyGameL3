<?php
class Home_Model extends CI_Model{
public function __construct()
    {
        $this->load->database();
        
    }


public function get_Forfeit()
    {  
        $query=$this->db->get('FORFEIT');
        return $query->result_array();
    }

public function get_Tag()
    {  
        $query=$this->db->get('TAG');
        return $query->result_array();
    }
    
}
?>