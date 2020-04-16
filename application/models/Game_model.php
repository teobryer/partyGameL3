<?php

class Forfeit {
    private $idForfeit;
    private $textForfeit;
    private $nbConcerned;
    private $tagList;
    
    function __construct($id, $text, $nb, $list)
    {
        $this->idForfeit = $id;
        $this->textForfeit = $text;
        $this->nbConcerned = $nb;
        $this->tagList = $list;
    }
    
    public function getTextForfeit(){
        return $this->textForfeit;
    }
    
    public function setTextForfeit($newText){
        $this->textForfeit = $newText;
    }
    
    public function getIdForfeit(){
        return $this->idForfeit;
    }
    
    public function setIdForfeit($newId){
        $this->idForfeit = $newId;
    }
    
    public function getNbConcerned(){
        return $this->nbConcerned;
    }
    
    
    public function setNbConcerned($newNb){
        $this->nbConcerned = $newNb;
    }
    
    
    public function getTagList(){
        return $this->tagList;
    }
    
    
    public function setTagList($newList){
        $this->tagList = $newList;
    }
    
    }
class Game_Model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
        
    }
    
    public  function getAllForfeit()
    {
        $this->db->select('idForfeit, textForfeit, nbConcerned');
        $this->db->from('FORFEIT');
        $this->db->where('valid = true');
        $query = $this->db->get();
        
        
       
        
        foreach ($query->result_array()as $row)
        {
            $listTag=  array();
            $query1 = $this->db->query("SELECT TAG.textTag FROM FORFEIT_TAG INNER JOIN TAG ON FORFEIT_TAG.idTag = TAG.idTag WHERE idForfeit = ".$row['idForfeit']);
            foreach( $query1->result_array() as $row1) {
                $listTag[]= $row1['textTag'];
            }
            $listForfeit[] = new Forfeit($row['idForfeit'],$row['textForfeit'],$row['nbConcerned'], $listTag);
           
        }
        
        return $listForfeit;
    }
    
}

?>