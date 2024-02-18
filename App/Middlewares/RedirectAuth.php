<?php

namespace App\Middlewares;

use Core\Middleware;
use Core\Response;
use Core\Session;
class RedirectAuth extends Middleware
{
    private $_response;
    public function __construct()
    {
        $this->_response = new Response();
    }

    public function handel()
    {
        if(!empty(Session::data('user'))){
            $this->_response->redirect('dashboard');
        }
    }
}