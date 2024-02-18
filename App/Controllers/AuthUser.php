<?php

namespace App\Controllers;

use App\Repositories\AuthRepositories;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\Session;

class AuthUser extends Controller
{
    private $_repo;
    private $_data = [];
    private $_request;
    private $_response;
    private $_check;
    private $_name;
    private $_email;
    private $_password;
    private $_phone;
    private $_confirmPassword;

    public $active;

    public function __construct()
    {
        $this->_repo = new AuthRepositories();
        $this->_request = new Request();
        $this->_response = new Response();
    }

    public function register()
    {
        $this->render('Auth/Register', $this->_data);
    }

    public function postUser()
    {
        if ($this->_request->isPost()) {
            $field = $this->_request->getField();
            $this->_name = $field['name'];
            $this->_email = $field['email'];
            $this->_phone = $field['phone'];
            $this->_password = $field['password'];
            $this->_confirmPassword = $field['confirm_password'];
            $this->_request->rule([
                'name' => 'required',
                'email' => "required|email|max:100|unique:staff:email",
                'password' => 'required|password|min:8',
                'phone' => 'required|phone',
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
                'password.required' => 'Mật khẩu không được để trống',
                'password.password' => 'Mật khẩu cần có ít nhất 1 kí tự viết hoa 1 kí tự đặt biệt và 2 ký tự thường và 2 kí tự số!',
                'password.min' => 'Mật khẩu phải dài trên 8 kí tự',
                'confirm_password.required' => 'Mật khẩu xác nhận không được để trống',
                'confirm_password.match' => 'Mật khẩu xác nhận không trùng khớp với mật khẩu',
            ]);

            if ($this->_request->validate()) {
                set_toast('invalid_register', 'Tạo tài khoản thất bại');
                $this->_response->redirect('dang-ky');
            }
            if (!$this->_request->validate()) {
                $this->_repo->register($field);
                set_toast('isvalid_register', 'Tạo tài khoản thành công');
                $this->_response->redirect('dang-nhap');
            }
        } else {
            $this->_response->redirect('dang-ky');
        }
    }

    public function login()
    {
        $this->render('Auth/Login', $this->_data);
    }

    public function checkUser()
    {
        if ($this->_request->isPost()) {
            $field = $this->_request->getField();
            $this->_email = $field['email'];
            $this->_password = $field['password'];
            $this->_request->rule([
                'email' => "required|email|max:100",
                'password' => 'required',
                'check' => 'callbackcheck_getCheck'
            ]);

            $this->_request->message([
                'email.required' => 'Email không được để trống',
                'email.max' => 'Email không được lớn hơn 100 kí tự',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu không được để trống',
                'check.callbackcheck_getCheck' => 'Email hoặc mật khẩu không chính xác'
            ]);

            if ($this->_request->validate()) {
                Session::flash('errors', $this->_request->errors());
                set_toast('invalid_login', $this->_request->errors()['check']);
                $this->_response->redirect('dang-nhap');
            }

            if (!$this->_request->validate()) {
                set_toast('isvalid_login', 'Đăng nhập thành công');
                $this->_response->redirect('dashboard');
            }
        } else {
            $this->_response->redirect('dang-nhap');
        }
    }

    public function getCheck()
    {
        return $this->_check = $this->_repo->checkUser($this->_email, $this->_password);
    }

    public function logout()
    {
        if (!empty(Session::data('user'))) {
            Session::delete('user');
            set_toast('isvalid_logout', 'Đăng xuất thành công');
            $this->_response->redirect('dang-nhap');
        }
    }

    public function forgotPassword()
    {
        $this->render('Auth/ForgotPassword');
    }

    public function postForgot()
    {
        if ($this->_request->isPost()) {
            $field = $this->_request->getField();
            $this->_email = $field['email'];

            $this->_request->rule([
                'email' => "required|email|max:100|exist:staff:email",
            ]);

            $this->_request->message([
                'email.required' => 'Email không được để trống',
                'email.max' => 'Email không được lớn hơn 100 kí tự',
                'email.email' => 'Email không đúng định dạng',
                'email.exist' => 'Email không tồn tại trong hệ thống',
            ]);

            if ($this->_request->validate()) {
                set_toast('inforgot', 'Gửi xác nhận thất bại');
                $this->_response->redirect('quen-mat-khau');
            }

            if (!$this->_request->validate()) {
                $email = $this->_repo->addCodeVery($this->_email);
                if ($email) {
                    $this->_response->redirect("xac-nhan?email=$email");
                } else {
                    $this->_response->redirect('quen-mat-khau');
                }
            }

        } else {
            $this->_response->redirect('quen-mat-khau');
        }
    }

    public function confirmCode()
    {
        $field = $this->_request->getField();

        $this->_request->rule([
            'email' => "required|email|max:100|exist:staff:email",
        ]);

        $this->_request->message([
            'email.required' => 'Email không được để trống',
            'email.max' => 'Email không được lớn hơn 100 kí tự',
            'email.email' => 'Email không đúng định dạng',
            'email.exist' => 'Email không tồn tại trong hệ thống',
        ]);

        if ($this->_request->validate()) {
            set_toast('no_email', 'Đã sảy ra lỗi trong quá trình xác nhận');
            $this->_response->redirect('quen-mat-khau');
        }
        if (!$this->_request->validate()) {
            if (!empty($field['email'])) {
                $this->_data['invalid_errors_code'] = Session::flash('invalid_errors_code');
                $this->_data['email'] = $field['email'];
                $this->render('Auth/ConfirmCode', $this->_data);
            }
        }
    }

    public function postCode()
    {
        $field = $this->_request->getField();
        $this->_request->rule([
            'email' => "required|email|max:100|exist:staff:email",
            'code' => 'required',
            'password' => 'required|password|min:8',
            'confirm_password' => 'required|match:password'
        ]);

        $this->_request->message([
            'email.required' => 'Email không được để trống',
            'email.max' => 'Email không được lớn hơn 100 kí tự',
            'email.email' => 'Email không đúng định dạng',
            'email.exist' => 'Email không tồn tại trong hệ thống',
            'code.required' => 'Code không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.password' => 'Mật khẩu cần có ít nhất 1 kí tự viết hoa 1 kí tự đặt biệt và 2 ký tự thường và 2 kí tự số!',
            'password.min' => 'Mật khẩu phải dài trên 8 kí tự',
            'confirm_password.required' => 'Mật khẩu xác nhận không được để trống',
            'confirm_password.match' => 'Mật khẩu xác nhận không trùng khớp với mật khẩu',
        ]);

        if ($this->_request->validate()) {
            set_toast('invalid_code_valid', 'Xác nhận thất bại');
            $this->_response->redirect('xac-nhan?email=' . $field['email']);
        }

        if (!$this->_request->validate()) {
            $check = $this->_repo->checkCodeVery($field['email'], $field['code'], $field['password']);
            if (!$check) {
                Session::flash('invalid_errors_code', 'Mã xác nhận không đúng rồi!');
                set_toast('invalid_code', 'Mã xác nhận không đúng');
                $this->_response->redirect('xac-nhan?email=' . $field['email']);
            }
            set_toast('isvalid_code', 'Xác nhận thành công');
            if (Session::data('user')) {
                $this->_response->redirect('dashboard');
            }
            $this->_response->redirect('dang-nhap');

        }

    }


}