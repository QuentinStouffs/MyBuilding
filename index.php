<?php
spl_autoload_register(function($class) {
    if($class == "Router") {
        include "router/Router.php";
    } else if (strpos($class, "Controller")) {
        include "controllers/{$class}.php";
    } else if (strpos($class, "View")) {
        include "views/{$class}.php";
    } else if (strpos($class, "Behaviour")) {
        include "models/dao/{$class}.php";
    } else if (strpos($class, "DAO") || strpos($class, "DAO") === 0) {
        include "models/dao/{$class}.php";
    } else {
        include "models/entities/{$class}.php";
    }
});

$router = new Router($_GET, $_POST, $_SERVER['PHP_SELF'], $_SERVER['REQUEST_URI']);

$productDAO = new ProductDAO();
$productDAO->delete(0);
$productDAO->__set('deleteBehaviour', 'HardDeleteBehaviour');
$productDAO->delete(0);
$productDAO->__set('deleteBehaviour', 'SoftDeleteBehaviour');
$productDAO->delete(0);
$productDAO->save( [
                'pk' => 0,
                'name' => 'tousting',
                'price' =>12,
                'vat' => 0,
                'price_vat' => 0, 
                'price_total' => 0,
                'quantity' => 21
            ]);