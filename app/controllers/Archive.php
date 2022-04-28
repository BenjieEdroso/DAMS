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

        function upload($files, $storage_folder, $category){
            for($i = 0; $i < count($files["name"]); $i++){
                  move_uploaded_file($files["tmp_name"][$i], $storage_folder . $category . "\\" .$files["name"][$i]);
            } 
        }
  
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            date_default_timezone_set("Asia/Manila");
            $date = date("Y-m-d g:i:s:A");
            $category = $_POST["category"];
            $files = $_FILES["files"];
            $storage_folder = APPROOT . "\drive_main\\";
            $data = ["category" => $category, "date_uploaded" => $date];
            array_push($data, $files);
            
            $this->archive_model->query_to_database($data);

            if(!file_exists($storage_folder . $category)){
                
                mkdir($storage_folder . $category);
                upload($files, $storage_folder, $category);
            }else{
                upload($files, $storage_folder, $category);
            }
            // var_dump($data);
        }
        // redirect("admin/archiving", $data);
    }

    public function add_category(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $category = $_POST["category"];
            $data = [
                "category" => $category,
                "category_msg" => ""
            ];
            if($this->archive_model->insert_category($data)){
                $data["category_msg"] = "Category Added!";
            }else{
                $data["category_msg"] = "Failed to add category!";
            }

            redirect("admin/archiving");
        };
    }

    public function delete_category(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $category = $_POST["category"];
            $data = [
                "category" => $category,
                "category_msg" => ""
            ];
            if($this->archive_model->delete_category($data)){
                $data["category_msg"] = "Category Added!";
            }else{
                $data["category_msg"] = "Failed to add category!";
            }

            redirect("admin/archiving");
        };
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
        $storage_folder = APPROOT . "\drive_main\\" . $file_name;
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
        $archive_folder = APPROOT . "\drive_main\\";
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
            "root_path" => APPROOT . "\drive_main\\" 
        ];

        $directory = APPROOT . "\drive_main\\" . $data["folder_name"] ."\\";
        if(!file_exists($directory)){
            mkdir($directory);
        }
        $this->archive_model->archive_file_db($data);
        if(is_dir($directory)){
            for($i = 0; $i < count($data["file_name"]); $i++){
                move_uploaded_file($data["file_tmp_name"][$i], $directory . $data["file_name"][$i]);
            }
        }

        redirect("admin/documents");

    }

    public function select_directory(){
         
        




        if($_POST["directories"] === "root"){
            $data["file_dir"] = scandir(APPROOT . "\drive_main\\");
        }

        $this->view("admin/documents", $data);


  

    }


   
}