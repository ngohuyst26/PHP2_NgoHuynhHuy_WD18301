<?php
namespace App\Models;
use Core\Model;
class Staff extends Model {
    private $table = 'staff';
    private $field = 'id,name,phone,email,position_id,department';
    protected function tableName(){
        return $this->table;
    }
    protected function fieldFill(){
        return $this->field;
    }
    protected function findFill()
    {
        return 'id';
    }

    public function createStaff(array $data){
        $this->create($data);
    }

    public function updateStaff(array $data,$id){
        $this->update($data,'id','=',$id);
    }

    public function getOneStaff($id){
       return $this->find($id);
    }

    public function getListStaff(){
        return $this->all();
    }

    public function deleteStaff($id){
        $this->delete($id);
    }
}