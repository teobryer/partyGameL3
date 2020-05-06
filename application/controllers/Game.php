<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require_once ('../models/ForfeitModel.php'); // chargement du mod�le
class Game extends CI_Controller {
    
    
    private $tab_Forfeit;
    private $tab_Personn;
    private $tab_BgColor;
    private $actual_Forfeit;
    private $totalGages;
    private $personnConcerned;
    
    public function __construct ()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('game_model');
        $this->load->library('session');
        
        if(!$this->session->has_userdata('instancePartie')) {
        
            
        $this->totalGages=1;    
        $this->personnConcerned =  array();
       
        $this->tab_Forfeit = $this->game_model->getAllForfeit();
        $this->tab_Personn = array("Tom","Elsa","Luc", "Mathieu", "Lea","Lisa","Dylan","Martin","Elodie");
        $this->tab_BgColor = array("text-white bg-primary","text-white bg-secondary","text-white bg-success", "text-white bg-danger", "text-white bg-warning","text-white bg-info");   
    
        
        }
        
        else {
            
      // print_r("else");
        
        $this->personnConcerned =  array();
        $this->load->helper('url');
        $this->load->model('game_model');
        $this->load->library('session');
        $this->totalGages= ($this->session->userdata('instancePartie')->totalGages)+1;
        $this->tab_Forfeit = $this->session->userdata('instancePartie')->tab_Forfeit;
        $this->tab_Personn =$this->session->userdata('instancePartie')->tab_Personn;
        $this->tab_BgColor = $this->session->userdata('instancePartie')->tab_BgColor;
       
        }
        
        
    }
     
    
    public function drawPledge(){
        
        $this->personnConcerned =  array();
        $this->actual_Forfeit = $this->tab_Forfeit[array_rand($this->tab_Forfeit)];
        
   
       
        if($this->actual_Forfeit->getNbConcerned()== -1) {
            
            return "Tout le monde ". $this->actual_Forfeit->getTextForfeit();
        }
        
        else {
            
        
       $parameters = array("%1", "%2", "%3");
       $personns   = array();
       $i = $this->actual_Forfeit->getNbConcerned();
   
       while ($i != 0 ){
  
       $personns[] = $this->drawPersonne();
       
       
       $i--;
       }
       
      // print_r($personns);
       
       return str_replace($parameters, $personns, $this->actual_Forfeit->getTextForfeit());
       
        }
    }
    
    public function drawPersonne(){
        $rand = array_rand($this->tab_Personn);
       // print_r($rand);
        $personn =  $this->tab_Personn[$rand];
      
       if(!in_array( $personn , $this->personnConcerned)) {
            $this->personnConcerned[] = $personn;
            
            return $personn;
        }
        else {
         return $this->drawPersonne();
         
        }
        
    }

    public function drawCardColor(){
        return $this->tab_BgColor[array_rand($this->tab_BgColor)];
   }
   
   public function writeTagsString(){
       $tags = "Tags : ";
       $i = 1;
       foreach( $this->actual_Forfeit->getTagList() as $data) {
           
           if ($i == count($this->actual_Forfeit->getTagList())) {
               $tags = $tags . $data ;
              
               
           }
           
           else {
               
               $tags = $tags . $data .", ";
               
           }
           
           $i++;
          
          
       }
       
       return $tags;
       
   }
	
	public function index()
	{
        //$this->drawPledge();
	   // print_r($this->tab_Forfeit);
	   // $this->game_model->setSexualOrientationDefault('homo');
	
	    $this->game_model->getForfeitById(3);
	    
        $data['title'] = "Game";
        $data['gage'] = $this->drawPledge();

     
        $data['num'] = $this->totalGages;
        $data['CardColor'] = $this->drawCardColor();
        //print_r($this->actual_Forfeit);
        $data['tags'] = $this->writeTagsString();
        
        $this->session->set_userdata('instancePartie', $this);
        $this->load->view('Templates/header', $data);
        $this->load->view('game_page', $data);
        $this->load->view('Templates/footer');
      
	}
	
	
}
