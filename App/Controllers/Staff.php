<?php

namespace App\Controllers;

use App\Repositories\StaffRepositories;
use Core\Controller;
use App\Models\Staff as staffModel;
use Core\Request;
use Core\Response;

class Staff extends Controller
{
    private $_repo;
    private $_request;
    private $_response;
    private $data = [];
    public $active;

    public function __construct()
    {
        $this->_repo = new StaffRepositories();
        $this->_request = new Request();
        $this->_response = new Response();
    }

    public function lists()
    {
        $data = $this->_repo->getAllStaff();
        if ($data) {
            $this->data['listStaff'] = $data;
        }
        $this->data['title'] = 'Danh sách nhân viên';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'staff/list';
        $this->render('layouts/admin/admin_layout', $this->data);
    }

    public function updateStaff($id)
    {
        if (!empty($id)) {
            $id = reset($id);
            $data = $this->_repo->getOneStaff($id);
            if (!empty($data)) {
                $this->data['valueStaff'] = $data;
                $this->data['title'] = 'Cập nhật thông tin nhân viên';
                $this->data['active']['url'] = $this->active;
                $this->data['content'] = 'staff/update';
                $this->render('layouts/admin/admin_layout', $this->data);
                return true;
            }
            $this->_response->redirect('nhan-vien/list');
        }
        $this->_response->redirect('nhan-vien/list');
    }

    public function postUpdateStaff($id)
    {
        if ($this->_request->isPost() && !empty($id) ) {
            $id = reset($id);
            $check = $this->_repo->getOneStaff($id);
            $field = $this->_request->getField();
            if($check){
                $rule = [
                    'name' => 'required',
                    'phone' => 'required|phone',
                    'position_id' => 'required',
                    'email' => "required|email|max:100|unique:staff:email:id=$id",
                ];

                $message = [
                    'name.required' => 'Tên không đươc để trống',
                    'email.required' => 'Email không được để trống',
                    'email.unique' => 'Email đã được sử dụng',
                    'email.email' => 'Email không đúng định dạng',
                    'email.max' => 'Email không được lớn hơn 100 kí tự',
                    'phone.required' => 'Số điện thoại không được để trống',
                    'phone.phone' => 'Số điện thoại không đúng định dạng',
                    'position_id.required' => 'Chức vụ không được để trống',
                ];

                if(!empty($field['password'])){
                    $rulePush = [
                        'password' => 'required|password|min:8',
                        'confirm_password' => 'required|match:password',
                    ];
                    $messagePush = [
                        'password.required' => 'Mật khẩu không được để trống',
                        'password.password' => 'Mật khẩu cần có ít nhất 1 kí tự viết hoa 1 kí tự đặt biệt và 2 ký tự thường và 2 kí tự số!',
                        'password.min' => 'Mật khẩu phải dài trên 8 kí tự',
                        'confirm_password.required' => 'Mật khẩu xác nhận không được để trống',
                        'confirm_password.match' => 'Mật khẩu xác nhận không trùng khớp với mật khẩu',
                    ];
                    $rule = array_merge($rule, $rulePush);
                    $message = array_merge($message, $messagePush);
                }

                $this->_request->rule($rule);
                $this->_request->message($message);

                if ($this->_request->validate()) {
                    set_toast('invalid_update_staff', 'Cập nhật người dùng thất bại');
                    $this->_response->redirect("nhan-vien/update/$id");
                }
                if (!$this->_request->validate()) {
                    $this->_repo->updateStaff($field,$id);
                    set_toast('isvalid_update_staff', 'Cập nhật người dùng thành công');
                    $this->_response->redirect("nhan-vien/list");
                }
            }
        } else {
            $this->_response->redirect('nhan-vien/list');
        }
    }

    public function createdStaff()
    {
        $this->data['title'] = 'Thêm nhân viên';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'staff/created';
        $this->render('layouts/admin/admin_layout', $this->data);
    }

    public function postCreateStaff()
    {
        if ($this->_request->isPost()) {
            $field = $this->_request->getField();
            $this->_request->rule([
                'name' => 'required',
                'phone' => 'required|phone',
                'position_id' => 'required',
                'email' => "required|email|max:100|unique:staff:email",
                'password' => 'required|password|min:8',
                'confirm_password' => 'required|match:password',
            ]);

            $this->_request->message([
                'name.required' => 'Tên không đươc để trống',
                'email.required' => 'Email không được để trống',
                'email.unique' => 'Email đã được sử dụng',
                'email.email' => 'Email không đúng định dạng',
                'email.max' => 'Email không được lớn hơn 100 kí tự',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.phone' => 'Số điện thoại không đúng định dạng',
                'position_id.required' => 'Chức vụ không được để trống',
                'password.required' => 'Mật khẩu không được để trống',
                'password.password' => 'Mật khẩu cần có ít nhất 1 kí tự viết hoa 1 kí tự đặt biệt và 2 ký tự thường và 2 kí tự số!',
                'password.min' => 'Mật khẩu phải dài trên 8 kí tự',
                'confirm_password.required' => 'Mật khẩu xác nhận không được để trống',
                'confirm_password.match' => 'Mật khẩu xác nhận không trùng khớp với mật khẩu',
            ]);

            if ($this->_request->validate()) {
                set_toast('invalid_create_staff', 'Tạo người dùng thất bại');
                $this->_response->redirect('nhan-vien/created');
            }
            if (!$this->_request->validate()) {
                $this->_repo->createStaff($field);
                set_toast('isvalid_create_staff', 'Tạo người dùng thành công');
                $this->_response->redirect('nhan-vien/list');
            }
        } else {
            $this->_response->redirect('nhan-vien/created');
        }
    }


    public function detailStaff($id){
        $this->data['title'] = 'Chi tiết nhân viên';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'staff/detail';
        $this->render('layouts/admin/admin_layout', $this->data);
    }


    public function deleteStaff($id)
    {
        if (!empty($id)) {
            $id = reset($id);
            $this->_repo->deleteStaff($id);
        }
        $this->_response->redirect('nhan-vien/list');

    }
}