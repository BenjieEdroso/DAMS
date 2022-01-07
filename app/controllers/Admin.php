<?php
class Admin extends Controller{

    public function index(){
        return;
    }

    public function dashboard(){
        $this->view("admin/dashboard");
    }
    public function documents(){
        $this->view("admin/documents");
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