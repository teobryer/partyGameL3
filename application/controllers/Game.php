<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {
	
	public function index()
	{
		$this->load->view('game_page');
	}
	
	
}
