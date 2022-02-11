<?php
class ArchiveModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}