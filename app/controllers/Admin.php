<?php
session_start();
class Admin extends Controller{
    public $adminModel;
    public function __construct(){
        $this->adminModel = $this->model("adminModel");

    }

    public function index(){
        if(!isset($_SESSION["user"])){
            redirect("users/login");
        }
        $this->view("admin/dashboard");
    }

    public function requests(){
        $data = $this->adminModel->get_all_request();
        $this->view("admin/requests", $data);
    }
}