<?php
require_once __DIR__ . '/../vendor/autoload.php';
use NaufalMumtaz\Belajar\PHPMVC\Core\Route;
use NaufalMumtaz\Belajar\PHPMVC\Controllers\HomeController;

Route::add("GET", "/", HomeController::class, "index");
Route::add("GET", "/coba", HomeController::class, "coba");

Route::run();