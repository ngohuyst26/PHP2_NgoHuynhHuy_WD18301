<?php

use Core\Session;
use Core\Database;
$sessionKey = Session::isVali();
$errors = Session::flash($sessionKey . '_errors');
$value = Session::flash($sessionKey . '_value');
$db = new Database();
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

function get_template_email( array $dataEmail, $nameTemplate)
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

function status_project($status){
    switch ($status){
        case 1:
            return 'badge rounded-pill bg-warning text-dark';
        case 2:
            return 'badge rounded-pill bg-primary text-dark';
        case 3:
            return 'badge rounded-pill bg-success';
	    case 4:
		    return 'badge rounded-pill bg-danger';
	    default:
		    return 'badge rounded-pill bg-warning text-dark';
    }
}

function position($position)
{
    switch ($position){
        case 1:
            return 'Quản trị viên';
        case 2:
            return 'Nhân viên';
        case 3:
            return 'Khách hàng';
    }
}

function status_progress($status){
	switch ($status){
		case 1:
			return 'Chuẩn bị';
		case 2:
			return 'Đang thực hiện';
		case 3:
			return 'Hoàn thành';
		case 4:
			return 'Tạm hoãn';

	}
}

function check_join($user_id,$project_id){
	global $db;
	$data = $db->table('project_staff')->where('staff_id', '=',$user_id)->where('project_id','=',$project_id)->select_one();
	if (!empty($data) && $data['status'] == 1){
		return 1;
	}
	if (!empty($data) && $data['status'] == 2){
		return 2;
	}
	return false;
}


