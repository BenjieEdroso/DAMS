<?php 

class ArchiveModel{
    private $db;
    public function __construct()
    {   
        $this->db = new Database();
    }

    public function search_doc($data){
        $this->db->query("SELECT * FROM files WHERE file_name LIKE ?");
        $this->db->bind(1,  "%". $data["keyword"] . "%");
        $this->db->execute();
        return $this->db->resultSet();
    }
}