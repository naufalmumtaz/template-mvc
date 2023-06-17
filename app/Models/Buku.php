<?php

use NaufalMumtaz\Belajar\PHPMVC\Core\Database;

class Buku {
  private $table = "buku";
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAllBuku() {
    $this->db->query("SELECT * FROM buku");
    $this->db->execute();
    return $this->db->getStatement()->fetchAll(PDO::FETCH_ASSOC);
  }
}

