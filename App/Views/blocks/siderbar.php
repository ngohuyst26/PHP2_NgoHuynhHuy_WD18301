<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <?php if (!empty(\Core\Session::data('user')['position_id']) && \Core\Session::data('user')['position_id'] == 1): ?>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Dự Án</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse <?= ((($url == 'du-an/created') || ($url == 'du-an/list') )?'show':'') ?> " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/du-an/created" class="<?= (($url == 'du-an/created')?'active':'') ?>">
                        <i class="bi bi-circle"></i><span>Tạo Dự Án</span>
                    </a>
                </li>
                <li>
                    <a href="/du-an/list" class="<?= (($url == 'du-an/list')?'active':'') ?>">
                        <i class="bi bi-circle"></i><span>Danh Sách Dự Án</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bx bx-group"></i><span>Nhân Viên</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse <?= ((($url == 'nhan-vien/created') || ($url == 'nhan-vien/list') )?'show':'') ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/nhan-vien/created" class="<?= (($url == 'nhan-vien/created')?'active':'') ?>">
                        <i class="bi bi-circle"></i><span>Thêm Nhân Viên</span>
                    </a>
                </li>
                <li>
                    <a href="/nhan-vien/list" class="<?= (($url == 'nhan-vien/list')?'active':'') ?>">
                        <i class="bi bi-circle"></i><span>Danh Sách Nhân Viên</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Nguyên Vật Liệu</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse <?= ((($url == 'vat-lieu/created') || ($url == 'vat-lieu/list') )?'show':'') ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/vat-lieu/created" class="<?= (($url == 'vat-lieu/created')?'active':'') ?>">
                        <i class="bi bi-circle"></i><span>Thêm Nguyên Vật Liệu</span>
                    </a>
                </li>
                <li>
                    <a href="/vat-lieu/list" class="<?= (($url == 'vat-lieu/list')?'active':'') ?>">
                        <i class="bi bi-circle"></i><span>Danh sách vật liệu</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->
        <?php endif; ?>

	    <?php if (!empty(\Core\Session::data('user')['position_id']) && \Core\Session::data('user')['position_id'] == 2): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Dự Án</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse <?= ((($url == 'danh-sach-du-an') || ($url == 'da-tham-gia') )?'show':'') ?> " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/danh-sach-du-an" class="<?= (($url == 'danh-sach-du-an')?'active':'') ?>">
                            <i class="bi bi-circle"></i><span>Danh sách dự án</span>
                        </a>
                    </li>
                    <li>
                        <a href="/da-tham-gia" class="<?= (($url == 'da-tham-gia')?'active':'') ?>">
                            <i class="bi bi-circle"></i><span>Dự án đã tham gia</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
        <?php endif; ?>


    </ul>

</aside><!-- End Sidebar-->
