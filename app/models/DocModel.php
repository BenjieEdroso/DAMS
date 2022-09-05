<?php
session_start();
class DocModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function get_this_doc($data){
        $this->db->query("SELECT * FROM files WHERE file_id = :file_id");
        $this->db->bind(":file_id",$data["file_id"]);
        $this->db->execute();
        return $this->db->fetchOne();
    }
    public function check_status($data){
        $this->db->query("SELECT status FROM requests WHERE file_id = :file_id AND user_id = :user_id");
        $this->db->bind(":file_id", $data->file_id);
        $this->db->bind(":user_id", $data->user_id);
        $this->db->execute();
        return $this->db->fetchOne();
        // $evaluate = $this->db->fetchOne() === null;
        // return $evaluate ? "open" : $this->db->fetchOne();
    }

    public function create_request($data){
        $this->db->query("INSERT INTO requests (status,file_id, user_id, date_requested) VALUES(:status,:file_id , :user_id, :date_requested)");
        $this->db->bind(":status", $data["status"]);
        $this->db->bind(":file_id", $data["file_id"]);
        $this->db->bind(":user_id", $data["user_id"]);
        $this->db->bind(":date_requested", $data["date_requested"]);
        return $this->db->execute();
    }
}