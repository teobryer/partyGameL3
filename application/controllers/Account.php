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
        if ($this->session->has_userdata('email')){
            $CurrentPersonne = $this->personne_model->getPersonne($this->session->userdata('email'));
            $data['title'] = "Account";
            $data['guests'] = $CurrentPersonne->getjsonContent("guests");
            $data['nbGuests'] = count((array)$data['guests']);
            $this->load->view('Templates/header', $data);
		    $this->load->view('account_page');
            $this->load->view('Templates/footer');
        } else {
            header('Location: '.site_url().'account/login');
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
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email address', 'required');
        $this->form_validation->set_rules('password','Password', 'required');
        if($this->form_validation->run() === FALSE)
        {
            $data['title'] = "Login";
            $content = 'login_page';
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password = hash('sha256',$password);
            $test = $this->personne_model->verificationPersonneLogin($email, $password);
            if ($test)
            {
                $this->session->set_userdata('email', $email);
                $CurrentPersonne = $this->personne_model->getPersonne($email);
                $data['title'] = "Account";
                $data['guests'] = $CurrentPersonne->getjsonContent("guests");
                //$this->addGuestAtAPersonne($CurrentPersonne, "Carole", ["casserole" , "assiettes"], "True", "Female");
                $data['nbGuests'] = count((array)$data['guests']);
                $content = 'account_page';
            } else {
                $data['title'] = "Login";
                $content = 'login_page';
                echo "<div class='alert alert-warning alert-dismissible fade show fixed-bottom text-center' role='alert'>
                            <h3>Please verify your <strong>Email address</strong> ('".$email."') or your <strong>Password</strong>.</h3>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
            }
        }
        $this->load->view('Templates/header', $data);
		$this->load->view($content);
        $this->load->view('Templates/footer');
    }


    public function register()
    {
        $data['title'] = "Register";
		$this->load->view('Templates/header', $data);
		$this->load->view('register_page');
		$this->load->view('Templates/footer');
    }

    public function disconnect()
    {
        unset(
            $_SESSION['username'],
            $_SESSION['email']
        );
        header('Location: '.site_url().'account');
    }
	
}
