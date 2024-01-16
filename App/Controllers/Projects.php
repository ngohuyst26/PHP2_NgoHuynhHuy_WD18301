<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Projects as ProjectsModel;
use Core\Request;
use Core\Response;
class  Projects extends Controller{
    private $model;
    private $data=[];
    public $active;
    public function __construct(){
        $projectModel = new ProjectsModel();
        $this->model = $projectModel;
    }

    public function index(){
        $this->lists();
        echo $this->active;

    }

    public function getProject(){
        $request = new Request();
        $data = $request->getField();
        echo '<pre>';
        print_r($data);
        echo '<pre/>';
        $repon = new Response();
        $repon->redirect('https://google.com');
    }

    public function postProject(){
        $request = new Request();
        $data = $request->getField();
        echo '<pre>';
        print_r($data);
        echo '<pre/>';
//        $this->render('projects/created');
    }

    public function lists(){
        $data = $this->model->getList();
        $this->data['data']['listProduct'] = $data;
        $this->data['title'] = 'Danh sách dự án';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'projects/list';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function detail(){
        $this->data['title'] = 'Chi tiết dự án';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'projects/detail';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function update($id = ''){
        echo $this->active;
        $data = $this->model->getDetail($id);
        $this->data['data']['productName'] = $data;
        $this->data['title'] = 'Cập nhật dự án';
        $this->data['content'] = 'projects/update';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function created(){
        $this->data['title'] = 'Tạo dự án';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'projects/created';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

}
