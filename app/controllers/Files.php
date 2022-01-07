<?php 
require_once "../vendor/defuse-crypto.phar";
require_once "../vendor/autoload.php";

use Defuse\Crypto\File;
use Defuse\Crypto\Key;

class Files extends Controller{
    public function __construct(){
        $this->fileModel = $this->model("FileModel");
    }

    private function loadEncryptKey(){
        $randomKey = SECRET_KEY;
        $keyAscii = Key::loadFromAsciiSafeString($randomKey);
        return $keyAscii;
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
        $key = $this->loadEncryptKey();
        $fileEnc = APPROOT . "\uploads\\enc\\" . $_GET["file_name"];
        $fileDec = APPROOT . "\uploads\\dec\\" . $_GET["file_name"];
        File::decryptFile($fileEnc,$fileDec ,$key);
        $file = APPROOT . "\uploads\\dec\\" . $_GET["file_name"];
        header("Content-Type:", "application/pdf");
        header('Content-Disposition: inline; filename="'. $_GET["file_name"] . '"');
        header('Content-Transfer-Encoding: binary');
        @readfile($file);
    }

    public function search(){
     
       $this->fileModel->view_data();
     
    }

}