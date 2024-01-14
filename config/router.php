<?php
$router['default_router'] = 'projects';

$router['dashboard'] = 'admin/dashboard/index';
$router['du-an/'] = 'projects/index';
$router['du-an/list'] = 'projects/lists';
$router['du-an/created'] = 'projects/created';
$router['du-an/update/(\d+)'] = 'projects/update/$1';

define('_ROUTE_CONFIG_',$router);
?>