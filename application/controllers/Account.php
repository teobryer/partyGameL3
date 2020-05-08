<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function __construct ()
    {
    	parent::__construct();
        $this->load->model('personne_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->session->unset_userdata('instancePartie');
    }   
    
    
	public function index()
	{
        //$CurrentPersonne = $this->getAPersonne("tommyleboss@gmail.com");
        $CurrentPersonne = $this->getAPersonne("daveleboss@gmail.com");
        $data['title'] = "Account";
        $data['guests'] = $CurrentPersonne->getjsonContent("guests");
        $this->addGuestAtAPersonne($CurrentPersonne, "Nicolas", ["casserole" , "assiettes"], "True", "Male");
        //print_r(count((array)$data['guests'])); //NB Guests
		$this->load->view('Templates/header', $data);
		$this->load->view('account_page');
		$this->load->view('Templates/footer');
	}
    
    private function getAPersonne($email)
    {
        $personne = $this->personne_model->getPersonne($email);
        $personneTest = array(
			'username'          => $personne['username'],
            'email'             => $personne['email'],
            'passwordHashed'    => $personne['password'],
            'jsonContent'       => $personne['jsonContent'],
			'logged_in'         => TRUE
		);
        $this->session->set_userdata($personneTest);
        return new Personne($personne['username'], $personne['email'], $personne['password'], $personne['jsonContent']);
    }

    private function addGuestAtAPersonne($personne, $guestUsername, $guestInventory, $guestAlcoholFriendly, $guestSex)
    {
        $guests = $personne->getjsonContent("guests");
        $Alljson = $personne->getjsonContent();
        $guests = (array)$guests;
        $guestInventory = "\"".implode('","',$guestInventory)."\"";
        $guests["guest".(count($guests)+1).""] = json_decode('{ "username":"'.$guestUsername.'", "inventory":[ '.$guestInventory.' ], "alcoholFriendly" : "'.$guestAlcoholFriendly.'", "sex" : "'.$guestSex.'" }');
        $guests = json_decode(json_encode($guests, JSON_FORCE_OBJECT));
        //print_r ($guests);
        $Alljson = (array)$Alljson;
        $Alljson['guests'] = $guests;
        $personne->setjsonContent(json_encode($Alljson, JSON_FORCE_OBJECT));
        $this->personne_model->setjsonContentPersonne($personne->getemail(), json_encode($Alljson, JSON_FORCE_OBJECT));
    }
	
}
