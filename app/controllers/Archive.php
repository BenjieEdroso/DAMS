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

    public function store_local()
    {
        $data = array(
            "file_name" => $_FILES["file"]["name"],
            "file_type" => $_FILES["file"]["type"],
            "file_tmp_name" => $_FILES["file"]["tmp_name"],
            "file_error" => $_FILES["file"]["error"],
            "file_sized" => $_FILES["file"]["size"],
            "upload_msg" => ""
        );

        $storage_folder = APPROOT . "\storage_folder\\";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            for ($i = 0; $i < count($data["file_name"]); $i++) {
                if (move_uploaded_file($data["file_tmp_name"][$i], $storage_folder . $data["file_name"][$i])) {
                    $data["upload_msg"] = "File is stored successfully";
                };
            }
        }

        $this->view("archive/store", $data);
    }
}