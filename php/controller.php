<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Europe/Moscow');
header('Content-Type: text/html; charset=utf-8');

require_once $_SERVER['DOCUMENT_ROOT'] . '/CRUD_PHP/php/DB_connect.php';

$url_request = str_replace('/CRUD_php/', '', $_SERVER['REQUEST_URI']);  
$url_array = DB::query("SELECT url FROM crud_model");
foreach ($url_array as $key => $value) {
    $urls[] = $url_array[$key]['url'];
}
if (in_array($url_request, $urls)) {
    require $_SERVER['DOCUMENT_ROOT'].'/CRUD_PHP/text_template.php';
}
else {
    require $_SERVER['DOCUMENT_ROOT'].'/CRUD_PHP/index.php';
}

class CRUD_template {
    public static function create() {
        $title = $_POST['title'];
        $url = $_POST['url'];
        $text = $_POST['text_field'];
        DB::query("INSERT INTO `crud_model` (`title`, `url`, `text_field`) VALUES ('$title', '$url', '$text')");
    }

    public static function read() {
        $request_url = isset($_POST['url']) ? $_POST['url'] : $_SERVER['REQUEST_URI']; 
        $url_request = str_replace('/CRUD_php/', '', $request_url);  
        $read = DB::query("SELECT * FROM crud_model WHERE `url` = '$url_request'");
        return $read;
    }

    public static function update() {
        $title = $_POST['title'];
        $id = $_POST['id'];
        $text = $_POST['text_field'];
        DB::query("UPDATE `crud_model` SET `title`='$title',`text_field`='$text' WHERE `id` = $id");
    }

    public static function delete() {
        $id = $_POST['id'];
        DB::query("DELETE FROM crud_model WHERE id = $id");
    }
}



?>