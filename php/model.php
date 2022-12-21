<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// date_default_timezone_set('Europe/Moscow');
// header('Content-Type: text/html; charset=utf-8');

require_once $_SERVER['DOCUMENT_ROOT'] . '/CRUD_PHP/php/DB_connect.php';

class CRUD_model {
    public $model;

    public function __construct(){
        $this->model = DB::query("SELECT * FROM crud_model");
        return $this->model;
    }
}
?>