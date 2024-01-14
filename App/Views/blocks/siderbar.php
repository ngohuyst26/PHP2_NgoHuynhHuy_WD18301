<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
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
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Thêm Nhân Viên</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="bi bi-circle"></i><span>Danh Sách Nhân Viên</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Nguyên Vật Liệu</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tables-general.html">
                        <i class="bi bi-circle"></i><span>Thêm Nguyên Vật Liệu</span>
                    </a>
                </li>
                <li>
                    <a href="tables-general.html">
                        <i class="bi bi-circle"></i><span>Danh Sách Nguyên Vật Liệu</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Liên Hệ</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="charts-chartjs.html">
                        <i class="bi bi-circle"></i><span>Tạo Liên Hệ</span>
                    </a>
                </li>
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="bi bi-circle"></i><span>Danh Sách Liên Hệ</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Charts Nav -->

    </ul>

</aside><!-- End Sidebar-->
