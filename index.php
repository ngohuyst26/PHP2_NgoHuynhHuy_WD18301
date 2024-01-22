<?php
require_once 'vendor/autoload.php';

use App\Core\Routes;

$routes = new Routes();

//$routes->register('/',
//    function () {
//        echo 'home';
//    }
//);

$routes->register('/',[App\Home::class, 'index'])
        ->register('/invoices',[App\Invoices::class, 'index'])
        ->register('/invoices/create',[App\Invoices::class, 'create']);

$routes->resolve($_SERVER['REQUEST_URI']);