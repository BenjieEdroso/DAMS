<?php
class Archive extends Controller
{
    public function __construct()
    {
        $this->archive_model = $this->model("ArchiveModel");
    }

    public function index()
    {
        $this->view("archive/store");
    }

    public function store()
    {
        $posted = $_SERVER["REQUEST_METHOD"] == "POST";
        $data = array(
            "file_name" => $posted ? $_FILES["file"]["name"] : "",
            "file_type" => $posted ? $_FILES["file"]["type"] : "",
            "file_tmp_name" => $posted ? $_FILES["file"]["tmp_name"] : "",
            "file_error" => $posted ? $_FILES["file"]["error"] : "",
            "file_size" => $posted ? $_FILES["file"]["size"] : "",
            "upload_msg" => ""
        );

        $storage_folder = APPROOT . "\archive\\";

        if ($posted) {
            for ($i = 0; $i < count($data["file_name"]); $i++) {
                //query files to db
                $this->archive_model->archive_file_db($data);
                if (move_uploaded_file($data["file_tmp_name"][$i], $storage_folder . $data["file_name"][$i])) {
                    $data["upload_msg"] = "File is stored successfully";
                };
            }
        }

        $this->view("archive/store", $data);
    }

    public function recover()
    {
        //find the files in the file system
        $data = $this->archive_model->select_all_files();
        //download it

        $this->view("archive/recover", $data);
    }
}