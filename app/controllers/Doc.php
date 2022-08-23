<?php

class Doc extends Controller {
    private $docModel;
    public function __construct(){
        $this->docModel = $this->model("docModel");
    }
    public function index(){
        if(!isset($_SESSION["user"])){
            redirect("users/login");   
        }
    }
    public function open(){
        if(!isset($_SESSION["user"])){
            redirect("users/login");   
        }
        $file_id = htmlentities($_GET["id"]);
        $user_id = htmlentities($_SESSION["user_id"]);
        $data = ["file_id" => $file_id,];
        $data = $this->docModel->get_this_doc($data);
        $data->user_id = $user_id;
        $status = $this->docModel->check_status($data);
        if($status){
            $data->status = $status->status;
        }else{
            $data->status = "open";
        }
        $this->view("doc/open", $data);
    }

    public function request(){
        try{
            date_default_timezone_set("Asia/Manila");
            $status = "pending";
            $file_id = htmlentities($_GET["id"]);
            $user_id = htmlentities($_SESSION["user_id"]);
            $date_requested  = date("Y-m-d g:i:s:A");
            $data = [
                "status" => $status,
                "file_id" => $file_id,
                "user_id" => $user_id,
                "date_requested" =>   $date_requested
            ];
            $this->docModel->create_request($data);
            redirect("doc/open?id=$file_id");
        }catch(Exception $error){
            echo "Request not created encountered an error $error";
        }
        
    }
}