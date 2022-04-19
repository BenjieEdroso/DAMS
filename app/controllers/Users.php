<?php

class Users extends Controller
{
  public function __construct()
  {
    $this->user_model = $this->model("UsersModel");
  }

  public function index()
  {
    $data = [];
    $this->view("users/register");
  }
  public function setSession($data)
  {
  }

  

  public function register()
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
      $data = [
        "firstname" => trim($_POST["firstname"]),
        "lastname" => trim($_POST["lastname"]),
        "birthate" => $_POST["birthdate"],
        "email" => $_POST["email"],
        "password" => trim($_POST["password"]),
      ];

      if (empty($data["firstname"])) {
        $data["firstname_error"] = "Please enter a your first name.";
      }

      if (empty($data["lastname"])) {
        $data["lastname_error"] = "Please enter a your last name.";
      }

      if (empty($data["email"])) {
        $data["email_error"] = "Please enter a email.";
      }

      if ($this->user_model->check_user($data)) {
        $data["email_error"] = "email is already taken.";
      }

      if (empty($data["password"])) {
        $data["password_error"] = "Please enter a password.";
      } else {
        if (strlen($data["password"]) < 6) {
          $data["password_error"] = "Password must be at least 6 characters.";
        }
      }

      // if (empty($data["email_error"]) && empty($data["password_error"]) && empty($data["firstname_error"]) &&  empty($data["lastname_error"])) {

      // }
      $this->view("users/register", $data);
    } else {
      $data = [
        "email" => "",
        "password" => "",
        "confirm_pass" => "",
        "email_error" => "",
        "password_error" => "",
        "confirm_pass_error" => "",
        "success_msg" => "",
        "firstname" => "",
        "middlename" => "",
        "lastname" => "",
        "firstname_error",
        "middlename_error",
        "lastname_error"
      ];
      $this->view("users/register", $data);
    }
  }

  public function login()
  {
      if($_SERVER["REQUEST_METHOD"] == "POST"){
          $email = trim($_POST["email"]);
          $password = trim($_POST["password"]);
          $data = [
            "email" => $email,
            "password" => $password
          ];

         echo $this->user_model->check_user($data);
      }

      $this->view("users/login");
  }

  public function signout()
  {
    session_destroy();
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    redirect("users/login");
  }
}