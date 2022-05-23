<?php
session_start();
class Archive extends Controller
{
    /**
     * @var mixed
     */
    private $archive_model;

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

    public function settings(){
        $expiration_settings_count = count($this->archive_model->get_expiration());
        $data = [
            "expiration_count" => $_POST["expirationCount"],
            "expiration" => $_POST["expiration"],
            "archive_path" => $_POST["archivePath"]
        ];
        if($expiration_settings_count !== 0 AND $expiration_settings_count < 2){
            $this->archive_model->update_expiration_settings($data);
        }else{
            $this->archive_model->query_settings($data);
        }
        redirect("admin/archiving", $data);
    }
    public function file_upload()
    {
      

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            date_default_timezone_set("Asia/Manila");
            $data = [
                "file_category" => $_POST["category"],
                "file_name" => [],
                "file_type" => [],
                "file_tmp_name" => [],
                "file_error" => [],
                "file_size" => [],
                "file_date_uploaded" => [],
                "file_date_modified" => [],
                "file_expiration" => [],
            ];

            function upload($files, $category)
            {
                for ($i = 0; $i < count($files["name"]); $i++) {
                    move_uploaded_file($files["tmp_name"][$i], ARCHIVE_PATH . $category . "\\" . $files["name"][$i]);
                }
            }

            $date = date("Y-m-d g:i:s:A");
            $category = $_POST["category"];
            $files = $_FILES["files"];
            $tmp_array = [];
            foreach($files as $file){
                array_push($tmp_array, $file);
            }

            $data["file_name"] = $tmp_array[0];
            $data["file_type"] = $tmp_array[1];
            $data["file_tmp_name"] = $tmp_array[2];
            $data["file_error"] = $tmp_array[3];
            $data["file_size"] = $tmp_array[4];
            
            if(!file_exists(ARCHIVE_PATH . $category)){
                mkdir(ARCHIVE_PATH . $category);
                upload($files, $category);
            }else{
                upload($files, $category);
            }

            foreach($data["file_name"] as $file_name){
                array_push($data["file_date_uploaded"], $date);
                $fileToCheck = ARCHIVE_PATH . $category . "\\" . $file_name;
                if(file_exists($fileToCheck)){
                    array_push($data["file_date_modified"], date("Y-m-d g:i:s:A", filemtime($fileToCheck)));
                }else{
                    array_push($data["file_date_modified"],  $data["file_date_uploaded"]);
                }
            }
            
              $this->archive_model->query_to_database($data);
    }

    redirect("admin/archiving");
}

    public function add_category(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $category = $_POST["category"];
            $description = $_POST["cat_desc"];
            $data = [
                "category" => $category,
                "description" => $description,
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
        // $file_name = $_GET["file_name"];
        // ARCHIVE_PATH = APPROOT . "\drive_main\\" . $file_name;
        // header("Content-Description", "File Transfer");
        // header('Content-Disposition: attachment; filename="' . basename($_GET["file_name"]) . '"');
        // header("Expires: 0");
        // header("Cache-Control: must-revalidate");
        // header("Pragma: public");
        // header("Content-Length: " . filesize(ARCHIVE_PATH));
        // readfile(ARCHIVE_PATH);
        // exit();
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