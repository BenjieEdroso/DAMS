<?php
session_start();
class Archive extends Controller
{
    public function __construct(){
        $this->archive_model = $this->model("ArchiveModel");
    }

    public function index(){
        $data = $this->archive_model->display_data_from_db();
        $this->view("archive/store", $data);
    }

    public function store(){
        $data = $this->archive_model->display_data_from_db();
        $this->view("archive/store", $data);
    }

    public function file_upload(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                "file_name" => $_FILES["file"]["name"],
                "file_type" => $_FILES["file"]["type"],
                "file_tmp_name" => $_FILES["file"]["tmp_name"],
                "file_error" => $_FILES["file"]["error"],
                "file_size" => $_FILES["file"]["size"],
                "folder_name" => $_FILES["folderName"],
                "upload_size" => ""
            ];
          
            //check archive folder
            
            //if no folder name
            //create folder
            //set storage folder to storare + folder_name

            // has foldername
            //set storage folder to storage + folder_name

            //else set storage folder to root
            $storage_folder = APPROOT . "\archive\\";
            if(!file_exists($storage_folder.$data["folder_name"])){
               mkdir($storage_folder . $data["folder_name"]);
               $storage_folder = $storage_folder . $data["folder_name"];
            }else if(file_exists($storage_folder.$data["folder_name"])){
                $storage_folder = $storage_folder . $data["folder_name"];
            }

            $this->archive_model->archive_file_db($data);
            for ($i = 0; $i < count($data["file_name"]); $i++) {
                if (move_uploaded_file($data["file_tmp_name"][$i], $storage_folder . $data["file_name"][$i])) {
                    $data["upload_msg"] = "File inserted successfully";
                };
            };
        }

        redirect("admin/documents");
    }

    public function sort(){
        $sort_by = $_POST["sort"];
        $data = $this->archive_model->sort($sort_by);

        echo json_encode($data);
    }

    public function recover(){
        $data = $this->archive_model->select_all_files();
        $this->view("archive/recover", $data);
    }

    public function download(){
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

    public function backup(){
        $this->view("archive/backup");
    }

    public function backup_start(){
        if (isset($_POST["backup"])) {
            $files_in_archive = scandir(ARCHIVE_PATH);
            $files = array_splice($files_in_archive, 2);
            foreach ($files as $file) {
                copy(ARCHIVE_PATH . $file, BACKUP_PATH . $file);
            };
        }

        redirect("archive/backup");
    }

    public function create_folder(){
        $new_folder_name = $_POST["folderName"]; 
        //go to archive folder
        $archive_folder = APPROOT . "\archive\\";
        //check if the folder name is exist
        if(!file_exists($archive_folder . $new_folder_name)){
            $new_folder_name = $archive_folder . $new_folder_name;
            mkdir($new_folder_name, 0777);
        };

        redirect("admin/documents");

        //if not exist

        //create the folder

        //if exsist echo folder already exist
    }

    public function folder_upload(){

        $folder_name = substr($_POST["directory"], 0 ,strpos($_POST["directory"], "/"));
        $data = [
            "folder_name" => $folder_name,
            "file_name" => $_FILES["folder"]["name"],
            "file_type" => $_FILES["folder"]["type"],
            "file_tmp_name" => $_FILES["folder"]["tmp_name"],
            "file_error" => $_FILES["folder"]["error"],
            "file_size" => $_FILES["folder"]["size"],
        ];

        $directory = APPROOT . "\archive\\" . $data["folder_name"] ."\\";
        //if folder name does not exist
        $isdir = is_dir($directory);

        if(!file_exists($directory)){
            mkdir($directory);
        }


        
        if(is_dir($directory)){
            for($i = 0; $i < count($data["file_name"]); $i++){
                move_uploaded_file($data["file_tmp_name"][$i], $directory . $data["file_name"][$i]);
            }
        }
        //upload files to that folder
        //if folder exist
        //add(1) to folder name
        //then upload to taht folder

       



    //     print_r($_POST);
    //     var_dump($folder_name);
    //   echo "<pre>";
    //   print_r($_FILES["folder"]);
    //   echo "</pre>";
    }
   
}