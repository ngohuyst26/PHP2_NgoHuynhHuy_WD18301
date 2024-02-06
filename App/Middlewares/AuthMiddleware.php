<?php

namespace App\Middlewares;

use Core\Middleware;
use Core\Response;

class AuthMiddleware extends Middleware{
    public function handel(){
        $response = new Response();
        $authUrl['urlNoSession'] = [
            '/dang-nhap',
            '/check',
            '/dang-ky',
            '/post_user',
            '/post_forgot',
            '/quen-mat-khau',
            '/post_code',
            '/xac-nhan'
        ];
        $authUrl['urlSession'] = [
            '/dang-nhap',
            '/check',
            '/dang-ky',
            '/post_user',
        ];
        if(empty($_SESSION['user'])){
            $check = $this->checkUrl($authUrl['urlNoSession']);
            if(!$check){
                $response->redirect('dang-nhap');
            }
        }else{
            $check = $this->checkUrl($authUrl['urlSession']);
            if($check){
                $response->redirect('du-an');
            }
        }
    }

    public function checkUrl($authUrl){
        $check = false;
        foreach ($authUrl as $authUrlItem){
                if($_SERVER['PATH_INFO'] == $authUrlItem){
                    $check = true;
                }
            }
        return $check;
    }

}