<?php
class Monitor extends Controller
{
    public function __construct()
    {
        $this->archive_model = $this->model("MonitorModel");
    }

    public function index()
    {
    }
}