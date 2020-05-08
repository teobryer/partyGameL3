<?php

class Personne {
    private $username;
    private $email;
    private $passwordHashed;
    private $jsonContent;
    
    function __construct($username, $email, $passwordHashed, $jsonContent=null)
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
    
    public function getjsonContent($champs){
        $obj = (json_decode($this->jsonContent));
        return $obj->$champs;
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

    public  function getPersonne($email)
    {
            $this->db->select('*');
            $this->db->from('PERSONNE');
            $this->db->where('email = "'.$email.'"');
            $query = $this->db->get();
            return $query->result_array()[0];
    }  
        
        

}

?>