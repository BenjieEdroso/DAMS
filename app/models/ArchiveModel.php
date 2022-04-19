<?php
class ArchiveModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function archive_file_db($data)
    {
        date_default_timezone_set("Asia/Manila");
        $date = date("Y-m-d g:i:s:A");
        $this->db->query();
       
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
}