<?php
class FileModel {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function select_file($data){
        $this->db->query("SELECT * FROM uploads WHERE file_id = :file_id");
        $this->db->bind(":file_id" , $data);
        $this->db->execute();
        return $this->db->fetchOne();
    }

    public function save_changes($data){
        $this->db->query("UPDATE uploads SET file_name = :file_name WHERE file_name = :file_name_old");
        $this->db->bind(":file_name_old" , $data["file_name_old"]);
        $this->db->bind(":file_name" , $data["file_name"] . ".pdf");
        return $this->db->execute();

    }

    // public function search_string($data){
    //     $this->db->query("SELECT * FROM uploads WHERE file_name LIKE :file_name");
    //     $this->db->bind(":file_name", $data);
    //     $this->db->execute();

    //     return $this->db->resultSet();
    // }

    public function view_data(){
        $this->db->query("SELECT * FROM uploads");
        $this->db->execute();
        return $this->db->resultSet();
    }
   


}