<?php

namespace App\Core;
use PDO;
use PDOException;
class Database{

    function pdo_get_connection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=php2test", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }



//Hàm dùng để thêm xóa sửa
//Thêm $sql = "INSERT INTO loai(ten_loai) VALUES(?)";
//Cập nhật $sql = "UPDATE loai SET ten_loai=? WHERE ma_loai=?";
//Xóa $sql = "DELETE FROM loai WHERE ma_loai=?";
//Ví dụ $sql = "INSERT INTO users (name,email,password) VALUES(?,?,?)";
// pdo_execute($sql, "testpdo", "pdo@gmail.com", "12345pdo");
    function pdo_execute($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }



//Hàm dùng để lấy tất cả $rows = pdo_query($sql);
// $sql = "SELECT * FROM loai";
// $rows = pdo_query($sql);
    function pdo_query($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }

//Hàm dùng lấy một row có điều kiện  cách sài $row = pdo_query_one($sql, $ma_loai);
// $sql = "SELECT * FROM loai WHERE ma_loai=?";
// $row = pdo_query_one($sql, $ma_loai);
    function pdo_query_one($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }


//Hàm dùng để điếm số dòng có điều kiện
// $sql = "SELECT count(*) FROM loai WHERE ma_loai=?";
// $count = pdo_query_value($sql, $ma_loai) ;
    function pdo_query_value($sql)
    {
        $sql_args = array_slice(func_get_args(), 1);
        try {
            $conn = $this->pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }

    function alertify($message, $type)
    {

        echo "<script>
                alertify.set('notifier', 'position', 'top-right');
                alertify.$type('$message', 5);
            </script>";
    }


}