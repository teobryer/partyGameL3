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
		$this->load->view('home_page');
		print_r($this->home_model->get_Forfeit());
	}
	
	
}
