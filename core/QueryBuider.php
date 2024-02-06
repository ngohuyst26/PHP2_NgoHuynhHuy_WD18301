<?php
namespace Core;
trait QueryBuider{

    public $tableName = '';
    public $selectField = '*';
    public $whereField = '';
    public $operator = '';
    public $limit = '';
    public $orderBy = '';
    public $innerJoin = '';

    public function resetQuery(){
        $this->tableName = '';
        $this->selectField = '*';
        $this->whereField = '';
        $this->operator = '';
    }

    public function table($name){
        $this->tableName = $name;
        return $this;
    }

    public function field($field){
        $this->selectField = $field;
        return $this;
    }

    public function where($field, $compare, $value){
        if(empty($this->whereField)){
            $this->operator = ' WHERE ';
        }else{
            $this->operator = ' AND ';
        }
        $this->whereField .= "$this->operator $field $compare '$value'";
        return $this;
    }

    public function orwhere($field, $compare, $value){
        if(empty($this->whereField)){
            $this->operator = ' WHERE ';
        }else{
            $this->operator = ' OR ';
        }
        $this->whereField .= "$this->operator $field $compare $value";
        return $this;
    }

    public function whereLike($field, $value){
        if(empty($this->whereField)){
            $this->operator = ' WHERE ';
        }else{
            $this->operator = ' AND ';
        }
        $this->whereField .= "$this->operator $field LIKE '$value'";
        return $this;
    }

    public function limit($limit,$offset=0){
        $this->limit = "LIMIT $offset,$limit";
        return $this;
    }

    public function orderBy($field, $type='ASC'){
        $fieldArray = explode(',',$field);
        if(!empty($field) && count($fieldArray) >= 2){
            $this->orderBy = "ORDER BY ".implode(',',$fieldArray);
        }else{
            $this->orderBy = "ORDER BY $field $type";
        }
        return $this;
    }

    public function innerJoin($table, $relationship){
        $this->innerJoin .= "INNER JOIN $table ON $relationship";
        return $this;
    }

    public function select(){
        $sql ="SELECT $this->selectField FROM $this->tableName 
               $this->innerJoin $this->whereField $this->limit $this->orderBy";
        //Reset
        $this->resetQuery();
        return $this->pdo_query($sql);
    }

    public function select_one(){
        $sql ="SELECT $this->selectField FROM $this->tableName 
               $this->innerJoin $this->whereField $this->limit $this->orderBy";
        $this->resetQuery();
        return $this->pdo_query_one($sql);
    }

    public function insert($data){
        $field = '';
        $value = '';
        $mark = '';
        if(!empty($data)){
            foreach ($data as $key => $valueInsert){
                $field .= '`'.$key.'`'.',';
                $value .= $valueInsert.',';
                $mark .="?,";
            }
        }
        $mark = trim($mark,',');
        $field = trim($field,',');
        $value = trim($value,',');
        $sql  = "INSERT INTO $this->tableName ($field) VALUES ($mark)";
        $this->pdo_execute($sql,$value);
    }

    public function updateQuery(array $data=[]){
    $set = '';
    if(!empty($data)){
        foreach ($data as $key => $valueInsert){
            $set .= $key.' = '."'".$valueInsert."',";
        }
    }
    $set = trim($set,',');
    $sql = "UPDATE $this->tableName SET $set $this->whereField";
    echo $sql;
    $this->pdo_execute($sql);
    }

    public function delete($field, $compare, $value){
        $this->where($field, $compare, $value);
        $sql = "DELETE FROM $this->tableName  $this->whereField";
        $this->pdo_execute($sql);
    }

}
