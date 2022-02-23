<?php

session_start();

class Documents extends Controller
{
  public function __construct()
  {
    $this->fileModel = $this->model("FileModel");
    $this->uploadsModel = $this->model("Upload");
  }

  public function index()
  {
    $data = $this->fileModel->view_data();
    $this->view("pages/admin", $data);
  }


  //Create

  //Read
  public function open()
  {
    $fileName =  $_GET["fileName"];
    $file = APPROOT . "\uploads\\decrypted\\" . $fileName;
    header("Content-Type:", "application/pdf");
    @readfile($file);
  }

  public function download()
  {

    $file_name = $_GET["fileName"];
    $file_path = APPROOT . "\uploads\\decrypted\\" . $file_name;

    if ($_SESSION["encryption_settings"] == "true") {
      // File::decryptFile(APPROOT . "\uploads\\encrypted\\" . $file_name, $file_path, $this->loadEncryptKey());
      $file_path = APPROOT . "\uploads\\decrypted\\" . $file_name;
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
    $file_name = $_GET["fileName"];


    //if it is deleted in the database
    if ($this->uploadsModel->deleteFileDb($file_name)) {
      $fileToDelete = APPROOT . "\uploads\\decrypted\\" . $file_name;
      $fileToDeleteEnc = APPROOT . "\uploads\\encrypted\\" . $file_name;
      if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
      }

      if (file_exists($fileToDeleteEnc)) {
        unlink($fileToDeleteEnc);
      }
    }

    redirect("admin/documents");
  }

  //Others
  public function search()
  {



    $this->view("admin/search");
  }

  public function find()
  {

    echo $this->fileModel->search_string($_POST["query"]);
  }

  public function see_all_results()
  {
    echo $this->fileModel->see_all_results();
  }
  public function getFileInfo()
  {
    $data = $this->uploadsModel->get_file_info();
    echo json_encode($data);
  }
}