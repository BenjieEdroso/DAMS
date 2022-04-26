<?php
session_start();
class UsersModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }



    public function set_session($data)
    {
        $this->db->query("SELECT * FROM tbl_account WHERE username = :username");
        $this->db->bind(":username", $data["username"]);
        $this->db->execute();

        $row = $this->db->fetchOne();

        if ($row) {
            $_SESSION["username"] = $row->username;
            $_SESSION["password"] = $row->password;
        }
    }


    public function check_user($data)
    {
        $this->db->query("SELECT * FROM users WHERE email= :email");
        $this->db->bind(":email", $data["email"]);
        $this->db->execute();

        $row = $this->db->fetchOne();

        if ($row) {
            $hashed_pass = $row->password;
            if (password_verify($data["password"], $hashed_pass)) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function register_user($data){
        $this->db->query("INSERT INTO users (firstname, lastname, birthdate, email, password, type) VALUES (:firstname, :lastname, :birthdate, :email, :password, :type)");
        $this->db->bind(":firstname", $data["firstname"]);
        $this->db->bind(":lastname", $data["lastname"]);
        $this->db->bind(":birthdate", $data["birthdate"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":password", $data["password"]);
        $this->db->bind(":type", $data["type"]);

       return  $this->db->execute();
    }
    


}