<?php

namespace App\Controllers;

use App\Repositories\MaterialsRepositories;
use Core\Controller;
use Core\Request;
use Core\Response;

class Material extends Controller
{
    private $_repo;
    private $_request;
    private $_response;
    private $data = [];

    public $active;

    public function __construct()
    {
        $this->_repo = new MaterialsRepositories();
        $this->_request = new Request();
        $this->_response = new Response();
    }

    public function listsMaterial()
    {
        $data = $this->_repo->getAllMaterial();
        if (!empty($data)) {
            $this->data['listMaterials'] = $data;
        }
        $this->data['title'] = 'Danh sách nguyên liệu';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'materials/list';
        $this->render('layouts/admin/admin_layout', $this->data);
    }

    public function createdMaterial()
    {
        $this->data['title'] = 'Thêm nguyên vật liệu';
        $this->data['active']['url'] = $this->active;
        $this->data['content'] = 'materials/created';
        $this->render('layouts/admin/admin_layout', $this->data);
    }

    public function postCreateMaterial()
    {
        if ($this->_request->isPost()) {
            $field = $this->_request->getField();
            $this->_request->rule([
                'name' => 'required',
                'unit' => 'required',
                'price' => 'required|callback_checkPrice',
                'supplier' => 'required'
            ]);

            $this->_request->message([
                'name.required' => 'Tên không được để trống',
                'unit.required' => 'Đơn vị không được để trống',
                'price.required' => 'Giá không được để trống',
                'price.callback_checkPrice' => 'Giá phải lớn hơn 0',
                'supplier.required' => 'Nhà cung cấp không được để trống'
            ]);

            if ($this->_request->validate()) {
                set_toast('invalid_create_material', 'Không thể tạo nguyên vật liệu');
                $this->_response->redirect('vat-lieu/created');
            }

            if (!$this->_request->validate()) {
                $this->_repo->createMaterial($field);
                set_toast('isvalid_create_material', 'Tạo nguyên vật liệu thành công');
                $this->_response->redirect('vat-lieu/list');
            }
        }
        $this->_response->redirect('vat-lieu/created');
    }

    public function updateMaterial($id)
    {
        if(!empty($id)){
            $id =  reset($id);
            $data = $this->_repo->getOneMaterial($id);
            if(!empty($data)){
                $this->data['valueMaterial'] = $data;
                $this->data['title'] = 'Cập nhật thông tin nguyên vật liệu';
                $this->data['active']['url'] = $this->active;
                $this->data['content'] = 'materials/update';
                $this->render('layouts/admin/admin_layout', $this->data);
                return true;
            }
        }
        $this->_response->redirect('vat-lieu/list');
    }

    public function postUpdateMaterial($id){
        if($this->_request->isPost()){
            if(!empty($id)){
                $id = reset($id);
                $field = $this->_request->getField();
                $this->_request->rule([
                    'name' => 'required',
                    'unit' => 'required',
                    'price' => 'required|callback_checkPrice',
                    'supplier' => 'required'
                ]);

                $this->_request->message([
                    'name.required' => 'Tên không được để trống',
                    'unit.required' => 'Đơn vị không được để trống',
                    'price.required' => 'Giá không được để trống',
                    'price.callback_checkPrice' => 'Giá phải lớn hơn 0',
                    'supplier.required' => 'Nhà cung cấp không được để trống'
                ]);

                if ($this->_request->validate()) {
                    set_toast('invalid_update_material', 'Không thể cập nhật nguyên vật liệu');
                    $this->_response->redirect("vat-lieu/update/$id");
                }

                if (!$this->_request->validate()) {
                    $this->_repo->updateMaterial($field,$id);
                    set_toast('isvalid_update_material', 'Cập nhật nguyên vật liệu thành công');
                    $this->_response->redirect('vat-lieu/list');
                }
            }
        }
        $this->_response->redirect('vat-lieu/list');
    }

    public function deleteMaterial($id){
        if(!empty($id)){
            $id = reset($id);
            $this->_repo->deleteMaterial($id);
            set_toast('isvalid_delete_material','Xóa thành công');
            $this->_response->redirect('vat-lieu/list');
        }
        set_toast('invalid_delete_material','Xóa thất bại');
        $this->_response->redirect('vat-lieu/list');
    }

    function checkPrice($price)
    {
        if ($price <= 0) {
            return true;
        }
        return false;
    }
}