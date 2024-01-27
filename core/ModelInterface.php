<?php


namespace Core;

interface ModelInterface {

    /*
     * Hàm này dùng để thêm recod vào cơ sở dữ liệu
     * */
    public function create(array $data);

    public function all();

    public function find(int $id);

    public function update(array $data=[], $field, $compare, $value);

    public function delete($field, $compare, $value);
}