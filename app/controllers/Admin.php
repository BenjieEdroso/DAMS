<?php

session_start();
require_once "../vendor/defuse-crypto.phar";
require_once "../vendor/autoload.php";

use Defuse\Crypto\File;
use Defuse\Crypto\Key;

class Admin extends Controller
{
    public function __construct()
    {
        $this->fileModel = $this->model("FileModel");
    }

    public function index()
    {
        return;
    }

    public function dashboard()
    {
        $this->view("admin/dashboard");
    }
    public function documents()
    {
        $this->view("admin/documents");
    }
    public function archive()
    {
        $this->view("admin/archive");
    }
    public function monitor()
    {
        $this->view("admin/monitor");
    }
    public function control()
    {
        $this->view("admin/control");
    }

    public function settings()
    {
        $data["settings"] = $_SESSION["encryption_settings"];
        $this->view("admin/settings", $data);
    }
    
    
    private function loadEncryptKey()
    {
        $randomKey = SECRET_KEY;
        $keyAscii = Key::loadFromAsciiSafeString($randomKey);
        return $keyAscii;
    }

    public function save_settings()
    {
        //if save settings get the value
        $setting_encrypt = $_POST["encrypted"];
        //query the settings to database


        $_SESSION["encryption_settings"] = $_POST["encryption"];


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $encryption = $_POST["encryption"];
            //if it is true then


            if ($encryption == "true") {
                $decrypted_path = APPROOT . "\uploads\\decrypted\\";
                $encrypted_path = APPROOT . "\uploads\\encrypted\\";
                $files = scandir($decrypted_path);
                $counter = 2;
                while ($counter < count($files)) {
                    echo $counter;
                    $input_file = $decrypted_path . $files[$counter];
                    echo $input_file;
                    $output_file = $encrypted_path . $files[$counter];
                    File::encryptFile($input_file, $output_file, $this->loadEncryptKey());
                    $counter++;
                }
            } else {
                $decrypted_path = APPROOT . "\uploads\\decrypted\\";
                $encrypted_path = APPROOT . "\uploads\\encrypted\\";
                $files = scandir($encrypted_path);
                $counter = 2;

                while ($counter < count($files)) {
                    $output_file = $decrypted_path . $files[$counter];
                    $input_file = $encrypted_path . $files[$counter];
                    File::decryptFile($input_file, $output_file, $this->loadEncryptKey());
                    $counter++;
                }
            }

            redirect("admin/settings");
        }
    }
}