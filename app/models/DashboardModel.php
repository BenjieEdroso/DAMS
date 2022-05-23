<?php

class DashboardModel {
    
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
  

    public function get_categories(){
        $this->db->query("SELECT * FROM category");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function get_files(){
        $this->db->query("SELECT * FROM files");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function get_settings(){
        $this->db->query("SELECT * FROM expiration");
        $this->db->execute();
       return $this->db->resultSet();
    }

    public function get_expiration(){
        $this->db->query("SELECT * FROM expiration");
        $this->db->execute();
        return $this->db->resultSet();
    }
        //file_category, file_name, file_size, file_type, file_tmp_name, file_error, file_date_uploaded, file_last_modified, file_date_expire
    public function query_file_details_to_database($data){
        $this->db->query("INSERT INTO archive (file_category, file_name, file_size, file_type, file_tmp_name, file_error, file_date_uploaded, file_last_modified, file_date_expire) VALUES ( :file_category, :file_name, :file_size, :file_type, :file_tmp_name, :file_error, :file_date_uploaded, :file_last_modified, :file_date_expire)");
        $this->db->bind(":file_category", $data["file_category"]);
        $this->db->bind(":file_name", $data["file_name"]);
        $this->db->bind(":file_size", $data["file_size"]);
        $this->db->bind(":file_type", $data["file_type"]);
        $this->db->bind(":file_tmp_name", $data["file_tmp_name"]);
        $this->db->bind(":file_error", $data["file_error"]);
        $this->db->bind(":file_date_uploaded", $data["file_date_uploaded"]);
        $this->db->bind(":file_last_modified", $data["file_last_modified"]);
        $this->db->bind(":file_date_expire", $data["file_date_expire"]);
        $this->db->execute();
    }
} 