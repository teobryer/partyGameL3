<?php

class JsonContent implements JsonSerializable {
    public $tagList;
    public $inventory;
    
    function __construct($tagList, $inventory)
    {
        $this->tagList = $tagList;
        $this->inventory = $inventory;
       
    }
    
    public function jsonSerialize()
    {
        return
        [
            'tagList'   => $this->getTagList(),
            'inventory' => $this->getInventory()
        ];
    }
    public function getTagList(){
        return $this->tagList;
    }
    
    public function getInventory(){
        return $this->inventory;
    }
    
}

class JsonContent1 {
    
}

class Forfeit {
    private $idForfeit;
    private $textForfeit;
    private $nbConcerned;
    private $tagList;
    private $inventory;
    
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
    
    private $sexualOrientationDefault;
    private $inventory;
    
    
    public function __construct()
    {
        $this->load->database();
        $this->sexualOrientationDefault = "hetero";
    }
    
    
    public function jsonContent(){
        
        
        $inventaire = array("cuillere", "farine");
        $tags = array("bouffe", "action");
        
        $obj = new JsonContent($tags, $inventaire);
        
        
      
       
        print_r(json_encode($obj));
        
    }
    public function setSexualOrientationDefault($newSexualOrientationDefault){
        $this->sexualOrientationDefault = $newSexualOrientationDefault;
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
            if( empty($listTag) ){
            $listTag[]= 'Pas de tag';
            
            }
            $listForfeit[] = new Forfeit($row['idForfeit'],$row['textForfeit'],$row['nbConcerned'], $listTag);
           
        }
        
        return $listForfeit;
    }
    public  function getNbForfeit($nb){}
    public  function getForfeitWandWContext($context = null){
        
        if($context == null){
            if ($this->sexualOrientationDefault == 'homo') {
             //   print_r('homo');
            }
            else {
             //   print_r('hetero');
            }
        }
        
        else {
            if ($context == 'homo') {
           //     print_r('homo');
            }
            
            else {
            //    print_r('hetero');
            }
        }
    }
    public  function getForfeitMandMContexte($men1, $men2, $context=null){}
    
    public function getForfeitById($id){
        
        $this->db->select('jsonContent');
        $this->db->from('FORFEIT');
        $this->db->where('valid = true AND idForfeit='.$id.'');
        $query = $this->db->get();
        
         $test = $query->result_array()[0]['jsonContent'];
         
         print_r($test);
         
         $obj = (json_decode($test));
        
        // print_r((JsonContent)($obj->getTagList()));
        
    }
    
}



?>
