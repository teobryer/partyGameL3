<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameters extends CI_Controller {
	
	public function index()
	{
		$this->load->view('parameters_page');
	}
}
