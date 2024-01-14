<?php
namespace Core;
abstract class Model extends  Database {
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    protected abstract function tableName();
    protected abstract function fieldFill();
    protected abstract function findFill();

    public function all(){
        $tableName = $this->tableName();
        $fieldFill = $this->fieldFill();
        if(empty($fieldFill)){
            $fieldFill = '*';
        }
        $sql = "SELECT $fieldFill FROM $tableName";
        $data = $this->db->pdo_query($sql);
        return $data;
    }

    public function find($id){
        $tableName = $this->tableName();
        $fieldFill = $this->fieldFill();
        $findFill = $this->findFill();

        if(empty($fieldFill)){
            $fieldFill = '*';
        }
        if(empty($findFill)){
            $findFill = 'id';
        }
        $sql = "SELECT $fieldFill FROM $tableName WHERE $findFill = $id";
        echo $sql;
        $data = $this->db->pdo_query_one($sql);
        return $data;

    }
}
