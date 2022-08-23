<?php 
session_start();
class Archive extends Controller{
    private $archiveModel;
    public function __construct()
    {
        $this->archiveModel = $this->model("archiveModel");
    }

    public function search(){
        $data = ["keyword" => $_POST["query"]];
        if(!empty($data["keyword"])){
            $json = json_encode($this->archiveModel->search_doc($data));
            echo $json;
        }else{
            echo json_encode(array("message" => "No results"));
        }
    }

    public function upload(){
        date_default_timezone_set("Asia/Manila");
        $data = $_FILES["files"];
        $data["date_uploaded"] =  date("Y-m-d g:i:s:A");
        $upload_dir = APPROOT . "\drive_main\\";
        for($i = 0; $i < count($data["name"]); $i++){
            $upload_file = $upload_dir . basename($data["name"][$i]);
            $has_duplicate = $this->archiveModel->check_duplicate_doc($data["name"][$i]);
            if(!file_exists($upload_file) && $has_duplicate === 0 ){
                if(move_uploaded_file($data["tmp_name"][$i], $upload_file) && $data["error"][$i] === 0){
                    $data["date_modified"] = date("Y-m-d g:i:s:A", filemtime($upload_file));
                    $recorded = $this->archiveModel->archive($data, $i);
                    if($recorded){
                         $_SESSION["upload_msg"] = "Upload successful";
                    }
                }else{
                    $_SESSION["upload_msg"] = "Upload failed";
                }
            }
        }
        redirect("admin/dashboard");
    }
}