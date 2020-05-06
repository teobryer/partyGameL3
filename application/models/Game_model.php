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



class Forfeit {
    private $idForfeit;
    private $textForfeit;
    private $nbConcerned;
    private $tagList;
    private $inventory;
    
    function __construct($id, $text, $nb, $list, $list2)
    {
        $this->idForfeit = $id;
        $this->textForfeit = $text;
        $this->nbConcerned = $nb;
        $this->tagList = $list;
        $this->inventory = $list2;
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
    
    public function comptTotalForfeit(){
        
        $this->db->select('COUNT(*) as total');
        $this->db->from('FORFEIT');
        $this->db->where('valid = true ');
        $query = $this->db->get();
        
        return  $query->result_array()[0]['total'];
        
    }
    public function getForfeitById($id){
        
        $this->db->select('*');
        $this->db->from('FORFEIT');
        $this->db->where('valid = true AND idForfeit='.$id.'');
        $query = $this->db->get();
        
         $jsonContent = $query->result_array()[0]['jsonContent'];
         $id =  $query->result_array()[0]['idForfeit'];
         $text =  $query->result_array()[0]['textForfeit'];
         $nb =  $query->result_array()[0]['nbConcerned'];
         
         print_r("1".$jsonContent."2.");
         
         $obj = (json_decode($jsonContent));
         
         
         $inventory = ($obj->inventory);
         $tags =  ($obj->tagList);
         
         return new Forfeit($id, $text, $nb, $tags, $inventory);
        
         //print_r((objet)($obj->getTagList()));
        
    }
    
}



?>
