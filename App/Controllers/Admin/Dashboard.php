<?php
namespace App\Controllers\Admin;
use Core\Controller;

class Dashboard extends Controller {
    private $data = [];
    public $active;
    public function  index(){
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'admin/dashboard';
        $this->data['title'] = 'Trang chủ';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function  detail($id){
        echo 'Trang chi tiết - '.$id;
    }


}

