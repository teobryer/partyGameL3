<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct ()
    {
    	parent::__construct();
        $this->load->model('home_model');
        $this->load->helper('url');
        $this->load->library('session');
      
    }   
    
    
	public function index()
	{
		$data['title'] = "Home";
		$this->load->view('Templates/header', $data);
		$this->load->view('home_page');
		$this->load->view('Templates/footer');
	}
	
	
}
