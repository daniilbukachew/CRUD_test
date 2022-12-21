<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    class DB {
        public static $connection = array('host' => 'localhost',
                                    'user' => 'root',
                                    'password' => '',
                                    'db' => 'CRUD_test');

        public static function query($query) {
            if (stripos($query, 'DROP') !== false || stripos($query, 'TRUNCATE') !== false) {
                echo "Недопустимый запрос";
                exit;
            }
            $mysqli = new mysqli(self::$connection['host'], self::$connection['user'], self::$connection['password'], self::$connection['db']);
            $mysqli_result = $mysqli->query("$query");
            if (is_bool($mysqli_result)) {
                $result = $mysqli_result;
            } else {
                while ($row = mysqli_fetch_assoc($mysqli_result)) {
                    $result[] = $row;
                }
            }
            return $result;
        }
        public static function select($data, $table) {
        
        }
        public static function insert() {

        }
        public static function delete() {

        }
    }


?>