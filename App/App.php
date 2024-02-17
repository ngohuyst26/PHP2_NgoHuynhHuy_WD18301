<?php


namespace App;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\Permission;
use App\Middlewares\RedirectAuth;
use Core\Route;
use Core\DB;
use Core\Request;
use Core\Session;

class App
{
    private $controller;
    private $action;
    private $params;
    private $route;
    private $route_config;
    private $_db;
    private $_request;
    private $_authmiddleware;

    public function __construct()
    {
        $this->route = new Route();
        $this->_authmiddleware = new AuthMiddleware();
        $this->_request = new Request();
        $this->controller = $_ENV['DEFAULT_ROUTES'];
        $this->action = 'index';
        $this->params = [];
        $this->_db = new DB();
        $this->_db = $this->_db->getDbCore();
        $this->handleUrl();

    }

    public function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }


    public function handleUrl()
    {
        $url = $this->getUrl();
        $url = $this->route->handleRoute($url);
        $this->routesMiddleWare(AuthMiddleware::class, $url['key']);
        $this->routesMiddleWare(RedirectAuth::class, $url['key']);
        $this->permission(Permission::class, $url['key']);
        $urlArray = array_filter(explode('/', $url['url']));
        $urlArray = array_values($urlArray);
        //Dùng để kiểm tra đường dẫn có file thật không mục đính là tìm file controller dụa vào đường dẫn
        $urlCheck = '';
        if (!empty($urlArray)) {
            foreach ($urlArray as $key => $value) {
                //In hoa chữ cái đầu của url và nói các phần tử của url thành một chuỗi
                $urlCheck .= ucfirst($value) . '/';
                //Loại bỏ dấu / phía sau url cần check;
                $fileCheck = rtrim($urlCheck, '/');
                //Nếu có thư mục con thì sẻ dùng để loại bỏ thư mục con trong $urlArray
                if (!empty($urlArray[$key - 1])) {
                    unset($urlArray[$key - 1]);
                }
                //Kiểm tra cái file có tồn tại hay không nếu có thì lấy cái đường dẫn file gán cho urlCheck sau đó
                // break khỏi vòng lập không cần kiểm tra nữa
                if (file_exists('App/Controllers/' . $fileCheck . '.php')) {
                    $urlCheck = $fileCheck;
                    break;
                }
            }
            $urlArray = array_values($urlArray);
        }


        //$urlArray[0] là tên của controler
        if (!empty($urlArray[0])) {
            $this->controller = ucfirst($urlArray[0]);
        } else {
            $this->controller = ucfirst($this->controller);
        }


        if (empty($urlCheck)) {
            $urlCheck = $this->controller;
        }

        //Xử lý namespace
        if (!empty($urlCheck)) {
            $name_check = preg_replace("~\/~", "\\", $urlCheck);
        } else {
            $name_check = $this->controller;
        }

        //Kiểm tra file Controller có tồn tại hay không;
        if (file_exists('App/Controllers/' . $urlCheck . '.php')) {
            //Kiểm tra Class trong file controller đó có tồn tại hay không dựa vào namespace
            if (class_exists('App\Controllers\\' . $name_check)) {
                //Gán namespace cho biến $name_check để tạo đối tượng bằng namespace
                $name_check = '\App\Controllers\\' . $name_check;
                $this->controller = new $name_check;
                $this->_request->setController($this->controller);
//                $this->controller->setDb($this->_db);
                $this->controller->active = $url['key'];
                unset($urlArray[0]);
            }
        }

        //Xử lý action
        if (!empty($urlArray[1])) {
            $this->action = $urlArray[1];
            unset($urlArray[1]);
        }
        //Xử lý params
        if (!empty($urlArray)) {
            $this->params = array_values($urlArray);
        }


        if (method_exists($this->controller, $this->action)) {
            call_user_func_array([$this->controller, $this->action], $this->params);
        } else {
            $this->loadErrors();
        }
    }

    public function getControler()
    {
        return $this->controller;
    }

    public function loadErrors($errors = '404')
    {
        require_once __DIR_ROOT__ . "/App/Errors/" . $errors . ".php";
    }

    public function routesMiddleWare($nameMiddleWare, $keyRoutes)
    {
        if (!empty(__APP__['routesMiddleWare'][$nameMiddleWare])) {
            $routesMiddleWare = __APP__['routesMiddleWare'][$nameMiddleWare];
            $nameMiddleWare = explode("\\", $nameMiddleWare);
            $nameMiddleWare = end($nameMiddleWare);
            if (file_exists(__DIR_ROOT__ . '/App/Middlewares/' . $nameMiddleWare . '.php')) {
                $nameMiddleWare = '\App\Middlewares\\' . $nameMiddleWare;
                if (class_exists($nameMiddleWare)) {
                    foreach ($routesMiddleWare as $url) {
                        if ($keyRoutes == trim($url)) {
                            $middleWare = new $nameMiddleWare;
                            $middleWare->handel();
                        }
                    }
                }
            }
        }
    }

    public function permission($nameMiddleWare, $keyRoutes)
    {
        if (Session::data('user')) {
            $role = Session::data('user')['position_id'];
            $checkDefault = false;
            if (!empty(__APP__['permission'][$nameMiddleWare]['default'])) {
                $roleDefault = __APP__['permission'][$nameMiddleWare]['default'];
                foreach ($roleDefault as $default) {
                    if ($default == $keyRoutes) {
                        $checkDefault = true;
                    }
                }
            }
            if (!empty(__APP__['permission'][$nameMiddleWare][$role])) {
                $roleMiddleWare = __APP__['permission'][$nameMiddleWare][$role];
                $nameMiddleWare = explode("\\", $nameMiddleWare);
                $nameMiddleWare = end($nameMiddleWare);
                if (file_exists(__DIR_ROOT__ . '/App/Middlewares/' . $nameMiddleWare . '.php')) {
                    $nameMiddleWare = '\App\Middlewares\\' . $nameMiddleWare;
                    if (class_exists($nameMiddleWare)) {
                        $check = false;
                        foreach ($roleMiddleWare as $url) {
                            $urlhandle = $url;
                            if ($keyRoutes == trim($url)) {
                                $check = true;
                            }
                        }
                        if (!$check && !$checkDefault) {
                            $middleWare = new $nameMiddleWare;
                            $middleWare->url = $urlhandle;
                            $middleWare->handel();
                        }
                    }
                }
            }
        }
    }


    public function globalMiddleWare($nameMiddleWare)
    {
        if (!empty(__APP__['globalMiddleWare'][$nameMiddleWare])) {
            $routesMiddleWare = __APP__['globalMiddleWare'][$nameMiddleWare];
            if (file_exists(__DIR_ROOT__ . '/App/Middlewares/' . $nameMiddleWare . '.php')) {
                $nameMiddleWare = '\App\Middlewares\\' . $nameMiddleWare;
                if (class_exists($nameMiddleWare)) {
                    $nameMiddleWare = new $nameMiddleWare;
                    $nameMiddleWare->handle();
                }
            }
        }
    }


}
