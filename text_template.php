<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Europe/Moscow');
header('Content-Type: text/html; charset=utf-8');

require_once $_SERVER['DOCUMENT_ROOT'] . '/CRUD_PHP/php/model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CRUD_PHP/php/controller.php';

$read = CRUD_template::read($url_request)[0];

echo "<html>
        <head>
            <title>CRUD</title>
            <script src='js/jquery-3.6.2.min.js' type = 'text/javascript'></script>
            <script src='js/index.js' type = 'text/javascript'></script>
        </head>
        <body>
            <div><h1 contenteditable=true id='template'>". $read['title'] ."</h1>
                <div contenteditable=true id='template'>". $read['text_field'] ."</div>
                <button data-action='update' id=". $read['id'] .">Редактировать</button>
            <div>
        </body>
        <button data-action='return'>на главную страницу</button>
    </html>";


?>