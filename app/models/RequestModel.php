<?php

class RequestModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function get_requests($data){
        $this->db->query("SELECT status, files.file_name, users.user_id, requests.id from requests INNER JOIN users on requests.user_id=users.user_id INNER JOIN files on requests.file_id= files.file_id WHERE requests.user_id  = :user_id");
        $this->db->bind(":user_id", $data["user_id"]);
        $this->db->execute();

        return $this->db->resultSet();
    }

   
}