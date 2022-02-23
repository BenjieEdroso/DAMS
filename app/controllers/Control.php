<?php
require_once "../vendor/defuse-crypto.phar";
require_once "../vendor/autoload.php";

use Defuse\Crypto\File;
use Defuse\Crypto\Key;
use Defuse\Crypto\KeyProtectedByPassword;

class Control extends Controller
{

    public function __construct()
    {
        $this->control_model = $this->model("ControlModel");
    }

    public function index()
    {
        $this->view("control/encryption");
    }


    public function encrypt($file_name)
    {
        $password = $_POST["enc_pass"];
        $inputFile = APPROOT . "\archive\\" . $file_name;
        $outputFile = APPROOT . "\archive\\encrypted\\" . $file_name;
        File::encryptFileWithPassword($inputFile, $outputFile, $password);
    }

    public function encryption()
    {
        $data = $this->control_model->display_data_from_db();
        $this->view("control/encryption", $data);
    }

    public function encrypt_with_password()
    {
        $data = $this->control_model->display_data_from_db();
        $data["get_file_game"] = "gilename";
        $this->view("control/encryption", $data);
    }



    public function decrypt()
    {
        $password = $_POST["enc_pass"];
        $inputFile = APPROOT . "\archive\\encrypted\\" . $_POST["file_name"];
        $outputFile = APPROOT . "\archive\\" . $_POST["file_name"];;
        File::decryptFileWithPassword($inputFile, $outputFile, $password);
    }



    //click quick view file

    //get the file name

    //pass to controller

    //convert the file to png

    //show the file with blur background

    //click encrypt file with password

    //show a modal with form
    //confirm password

    //submit modal

    //redirect to a controller

    //get the password from form

    //use that to encrypt the file

    //after the file is encrypted redirect to the same page

    //display encrypted status to that document

}