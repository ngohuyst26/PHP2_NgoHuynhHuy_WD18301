<?php

namespace App\Core;

class Routes {
    protected $routes;

    public function register(string $route, callable | array $action):self{
        $this->routes[$route] = $action;
        return $this;
    }

    public function resolve($requesUrl){
        $route = explode('?',$requesUrl)[0];
        $action = $this->routes[$route] ?? null;
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
                    return call_user_func_array($class,$method,[]);
                }
            }
        }
    }
}