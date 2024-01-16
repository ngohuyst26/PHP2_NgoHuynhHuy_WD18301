<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Staff as staffModel;
use Core\Request;
use Core\Response;
class Staff extends  Controller {
    private $model;
    private $data=[];
    public $active;
    public function __construct(){
        $staffModel = new staffModel();
        $this->model = $staffModel;
    }

    public function index(){
        $this->lists();
        echo $this->active;
    }

    public function lists(){
//        $data = $this->model->getList();
//        $this->data['data']['listProduct'] = $data;
        $this->data['title'] = 'Danh sách nhân viên';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'staff/list';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function update($id = ''){
        $this->data['title'] = 'Cập nhật thông tin nhân viên';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'staff/update';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function created(){
        $this->data['title'] = 'Thêm nhân viên';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'staff/created';
        $this->render('layouts/admin/admin_layout',$this->data);
    }
}