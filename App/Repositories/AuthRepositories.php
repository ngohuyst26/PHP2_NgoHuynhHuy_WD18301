<?php

namespace App\Repositories;

use App\Middlewares\AuthMiddleware;
use  App\Models\AutUser;
use Cassandra\Date;
use Core\Mailer;
class AuthRepositories extends Repositories
{
    private $_authModel;
    private $_mail;
    public function __construct()
    {
        $this->_mail = new Mailer();
        $this->_authModel = new AutUser();
    }

    public function checkUser($email, $password)
    {
        $user = $this->getUser($email);
        if (!empty($user)) {
            $checkPass = password_verify($password, $user['password']);
            if ($checkPass) {
                unset($user['password']);
                $_SESSION['user'] = $user;
                return true;
            }
        }
        return false;
    }

    public function register($data)
    {
        if (!empty($data)) {
            $data = array_filter($data);
            unset($data['confirm_password']);
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->_authModel->createStaff($data);
        }
    }

    public function getUser($email)
    {
        return $this->_authModel->getOneUser($email);
    }

    public function checkEmail($email)
    {
        if (!empty($email)) {
            $this->_authModel->setField('name,email,code_very');
            $check = $this->_authModel->getOneUser($email);
            if (!empty($check)) {
                return $check;
            }
            return false;
        }
        return false;
    }

    public function addCodeVery($email)
    {
        if (!empty($email)) {
            $user = $this->checkEmail($email);
            if (!empty($user)) {
                $code_very = mt_rand(100000, 999999);
                $this->_authModel->CodeVery($user['email'], $code_very);
                $data = [
                    'name' => $user['name'],
                    'code' =>$code_very
                ];
                $content = get_template_email($data,'email_verypassword');
                try {
                    $this->_mail->recipients($user['name'],$user['email'])->content('MÃ XÁC NHẬN ĐỔI MẬT KHẨU',$content)->send();
                    set_toast('issendemail','Gữi mã xác nhận thành công');
                }catch (Exception $e){
                    set_toast('insendemail','Đã có lỗi sãy ra khi gửi email');
                }
                return $user['email'];
            }
            return false;
        }
        return false;
    }

    public function checkCodeVery($email, $code, $password)
    {
        if (!empty($email)) {
            $user = $this->checkEmail($email);
            if(!empty($user)){
                $code = trim($code);
                if ($user['code_very'] == $code){
                    if(!empty($password)){
                        $this->_authModel->updatePassword($user['email'],$user['code_very'],$password);
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $date =  date('Y-m-d:-H-i-s');
                        $data = [
                          'name' =>$user['name'],
                          'date' =>$date
                        ];
                        $content = get_template_email($data,'email_confirmpassword');
                        $this->_mail->recipients($user['name'],$user['email'])->content('THÔNG BÁO ĐỔI MẬT KẨU MỚI',$content)->send();
                        return true;
                    }
                }
            }
            return false;
        }
        return false;
    }
}