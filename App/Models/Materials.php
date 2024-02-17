<?php

namespace App\Models;

use Core\Model;

class Materials extends Model
{
    private $table = 'materials';
    private $field = 'id, name, unit, price, supplier';

    protected function tableName()
    {
        return $this->table;
    }

    protected function fieldFill()
    {
        return $this->field;
    }

    protected function findFill()
    {
        return 'id';
    }

    public function createMaterial(array $data){
        $this->create($data);
    }

    public function updateMaterial(array $data,$id){
        $this->update($data,'id','=',$id);
    }

    public function getOneMaterial($id){
        return $this->find($id);
    }

    public function getListMaterial(){
        return $this->all();
    }

    public function deleteMaterial($id){
        $this->delete($id);
    }
}