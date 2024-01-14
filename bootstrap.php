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

use App\App;
//if(!empty($config['database'])){
//    $db_config = array_filter($config['database']);
//    if(!empty($db_config)){
//        require_once 'core/Connection.php';
//        require_once 'core/Database.php';
//    }
//}
$app = new App();

?>