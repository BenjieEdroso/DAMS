<?php
session_start();
class Register
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function registerUser($data)
  {
    //query data to database
    $this->db->query(
      "INSERT INTO users (username, password) VALUES (:username, :password)"
    );
    $this->db->bind(":username", $data["username"]);
    $this->db->bind(":password", $data["password"]);
    return $this->db->execute();    
  }

  public function setSession($data){
    $this->db->query("SELECT * FROM users WHERE username = :username");
    $this->db->bind(":username", $data["username"]);
    $this->db->execute();

    $row = $this->db->fetchOne();

    if($row){
      $_SESSION["username"] = $row->username;
      $_SESSION["password"] = $row->password;
    }

  }


  public function checkUsername($data){
    $this->db->query("SELECT * FROM users WHERE username= :username");
    $this->db->bind(":username", $data["username"]);
    $this->db->execute();

    $row = $this->db->fetchOne();

     if($row){
      $hashed_pass = $row->password;
      if(password_verify($data["password"], $hashed_pass)){
        return $row;
      }
     }else{
       return false;
     }
  }
}

