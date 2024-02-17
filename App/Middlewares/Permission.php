<?php

namespace App\Middlewares;

use Core\Middleware;
use Core\Response;

class Permission extends Middleware
{
    private $_response;
    public $url;

    public function __construct()
    {
        $this->_response = new Response();
    }

    public function handel()
    {
        require_once __DIR_ROOT__ . "/App/Errors/404.php";
        exit();
    }
}