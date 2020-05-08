<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function __construct ()
    {
    	parent::__construct();
        //$this->load->model('personne_model');
        //$this->load->helper('url');
        //$this->load->library('session');
        //$this->session->unset_userdata('instancePartie');
    }   
    
    
	public function index()
	{
		/*$personneTest = array(
			'username'  => 'johndoe',
			'email'     => 'johndoe@some-site.com',
			'logged_in' => TRUE
		);
		$this->session->set_userdata($personneTest);*/

		$data['title'] = "Account";
		$this->load->view('Templates/header', $data);
		$this->load->view('home_page');
		$this->load->view('Templates/footer');
	}
	
	
}
