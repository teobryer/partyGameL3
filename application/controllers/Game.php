<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once ('../models/ForfeitModel.php'); // chargement du mod�le
class Game extends CI_Controller {
    
    
    private $tab_Forfeit;
    private $tab_Personn;
    private $actual_Forfeit;
    
    public function __construct ()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
       // $this->tab_Forfeit = ForfeitModel::getAllForfeit();
        $this->tab_Personn = array("Tom","Elsa","Luc", "Mahtieu", "Lea","Lisa","Dylan","Martin","Elodie");
        $this->tab_BgColor = array("text-white bg-primary","text-white bg-secondary","text-white bg-success", "text-white bg-danger", "text-white bg-warning","text-white bg-info","text-white bg-dark");           
    }
     
    
    public function drawPledge(){
        
      
      //  $actual_Forfeit = $this->tab_Forfeit[array_rand($this->tab_Forfeit)];
         
        //  return $actual_Forfeit.getText();
        return "fais 5 pompes sur le sol";
    
    }
    
    public function drawPersonne(){
        
         // $randomPersonn = array_rand($this->tab_Personn);
        return $this->tab_Personn[ array_rand($this->tab_Personn)];
    }

    public function drawCardColor(){
        return $this->tab_BgColor[array_rand($this->tab_BgColor)];
   }
	
	public function index()
	{
        //$this->drawPledge();
        $data['title'] = "Game";
	    $data['gage'] = $this->drawPledge();
        $data['personne'] = $this->drawPersonne();
        $data['CardColor'] = $this->drawCardColor();
        $this->load->view('Templates/header', $data);
        $this->load->view('game_page', $data);
        $this->load->view('Templates/footer');
	}
	
	
}