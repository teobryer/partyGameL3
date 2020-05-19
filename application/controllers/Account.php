<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	public function __construct ()
    {
    	parent::__construct();
        $this->load->model('personne_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
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
            $alcohol = $this->input->post('alcohol');
            if ($female == "on"){
                $genre = "Female";
            } else {
                $genre = "Male";
            }
            if ($alcohol == "on"){
                $alcoholFriendly = "True";
            } else {
                $alcoholFriendly = "False";
            }
            $this->addGuestAtAPersonne($CurrentPersonne, $username, ["casserole" , "assiettes"], $alcoholFriendly, $genre);
        }
    }
    

    private function addGuestAtAPersonne($personne, $guestUsername, $guestInventory, $guestAlcoholFriendly, $guestSex)
    {
        $guests = $personne->getjsonContent("guests");
        $Alljson = $personne->getjsonContent();
        $guests = (array)$guests;
        $guestInventory = "\"".implode('","',$guestInventory)."\"";
        $guests[] = json_decode('{ "username":"'.$guestUsername.'", "inventory":[ '.$guestInventory.' ], "inventoryExclude":[], "tagsExclude":[], "alcoholFriendly" : "'.$guestAlcoholFriendly.'", "sex" : "'.$guestSex.'", "yearsOld" : "18" }');
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
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email address', 'required');
        $this->form_validation->set_rules('password','Password', 'required');
        if($this->form_validation->run() === FALSE)
        {
            $data['title'] = "Register";
            $content = 'register_page';
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $passwordHashed = hash('sha256',$password);
            $this->personne_model->insertPersonne($username, $email, $passwordHashed);
            $CurrentPersonne = $this->personne_model->getPersonne($email);
                $data['title'] = "Account";
                $data['guests'] = $CurrentPersonne->getjsonContent("guests");
                $data['nbGuests'] = count((array)$data['guests']);
                $content = 'account_page';
        }
        $this->load->view('Templates/header', $data);
		$this->load->view($content);
        $this->load->view('Templates/footer');
    }

    public function changePassword()
    {
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Oldpassword','Old password', 'required');
        $this->form_validation->set_rules('Newpassword','New password', 'required');
        if($this->form_validation->run() === FALSE)
        {
            $data['title'] = "Change Password";
            $content = 'change_password_page';
        } else {
            $newpassword = $this->input->post('Newpassword');
            $oldpassword = $this->input->post('Oldpassword');
            $newpasswordHashed = hash('sha256',$newpassword);
            $oldpasswordHashed = hash('sha256',$oldpassword);
            $test = $this->personne_model->testOldPassword($oldpasswordHashed);
            if ($test){
                if ($newpasswordHashed == $oldpasswordHashed){
                    $data['title'] = "Change Password";
                    $content = 'change_password_page';
                    echo "<div class='alert alert-warning alert-dismissible fade show fixed-bottom text-center' role='alert'>
                    <h3>Your <strong>New Password</strong> and your <strong>Old Password</strong> are the same</h3>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>";
                } else {
                    $this->personne_model->changePasswordPersonne($oldpasswordHashed,$newpasswordHashed);
                    $CurrentPersonne = $this->personne_model->getPersonne($this->session->userdata('email'));
                    $data['title'] = "Account";
                    $data['guests'] = $CurrentPersonne->getjsonContent("guests");
                    $data['nbGuests'] = count((array)$data['guests']);
                    $content = 'account_page';
                    echo "<div class='alert alert-success alert-dismissible fade show fixed-bottom text-center' role='alert'>
                        <h3>Your <strong>Password</strong> has been successfully changed</h3>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                        </button>
                         </div>";
                }
            } else {
                $data['title'] = "Change Password";
                $content = 'change_password_page';
                echo "<div class='alert alert-warning alert-dismissible fade show fixed-bottom text-center' role='alert'>
                <h3>Wrong <strong>Old Password</strong> please retry</h3>
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

    public function inventory()
    {
        $personne = $this->personne_model->getPersonne($this->session->userdata('email'));
        $inventory = $personne->getjsonContent("inventory");
        $inventoryExclude = $personne->getjsonContent("inventoryExclude");
        $inventory = (array)$inventory;
        $inventoryExclude = (array)$inventoryExclude;
        $data['title'] = "Inventory";
        $data['inventoryIncludePersonne'] = $inventory;
        $data['inventoryExcludePersonne'] = $inventoryExclude;
        $data['allInventory'] = $this->personne_model->getAllInventory();
        $this->load->view('Templates/header', $data);
		$this->load->view('inventory_page');
        $this->load->view('Templates/footer');
    }

    public function tag()
    {
        $personne = $this->personne_model->getPersonne($this->session->userdata('email'));
        if (!empty($_COOKIE['tagsExcludePersonneJS'])){
            $newtagsExcludePersonne = $_COOKIE['tagsExcludePersonneJS'];
            $newtagsExcludePersonne = json_decode($newtagsExcludePersonne);
            $newtagsExcludePersonne = (array)$newtagsExcludePersonne;
            setcookie ("tagsExcludePersonneJS", "", time() - 3600);
            $tagsExcludeArray = [];
            foreach ($newtagsExcludePersonne as $tag) {
                $tagsExcludeArray[] = json_decode('{ "idTag":"'.((array)$tag)['idTag'].'", "textTag":"'.((array)$tag)['textTag'].'"}');
            }
            $Alljson = $personne->getjsonContent();
            $Alljson = (array)$Alljson;
            unset($Alljson['tagsExclude']);
            $Alljson['tagsExclude'] = $tagsExcludeArray;
            $personne->setjsonContent(json_encode($Alljson, JSON_FORCE_OBJECT));
            $this->personne_model->setjsonContentPersonne($personne->getemail(), json_encode($Alljson, JSON_FORCE_OBJECT));
            
        }
        $tagsExclude = $personne->getjsonContent("tagsExclude");
        $tagsExclude = json_decode(json_encode($tagsExclude), true);
        $data['title'] = "Tags";
        $data['allTags'] = $this->personne_model->getAllTags();
        $data['tagsExcludePersonne'] = $tagsExclude;
        $this->load->view('Templates/header', $data);
		$this->load->view('tag_page');
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
