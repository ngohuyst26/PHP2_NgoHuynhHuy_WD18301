<?php
//require_once 'Database.php';
spl_autoload_register(function ($class){
    include $class.'.php';
});

use Core\Database as conn;
//
$db = new conn();
echo '<br>';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    HOME PAGE
</body>
</html>