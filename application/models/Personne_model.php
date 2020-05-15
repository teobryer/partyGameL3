<?php

class Personne {
    private $username;
    private $email;
    private $passwordHashed;
    private $alcoholFriendly;
    private $sex;
    private $tagsExclude;
    private $jsonContent;
    
    function __construct($username, $email=null, $passwordHashed=null, $alcoholFriendly, $tagsExclude=null , $sex, $jsonContent=null)
    {
        $this->username = $username;
        $this->email = $email;
        $this->passwordHashed = $passwordHashed;
        $this->alcoholFriendly = $alcoholFriendly;
        $this->tagsExclude = $tagsExclude;
        $this->sex = $sex;
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

    public function getGuests()
    {
        if ($this->jsonContent !== null){
            return (array) $this->getjsonContent("guests");
        } else {
            return array();
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

    public function getPersonne($email)
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
            return new Personne($personne['username'], $personne['email'], $personne['password'], "True", "null" , "Male", $personne['jsonContent']);
    }  
    
    public function setjsonContentPersonne($email, $jsonContent)
    {
            $this->db->where('email = "'.$email.'"');
            $this->db->from('PERSONNE');
            $data = [
                'jsonContent' => $jsonContent,
            ];
            $this->db->update('PERSONNE', $data);
    } 

    public function insertPersonne($username, $email, $passwordHashed)
    {
            $dataPersonne = array(
                'username'          => $username,
                'email'             => $email,
                'password'          => $passwordHashed,
                'jsonContent'       => "{\"inventory\":{},\"guests\":{},\"tagsExclude\":{},\"alcoholFriendly\":\"False\",\"sex\":\"Female\"}"
            );
            $personneTest = array(
                'username'          => $username,
                'email'             => $email,
                'passwordHashed'    => $passwordHashed,
                'jsonContent'       => "{\"inventory\":{},\"guests\":{},\"tagsExclude\":{},\"alcoholFriendly\":\"False\",\"sex\":\"Female\"}",
                'logged_in'         => TRUE
                );
            $this->db->insert('PERSONNE', $dataPersonne);
            $this->session->set_userdata($personneTest);
    } 
    
    public function getAllInventory()
    {
            $query = $this->db->get('INVENTORY');
            return $query->result_array();
    }  

    public function getPlayers($email){
        $personne = $this->personne_model->getPersonne($this->session->userdata('email'));
        $guests = $personne->getGuests();
        $AllPersonne[] = $personne;
        foreach ($guests as $key => $guest) {
            $personneGuest = new Personne(((array)$guest)['username'], null, null, ((array)$guest)['alcoholFriendly'], "null" , ((array)$guest)['sex'], null);
            $AllPersonne[] = $personne;
        }
        return $AllPersonne;
    }

}

?>