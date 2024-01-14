<?php
namespace Core;
class Controller{
    protected $db;
//    public function Model($model){
//        if (file_exists(__DIR_ROOT__.'/App/Models/'.$model.'.php')){
//            require_once __DIR_ROOT__.'/App/Models/'.$model.'.php';
//            if(class_exists($model)){
//                $model = new $model();
//                return $model;
//            }
//        }
//        return false;
//    }
    public function setDb($db){
        $this->db =$db;
    }
    public function  render($view, $data=[]){
        extract($data);
        if(file_exists(__DIR_ROOT__.'/App/Views/'.$view.'.php')){
            require __DIR_ROOT__.'/App/Views/'.$view.'.php';
        }
    }
}
