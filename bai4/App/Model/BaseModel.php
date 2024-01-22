<?php
namespace App\Model;
abstract class BaseModel implements BaseModelInterface {
    public function __construct()
    {
        echo 'đây là base Model </br> ';
    }
    public function all(){
        echo 'Lấy tất cả sản phẩm';
    }
    public function find($id){
        echo 'Tìm kiếm sản phẩm theo id = '.$id;
    }
    public function created($data = []){
        echo 'Tạo sản phẩm mới';
    }
    public function update($id, $data = []){
        echo 'Cập nhật tài khoảng '.$id;
    }
     public function delete($id){
        echo 'Xóa sản phẩm '. $id;
    }
}
?>