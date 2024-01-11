<?php
namespace Core;

use Core\PDOException;
use PDO;

class Database
{
    private static $instance = null;
    private static $conn = null;
    private $config = [];

    public function __construct()
    {
        $this->config = [
            'host' => 'localhost',
            'user' => 'root',
            'password' => 'mysql',
            'db' => 'php2test'
        ];
        $this->pdo_get_connection($this->config);
    }

    function pdo_get_connection($config)
    {
        try {
            $conn = new PDO("mysql:host=" . $config['host'] . ";dbname=" . $config['db'], $config['user'], $config['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             echo "Connected successfully";
            self::$conn = $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}

?>