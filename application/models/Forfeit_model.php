<?php
class Forfeit_Model extends CI_Model{
public function __construct()
    {
        $this->load->database();
        
    }

public function get_Forfeit_Tag()
    {  
        $this->db->select('*');
        $this->db->from('FORFEIT_TAG');
        $this->db->join('FORFEIT', 'FORFEIT.idForfeit = FORFEIT_TAG.idForfeit');
        $this->db->join('TAG', 'TAG.idTag = FORFEIT_TAG.idTag');
        $query = $this->db->get();
        return $query->result_array();
    }  
    
}
?>