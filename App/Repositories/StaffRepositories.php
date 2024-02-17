<?php

namespace App\Repositories;

use App\Models\Staff;

class StaffRepositories extends Repositories
{
    private $_staffModel;

    public function __construct()
    {
        $this->_staffModel = new Staff();
    }

    public function createStaff($data)
    {
        if (!empty($data)) {
            $data = array_filter($data);
            unset($data['confirm_password']);
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->_staffModel->createStaff($data);
        }
    }

    public function updateStaff($data,$id){
        if(!empty($data)){
            $data =array_filter($data);
            unset($data['confirm_password']);
            if(empty($data['password'])){
                unset($data['password']);
                $this->_staffModel->updateStaff($data,$id);
                return true;
            }
            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
            $this->_staffModel->updateStaff($data,$id);
        }
    }

    public function getAllStaff()
    {
        $data = $this->_staffModel->getListStaff();
        if (!empty($data)) {
            return $data;
        }
        return false;
    }

    public function deleteStaff($id)
    {
        $this->_staffModel->deleteStaff($id);
    }

    public function getOneStaff($id)
    {
        return $this->_staffModel->getOneStaff($id);
    }

}