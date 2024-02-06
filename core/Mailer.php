<?php

namespace Core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mailer{

    private $_mail;
    public function __construct()
    {
        $this->_mail = new PHPMailer(true);
        $this->_mail->CharSet = "UTF-8";
        $this->config();
    }
    public function config(){
//        $this->_mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->_mail->isSMTP();                                            //Send using SMTP
        $this->_mail->Host = 'sandbox.smtp.mailtrap.io';
        $this->_mail->SMTPAuth = true;
        $this->_mail->Port = 2525;
        $this->_mail->Username = '97590de016b16c';
        $this->_mail->Password = '592b7ab31ce457';                               //SMTP password
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

    public function content($subject = '',$body,$altBody = '' ){
        $this->_mail->isHTML(true);                                  //Set email format to HTML
        $this->_mail->Subject = $subject;
        $this->_mail->Body    = "$body";
        $this->_mail->AltBody = $altBody;
        return $this;
    }

    public function send(){
        try {
            $this->_mail->send();
        }catch (Exception $e){
            set_toast('insend','Gửi email thất bại');
        }
    }
}