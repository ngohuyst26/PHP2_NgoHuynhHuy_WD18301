<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= (!empty($title)?$title:'Trang chủ') ?></title>
    <link rel="stylesheet" href="<?=__WEB_ROOT__?>public/assets/client/css/style.css">
</head>
<body>
<?php $this->render('blocks/header'); ?>

<div>
<!--
 Biến $conten chứa đường dẫn của file view cần render ra và mảng $data chứa dữ liều (truyền vào
 hàm render() để để extract($data) biến các key trong mảng $data thành biến) cần truyền vào view
 -->
    <?php $this->render($content, $data); ?>
</div>

<?php $this->render('blocks/footer'); ?>
</body>
</html>