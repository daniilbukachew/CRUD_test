<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Europe/Moscow');
header('Content-Type: text/html; charset=utf-8');

require_once $_SERVER['DOCUMENT_ROOT'] . '/CRUD_PHP/php/model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/CRUD_PHP/php/controller.php';

if (isset($_POST['operation'])) {
    $operation = $_POST['operation'];
    CRUD_template::$operation();
}

$crud = new CRUD_model();
$data = $crud->model;
$tr = '';
foreach ($data as $key => $value) {
    $tr .= "<tr>
            <td>". $data[$key]['title'] ."</td>
            <td><button action='' data-action='read' id=". $data[$key]['id'] ." url = ". $data[$key]['url'] .">Посмотреть текст</button>
                <button data-action='delete' id=". $data[$key]['id'] .">Удалить</button>
            </td>
            </tr>";
}
$table = '<table></th>'. $tr .'</table>';

echo "
    <html>
        <head>
            <title>CRUD</title>
            <script src='js/jquery-3.6.2.min.js' type = 'text/javascript'></script>
            <script src='js/index.js' type = 'text/javascript'></script>
        </head>
        <body>
            <div><h1>Добавить запись</h1>
                <label>заголовок: <input type='text' name='title'></label>
                <label>url адрес: <input type='text' name='url'></label>
                <label>текст: <input type='textarea' name='text_field'></label>
                <button data-action='create'>Создать запись</button></div>
            <div><h1>все записи</h1>". $table ."</div>
        </body>
    </html>";


?>