<?php

class Personne {
    private $username;
    private $email;
    private $passwordHashed;
    private $jsonContent;
    
    function __construct($username, $email="null", $passwordHashed="null", $jsonContent=null)
    {
        $this->username = $username;
        $this->email = $email;
        $this->passwordHashed = $passwordHashed;
        $this->jsonContent = $jsonContent;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function setUsername($username){
        $this->username = $username;
    }
    
    public function getemail(){
        return $this->email;
    }
    
    public function setemail($email){
        $this->email = $email;
    }
    
    public function getpasswordHashed(){
        return $this->passwordHashed;
    }
    
    public function setpasswordHashed($passwordHashed){
        $this->passwordHashed = $passwordHashed;
    }
    
    public function getjsonContent($champs = null){
        $obj = (json_decode($this->jsonContent));
        if ($champs == null){
            return $obj;
        } else {
            return $obj->$champs;
        }
    }

    public function setjsonContent($jsonContent){
        $this->jsonContent = $jsonContent;
    }
}

class Personne_Model extends CI_Model{    
    
    public function __construct()
    {
        $this->load->database();
    }

    public function verificationPersonneLogin($email, $passwordHashed)
    {
        $this->db->select('*');
        $this->db->from('PERSONNE');
        $this->db->where('email = "'.$email.'" and password = "'.$passwordHashed.'"');
        $query = $this->db->get();
        return count($query->result_array());
    }

    public  function getPersonne($email)
    {
            $this->db->select('*');
            $this->db->from('PERSONNE');
            $this->db->where('email = "'.$email.'"');
            $query = $this->db->get();
            $personne = $query->result_array()[0];
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
    
    public  function setjsonContentPersonne($email, $jsonContent)
    {
            $this->db->where('email = "'.$email.'"');
            $this->db->from('PERSONNE');
            $data = [
                'jsonContent' => $jsonContent,
            ];
            $this->db->update('PERSONNE', $data);
    }  
        

}

?>