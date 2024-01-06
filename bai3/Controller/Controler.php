<?php
require_once DIR.'/Model/Database.php';
require_once DIR.'/Model/Staff.php';

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