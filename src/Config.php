<?php 

    define('SITE', [
        "title" => "ChatApp",
        "lang" => "pt-br",
        "baseUrl" => "http://localhost/Projects-php/Pusher"
    ]);
    


    define('PUSHER_API_KEYS', [
        "app_id" => "967683",
        "key" => "7c66e54adcd6eb6bb536",
        "secret" => "8df130a33c34f5336a20",
        "cluster" => "us2",
        "options" => array(
            'cluster' => 'us2',
            'useTLS' => true
        )
    ]);
    
    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "localhost",
        "port" => "3306",
        "dbname" => "examples",
        "username" => "root",
        "passwd" => "",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);