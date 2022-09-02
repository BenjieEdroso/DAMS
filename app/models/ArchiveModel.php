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
        return $this->db->resultSet();
    }

    public function archive($data, $i){
        $this->db->query("INSERT INTO files (file_name, file_type, file_tmp_name, file_error, file_size, file_date_uploaded, file_date_modified) 
        VALUES (:file_name, :file_type, :file_tmp_name, :file_error, :file_size, :file_date_uploaded, :file_date_modified)");
        $this->db->bind(":file_name", $data["name"][$i]);
        $this->db->bind(":file_type", $data["type"][$i]);
        $this->db->bind(":file_tmp_name", $data["tmp_name"][$i]);
        $this->db->bind(":file_error", $data["error"][$i]);
        $this->db->bind(":file_size", $data["size"][$i]);
        $this->db->bind(":file_date_uploaded", $data["date_uploaded"]);
        $this->db->bind(":file_date_modified", $data["date_modified"]);
        return $this->db->execute();
    }

    public function check_duplicate_doc($data){
        $this->db->query("SELECT * FROM files WHERE file_name = :file_name");
        $this->db->bind(":file_name", $data);
        return $this->db->rowCount();
    }

    public function get_archived(){
        $this->db->query("SELECT * FROM files");
        return $this->db->resultSet();
    }

    public function file_delete($data){
        $this->db->query("DELETE FROM files WHERE file_id = :file_id AND file_name = :file_name");
        $this->db->bind(":file_id", $data["file_id"]);
        $this->db->bind(":file_name", $data["file_name"]);
        return $this->db->execute();
    }

    public function get_file($file_id){
        $this->db->query("SELECT * FROM files WHERE file_id = :file_id");
        $this->db->bind(":file_id", $file_id);
        return $this->db->resultSet();
    }

    public function file_update($data){
        $this->db->query("UPDATE files SET file_name = :file_name WHERE file_id = :file_id");
        $this->db->bind(":file_id", $data["file_id"]);
        $this->db->bind(":file_name", $data["file_name"]);
        return $this->db->execute();
    }
}