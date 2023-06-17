<?php
namespace NaufalMumtaz\Belajar\PHPMVC\Controllers;

use NaufalMumtaz\Belajar\PHPMVC\Core\Controller;

class HomeController extends Controller {
  public function index() {
    $data = [
			'judul' => 'Daftar Buku',
      'buku' => $this->model("Buku")->getAllBuku()
		];
    $this->view("index", $data);
  }
  
  public function coba() {
    echo "a";
  }
}