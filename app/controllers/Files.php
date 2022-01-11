<?php 
class Files extends Controller{
    public function __construct(){
        $this->fileModel = $this->model("FileModel");
        $this->uploadsModel = $this->model("Upload");
    }

    public function index(){
        $this->view("pages/admin");
    }
  
    public function edit(){
        $data = [
            "file_name" => $_GET["file_name"],
        ];
        $row = $this->fileModel->select_file($data);
        $data["file_name"] = $row->file_name;
        $this->view("admin/documents", $data);
    }

    public function save(){
        $data = [
            "edited_name" => $_POST["edited_name"],
            "file_name" => $_POST["file_name"]
        ];
        if($this->fileModel->save_changes($data)){
            $enc_path = APPROOT . "\uploads\\enc\\";
            $dec_path = APPROOT . "\uploads\\dec\\";
            $old_name = $data["file_name"];
            $new_name = $data["edited_name"];
            $extension = ".pdf";
            if(file_exists($enc_path . $old_name)){
                rename($enc_path . $old_name, $enc_path . $new_name . $extension);
            }
            if(file_exists($dec_path . $old_name)){
                rename($dec_path . $old_name, $dec_path . $new_name . $extension);
            } 
            $data["upload_msg"] = "Updated Successfully";
            $data["file_name"] = "";
        }
        $this->view("pages/admin", $data);
    }

    public function open(){
   
        $fileEnc = APPROOT . "\uploads\\enc\\" . $_GET["file_name"];
        $fileDec = APPROOT . "\uploads\\dec\\" . $_GET["file_name"];

        $file = APPROOT . "\uploads\\dec\\" . $_GET["file_name"];
        header("Content-Type:", "application/pdf");
        header('Content-Disposition: inline; filename="'. $_GET["file_name"] . '"');
        header('Content-Transfer-Encoding: binary');
        @readfile($file);
    }

    public function search(){
     
       $this->fileModel->view_data();
     
    }

    public function uploadFile(){
    $data = [
      "upload_msg" => "",
      "name" => "",
      "type" => "",
      "tmp_name" => "",
      "error" => "",
      "size" => "",
    ];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      for ($k = 0; $k < count($_FILES["file"]["name"]); $k++){
        $fileDir = APPROOT . "\uploads\\" . basename($_FILES["file"]["name"][$k]);
        if ( $this->uploadsModel->checkDuplicate($_FILES["file"]["name"][$k]) == 0 && !file_exists($fileDir)) {
          for ($i = 0; $i < count($_FILES["file"]); $i++) {
            $data = [
              "name" => $_FILES["file"]["name"][$i],
              "type" => $_FILES["file"]["type"][$i],
              "tmp_name" => $_FILES["file"]["tmp_name"][$i],
              "error" => $_FILES["file"]["error"][$i],
              "size" => $_FILES["file"]["size"][$i],
            ];
            if ($_FILES["file"]["error"][$i] == 0 && $this->uploadsModel->upload($data)) {
           
              move_uploaded_file($data["tmp_name"], $fileDir );
              redirect("admin/documents");


              
            }
          }
        }
        elseif ($this->uploadsModel->checkDuplicate($_FILES["file"]["name"][$k]) > 0 || file_exists($fileDir)) {
          $data["upload_msg"] = "File is already archived";
        }
      }
    }
  }

  public function downloadFile(){
    $file_name = $_GET["fileName"];
    $file_path = APPROOT . "\uploads\\" . $file_name;
      header("Content-Description", "File Transfer");
      header('Content-Disposition: attachment; filename="' . basename($_GET["fileName"]) . '"');
      header("Expires: 0");
      header("Cache-Control: must-revalidate");
      header("Pragma: public");
      header("Content-Length: " . filesize($file_path));
      readfile($file_path);
      ob_flush();
      exit();
  }

   public function getFileInfo(){
    $data = $this->uploadsModel->get_file_info();
    echo json_encode($data);
  }

  public function deleteFile(){
    $data = ["file_name" => $_GET["file_name"],"alert_msg" => "",];
    echo "Deleted";
    $deletionPath = APPROOT . "\uploads" . $data["file_name"];
   
    if ($this->uploadsModel->deleteFileDb($data)) {
      if(file_exists($deletionPath)){
        unlink($deletionPath);
      }
    
      $data["alert_msg"] = "File is deleted";
    };
    redirect("admin/documents");
  }

  

}