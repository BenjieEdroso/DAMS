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
            $search_datas = $this->archiveModel->search_doc($data);
            foreach($search_datas as $search_data){
            $search_response = "
                <a href='http://localhost/DAMS/doc/open?id=$search_data->file_id' class='mb-3 d-block text-decoration-none text-dark col-6 mx-auto'>
                    <div class='card'>
                        <div class='card-body'>
                        <p class='h6'>$search_data->file_name</p>
                        <span class='me-3 text-muted small'>$search_data->file_date_uploaded</span>
                        <span class='text-muted small'>$search_data->file_date_modified</span>
                        </div>
                    </div>
                </a>";
                print_r($search_response);
            }
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