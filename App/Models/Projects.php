<?php
namespace App\Models;
use Core\Model;
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

        $data = [
            'name' =>'Ngo Huyy',
            'phone' => '0819267055',
            'email' =>'ngohuyst99@gmail.com',
            'position_id' => '1',
            'department' =>'kỹ sư'
        ];
        var_dump($data);
//        $this->db->table('staff')->delete('id','=', '5');
//        echo '<pre>';
//        print_r($data);
//        echo '<pre/>';
    }

    public function getDetail($id){
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
