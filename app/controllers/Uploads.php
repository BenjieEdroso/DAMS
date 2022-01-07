<?php
require_once "../vendor/defuse-crypto.phar";
require_once "../vendor/autoload.php";
use Defuse\Crypto\Crypto;
use Defuse\Crypto\File;
use Defuse\Crypto\Key;

class Uploads extends Controller {
  public function __construct(){
    $this->uploadsModel = $this->model("Upload");
  }
  
  private function loadEncryptKey(){
    $randomKey = SECRET_KEY;
    $keyAscii = Key::loadFromAsciiSafeString($randomKey);
    return $keyAscii;
  }

  public function index(){
    $this->view("pages/admin");
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
    $key = $this->loadEncryptKey();
    // $fileEnc = APPROOT . "\uploads\\enc\\" . $_GET["fileName"];
    // $fileDec = APPROOT . "\uploads\\dec\\" . $_GET["fileName"];
    // File::decryptFile($fileEnc,$fileDec ,$key);
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
    //ajax method fileInfo [public/js/main.js]
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