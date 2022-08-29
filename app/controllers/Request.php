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

    public function approve(){
       
        $data = [
            "request_id" => htmlentities($_POST["id"]),
            "updated_status" => htmlentities($_POST["status"])
        ];
       
        $resultOfQuery = $this->requestModel->approve_request($data);
        if($resultOfQuery){
            redirect("admin/requests");
        }

    }

    public function download(){
        try{
            $file = htmlentities($_GET["file"]);
            $path_dir = APPROOT . "\drive_main\\";
            if(file_exists($path_dir . $file)){
                header("Content-Description: File Transfer");
                header("Content-Type: application/octet-stream");
                header('Content-Disposition: attachment; filename ="'. basename($path_dir . $file) . '"');
                header("Expires: 0");
                header("Cache-Control: must-revalidate");
                header("Pragma: Public");
                header("Content-Length:" . filesize($path_dir . $file));
                readfile($path_dir . $file);
                exit;
            }
        }catch(Exception $error){
            echo "There is an error downloading please see administrator. The error is: $error";
        }
    }
}