<?php

class AdminModel {
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function categories(){
        $this->db->query("SELECT * FROM category");
        $this->db->execute();

        return $this->db->resultSet();
    }
} 