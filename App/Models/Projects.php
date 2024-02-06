<?php
namespace App\Models;
use Core\Model;
use mysql_xdevapi\Exception;

class Projects extends Model {
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

    public function getList(){
//
//        $data = [
//            'name' =>'Ngo Huyy 777',
//            'phone' => '0819267055',
//            'email' =>'ngohuyst99@gmail.com',
//            'password' => '123',
//            'position_id' => '1',
//            'department' =>'kỹ sư'
//        ];
        //        $this->db->table('staff')->insert($data);
//        $this->db->table('staff')->delete('id','=', '5');
//        echo '<pre>';
//        print_r($data);
//        echo '<pre/>';
    }

    public function getDetail($data = []){
        var_dump($data);
        $data = [
            'Sản phẩm 1',
            'Sản phẩm 2',
            'Sản phẩm 3',
            'Sản phẩm 4'
        ];
        if(!empty($id)){
            return $data[$id];
        }
        return 'Sản phẩm không tồn tại';
    }

}
