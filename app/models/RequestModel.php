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

    public function get_request_count(){
        $this->db->query("SELECT * FROM request_load");
        return $this->db->resultSet();
    }
 
    public function count_request($data){
        $this->db->query("INSERT INTO request_load (user_id, request_count) VALUES (:user_id, :request_count)");
        $this->db->bind(":user_id", $data["user_id"]);
        $this->db->bind(":request_count", $data["request_count"]);
        return $this->db->execute();
    }
    public function update_request_count($data){
        $this->db->query("UPDATE request_load  SET request_count =  :request_count WHERE user_id = :user_id");
        $this->db->bind(":user_id", $data["user_id"]);
        $this->db->bind(":request_count", $data["request_count"]);
        return $this->db->execute();
    }

    

    public function approve_request($data){
        $this->db->query("UPDATE requests SET status = :status WHERE id = :id");
        $this->db->bind(":status", $data["updated_status"]);
        $this->db->bind(":id", $data["request_id"]);
        return $this->db->execute();
    }

   
}