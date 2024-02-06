<?php
namespace Core;
abstract class Model extends Database implements ModelInterface {

    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    protected abstract function tableName();
    protected abstract function fieldFill();
    protected abstract function findFill();

    public function create(array $data){
        $tableName = $this->tableName();
        $field = '';
        $value = '';
        if(!empty($data)){
            foreach ($data as $key => $valueInsert){
                $field .= '`'.$key.'`'.',';
                $value .= "'".$valueInsert."'".',';
            }
        }
        $field = trim($field,',');
        $value = trim($value,',');
        $sql = "INSERT INTO $tableName ($field) VALUES ($value)";
        $this->db->pdo_execute($sql);
    }

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
        $sql = "SELECT $fieldFill FROM $tableName WHERE $findFill = '$id'";
        $data = $this->db->pdo_query_one($sql);
        return $data;

    }

    public function update($data=[],$field, $compare, $value){
        $tableName = $this->tableName();
        $set = '';
        if(!empty($data)){
            foreach ($data as $key => $valueInsert){
                $set .= $key.' = '."'".$valueInsert."',";
            }
        }
        $set = trim($set,',');
        $sql = "UPDATE $tableName SET $set WHERE $field $compare '$value'";
        $this->db->pdo_execute($sql);
    }

    public function delete($field = 'id', $compare = '=', $value){
        $tableName = $this->tableName();

        $sql = "DELETE FROM $tableName  WHERE $field $compare $value";
        $this->db->pdo_execute($sql);
    }
}
