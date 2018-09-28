<?php

class Db {

    public static function getConnection(){
        $paramPath = ROOT.'/applications/config/dbParam.php';
        $params = include($paramPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        return $db;
    }
}