<?php
class ArchiveModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function query_to_database($data)
    {   
     
        $files_array = [];
        foreach($data[0] as $file_data){
            foreach($file_data as $meta_data){
                array_push($files_array, $meta_data);
            }
        }
    
        $the_file = ARCHIVE_PATH . $data["category"] . "\\" .$files_array[0];
        if(!empty($data["category"])){
            if(file_exists($the_file)){
               $data["date_modified"]  = date("Y-m-d g:i:s:A", filemtime($the_file));
            }else{
                $data["date_modified"] = $data["date_uploaded"];
            }
        }

        // var_dump($data);
        // echo "<hr>";
        // var_dump($files_array);
        // var_dump($data["category"]);
        //   echo ARCHIVE_PATH . $files_array[0];
        // if(file_exists(ARCHIVE_PATH . $files_array[0])){
           
        // }
        
        $this->db->query("INSERT INTO files (file_name, file_type, file_tmp_name, file_error, file_size,  file_date_uploaded, file_date_modified, expiration_id, category_id) VALUES (:file_name, :file_type, :file_tmp_name, :file_error, :file_size,  :file_date_uploaded, :file_date_modified, :expiration_id, :category_id)");
        $this->db->bind(":file_name", $files_array[0]);
        $this->db->bind(":file_type", $files_array[1]);
        $this->db->bind(":file_tmp_name", $files_array[2]);
        $this->db->bind(":file_error", $files_array[3]);
        $this->db->bind(":file_size", $files_array[4]);
        $this->db->bind(":file_date_uploaded", $data["date_uploaded"]);
        $this->db->bind(":file_date_modified", $data["date_modified"]);
        $this->db->bind(":expiration_id", $data["expiration_id"]);
        $this->db->bind(":category_id", $data["category_id"]);
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