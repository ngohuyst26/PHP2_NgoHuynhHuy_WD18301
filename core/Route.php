<?php
namespace Core;
class Route {
    public function handleRoute($url){
        $router =_ROUTE_CONFIG_;
        unset($router['default_router']);
        $url = trim($url,'/');
        if(empty($url)){
            $url ='/';
        }
        $handelUrl = [
            'url' => '/',
            'key' => '/'
        ];
        if(!empty($router)){
            foreach ($router as $key => $value){
                if(preg_match('~'.$key.'~is',$url)){
                    $handelUrl['url'] = preg_replace('~'.$key.'~is',$value,$url);
                    $handelUrl['key'] = $key;
                }
            }
        }
        return $handelUrl;
    }
}