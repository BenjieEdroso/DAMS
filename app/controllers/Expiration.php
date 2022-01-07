<?php 

class Expiration extends Controller{
 
    public function __construct(){
        $this->expiryModel = $this->model("ExpirationModel");
    }

    public function index(){
        $this->view("pages/admin");
    }

    public function set_delete_time(){
        // $file = '';
        // $path = APPROOT . "\uploads\\";

        // $file_last_modified = filemtime($path . $file);

        // $set_number = 0;
        // $days = 3;
        // $hrs = 24;
        // $seconds = 3600;

        // if((time() - $file_last_modified) > $set_number * $days * $hrs * $seconds){
        //     unlink($path . $file);
        // }

        if($_SERVER["REQUEST_METHOD"] == "GET"){
           
        }
    }


}