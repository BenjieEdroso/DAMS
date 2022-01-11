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

    public function upload_file(){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //tmp name
      foreach($_FILES["file"]["error"] as $key => $error){
        $data = [
        "name" => $_FILES["file"]["name"][$key],
        "type" => $_FILES["file"]["type"][$key],
        "tmp_name" => $_FILES["file"]["tmp_name"][$key],
        "error" => $_FILES["file"]["error"][$key],
        "size" => $_FILES["file"]["size"][$key],
        "upload_msg" => ""
      ];
      
        $tmp_name = $_FILES["file"]["tmp_name"][$key];
        //file name
        $name = basename($_FILES["file"]["name"][$key]);
       
      //if no error
        if($error == UPLOAD_ERR_OK){
          //if file name is not in the uploads folder and in the database
          if(!file_exists(APPROOT."\uploads\\".$name) && $this->uploadsModel->checkDuplicate($name) == 0){
            $this->uploadsModel->upload($data);
            if(move_uploaded_file($tmp_name, APPROOT . "\uploads\\".$name)){
              $data["upload_msg"] = "File successfully moved.";
              redirect("admin/documents");
            }else{
              $data["upload_msg"] = "Error in moving of " . $name . " : " . $error;
            }
          }else if (file_exists(APPROOT."\uploads\\".$name) && $this->uploadsModel->checkDuplicate($name) > 0){
            $data["upload_msg"] = "File is already uploaded.";
          }  
        }else{
          $data["upload_msg"] = "Error uploading of " . $name . " : " . $error;
        }
      }
      
    }

    
  }

  public function download(){
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