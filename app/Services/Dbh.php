<?php

namespace App\Services;
use App\Classes\Book;
use App\Classes\Dvd;
use App\Classes\Furniture;
use PDO;

class Dbh
{
    private static $host = 'localhost';
    private static $username = '';
    private static $password = '';
    private static $db_name = '';


    public static function connect()
    {
        $conn = null;

        $conn = new PDO("mysql:host=" .self::$host .";dbname=".self::$db_name.";charset=utf8", self::$username, self::$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return $conn;
    }
}