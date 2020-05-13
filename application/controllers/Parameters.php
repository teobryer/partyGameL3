<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameters extends CI_Controller {
	
	public function __construct ()
    {
    	parent::__construct();
		$this->load->helper('url');
		$this->load->model('personne_model');
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
