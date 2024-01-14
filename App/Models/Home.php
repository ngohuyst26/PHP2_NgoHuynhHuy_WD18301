<?php
namespace App\Models;
class  Home{
    public function getTable(){
        $data = [
            'Item 1',
            'Item 2',
            'Item 3',
            'Item 4'
        ];
        return $data;
    }

    public function getDetail($id){
        $data = [
            'Item 1',
            'Item 2',
            'Item 3',
            'Item 4'
        ];

    }
}
