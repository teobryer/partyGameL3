<?php

class Personne {
    private $username;
    private $email;
    private $passwordHashed;
    private $alcoholFriendly;
    private $sex;
    private $yearsOld;
    private $inventory;
    private $inventoryExclude;
    private $tagsExclude;
    private $jsonContent;
    
    function __construct($username, $email=null, $passwordHashed=null, $alcoholFriendly, $tagsExclude=null , $sex, $yearsOld, $inventory=null, $inventoryExclude=null, $jsonContent=null)
    {
        $this->username = $username;
        $this->email = $email;
        $this->passwordHashed = $passwordHashed;
        $this->alcoholFriendly = $alcoholFriendly;
        $this->tagsExclude = $tagsExclude;
        $this->sex = $sex;
        $this->yearsOld = $yearsOld;
        $this->inventory = $inventory;
        $this->inventoryExclude = $inventoryExclude;
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

    public function getsex()
    {
        return $this->sex;
    }

    public function getTagsExclude()
    {
        return $this->tagsExclude;
    }

    public function setTagsExclude($tagsExclude)
    {
        return $this->tagsExclude = $tagsExclude;
    }

    public function getInventory(){
        return $this->inventory;
    }

    public function getInventoryExclude(){
        return $this->inventoryExclude;
    }

    public function getYearsOld(){
        return $this->yearsOld;
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
            return new Personne($personne['username'], $personne['email'], $personne['password'], "True", null , "Male", "18", null, null, $personne['jsonContent']);
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

    public function insertPersonne($username, $email, $passwordHashed, $yearsOld)
    {
            $dataPersonne = array(
                'username'          => $username,
                'email'             => $email,
                'password'          => $passwordHashed,
                'jsonContent'       => "{\"inventory\":{},\"inventoryExclude\":{},\"guests\":{},\"tagsExclude\":{},\"alcoholFriendly\":\"False\",\"sex\":\"Female\", \"yearsOld\" : \"".$yearsOld."\"}"
            );
            $personneTest = array(
                'username'          => $username,
                'email'             => $email,
                'passwordHashed'    => $passwordHashed,
                'jsonContent'       => "{\"inventory\":{},\"inventoryExclude\":{},\"guests\":{},\"tagsExclude\":{},\"alcoholFriendly\":\"False\",\"sex\":\"Female\", \"yearsOld\" : \"".$yearsOld."\"}",
                'logged_in'         => TRUE
                );
            $this->db->insert('PERSONNE', $dataPersonne);
            $this->session->set_userdata($personneTest);
    } 

    public function testOldPassword($oldpasswordHashed)
    {
        $this->db->where('email = "'.$this->session->userdata('email').'" and password = "'.$oldpasswordHashed.'"');
        $this->db->from('PERSONNE');
        $query = $this->db->get();
        return count($query->result_array());
    }

    public function changePasswordPersonne($oldpasswordHashed,$newpasswordHashed)
    {
        if ($this->session->has_userdata('email')){
            $this->db->where('email = "'.$this->session->userdata('email').'" and password = "'.$oldpasswordHashed.'"');
            $this->db->from('PERSONNE');
            $data = [
                'password' => $newpasswordHashed,
            ];
            $this->db->update('PERSONNE', $data);
        }
    }
    
    public function getAllInventory()
    {
            $query = $this->db->get('INVENTORY');
            return $query->result_array();
    }

    public function getAllTags()
    {
            $query = $this->db->get('TAG');
            return $query->result_array();
    }  

    public function getPlayers(){
        if ($this->session->has_userdata('email')){
            $personne = $this->personne_model->getPersonne($this->session->userdata('email'));
            $guests = $personne->getGuests();
            $allPersonne[] = $personne;
            foreach ($guests as $key => $guest) {
                $allPersonne[] = new Personne(((array)$guest)['username'], null, null, ((array)$guest)['alcoholFriendly'], ((array)$guest)['tagsExclude'] , ((array)$guest)['sex'], ((array)$guest)['yearsOld'], ((array)$guest)['inventory'], ((array)$guest)['inventoryExclude'], null);
                
            }
            return $allPersonne;
        } else {
            return null;
        }
        
    }

}

?>
