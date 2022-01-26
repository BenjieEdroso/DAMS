<?php

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
        $data = $this->fileModel->view_data();
        $this->view("admin/documents", $data);
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
        $this->view("admin/settings");
    }

    private function loadEncryptKey()
    {
        $randomKey = SECRET_KEY;
        $keyAscii = Key::loadFromAsciiSafeString($randomKey);
        return $keyAscii;
    }

    public function save_settings()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $encryption = $_POST["encryption"];
            //if it is true then


            if ($encryption == "true") {
                $uploads_path = APPROOT . "\uploads\\";
                $files = scandir($uploads_path);
                $counter = 2;
                while ($counter < count($files)) {
                    $input_file = $uploads_path . $files[$counter];
                    $output_file = $uploads_path . "encrypted\\" . $files[$counter];
                    File::encryptFile($input_file, $output_file, $this->loadEncryptKey());
                    $counter++;
                }
            } else {
                $uploads_path = APPROOT . "\uploads\\";
                $encrypted_path = APPROOT . "\uploads\\encrypted\\";
                $files = scandir($encrypted_path);
                $counter = 2;
                while ($counter < count($files)) {
                    $output_file = $uploads_path . $files[$counter];
                    $input_file = $encrypted_path . $files[$counter];
                    File::decryptFile($input_file, $output_file, $this->loadEncryptKey());
                    $counter++;
                }
            }
        }

        redirect("admin/settings");
    }
}