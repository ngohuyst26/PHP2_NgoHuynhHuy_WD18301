<?php
define('__DIR_ROOT__', __DIR__);
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $web_root = 'https://'.$_SERVER['HTTP_HOST'].'/';
}else{
    $web_root = 'http://'.$_SERVER['HTTP_HOST'].'/';
}

define('__WEB_ROOT__',$web_root);


$config_dir = scandir('config');
//Tự động require các file config vào
if(!empty($config_dir)){
    foreach ($config_dir as $file_config){
        if($file_config!='.' && $file_config != '..' &&  file_exists('config/'.$file_config)){
            require_once 'config/'.$file_config;
        }
    }
}

require_once __DIR_ROOT__.'/core/Helpers.php';

//use Monolog\Logger;
//use Logtail\Monolog\LogtailHandler;
//$token = 'PuGvc5XkDNBjysb2u9fgbZSd';
//$logger = new Logger("example-app");
//$logger->pushHandler(new LogtailHandler('PuGvc5XkDNBjysb2u9fgbZSd'));



//$logger->error("Something bad happened.");
//$logger->info("Log message with structured logging.", [
//    "item" => "Orange Soda",
//    "price" => 100,
//]);

use App\App;
$app = new App();
