<?php
use Classes\Model\Staff;
use Classes\Model\Database;

$staff = new Staff();

$data = $staff->getAllStaff();
if(isset($_GET['email'])){
    $email = $_GET['email'];
    $data = $staff->getStaffByEmail($email);
    $data = [
      $data
    ];

}

?>