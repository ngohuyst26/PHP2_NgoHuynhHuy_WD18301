<?php

namespace App\Models;

use Core\Model;

class AutUser extends Model {
    private $_table = 'staff';
    private $_field = 'name,email,code_very,password,phone,position_id,department';
    private $_find = 'email';

    protected function tableName(){
        return $this->_table;
    }
    protected function fieldFill(){
        return $this->_field;
    }
    protected function findFill()
    {
        return $this->_find;
    }

    public function setField($field){
        $this->_field = $field;
    }
    public function getOneUser($email){
       $data =  $this->find($email);
       return $data;
    }

    public function createStaff($data){
        $this->create($data);
    }

    public function CodeVery($email,$code = null){
        $data = [
            'code_very' => $code
        ];
        if(!empty($code)){
            $this->update($data,'email','=',$email);
            return true;
        }else{
            $this->update($data,'email','=',$email);
            return false;
        }
    }

    public function updatePassword($email,$code,$password){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $data = [
            'password' => $password
        ];
        $this->db->table('staff')->where('email','=',$email)->where('code_very','=',$code)->updateQuery($data);
    }

}