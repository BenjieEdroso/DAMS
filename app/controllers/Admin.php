<?php
class Admin extends Controller{
    public function __construct()
    {
        $this->fileModel = $this->model("FileModel");
    }

    public function index(){
        return;
    }

    public function dashboard(){
        $this->view("admin/dashboard");
    }
    public function documents(){
        $data = $this->fileModel->view_data();
        $this->view("admin/documents", $data);
    }
    public function archive(){
        $this->view("admin/archive");
    }
    public function monitor(){
        $this->view("admin/monitor");
    }
    public function control(){
        $this->view("admin/control");
    }
}