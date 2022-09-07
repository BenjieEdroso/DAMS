<?php

class Database
{

  private $host = DB_HOST;
  private $username = DB_USERNAME;
  private $password = DB_PASSWORD;
  private $dbname = DB_NAME;

  private $dbh;
  private $stmt;
  private $error;

  public function __construct()
  {
    $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;

    try {
      $this->dbh = new PDO($dsn, $this->username, $this->password);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }

  public function query($sql)
  {
    $this->stmt = $this->dbh->prepare($sql);
  }

  public function bind($params, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($params, $value, $type);
  }

  public function execute()
  {
    return $this->stmt->execute();
  }

  public function fetchOne()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function rowCount()
  {
    $this->execute();
    return $this->stmt->rowCount();
  }

  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }
}