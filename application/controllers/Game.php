<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once ('../models/ForfeitModel.php'); // chargement du mod�le
class Game extends CI_Controller {
    
    
    private $tab_Forfeit;
    private $tab_Personn;
    private $actual_Forfeit;
    public static $totalGages;
    private $personnConcerned;
    
    public function __construct ()
    {
        parent::__construct();
        Game::$totalGages = 1;
        $this->personnConcerned =  array();
        $this->load->helper('url');
        $this->load->model('game_model');
        $this->load->library('session');
        $this->tab_Forfeit = $this->game_model->getAllForfeit();
        $this->tab_Personn = array("Tom","Elsa","Luc", "Mathieu", "Lea","Lisa","Dylan","Martin","Elodie");
        $this->tab_BgColor = array("text-white bg-primary","text-white bg-secondary","text-white bg-success", "text-white bg-danger", "text-white bg-warning","text-white bg-info","text-white bg-dark");           
    }
     
    
    public function drawPledge(){
        
        $this->personnConcerned =  array();
        $this->actual_Forfeit = $this->tab_Forfeit[array_rand($this->tab_Forfeit)];
         
     //  return $actual_Forfeit->getTextForfeit();
       Game::$totalGages ++;
        
       $parameters = array("%1", "%2", "%3");
       $personns   = array();
       $i = $this->actual_Forfeit->getNbConcerned()-1;
   
       while ($i != 0 ){
  
       $personns[] = $this->drawPersonne();
       
       
       $i--;
       }
       
       return str_replace($parameters, $personns, $this->actual_Forfeit->getTextForfeit());
    }
    
    public function drawPersonne(){
       $personn =  $this->tab_Personn[ array_rand($this->tab_Personn)];
       if(!in_array( $personn , $this->personnConcerned)) {
            $this->personnConcerned[] = $personn;
            return $personn;
        }
         return $this->drawPersonne();
        
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
	   
	    $data['num'] = Game::$totalGages;
        $data['title'] = "Game";
        $personne = $this->drawPledge();
	    $data['gage'] = $personne;
        $data['personne'] = $this->drawPersonne();
        $data['CardColor'] = $this->drawCardColor();
        //print_r($this->actual_Forfeit);
        $data['tags'] = $this->writeTagsString();
        $this->load->view('Templates/header', $data);
        $this->load->view('game_page', $data);
        $this->load->view('Templates/footer');
	}
	
	
}