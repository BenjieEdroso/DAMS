<?php
class ArchiveModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get_expiration(){
        $this->db->query("SELECT * FROM expiration");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function query_to_database($data)
    {       
            for($i=0; $i < count($data["file_name"]); $i++){
            $this->db->query("INSERT INTO files (file_category, file_name, file_type, file_tmp_name, file_error, file_size,  file_date_uploaded, file_date_modified) VALUES (:file_category, :file_name, :file_type, :file_tmp_name, :file_error, :file_size,  :file_date_uploaded, :file_date_modified )");
            $this->db->bind(":file_category", $data["file_category"]);
            $this->db->bind(":file_name", $data["file_name"][$i]);
            $this->db->bind(":file_type", $data["file_type"][$i]);
            $this->db->bind(":file_tmp_name", $data["file_tmp_name"][$i]);
            $this->db->bind(":file_error", $data["file_error"][$i]);
            $this->db->bind(":file_size", $data["file_size"][$i]);
            $this->db->bind(":file_date_uploaded", $data["file_date_uploaded"][$i]);
            $this->db->bind(":file_date_modified", $data["file_date_modified"][$i]);
            // $this->db->bind(":expiration_id", $data["expiration_id"]);
            // $this->db->bind(":category_id", $data["category_id"]);
            $this->db->execute();
            }
    }

    public function query_settings($data){
        $this->db->query("INSERT INTO settings (expiration_count, expiration, archive_path) VALUES (:expiration_count, :expiration, :archive_path)");
        $this->db->bind(":expiration_count", $data["expiration_count"]);
        $this->db->bind(":expiration", $data["expiration"]);
        $this->db->bind(":archive_path", $data["archive_path"]);
        $this->db->execute();
    }

    public function select_all_files()
    {
        $this->db->query("SELECT * FROM uploads");
        $this->db->execute();

        return $this->db->resultSet();
    }

    public function display_data_from_db()
    {
        $this->db->query("SELECT * FROM uploads");
        $this->db->execute();

        return $this->db->resultSet();
    }

    public function sort($data)
    {
        if ($data === "alpha") {
            $this->db->query("SELECT * FROM uploads ORDER BY file_name ASC;");
            $this->db->execute();
        } else if ($data === "id") {
            $this->db->query("SELECT * FROM uploads ORDER BY file_id ASC;");
            $this->db->execute();
        } else if ($data === "date") {
            $this->db->query("SELECT * FROM uploads ORDER BY file_date ASC;");
            $this->db->execute();
        }

        return $this->db->resultSet();
    }

    public function insert_category($data){
        $this->db->query("INSERT INTO category (category) VALUES (:category)");
        $this->db->bind(":category", $data["category"]);
        
        return $this->db->execute();
    }

    public function delete_category($data){
        $this->db->query("DELETE FROM category WHERE category=:category");
        $this->db->bind(":category", $data["category"]);
        
        return $this->db->execute();
    }
}