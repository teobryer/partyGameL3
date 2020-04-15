<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once ('../models/ForfeitModel.php'); // chargement du modèle
class Game extends CI_Controller {
    
    
    private $tab_Forfeit;
    private $tab_Personn;
    private $actual_Forfeit;
    
    public function __construct ()
    {
        parent::__construct();
        $this->load->helper('url');
       // $this->load->library('session');
       // $this->tab_Forfeit = ForfeitModel::getAllForfeit();
        $this->tab_Personn = array("Tom","Elsa","Luc", "Mahtieu", "Lea","Lisa","Dylan","Martin","Elodie");
      
            
    }
     
    
    public function drawPledge(){
        
      
      //  $actual_Forfeit = $this->tab_Forfeit[array_rand($this->tab_Forfeit)];
         
        //  return $actual_Forfeit.getText();
        return "fais  pompes";
    
    }
    
    public function drawPersonne(){
        
         // $randomPersonn = array_rand($this->tab_Personn);
          return $this->tab_Personn[ array_rand($this->tab_Personn)];
    }
	
	public function index()
	{
	    //$this->drawPledge();
	    $data['gage'] = $this->drawPledge();
	    $data['personne'] = $this->drawPersonne();
	    $this->load->view('game_page', $data);
	}
	
	
}