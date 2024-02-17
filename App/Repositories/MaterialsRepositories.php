<?php

namespace App\Repositories;

use App\Models\Materials;

class MaterialsRepositories extends Repositories
{
    private $_model;

    public function __construct()
    {
        $this->_model = new Materials();
    }

    public function createMaterial($data)
    {
        if (!empty($data)) {
            $data = array_filter($data);
            $this->_model->createMaterial($data);
        }
    }

    public function updateMaterial($data,$id){
        if(!empty($data)){
            $data =array_filter($data);
            $this->_model->updateMaterial($data,$id);
        }
    }

    public function getAllMaterial()
    {
        $data = $this->_model->getListMaterial();
        if (!empty($data)) {
            return $data;
        }
        return false;
    }

    public function deleteMaterial($id)
    {
        $this->_model->deleteMaterial($id);
    }

    public function getOneMaterial($id)
    {
        return $this->_model->getOneMaterial($id);
    }
}