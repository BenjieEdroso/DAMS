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
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        "firstname" => trim($_POST["firstname"]),
        "middlename" => trim($_POST["middlename"]),
        "lastname" => trim($_POST["lastname"]),
        "username" => trim($_POST["username"]),
        "password" => trim($_POST["password"]),
        "confirm_pass" => trim($_POST["confirm-password"]),
        "user_type" => trim($_POST["user_type"])
      ];

      if (empty($data["firstname"])) {
        $data["firstname_error"] = "Please enter a your first name.";
      }

      if (empty($data["middlename"])) {
        $data["middlename_error"] = "Please enter a your middle name.";
      }

      if (empty($data["lastname"])) {
        $data["lastname_error"] = "Please enter a your last name.";
      }

      if (empty($data["username"])) {
        $data["username_error"] = "Please enter a username.";
      }

      if ($this->user_model->check_user_name($data)) {
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

      if (empty($data["username_error"]) && empty($data["password_error"]) && empty($data["confirm_pass_error"]) && empty($data["firstname_error"]) && empty($data["middlename_error"]) && empty($data["lastname_error"])) {
        $data['password'] = password_hash($data["password"], PASSWORD_DEFAULT);
        $this->user_model->check_user_name($data);
        if ($this->user_model->check_family_name($data) < "1") {
          $this->user_model->insert_account($data);
          $data["success_msg"] = "Registration complete";
        } else {
          $data["success_msg"] = "Person already existed in our database";
        }

        $key = array_keys($data);
        $size = 3;
        for ($i = 0; $i <= $size; $i++) {
          $data[$key[$i]] = '';
        }

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

      if ($this->user_model->check_user_name($data)) {
        $this->user_model->set_session($data);
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