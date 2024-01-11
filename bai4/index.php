<?php
require_once '../vendor/autoload.php';

use App\src\Controller\BaseController;
$controller = new BaseController();
echo '<br>';
use App\src\Model\BaseModel;
$model  = new BaseModel();
echo '<br>';
use App\src\Core\Route;
$route = new Route();


?>