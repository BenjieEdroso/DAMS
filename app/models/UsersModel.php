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
        return $this->db->fetchOne();
    }

    public function get_all_users(){
        $this->db->query("SELECT * FROM users");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function get_single_user($user_id){
        $this->db->query("SELECT * FROM users WHERE user_id = :user_id");
        $this->db->bind(":user_id", $user_id);
        $this->db->execute();
        return $this->db->fetchOne();
    }

    public function delete_user($user_id){
        $this->db->query("DELETE FROM users WHERE user_id = :user_id");
        $this->db->bind(":user_id", $user_id);
        return $this->db->execute();
    }

    public function update_user($data){
        $this->db->query("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email WHERE user_id = :user_id AND type='user'");
        $this->db->bind(":user_id", $data["user_id"]);
        $this->db->bind(":firstname", $data["firstname"]);
        $this->db->bind(":lastname", $data["lastname"]);
        $this->db->bind(":email", $data["email"]);
        return $this->db->execute();
        
    }

    public function get_users_request(){
        $this->db->query("SELECT requests.id, requests.user_id, users.firstname, users.lastname, users.email FROM requests INNER JOIN users ON requests.user_id = users.user_id WHERE type='user'");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function get_all_users_id(){
        $this->db->query("SELECT user_id, firstname, lastname, email FROM users WHERE type='user'");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function get_password($user_id){
        $this->db->query("SELECT password FROM users WHERE user_id = :user_id");
        $this->db->bind(":user_id", $user_id);
        return $this->db->fetchOne();
    }

    public function find_user($keyword){
        $this->db->query("SELECT * FROM users WHERE firstname LIKE ? AND type='user'");
        $this->db->bind(1, "%" . $keyword . "%");
        return $this->db->resultSet();
    }
    public function update_pass($data){
        $this->db->query("UPDATE users SET password = :password WHERE user_id = :user_id");
        $this->db->bind(":user_id", $data["user_id"]);
        $this->db->bind(":password", $data["password"]);
        return $this->db->execute();

    }
    public function create($data){
        $this->db->query("INSERT INTO users (firstname , lastname , email , password , birthdate , type) VALUES (:firstname, :lastname, :email, :password, :birthdate, :type)");
        $this->db->bind(":firstname", $data["firstname"]);
        $this->db->bind(":lastname", $data["lastname"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":password", $data["password"]);
        $this->db->bind(":birthdate", $data["birthdate"]);
        $this->db->bind(":type", $data["type"]);
        return $this->db->execute();
    }

    public function set_request($data){
        $this->db->query("SELECT user_id FROM users WHERE firstname = :firstname AND lastname = :lastname");
        $this->db->bind(":firstname", $data["firstname"]);
        $this->db->bind(":lastname", $data["lastname"]);
        $id = $this->db->fetchOne()->user_id;

        $this->db->query("INSERT INTO request_load (user_id, request_count) VALUES (:user_id, :request_count)");
        $this->db->bind(":user_id", $id);
        $this->db->bind(":request_count", 0);
        return $this->db->execute();
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