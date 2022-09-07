<?php
class AdminModel {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }

    public function get_all_request(){
        $this->db->query("SELECT id,status, files.file_name, users.firstname, users.lastname, date_requested FROM requests INNER JOIN users ON requests.user_id = users.user_id INNER JOIN files ON requests.file_id = files.file_id WHERE status = :status");
        $this->db->bind(":status", "pending");
        $this->db->execute();
        return $this->db->resultSet();
    }

    

}