<?php
//phpinfo();
//die;
require_once 'vendor/autoload.php';
session_start();
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
        ->post('/upload',[App\Home::class,'upload'])
        ->get('/login', [App\Login::class,'login'])
        ->post('/login', [App\Login::class,'login'])
        ->post('/loginUser', [App\Login::class,'loginUser'])
        ->get('/logout', [App\Login::class,'logout']);

echo $routes->resolve($_SERVER['REQUEST_URI'],strtolower($_SERVER['REQUEST_METHOD']));