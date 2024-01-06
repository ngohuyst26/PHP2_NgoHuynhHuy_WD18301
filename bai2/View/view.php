<?php
require_once '../Controller/Controller.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PC05784 - Bài 2</title>
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
