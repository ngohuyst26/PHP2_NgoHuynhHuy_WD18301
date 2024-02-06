<?php

use Core\Session;

$sessionKey = Session::isVali();
$errors = Session::flash($sessionKey . '_errors');
$value = Session::flash($sessionKey . '_value');

function form_errors($fieldName, $before = '', $after = '')
{
    global $errors;
    if (!empty($fieldName)) {
        if (isset($errors[$fieldName])) {
            return $before . $errors[$fieldName] . $after;
        }
        return false;
    }
}

function form_value($fieldName, $default = '')
{
    global $value;
    if (!empty($fieldName)) {
        if (isset($value[$fieldName])) {
            return $value[$fieldName];
        }
        return $default;
    }
}

function show_toast($nameToast, $type = 'success', $title = 'Thành công')
{
    if (!empty($nameToast)) {
        $name = Session::flash($nameToast);
        if (!empty($name)) {
            return "toastr.$type('" . $name . "','$title')";
        }
        return false;
    }
}

function get_template_email($dataEmail = [], $nameTemplate)
{
    if (!empty($dataEmail)) {
        if (file_exists(__DIR_ROOT__ . '/App/Views/emailtemp/' . $nameTemplate . '.php')) {
            $content = file_get_contents(__DIR_ROOT__ . '/App/Views/emailtemp/' . $nameTemplate . '.php');
            $content = str_replace('{WEBROOT}', __WEB_ROOT__, $content);
            foreach ($dataEmail as $k => $v) {
                $content = str_replace('{' . strtoupper($k) . '}', $v, $content);
            }
            return $content;
        }
        return false;
    }
}




function set_toast($nameToast, $msg = '')
{
    if (!empty($nameToast)) {
        Session::flash($nameToast, $msg);
    }
}