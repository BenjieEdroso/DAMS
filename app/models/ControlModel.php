<?php
class ControlModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function display_data_from_db()
    {
        $this->db->query("SELECT * FROM uploads");
        $this->db->execute();

        return $this->db->resultSet();
    }
}