<?php
$router['default_router'] = 'projects';

$router['dashboard'] = 'admin/dashboard/index';
$router['dang-nhap'] = 'AuthUser/login';
$router['dang-ky'] = 'AuthUser/register';
$router['post_user'] = 'AuthUser/postUser';
$router['quen-mat-khau'] = 'AuthUser/forgotPassword';
$router['xac-nhan'] = 'AuthUser/confirmCode';
$router['post_code'] = 'AuthUser/postCode';
$router['post_forgot'] = 'AuthUser/postForgot';
$router['dang-xuat'] = 'AuthUser/logout';
$router['check'] = 'AuthUser/checkUser';
$router['du-an'] = 'projects/lists';
$router['du-an/list'] = 'projects/lists';
$router['du-an/detail'] = 'projects/detail';
$router['du-an/created'] = 'projects/created';
$router['du-an/update/(\d+)'] = 'projects/update/$1';
$router['nhan-vien'] = 'staff/lists';
$router['nhan-vien/list'] = 'staff/lists';
$router['nhan-vien/created'] = 'staff/created';
$router['nhan-vien/update'] = 'staff/update';
$router['vat-lieu'] = 'materials/index';
$router['vat-lieu/list'] = 'materials/lists';
$router['vat-lieu/created'] = 'materials/created';
$router['vat-lieu/update'] = 'materials/update';

define('_ROUTE_CONFIG_',$router);
?>