<?php

class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model("Register");
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
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        "username" => trim($_POST["username"]),
        "password" => trim($_POST["password"]),
        "confirm_pass" => trim($_POST["confirm-password"]),
        "username_error" => "",
        "password_error" => "",
        "confirm_pass_error" => "",
        "success_msg" => ""
      ];

      if (empty($data["username"])) {
        $data["username_error"] = "Please enter a username.";
      }

      if ($this->userModel->checkUsername($data)) {
        $data["username_error"] = "Username is already taken.";
      }

      if (empty($data["password"])) {
        $data["password_error"] = "Please enter a password.";
      } else {
        if (strlen($data["password"]) < 6) {
          $data["password_error"] = "Password must be at least 6 characters.";
        }
      }

      if (empty($data["confirm_pass"])) {
        $data["confirm_pass_error"] = "Please confirm your password.";
      } else {
        if ($data["password"] != $data["confirm_pass"]) {
          $data["confirm_pass_error"] = "Password do not match.";
        }
      }

      if (empty($data["username_error"]) && empty($data["password_error"]) && empty($data["confirm_pass_error"])) {
        $data['password'] = password_hash($data["password"], PASSWORD_DEFAULT);
        $this->userModel->registerUser($data);

        $key = array_keys($data);
        $size = 3;
        for ($i = 0; $i <= $size; $i++) {
          $data[$key[$i]] = '';
        }

        $data["success_msg"] = "Registration complete";
        $this->view("users/register", $data);
      }
      $this->view("users/register", $data);
    } else {
      $data = [
        "username" => "",
        "password" => "",
        "confirm_pass" => "",
        "username_error" => "",
        "password_error" => "",
        "confirm_pass_error" => "",
        "success_msg" => "",
        "firstname" => "",
        "firstname_error",
        "middlename" => "",
        "middlename_error",
        "lastname" => "",
        "lastname_error"
      ];
      $this->view("users/register", $data);
    }
  }

  public function login()
  {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        "username" => trim($_POST["username"]),
        "password" => trim($_POST["password"]),
        "confirm_pass" => "",
        "username_error" => "",
        "password_error" => "",
        "confirm_pass_error" => "",
        "success_msg" => "",
        "error_msg" => "",
      ];



      if (empty($data["username"])) {
        $data["username_error"] = "Please enter your username.";
      }

      if (empty($data["password"])) {
        $data["password_error"] = "Please enter your password.";
      }

      if ($this->userModel->checkUsername($data)) {
        $this->userModel->setSession($data);
        redirect("admin/dashboard");
      } else {
        $data["error_msg"] = "Username does not exist.";
        $this->view("users/login", $data);
      }
    } else {
      $data = [
        "username" => "",
        "password" => "",
        "confirm_pass" => "",
        "username_error" => "",
        "password_error" => "",
        "confirm_pass_error" => "",
        "success_msg" => ""
      ];
      $this->view('users/login', $data);
    }
  }

  public function signout()
  {
    session_destroy();
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
    redirect("users/login");
  }
}