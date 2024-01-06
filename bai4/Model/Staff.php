<?php
namespace Classes\Model;

class Staff extends Database{
    var $email;

    public  function  __construct(){
        $this->pdo_get_connection();
    }

    public  function  getStaffByEmail($email){
        $sql='SELECT * FROM `staff` WHERE email = ?';

        return $this->pdo_query_one($sql,$email);
    }

    public  function  getAllStaff(){
        $sql='SELECT * FROM `staff`';

        return $this->pdo_query($sql);
    }
}
?>