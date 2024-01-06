<?php
require_once '../Model/Model.php';
$list_of_courses = getCourses(); // Thật vô nghĩa
$semester = (!empty($_GET['semester'])?$_GET['semester']:'');
$courses_name = find_by_semester($semester);
?>