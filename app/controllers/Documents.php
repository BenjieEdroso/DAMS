<?php

session_start();
require_once "../vendor/defuse-crypto.phar";
require_once "../vendor/autoload.php";

use Defuse\Crypto\File;
use Defuse\Crypto\Key;

class Documents extends Controller
{
  public function __construct()
  {
    $this->fileModel = $this->model("FileModel");
    $this->uploadsModel = $this->model("Upload");
  }

  public function index()
  {
    $this->view("pages/admin");
  }

  private function loadEncryptKey()
  {
    $randomKey = SECRET_KEY;
    $keyAscii = Key::loadFromAsciiSafeString($randomKey);
    return $keyAscii;
  }
  //Create
  public function upload_file()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      foreach ($_FILES["file"]["error"] as $key => $error) {
        $data = [
          "name" => $_FILES["file"]["name"][$key],
          "type" => $_FILES["file"]["type"][$key],
          "tmp_name" => $_FILES["file"]["tmp_name"][$key],
          "error" => $_FILES["file"]["error"][$key],
          "size" => $_FILES["file"]["size"][$key],
          "upload_msg" => ""
        ];
        $tmp_name = $_FILES["file"]["tmp_name"][$key];
        $name = basename($_FILES["file"]["name"][$key]);
        if ($error == UPLOAD_ERR_OK) {
          if (!file_exists(APPROOT . "\uploads\\decrypted\\" . $name) && $this->uploadsModel->checkDuplicate($name) == 0) {
            if (move_uploaded_file($tmp_name, APPROOT . "\uploads\\decrypted\\" . $name)) {
              $this->uploadsModel->upload($data);
              $data["upload_msg"] = "File successfully uploaded.";

              redirect("admin/documents");
            } else {
              $data["upload_msg"] = "Error in moving of " . $name . " : " . $error;
            }
          } else if (file_exists(APPROOT . "\uploads\\decrypted\\" . $name) && $this->uploadsModel->checkDuplicate($name) > 0) {
            $data["upload_msg"] = "File is already uploaded.";

            $this->view("admin/documents", $data);
          }
        } else {
          $data["upload_msg"] = "Error in uploading of " . $name . " : " . $error;
        }
      }
    } else if (empty($_SERVER["REQUEST_METHOD"])) {
      $data["upload_msg"] = "Documents not uploaded";
    }
  }
  //Read
  public function open()
  {
    //if the settings is ecnrypted enabled
    print_r($_SESSION["encryption_settings"]);

    //pick the encrypted file
    //decrypt it

    //read it
    $fileName =  $_GET["fileName"];
    $file = APPROOT . "\uploads\\encrypted\\" . $fileName;
    $input_file = $file;
    $output_file =
      APPROOT . "\uploads\\decrypted\\" . $fileName;
    $decrypted_file = $output_file;
    File::decryptFile(
      $input_file,
      $output_file,
      $this->loadEncryptKey()
    );
    header("Content-Type:", "application/pdf");
    // @readfile($decrypted_file);
  }

  public function download()
  {

    $file_name = $_GET["fileName"];
    $file_path = APPROOT . "\uploads\\decrypted\\" . $file_name;
    if ($_SESSION["encryption_settings"] == "true") {
      $file_path =
        APPROOT . "\uploads\\encrypted\\" . $file_name;
    }

    header("Content-Description", "File Transfer");
    header('Content-Disposition: attachment; filename="' . basename($_GET["fileName"]) . '"');
    header("Expires: 0");
    header("Cache-Control: must-revalidate");
    header("Pragma: public");
    header("Content-Length: " . filesize($file_path));
    readfile($file_path);

    exit();
  }
  //Update
  public function save_edit()
  {
    $data = array(
      "file_name" => $_POST["file_name"],
      "file_name_old" => $_POST["file_name_old"]
    );
    if (str_contains($data["file_name"], ".pdf")) {
      $data["file_name"] = str_replace(".pdf", "", $data["file_name"]);
    }

    if ($this->fileModel->save_changes($data)) {
      $path = APPROOT . "\uploads\\decrypted\\";
      $old_name = $data["file_name_old"];
      $new_name = $data["file_name"];
      $extension = ".pdf";
      if (file_exists($path . $old_name)) {
        rename($path . $old_name, $path . $new_name . $extension);
      }
      echo "Changes are saved";
    }
  }

  public function select_file()
  {
    if (isset($_POST["file_id"])) {
      $response = $this->fileModel->select_file($_POST["file_id"]);
      echo basename($response->file_name);
    }
  }
  //Delete
  public function delete()
  {
    //get the filename to be deleted
    $fileToDelete = $_GET["fileName"];


    //if it is deleted in the database
    if ($this->uploadsModel->deleteFileDb($fileToDelete)) {
      $fileToDelete = APPROOT . "\uploads\\decrypted\\" . $fileToDelete;
      if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
      }
    }

    redirect("admin/documents");
  }

  //Others
  public function search()
  {
    $this->fileModel->view_data();
  }

  public function getFileInfo()
  {
    $data = $this->uploadsModel->get_file_info();
    echo json_encode($data);
  }
}