<?php

class Login
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function check_login_username($data)
    {
        $this->db->query("SELECT * FROM tbl_account WHERE username= :username");
        $this->db->bind(":username", $data["username"]);
        return $this->db->execute();

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