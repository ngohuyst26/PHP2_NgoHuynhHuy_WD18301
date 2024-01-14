<?php
namespace Core;
class Request{

    public function getRequest(){
        return ($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(){
        if($this->getRequest() == 'GET'){
            return true;
        }
        return false;
    }

    public function isPost(){
        if($this->getRequest() == 'POST'){
            return true;
        }
        return false;
    }

    public  function getField(){
        $fieldArray = [];
        if($this->isGet()){
            if(!empty($_GET)){
                foreach ($_GET as $key => $value){
                    if(is_array($value)){
                        $fieldArray[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                    }else{
                        $fieldArray[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
                return $fieldArray;
            }
        }
        if($this->isPost()){
            if(!empty($_POST)){
                foreach ($_POST as $key => $value){
                    if(is_array($value)){
                        $fieldArray[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS,FILTER_REQUIRE_ARRAY);
                    }else{
                        $fieldArray[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
                return $fieldArray;
            }
        }
    }

}