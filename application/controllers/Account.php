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
        $CurrentPersonne = $this->getAPersonne("tommyleboss@gmail.com");
        $data['title'] = "Account";
        $data['guests'] = $CurrentPersonne->getjsonContent("guests");
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
	
}
