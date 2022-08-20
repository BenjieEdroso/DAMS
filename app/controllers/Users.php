<?php
class Users extends Controller{
    private $user_model;
    
    public function __construct()
    {   
        $this->user_model = $this->model("usersModel");
    }
    public function index(){
        $this->view("user/login");
    }

    public function login(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $has_user = $this->user_model->has_user($email);
            if(password_verify($password,$has_user->password)){
                if($has_user->type == "user"){
                    redirect("users/homepage");
                }
                if($has_user->type == "superuser"){
                    redirect("admin/dashboard");
                }
            }
        }
        $this->view("user/login");
    }

    public function register(){
       
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = [
                "firstname" => $_POST["firstname"],
                "lastname" => $_POST["lastname"],
                "email" => $_POST["email"],
                "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
                "birthdate" => $_POST["birthdate"],
                "type" => $_POST["type"]
            ];
            
            $user_created = $this->user_model->create_user($data);
            if($user_created){
                echo  "User created";
            }
        }
        $this->view("user/register");
    }
}