<?php
require_once 'vendor/autoload.php';

use App\Model\ProductModel;

$product = new ProductModel();

$product->find(10);
echo '</br>';
$product->all();
echo '</br>';
$product->delete(20);
echo '</br>';
$product->update(30);
echo '</br>';
$product->created();


?>