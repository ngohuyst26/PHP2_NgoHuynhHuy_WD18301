<?php
namespace Core;
use PDO;
class Connection{
    private static $instance = null ;
    private static $conn = null;
    private function __construct($config)
    {
        $this->pdo_get_connection($config);
    }

    function pdo_get_connection($config){
        try {
            $conn = new PDO("mysql:host=".$config['host'].";dbname=".$config['db'], $config['user'], $config['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            self::$conn = $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance($config)
    {
        if (self::$instance == null)
        {
            new Connection($config);
            self::$instance = self::$conn;
        }
        return self::$instance;
    }
}