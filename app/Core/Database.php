<?php
namespace NaufalMumtaz\Belajar\PHPMVC\Core;

use PDO;
use PDOException;

class Database {
  private $host;
  private $user;
  private $pass;
  private $dbname;

  private $dbh; // database handler;
  private $stmt; // statement

  public function __construct() {
    $this->host = $_ENV["DB_HOST"];
    $this->user = $_ENV["DB_USERNAME"];
    $this->pass = $_ENV["DB_PASSWORD"];
    $this->dbname = $_ENV["DB_DATABASE"];

    $dsn = "mysql:host=" . $this->host . ":3306;dbname=" . $this->dbname . "";

    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, [
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function query($query) {
    $this->stmt = $this->dbh->prepare($query);
  }

  public function bind($param, $value, $type = null) {
    if(is_null($type)) {
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

    $this->stmt->bindValue($param, $value, $type);
  }

  public function execute() {
    $this->stmt->execute();
  }

  public function getStatement() {
    return $this->stmt;
  }

  public function rowCount() {
    return $this->stmt->rowCount();
  }
}

