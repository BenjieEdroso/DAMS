<?php
class Control extends Controller
{
    public function __construct()
    {
        $this->archive_model = $this->model("ControlModel");
    }

    public function index()
    {
    }
}