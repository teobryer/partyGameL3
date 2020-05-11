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
                                                            //"tommyleboss@gmail.com"
        $CurrentPersonne = $this->personne_model->getPersonne("daveleboss@gmail.com");
        $data['title'] = "Account";
        $data['guests'] = $CurrentPersonne->getjsonContent("guests");
        //$this->addGuestAtAPersonne($CurrentPersonne, "Carole", ["casserole" , "assiettes"], "True", "Female");
        $data['nbGuests'] = count((array)$data['guests']);
		$this->load->view('Templates/header', $data);
		$this->load->view('account_page');
		$this->load->view('Templates/footer');
	}
    

    private function addGuestAtAPersonne($personne, $guestUsername, $guestInventory, $guestAlcoholFriendly, $guestSex)
    {
        $guests = $personne->getjsonContent("guests");
        $Alljson = $personne->getjsonContent();
        $guests = (array)$guests;
        $guestInventory = "\"".implode('","',$guestInventory)."\"";
        $guests[] = json_decode('{ "username":"'.$guestUsername.'", "inventory":[ '.$guestInventory.' ], "alcoholFriendly" : "'.$guestAlcoholFriendly.'", "sex" : "'.$guestSex.'" }');
        $guests = json_decode(json_encode($guests, JSON_FORCE_OBJECT));
        $Alljson = (array)$Alljson;
        $Alljson['guests'] = $guests;
        $personne->setjsonContent(json_encode($Alljson, JSON_FORCE_OBJECT));
        $this->personne_model->setjsonContentPersonne($personne->getemail(), json_encode($Alljson, JSON_FORCE_OBJECT));
        header('Location: '.site_url().'account');
    }

    public function deleteGuestAtAPersonne($guestNum)
    {
        $personne = $this->personne_model->getPersonne($this->session->userdata('email'));
        $guests = $personne->getjsonContent("guests");
        $Alljson = $personne->getjsonContent();
        $guests = (array)$guests;
        unset($guests[$guestNum]);
        $guests = json_decode(json_encode($guests, JSON_FORCE_OBJECT));
        $Alljson = (array)$Alljson;
        $Alljson['guests'] = $guests;
        $personne->setjsonContent(json_encode($Alljson, JSON_FORCE_OBJECT));
        $this->personne_model->setjsonContentPersonne($personne->getemail(), json_encode($Alljson, JSON_FORCE_OBJECT));
        header('Location: '.site_url().'account');
    }

    public function login()
    {
        //Login page redirect + connexion
    }
	
}
