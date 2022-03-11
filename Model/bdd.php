<?php
class MyDatabase {
    public static $db;

    public function connect_to_db () {
        self::$db = new PDO('mysql:host=localhost;dbname=tweet_academy;charset=utf8', 'root', 'root');
        self::$db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}

$PDO = new MyDatabase();
$PDO->connect_to_db();
