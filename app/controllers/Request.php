<?php
session_start();
class Request extends Controller{
    private $requestModel;
    public function __construct()
    {
        $this->requestModel = $this->model("requestModel");
    }

    public function index(){
        $data = ["user_id" => htmlentities($_SESSION["user_id"])];
        $requests = $this->requestModel->get_requests($data);
        $data["requests"] = $requests;
        $this->view("pages/request", $data);
    }
}