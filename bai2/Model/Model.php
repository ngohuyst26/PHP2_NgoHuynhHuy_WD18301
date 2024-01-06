<?php
$courses = [
    's1' => 'Khóa học PHP 2',
    's2' => 'Khóa học JavaScript',
    's3' => 'Khóa học PHP 3',
    's4' => 'Khóa học PHP 1'
];


/**
 * Hàm này dùng để lấy tên khóa học (Vô dụng)
 * @return array
 */
function getCourses()
{
    global $courses;

    return array_values($courses);
}


/**
 * @param string $block
 * Hàm này dùng để tìm kiếm một khóa nào đó hay không sau đó trả về một chuỗi
 * @return string
 * */
function find_by_semester($semester)
{
    global $courses;

    return (array_key_exists($semester, $courses)? $courses[$semester]:"Không có môn học nào hết");
}

?>