<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Projects as ProjectsModel;
use Core\Request;
use Core\Response;
class  Projects extends Controller{
    private $model;
    private $data = [];
    public $active;
    private $request;
    public function __construct(){
        $projectModel = new ProjectsModel();
        $this->model = $projectModel;
        $this->request = new Request();
    }

    public function index(){
//        $this->lists();
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
//        $this->render('projects/created');
    }

    public function lists(){
        $this->model->getList();
//        $this->data['data']['listProduct'] = $data;
        $this->data['title'] = 'Danh sách dự án';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'projects/list';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function detail($data = []){
        $this->data['title'] = 'Chi tiết dự án';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'projects/detail';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function update($id = ''){

        $this->data['active']['url'] = $this->active;
        $this->data['title'] = 'Cập nhật dự án';
        $this->data['content'] = 'projects/update';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function created(){
        if($this->request->isPost()){
            $data = $this->request->getField();
            $this->request->rule([
                'name_project' => "required|min:5|max:100|unique:projects:project_name",
                'description' => 'required',
                'address' => 'required',
                'date_start' => 'required',
                'date_start' => 'required',
                'invest' => 'required|callback_minInvest'
            ]);
            $this->request->message([
                'name_project.required' => 'Không được để trống',
                'name_project.min' => 'Không được nhỏ hơn 5 kí tự',
                'name_project.unique' => 'Tên dự án đã tồn tại',
                'name_project.max' => 'Không được lớn hơn 100 kí tự',
                'description.required' => 'Mô tả không được để trống',
                'address.required' => 'Địa chỉ không được để trống',
                'date_start.required' => 'Ngày bắt đầu không được   bỏ trống',
                'date_end.required' => 'Ngày kết thúc không được để trống',
                'invest.required' => 'Không được để trống',
                'invest.callback_minInvest' => 'Không được nhỏ hơn 1 củ'
            ]);
            if($this->request->validate()){
                $this->data['value'] = $this->request->getField();
                $this->data['errors'] = $this->request->errors();
                var_dump($this->request->errors());
            }
        }
        $this->data['title'] = 'Tạo dự án';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'projects/created';
        $this->render('layouts/admin/admin_layout',$this->data);
    }

    public function minInvest($value){
        if($value < 1000000) return true;
        return false ;
    }

}
