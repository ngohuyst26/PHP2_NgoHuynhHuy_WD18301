<?php
namespace App\Models;
use Core\Model;
class Staff extends Model {
    private $table = 'staff';
    private $field = 'name,phone,email,position_id,department';
    protected function tableName(){
        return $this->table;
    }
    protected function fieldFill(){
        return $this->field;
    }
    protected function findFill()
    {
        return 'name';
    }



}