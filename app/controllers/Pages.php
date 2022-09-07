<?php
class Pages extends Controller{
    public function index(){
        $this->view("pages/homepage");
    }

    public function homepage(){
        $this->view("pages/homepage");
    }
}