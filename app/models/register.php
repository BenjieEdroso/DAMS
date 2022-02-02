<?php
session_start();
class Register
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function insert_account($data)
  {

    $this->db->query("INSERT INTO tbl_account (username, password) VALUES (:username, :password)");
    $this->db->bind(":username", $data["username"]);
    $this->db->bind(":password", $data["password"]);
    $this->db->execute();

    //get id
    $this->db->query("SELECT account_id FROM tbl_account WHERE username = :username");
    $this->db->bind(":username", $data["username"]);
    $this->db->execute();
    $result = $this->db->fetchOne();

    $this->db->query("INSERT INTO tbl_name (firstname, middlename, lastname, account_id) VALUES (:firstname, :middlename, :lastname, :account_id)");
    $this->db->bind(":firstname", $data["firstname"]);
    $this->db->bind(":middlename", $data["middlename"]);
    $this->db->bind(":lastname", $data["lastname"]);
    $this->db->bind(":account_id", $result->account_id);
    return $this->db->execute();
  }



  public function setSession($data)
  {
    $this->db->query("SELECT * FROM users WHERE username = :username");
    $this->db->bind(":username", $data["username"]);
    $this->db->execute();

    $row = $this->db->fetchOne();

    if ($row) {
      $_SESSION["username"] = $row->username;
      $_SESSION["password"] = $row->password;
    }
  }


  public function check_user_name($data)
  {
    $this->db->query("SELECT * FROM tbl_account WHERE username= :username");
    $this->db->bind(":username", $data["username"]);
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