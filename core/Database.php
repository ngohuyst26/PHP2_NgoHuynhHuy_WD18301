<?php
namespace Core;
use PDO;
use PDOException;
class Database
{
    private $conn;
    //Cách gọi trait
    use QueryBuider;
    public function __construct(){
        $this->conn = Connection::getInstance();
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
        $sql_args = reset($sql_args);
        $sql_args = explode(',',$sql_args);
        try {
            $stmt = $this->conn->prepare($sql);
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
            $stmt = $this->conn->prepare($sql);
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
            $conn = $this->conn;
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
            $conn = $this->conn;
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
}
