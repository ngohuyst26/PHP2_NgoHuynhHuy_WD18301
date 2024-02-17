<?php
$app['routesMiddleWare'][\App\Middlewares\AuthMiddleware::class] = [
    '/',
    'dashboard',
    'du-an',
    'du-an/list',
    'du-an/detail',
    'du-an/created',
    'du-an/update/(\d+)',
    'nhan-vien',
    'nhan-vien/list',
    'nhan-vien/created',
    'nhan-vien/update',
    'vat-lieu',
    'vat-lieu/list',
    'vat-lieu/created',
    'vat-lieu/update'
];

$app['routesMiddleWare'][\App\Middlewares\RedirectAuth::class] = [
    'dang-nhap',
    'check',
    'dang-ky',
    'post_user',
];

$app['permission'][\App\Middlewares\Permission::class] = [
    //Các url được dùng cho tất cả các role
    'default' => [
        '/',
        'dashboard',
        'dang-xuat',
        'quen-mat-khau',
        'post_forgot',
        'post_code',
        'xac-nhan'
    ],

    //Role admin
    1 => [
        'dang-xuat',
        'du-an',
        'du-an/list',
        'du-an/detail/(\d+)',
        'post_add_material',
	    'update_quantity_material/(\d+)',
	    'delete_material_project/delete/(\d+)/(\d+)',
	    'post_create_progress/(\d+)',
	    'update_progress/(\d+)',
	    'delete_progress/delete/(\d+)/(\d+)',
        'du-an/created',
        'post_project',
        'du-an/update/(\d+)',
        'update_project/(\d+)',
        'du-an/delete/(\d+)',
        'nhan-vien',
        'nhan-vien/list',
        'nhan-vien/created',
        'post_create_staff',
        'nhan-vien/delete/(\d+)',
        'nhan-vien/update/(\d+)',
        'post_update_staff/(\d+)',
        'nhan-vien/detail/(\d+)',
        'vat-lieu',
        'vat-lieu/list',
        'vat-lieu/created',
        'post_create_material',
        'vat-lieu/update/(\d+)',
        'post_update_material/(\d+)',
        'vat-lieu/delete/(\d+)'
    ],

    //Role nhân viên
    2 => [
	    'danh-sach-du-an',
	    'join_project/(\d+)',
	    'da-tham-gia',
	    'chi-tiet/(\d+)',
	    'post_create_progress/(\d+)',
    ],

    //Role khách hàng
    3 => [
        'vat-lieu/list',
    ]
];

define("__APP__", $app);
?>