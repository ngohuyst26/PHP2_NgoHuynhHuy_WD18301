<?php
define('__DIR_ROOT__', __DIR__);
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $web_root = 'https://'.$_SERVER['HTTP_HOST'].'/';
}else{
    $web_root = 'http://'.$_SERVER['HTTP_HOST'].'/';
}

define('__WEB_ROOT__',$web_root);
use Core\Mailer;

$email_vars = array(
    'webroot' => __WEB_ROOT__,
    'code' => 'huhsuha'
);



$config_dir = scandir('config');
//Tự động require các file config vào
if(!empty($config_dir)){
    foreach ($config_dir as $file_config){
        if($file_config!='.' && $file_config != '..' &&  file_exists('config/'.$file_config)){
            require_once 'config/'.$file_config;
        }
    }
}
require_once 'core\Helpers.php';

//$data = [
//    'code' => 'hahaha'
//];
//
//$content = get_template_email($data,'email_verypassword');
//$mail = new Mailer();
//$mail->recipients('Ngô Huy','ngohuyst77@gmail.com')->content('Test template', $content)->send();

use App\App;
$app = new App();
