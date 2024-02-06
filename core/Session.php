<?php

namespace Core;

class Session{

    static public function data($key='', $value=''){
        $sessionKey = self::isVali();
        if(!empty($value) && !empty($key)){
            $_SESSION[$sessionKey][$key] = $value;
            return true;
        }
        if (!empty($key)){
            if(isset($_SESSION[$sessionKey][$key])){
                return $_SESSION[$sessionKey][$key];
            }
            return false;
        }else{
            if(isset($_SESSION[$sessionKey])){
                return $_SESSION[$sessionKey];
            }
            return false;
        }
    }

    static public function flash($key = '', $value = ''){
        $dataFlash = self::data($key,$value);
        if(empty($value)){
            self::delete($key);
        }
        return $dataFlash;
    }

    static public function delete($key=''){
        $sessionKey = self::isVali();
        if(!empty($key)){
            if(isset($_SESSION[$sessionKey][$key])){
                unset($_SESSION[$sessionKey][$key]);
                return true;
            }
            return false;
        }else{
            if(isset($_SESSION[$sessionKey])){
                unset($_SESSION[$sessionKey]);
                return true;
            }
            return false;
        }
    }

    static public function isVali(){
        if(!empty(_SESSION_['session_key'])){
            return _SESSION_['session_key'];
        }else{
            echo 'Vui lòng cấu hình config/session.php';
            die();
        }
    }

}