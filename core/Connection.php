<?php
namespace Core;
use PDO;
class Connection{
    private static $instance = null ;
    private static $conn = null;
    private function __construct()
    {
        $this->pdo_get_connection();
    }

    function pdo_get_connection(){
        try {
            $conn = new PDO("mysql:host=".$_ENV['HOST'].";dbname=".$_ENV['DB'], $_ENV['USER'], $_ENV['PASSWORD']);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            self::$conn = $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            new Connection();
            self::$instance = self::$conn;
        }
        return self::$instance;
    }
}