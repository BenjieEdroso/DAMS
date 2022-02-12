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
        $data = array("upload_msg" => "");

        if ($posted) {
            foreach ($_FILES["file"]["error"] as $key) {
                $data = [
                    "file_name" => $posted ? $_FILES["file"]["name"][$key] : "",
                    "file_type" => $posted ? $_FILES["file"]["type"][$key] : "",
                    "file_tmp_name" => $posted ? $_FILES["file"]["tmp_name"][$key] : "",
                    "file_error" => $posted ? $_FILES["file"]["error"][$key] : "",
                    "file_size" => $posted ? $_FILES["file"]["size"][$key] : "",
                    "upload_msg" => ""
                ];

                $storage_folder = APPROOT . "\archive\\";
                $this->archive_model->archive_file_db($data);
                if (move_uploaded_file($data["file_tmp_name"], $storage_folder . $data["file_name"])) {
                    $data["upload_msg"] = "File is stored successfully";
                };
            }
        }

        $this->view("archive/store", $data);
    }

    public function recover()
    {
        $data = $this->archive_model->select_all_files();
        $this->view("archive/recover", $data);
    }

    public function download()
    {
        $file_name = $_GET["file_name"];
        $storage_folder = APPROOT . "\archive\\" . $file_name;
        header("Content-Description", "File Transfer");
        header('Content-Disposition: attachment; filename="' . basename($_GET["file_name"]) . '"');
        header("Expires: 0");
        header("Cache-Control: must-revalidate");
        header("Pragma: public");
        header("Content-Length: " . filesize($storage_folder));
        readfile($storage_folder);
        exit();
    }

    public function backup()
    {
        $this->view("archive/backup");
    }

    public function backup_start()
    {
        if (isset($_POST["backup"])) {
            $files_in_archive = scandir(ARCHIVE_PATH);
            $files = array_splice($files_in_archive, 2);
            foreach ($files as $file) {
                copy(ARCHIVE_PATH . $file, BACKUP_PATH . $file);
            };
        }

        redirect("archive/backup");
    }
}