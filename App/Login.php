<?php


namespace App;
use PDO;
use PDOException;
use App\Core\Database;

class Login extends Database
{
    private $email;
    private $password;
    private static $error = [];
    public function login()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['error']);
            $fname = $_SESSION['user']['name'];
            $phone = $_SESSION['user']['phone'];
            return 'Tên: '.$fname . ' - Số điện thoại: ' . $phone . ' - <a href="/logout">Đăng Xuất<a/>';
        } else {
            return '
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <div class="row d-flex justify-content-center">
            <div class="col-5 m-3">
            <h3 class="text-center">Đăng Nhập</h3>
            <form action="/loginUser" method="post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <span style="color: red">' . (isset($_SESSION['error']['email']) ? $_SESSION['error']['email'] : false) . '</span>
              </div >
              <div class="mb-3" >
                <label for="exampleInputPassword1" class="form-label" > Password</label >
                <input type = "password" name="password" class="form-control" id = "exampleInputPassword1" >
                <span style="color: red">' . (isset($_SESSION['error']['password']) ? $_SESSION['error']['password'] : false) . '</span>
              </div>
              <button type = "submit" name="submit" class="btn btn-primary"> Submit</button >
            </form >
            </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            ';
        }
    }


    public function validate(){
        if(isset($_POST['submit'])) {
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $check = false;
            if (empty($this->email)) {
                $check = true;
            }
            if (empty($this->password)) {
                $check = true;
            }
            return $check;
        }
    }

    public function loginUser(){
        $check = $this->validate();
        if($check){
            $_SESSION['error']['email'] = 'Email không được để trống';
            $_SESSION['error']['password'] = 'Password không được để trống';
            header('location: /login');
        }else{
            $this->getUser($this->email, $this->password);
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('location: /login');
    }

    public function getUser($email, $password){
        $user =  self::pdo_query_one("SELECT * FROM `staff` WHERE email = ? ",$email);
        if(empty($user)){
            echo 'Tài khoản không tồn tại';
            return;
        }
        if($password != $user['password']){
            echo 'Thông tin đăng nhập không chính xác';
        }else{
            $_SESSION['user']['name'] = $user['name'];
            $_SESSION['user']['phone'] = $user['phone'];
            header('location: /login');
        }
    }

}