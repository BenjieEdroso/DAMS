<?php

class Doc extends Controller {
    private $docModel;

    public function __construct(){
        $this->docModel = $this->model("docModel");
        $this->requestModel = $this->model("requestModel");
        define("LOGIN_URL", "users/login");
        define("USER", "user");
        define("USER_TYPE", "user_type");
        define("TYPE", "user");
    }

    public function login_redirect(){
        if(!isset($_SESSION[USER]) && $_SESSION[USER_TYPE] !== TYPE){
            redirect(LOGIN_URL);
        }
    }

    public function index(){
        $this->login_redirect();
    }
    
    public function open(){
        $this->login_redirect();
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
                "date_requested" =>   $date_requested,
                "request_count" => null
            ];
            $request_created = $this->docModel->create_request($data);
            if($request_created){
                $number_of_requests = $this->requestModel->get_requests($data);
                foreach($number_of_requests as $number_of_request){
                    $data["request_count"] += 1;
                }
                try{
                    $request_counted = $this->requestModel->count_request($data);
                }catch(Exception $e){
                    $request_updated = $this->requestModel->update_request_count($data);
                }
                
                if($request_counted || $request_updated){   
                    redirect("doc/open?id=$file_id");
                }

               
            }  
        }catch(Exception $error){
            echo "Request not created encountered an error $error";
        }
    }
}