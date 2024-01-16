<?php
$router['default_router'] = 'projects';

$router['dashboard'] = 'admin/dashboard/index';
$router['du-an/'] = 'projects/index';
$router['du-an/list'] = 'projects/lists';
$router['du-an/detail'] = 'projects/detail';
$router['du-an/created'] = 'projects/created';
$router['du-an/update/(\d+)'] = 'projects/update/$1';
$router['nhan-vien'] = 'staff/index';
$router['nhan-vien/list'] = 'staff/lists';
$router['nhan-vien/created'] = 'staff/created';
$router['nhan-vien/update'] = 'staff/update';
$router['vat-lieu'] = 'materials/index';
$router['vat-lieu/list'] = 'materials/lists';
$router['vat-lieu/created'] = 'materials/created';
$router['vat-lieu/update'] = 'materials/update';
define('_ROUTE_CONFIG_',$router);
?>