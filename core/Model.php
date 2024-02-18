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
        $mark = '';
        if (!empty($data)) {
            foreach ($data as $key => $valueInsert) {
                $field .= '`' . $key . '`' . ',';
                $value .= "'".$valueInsert."',";
                $mark .= "?,";
            }
        }

        $mark = trim($mark, ',');
        $field = trim($field, ',');
        $value = trim($value, ',');
        $sql = "INSERT INTO $tableName ($field) VALUES ($mark)";
        $this->db->pdo_execute($sql, $value);
    }

    public function all(){
        $tableName = $this->tableName();
        $fieldFill = $this->fieldFill();
        if(empty($fieldFill)){
            $fieldFill = '*';
        }
        $sql = "SELECT $fieldFill FROM $tableName ORDER BY id DESC";
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

    public function update( array $data ,$field, $compare, $value){
        $tableName = $this->tableName();
        $set = '';
        $dataUpdate = '';
        if(!empty($data)){
            foreach ($data as $key => $valueInsert){
                $set .= $key.' = '."?,";
                $dataUpdate .= "'".$valueInsert."',";
            }
        }
        $set = trim($set,',');
        $dataUpdate = trim($dataUpdate,',');
        $sql = "UPDATE $tableName SET $set WHERE $field $compare '$value'";
        $this->db->pdo_execute($sql,$dataUpdate);
    }

    public function delete( string | int $value, string $field = 'id', string $compare = '='){
        $tableName = $this->tableName();
        $sql = "DELETE FROM $tableName  WHERE $field $compare $value";
        $this->db->pdo_execute($sql);
    }

}
