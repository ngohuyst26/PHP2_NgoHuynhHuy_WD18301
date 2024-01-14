<?php

namespace Core;
class DB{
    protected $db;

    public function __construct(){
        $this->db = new Database();
    }
    public function getDbCore(){
        return $this->db;
    }

}