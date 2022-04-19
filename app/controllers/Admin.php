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
  
        $this->adminModel = $this->model("AdminModel");
    }

    public function index()
    {
        return;
    }

    public function dashboard()
    {   function unused_space(){
            $bytes= disk_free_space("D:");
            $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
            $base = 1024;
            $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
            return round($bytes / pow($base,$class), 2) . $si_prefix[$class];
        };

        function used_space(){
            $bytes= disk_free_space("D:");
            $bytes_total= disk_total_space("D:");
            $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
            $base = 1024;
            $class = min((int)log(($bytes_total - $bytes) , $base) , count($si_prefix) - 1);
            return round(($bytes_total - $bytes) / pow($base,$class), 2) . $si_prefix[$class];
        };

        function files()
        {
            $dir = APPROOT . "\\drive_main";
            $dirs =  scandir($dir);
            $total = null;
            $docx_total =  null;
            $pdf_total =  null;
            for($i = 0; $i < count($dirs); $i++){
                if($dirs[$i] != "." && $dirs[$i] != ".."){
                    if(is_dir($dir . "\\" . $dirs[$i])){
                        $d = new FilesystemIterator($dir . "\\" . $dirs[$i]);
                        $docx = new CallbackFilterIterator($d, function($cur){
                            return $cur->getExtension() == "docx";
                        });

                        $pdf = new CallbackFilterIterator($d, function($cur){
                            return $cur->getExtension() == "pdf";
                        });
                        $docx_total  += iterator_count($docx);
                        $pdf_total  += iterator_count($pdf);

                        $total += iterator_count($d);
                    }

                    if(is_file($dir . "\\" . $dirs[$i])){
                        $total++;
                        $pi = pathinfo($dir . "\\" . $dirs[$i]);
                        if($pi["extension"] == "pdf"){
                            $pdf_total++;
                        }

                        if($pi["extension"] == "docx"){
                            $docx_total++;
                        }
                    }
                }
            }

          


            return [
              "total" => $total,
              "total_docx" => $docx_total,
              "total_pdf" => $pdf_total
            ];
        }

      
     
        $this->view("admin/dashboard");
    }
  public function processForm(){
        $this->view("admin/archiving");
    }
    public function archiving()
    {   $data = $this->adminModel->categories();
        $this->view("admin/archiving", $data);
    }
    
    public function documents()
    {
        $this->view("admin/documents");
    }
  
    public function monitor()
    {
        $this->view("admin/monitor");
    }
    public function control()
    {
        $this->view("admin/control");
    }

    public function user()
    {
        $this->view("admin/user");
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