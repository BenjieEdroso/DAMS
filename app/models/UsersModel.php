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
                return $row;
            }
        } else {
            return false;
        }
    }


}