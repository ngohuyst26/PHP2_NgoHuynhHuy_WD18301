<?php
require_once 'vendor/autoload.php';

use App\Core\Routes;

define('_DIR_ROOT_',__DIR__);


$routes = new Routes();

//$routes->register('/',
//    function () {
//        echo 'home';
//    }
//);

//$routes->register('/',[App\Home::class, 'index'])
//        ->register('/invoices',[App\Invoices::class, 'index'])
//        ->register('/invoices/create',[App\Invoices::class, 'create']);

$routes->get('/',[App\Home::class, 'index'])
        ->post('/upload',[App\Home::class,'upload']);

$routes->resolve($_SERVER['REQUEST_URI'],strtolower($_SERVER['REQUEST_METHOD']));