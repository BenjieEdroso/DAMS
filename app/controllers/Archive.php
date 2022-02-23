<?php
class Archive extends Controller
{
    public $upload_msg;
    public function __construct()
    {
        $this->archive_model = $this->model("ArchiveModel");
    }

    public function index()
    {

        $data = $this->archive_model->display_data_from_db();
        $this->view("archive/store", $data);
    }
    public function store()
    {
        $data = $this->archive_model->display_data_from_db();

        $this->view("archive/store", $data);
    }
    public function store_file()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                "file_name" => $_FILES["file"]["name"],
                "file_type" => $_FILES["file"]["type"],
                "file_tmp_name" => $_FILES["file"]["tmp_name"],
                "file_error" => $_FILES["file"]["error"],
                "file_size" => $_FILES["file"]["size"],
                "upload_size" => ""
            ];

            $storage_folder = APPROOT . "\archive\\";
            $this->archive_model->archive_file_db($data);
            for ($i = 0; $i < count($data["file_name"]); $i++) {
                if (move_uploaded_file($data["file_tmp_name"][$i], $storage_folder . $data["file_name"][$i])) {
                    $data["upload_msg"] = "File inserted successfully";
                };
            };
        }

        redirect("archive/store");
    }

    public function sort()
    {
        $sort_by = $_POST["sort"];
        $data = $this->archive_model->sort($sort_by);

        echo json_encode($data);
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