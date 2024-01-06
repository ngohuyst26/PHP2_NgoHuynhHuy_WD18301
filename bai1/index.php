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

$list_of_courses = getCourses(); // Thật vô nghĩa
$semester = (!empty($_GET['semester'])?$_GET['semester']:'');
$courses_name = find_by_semester($semester);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PC05784 - Bài 1</title>

</head>
<body>
<?= $courses_name ?>
<form action="" method="get">
    <select name="semester" id="">
        <?php foreach ($courses as $key => $value): ?>
            <option value="<?= $key ?>"><?= $value ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Tìm</button>
</form>

</body>
</html>
