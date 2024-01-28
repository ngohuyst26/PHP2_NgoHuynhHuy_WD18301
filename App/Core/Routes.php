<?php

namespace App\Core;

class Routes {
    protected $routes;

    public function register( $requestmethod, $route, $action){
        $this->routes[$requestmethod][$route] = $action;
        return $this;
    }

    public function get($route, $action){
        return $this->register('get', $route , $action);
    }


    public function post($route, $action){
        return $this->register('post', $route, $action);
    }

    public function resolve($requesUrl,$requestmethod){
        $route = explode('?',$requesUrl)[0];
        $action = $this->routes[$requestmethod][$route] ?? null;
        if(!$action){
            echo 'Trang không tồn tại';
        }
        if(is_callable($action)){
            return call_user_func($action);
        }
        if(is_array($action)){
            [$class, $method] = $action;
            if(class_exists($class)){
                $class = new $class();
                if(method_exists($class,$method)){
                    return call_user_func_array([$class,$method],[]);
                }
            }
        }
    }
}