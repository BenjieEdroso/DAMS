<?php

class UsersModel{
    private $db;

    public function __construct()
    {   
        $this->db = new Database();
    }

    public function has_user($data){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(":email", $data);
        $this->db->execute();
        
        $result = $this->db->fetchOne();
        return $result;
    }

    public function create_user($data){
        $this->db->query("INSERT INTO users (firstname , lastname , email , password , birthdate , type) VALUES (:firstname, :lastname, :email, :password, :birthdate, :type)");
        $this->db->bind(":firstname", $data["firstname"]);
        $this->db->bind(":lastname", $data["lastname"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":password", $data["password"]);
        $this->db->bind(":birthdate", $data["birthdate"]);
        $this->db->bind(":type", $data["type"]);
        return $this->db->execute();
    }
    
} 