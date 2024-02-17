<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= __WEB_ROOT__ ?>public/assets/img/favicon.png" rel="icon">
    <link href="<?= __WEB_ROOT__ ?>public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <script src="<?= __WEB_ROOT__ ?>public/assets/js/jquery-3.7.1.min.js"></script>
    <link href="<?= __WEB_ROOT__ ?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ ?>public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ ?>public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ ?>public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ ?>public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ ?>public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ ?>public/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= __WEB_ROOT__ ?>public/assets/css/toastr.min.css" rel="stylesheet">
    <link href="<?= __WEB_ROOT__ ?>public/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Nov 17 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>


<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="/dang-nhap" class="logo d-flex align-items-center w-auto">
                            <img src="<?= __WEB_ROOT__ ?>public/assets/img/logo.png" alt="">
                            <span class="d-none d-lg-block">Quản Lý Dự Án Xây Dựng</span>
                        </a>
                    </div><!-- End Logo -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Nhập mã xác nhận</h5>
                                <p class="text-center small">Nhập mã để xác nhận</p>
                            </div>
                            <form class="row g-3 needs-validation" action="/post_code" method="post" novalidate>
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Mã xác nhận</label>
                                    <div class="input-group has-validation">
                                        <input type="hidden" name="email" value="<?= (!empty($email)?$email:false) ?>">
                                        <input type="text" name="code" class="form-control"
                                               value="<?= form_value('code') ?>" id="yourUsername" autofocus>
                                    </div>
                                    <?= (!empty($invalid_errors_code)?'<span style="color: red;">'.$invalid_errors_code.'</span>':false) ?>
                                    <?= form_errors('code', '<span style="color: red;">', '</span>') ?>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Mật khẩu mới</label>
                                    <input type="password" name="password" value="<?= form_value('password') ?>" class="form-control" id="yourPassword" tabindex="1" >
                                    <?= form_errors('password', '<span style="color: red;">', '</span>') ?>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" name="confirm_password" value="<?= form_value('confirm_password') ?>" class="form-control" id="yourPassword" tabindex="2">
                                    <?= form_errors('confirm_password', '<span style="color: red;">', '</span>') ?>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 mt-3" name="confirm" type="submit">Gửi xác nhận</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Bạn chưa có tài khoản? <a href="/dang-ky">Tạo tài khoản</a>
                                    </p>
                                    <p class="small mb-0">Bạn đã có tài khoản? <a href="/dang-nhap">Đăng nhập</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= __WEB_ROOT__ ?>public/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= __WEB_ROOT__ ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= __WEB_ROOT__ ?>public/assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?= __WEB_ROOT__ ?>public/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= __WEB_ROOT__ ?>public/assets/vendor/quill/quill.min.js"></script>
<script src="<?= __WEB_ROOT__ ?>public/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= __WEB_ROOT__ ?>public/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= __WEB_ROOT__ ?>public/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= __WEB_ROOT__ ?>public/assets/js/toastr.min.js"></script>
<script src="<?= __WEB_ROOT__ ?>public/assets/js/main.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "100",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "linear",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    <?= show_toast('invalid_code_valid','error','Thất bại') ?>
    <?= show_toast('invalid_code','error','Thất bại') ?>
    <?= show_toast('issendemail')?>
</script>
</body>

</html>
