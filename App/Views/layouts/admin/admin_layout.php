<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?=__WEB_ROOT__?>public/assets/img/favicon.png" rel="icon">
    <link href="<?=__WEB_ROOT__?>public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?=__WEB_ROOT__?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=__WEB_ROOT__?>public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?=__WEB_ROOT__?>public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?=__WEB_ROOT__?>public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?=__WEB_ROOT__?>public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?=__WEB_ROOT__?>public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?=__WEB_ROOT__?>public/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?=__WEB_ROOT__?>public/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Nov 17 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
<?php $this->render('blocks/header'); ?>
<?php $this->render('blocks/siderbar', $active); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Pages</li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <?php $this->render($content, $data); ?>
</main><!-- End #main -->

<?php $this->render('blocks/footer'); ?>

<!-- Vendor JS Files -->
<script src="<?=__WEB_ROOT__?>public/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?=__WEB_ROOT__?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=__WEB_ROOT__?>public/assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?=__WEB_ROOT__?>public/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?=__WEB_ROOT__?>public/assets/vendor/quill/quill.min.js"></script>
<script src="<?=__WEB_ROOT__?>public/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?=__WEB_ROOT__?>public/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?=__WEB_ROOT__?>public/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?=__WEB_ROOT__?>public/assets/js/main.js"></script>

</body>

</html>