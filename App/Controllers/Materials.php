<?php
namespace App\Controllers;
use Core\Controller;
class Materials extends Controller {
    private $model;
    private $data=[];
    public $active;
    public function index(){
        $this->lists();
//        echo $this->active;
    }

    public function lists(){
//        $data = $this->model->getList();
//        $this->data['data']['listProduct'] = $data;
        $this->data['title'] = 'Danh sách nguyên liệu';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'materials/list';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function update(){
        $this->data['title'] = 'Cập nhật thông tin nguyên vật liệu';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'materials/update';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function created(){
        $this->data['title'] = 'Thêm nguyên vật liệu';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'materials/created';
        $this->render('layouts/admin/admin_layout',$this->data);
    }
}