<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameters extends CI_Controller {
	
	public function __construct ()
    {
    	parent::__construct();
		$this->load->helper('url');
        $this->load->model('personne_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }   
    

	public function index()
	{
        if ($this->session->has_userdata('email')){
            $CurrentPersonne = $this->personne_model->getPersonne($this->session->userdata('email'));
            $data['title'] = "Parameters";
            $data['guests'] = $CurrentPersonne->getjsonContent("guests");
            $this->load->view('Templates/header', $data);
		    $this->load->view('parameters_page');
            $this->load->view('Templates/footer');
        } else {
            header('Location: '.site_url().'account/login');
        }
    }
    
    public function addGuest()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username', 'required');
        $CurrentPersonne = $this->personne_model->getPersonne($this->session->userdata('email'));
        if($this->form_validation->run() === TRUE)
        {
            $username = $this->input->post('username');
            $female = $this->input->post('female');
            if ($female == "on"){
                $genre = "Female";
            } else {
                $genre = "Male";
            }
            $this->addGuestAtAPersonne($CurrentPersonne, $username, ["casserole" , "assiettes"], "True", $genre);
        }
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
        header('Location: '.site_url().'parameters');
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
        header('Location: '.site_url().'parameters');
    }
}
