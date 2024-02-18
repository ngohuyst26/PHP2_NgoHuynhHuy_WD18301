<?php

namespace Core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mailer{

    private $_mail;
    public function __construct()
    {
        set_time_limit(120);
        $this->_mail = new PHPMailer(true);
        $this->_mail->CharSet = "UTF-8";
        $this->_mail->Timeout = 1000;
        $this->_mail->isSMTP();
//        $this->configMailGoogle();
        //Send using SMTP
        $this->configMailTrap();
    }
    private function configMailTrap(){
//        $this->_mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->_mail->Host = 'sandbox.smtp.mailtrap.io';
        $this->_mail->SMTPAuth = true;
        $this->_mail->Port = 2525;
        $this->_mail->Username = '2e3e88159e615d';
        $this->_mail->Password = 'd817c60fc19e6b';
    }

    private function configMailGoogle(){
        $this->_mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
        $this->_mail->SMTPAuth = true; // Bật xác thực SMTP
        $this->_mail->Username = $_ENV['USERNAME']; // Tài khoản email
        $this->_mail->Password = $_ENV['MAILPASSWORD']; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
        $this->_mail->SMTPSecure = 'ssl'; // Mã hóa SSL
        $this->_mail->Port = 465; // Cổng kết nối SMTP là 465
    }

    public function recipients($name,$email){
        $this->_mail->setFrom('ngohuyst77@gmail.com', 'Quản lý dụ án xây dựng');
        $this->_mail->addAddress($email, $name);     //Add a recipient
        $this->_mail->addReplyTo('huynhpc05784@fpt.edu.vn', 'Quản trị viên');
        return $this;
    }

    public function attachments($urlFile){
        $this->_mail->addAttachment($urlFile);         //Add attachments
    }

    public function content(string $subject ,string $body,string $altBody = null ){
        $this->_mail->isHTML(true);                                  //Set email format to HTML
        $this->_mail->Subject = $subject;
        $this->_mail->Body    = "$body";
        $this->_mail->AltBody = $altBody;
        return $this;
    }

    public function sending(){
        try {
            $this->_mail->send();
            return true;
        }catch (Exception $e){
            set_toast('insend','Gửi email thất bại do email không tồn tại vui lòng liên hệ với admin ');
            return false;
        }
    }
}