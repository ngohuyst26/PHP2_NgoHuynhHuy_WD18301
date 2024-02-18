<?php


namespace Core;

use Exception;

class Request
{

    private $_rules = [];
    private $_message = [];
    private $_error = [];
    private $_db;
    private static $_controller;

    public function __construct()
    {
        $this->_db = new Database();
    }

    public function setController($controller)
    {
        self::$_controller = $controller;
    }

    public function getRequest()
    {
        return ($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        if ($this->getRequest() == 'GET') {
            return true;
        }
        return false;
    }

    public function isPost()
    {
        if ($this->getRequest() == 'POST') {
            return true;
        }
        return false;
    }

    public function getField()
    {
        $fieldArray = [];
        if ($this->isGet()) {
            if (!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                    if (is_array($value)) {
                        $fieldArray[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $fieldArray[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
                return $fieldArray;
            }
        }
        if ($this->isPost()) {
            if (!empty($_POST)) {
                foreach ($_POST as $key => $value) {
                    if (is_array($value)) {
                        $fieldArray[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $fieldArray[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
                return $fieldArray;
            }
        }
    }

    public function rule($rule = [])
    {
        $this->_rules = $rule;
    }

    public function message($message = [])
    {
        $this->_message = $message;
    }

    public function validate()
    {
        if (!empty($this->_rules)) {

            $dataField = $this->getField();
            $validate = false;
            foreach ($this->_rules as $nameField => $ruleItem) {
                $ruleItem = explode('|', $ruleItem);
                foreach ($ruleItem as $rules) {
                    $ruleName = null;
                    $ruleValue = null;
                    $rules = explode(':', $rules);
                    $ruleName = reset($rules);
                    if (count($rules) > 1) {
                        $ruleValue = end($rules);
                    }

                    if ($ruleName == 'required') {
                        if (empty($dataField[$nameField])) {
                            $this->getError($nameField, $ruleName);
                            $validate = true;
                        }
                    }

                    if ($ruleName == 'min') {
                        if (!empty($dataField[$nameField])) {
                            if (strlen(trim($dataField[$nameField])) < $ruleValue) {
                                $this->getError($nameField, $ruleName);
                                $validate = true;
                            }
                        }
                    }

                    if ($ruleName == 'max') {
                        if (!empty($dataField[$nameField])) {
                            if (strlen(trim($dataField[$nameField])) > $ruleValue) {
                                $this->getError($nameField, $ruleName);
                                $validate = true;
                            }
                        }
                    }

	                if ($ruleName == 'number') {
		                if (!empty($dataField[$nameField])) {
			                if (!is_int($dataField[$nameField])) {
				                $this->getError($nameField, $ruleName);
				                $validate = true;
			                }
		                }
	                }

                    if($ruleName == 'match'){
                        if(!empty($rules[1])){
                            if($dataField[$rules[1]] != $dataField[$nameField]){
                                $this->getError($nameField, $ruleName);
                                $validate = true;
                            }
                        }
                    }

                    if ($ruleName == 'email'){
                        if (!empty($dataField[$nameField])){
                            $check = preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $dataField[$nameField]);
                            if (!$check){
                                $this->getError($nameField, $ruleName);
                                $validate = true;
                            }
                        }
                    }

                    if ($ruleName == 'phone'){
                        if (!empty($dataField[$nameField])){
                            $check = preg_match ("/^(032|033|034|035|036|037|038|039|096|097|098|086|083|084|085|081|082|088|091|094|070|079|077|076|078|090|093|089|056|058|092|059|099)[0-9]{7}$/", $dataField[$nameField]);
                            if (!$check){
                                $this->getError($nameField, $ruleName);
                                $validate = true;
                            }
                        }
                    }

                    if ($ruleName == 'password'){
                        if (!empty($dataField[$nameField])){
                            $check = preg_match ("/^.*(?=.*[A-Z])(?=.*[0-9])(?=.*[a-z].*[a-z])(?=.*[@\!\$\^\&\*]).{8,}$/", $dataField[$nameField]);
                            if (!$check){
                                $this->getError($nameField, $ruleName);
                                $validate = true;
                            }
                        }
                    }

                    if ($ruleName == 'unique') {
                        $check = null;
                        if (count($rules) == 3 && !empty($dataField[$nameField])) {
                            $nameTable = $rules[1];
                            $fieldCheck = $rules[2];
                            $dataField[$nameField] = trim($dataField[$nameField]);
                            $check = $this->_db->pdo_query("SELECT $fieldCheck FROM $nameTable WHERE $fieldCheck = '$dataField[$nameField]'");
                        }
                        if (count($rules) == 4) {
                            $nameTable = $rules[1];
                            $fieldCheck = $rules[2];
                            if (!empty($rules[3]) && !empty($dataField[$nameField])) {
                                $condition = preg_match('~.+?=.+?~', $rules[3],);
                                if ($condition) {
                                    $conditionWhere = str_replace('=', '<>', $rules[3]);
                                    $dataField[$nameField] = trim($dataField[$nameField]);
                                    $check = $this->_db->pdo_query("SELECT $fieldCheck FROM $nameTable WHERE $fieldCheck = '$dataField[$nameField]' AND $conditionWhere");
                                }
                            }
                        }

                        if ($check) {
                            $this->getError($nameField, $ruleName);
                            $validate = true;
                        }
                    }


                    if ($ruleName == 'exist') {
                        $check = null;
                        if (count($rules) == 3 && !empty($dataField[$nameField])) {
                            $nameTable = $rules[1];
                            $fieldCheck = $rules[2];
                            $dataField[$nameField] = trim($dataField[$nameField]);
                            $check = $this->_db->pdo_query("SELECT $fieldCheck FROM $nameTable WHERE $fieldCheck = '$dataField[$nameField]'");
                        }
                        if (empty($check)) {
                            $this->getError($nameField, $ruleName);
                            $validate = true;
                        }
                    }


                    if (preg_match("~^callback_(.+)~is", $ruleName, $nameFunc)) {
                        $nameFunc = $nameFunc[1];
                        if (method_exists(self::$_controller, $nameFunc)) {
                            $check = self::$_controller->$nameFunc(trim($dataField[$nameField]));
                            if ($check) {
                                $this->getError($nameField, $ruleName);
                                $validate = true;
                            }
                        }
                    }

                    if (preg_match("~^callbackcheck_(.+)~is", $ruleName, $nameFunc)) {
                        $nameFunc = $nameFunc[1];
                        if (method_exists(self::$_controller, $nameFunc)) {
                            $check = self::$_controller->$nameFunc();
                            if (!$check) {
                                $this->getError($nameField, $ruleName);
                                $validate = true;
                            }
                        }
                    }
                }
            }
            $sessionKey = Session::isVali();
            Session::flash($sessionKey.'_errors', $this->errors());
            Session::flash($sessionKey.'_value',$this->getField());
            return $validate;
        }
    }


    public function errors($fieldName = '')
    {
        if (!empty($this->_error)) {
            $field = [];
            if (empty($fieldName)) {
                foreach ($this->_error as $key => $erros) {
                    $field[$key] = reset($erros);
                }
                return $field;
            }
            return reset($this->_error[$fieldName]);
        }
        return false;
    }

    public function getError($fieldName, $ruleName)
    {
        return $this->_error[$fieldName][$ruleName] = $this->_message[$fieldName . '.' . $ruleName];
    }

}