<footer id="footer" class="footer" >
    <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
<script src="<?=__WEB_ROOT__?>public/assets/js/toastr.min.js"></script>
<script src="<?=__WEB_ROOT__?>public/assets/js/main.js"></script>
<script src="<?=__WEB_ROOT__?>public/assets/js/bootstrap-select.min.js"></script>

<script>

    CKEDITOR.replace( 'editor' );
    CKEDITOR.replaceAll( 'editor_update' );
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

    $(function() {
        $('.selectpicker').selectpicker();
    });

    <?= \Core\Session::flash('show_modal') ?>
    <?= \Core\Session::flash('show_modal_progress') ?>
    <?= \Core\Session::flash('show_modal_update') ?>
    <?= \Core\Session::flash('show_modal_update_progress') ?>

    <?= show_toast('isvalid_code')?>
    <?= show_toast('isvalid_login','success','Thông báo') ?>

    //Thông báo của model dự án
    <?= show_toast('invalid_create_project','error','Thất bại') ?>
    <?= show_toast('isvalid_create_project')?>
    <?= show_toast('invalid_update_project','error','Thất bại') ?>
    <?= show_toast('isvalid_update_project')?>

    // Thong báo model nhân viên
    <?= show_toast('invalid_create_staff','error','Thất bại') ?>
    <?= show_toast('isvalid_create_staff')?>
    <?= show_toast('invalid_update_staff','error','Thất bại') ?>
    <?= show_toast('isvalid_update_staff')?>
    <?= show_toast('invalid_delete_staff_error','error','Thất bại') ?>


    //Thông báo model nguyên vật liệu
    <?= show_toast('invalid_create_material','error','Thất bại') ?>
    <?= show_toast('isvalid_create_material')?>
    <?= show_toast('invalid_update_material','error','Thất bại') ?>
    <?= show_toast('isvalid_update_material')?>
    <?= show_toast('invalid_delete_material','error','Thất bại') ?>
    <?= show_toast('isvalid_delete_material')?>
</script>
</body>

</html>