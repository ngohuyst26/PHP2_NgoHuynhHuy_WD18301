<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Home as HomeModel;
class Home extends Controller {
    private $model;
    public $active;

    public  function __construct(){
        $this->model = new HomeModel();
    }

    public  function  index(){
        $this->render('home/index');
    }
}