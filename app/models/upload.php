<?php

class Upload
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function upload($data)
  {
    date_default_timezone_set("Asia/Manila");
    $date = date("Y-m-d g:i:s");
    $this->db->query(
      "INSERT INTO uploads (file_name, file_type, file_tmpName, file_error, file_size, file_date) VALUES ( :fileName, :fileType, :fileTmpName, :fileError, :fileSize, :fileDate)"
    );
    $this->db->bind(":fileName", $data["name"]);
    $this->db->bind(":fileType", $data["type"]);
    $this->db->bind(":fileTmpName", $data["tmp_name"]);
    $this->db->bind(":fileError", $data["error"]);
    $this->db->bind(":fileSize", $data["size"]);
    $this->db->bind(":fileDate", $date);

    return $this->db->execute();
  }

  public function checkDuplicate($data)
  {
    $this->db->query("SELECT * FROM uploads WHERE file_name = :fileName ");
    $this->db->bind(":fileName", $data);
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function get_file_info()
  {
    $this->db->query("SELECT * FROM uploads");
    $this->db->execute();

    return $this->db->resultSet();
  }

  public function deleteFileDb($data)
  {
    $this->db->query("DELETE FROM uploads WHERE file_name = :file_name");
    $this->db->bind(":file_name", $data["file_name"]);
    return $this->db->execute();
  }
}
