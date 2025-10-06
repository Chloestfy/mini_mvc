<?php
require_once __DIR__ . '/controller/Usercontroller.php';


$test = new Usercontroller();
$test->showUser();

$page = $_GET['page'] ?? 'user';

switch ($page) {
    case 'user':
        require_once __DIR__ . '/controller/Usercontroller.php';
        $controller = new Usercontroller();
        $controller->showUser();
        break;

    case 'product':
        require_once __DIR__ . '/controller/ProductController.php';
        $controller = new ProductController();
        $controller->showProduct();
        break;

    case 'products':
        require_once __DIR__ . '/controller/ProductController.php';
        $controller = new ProductController();
        $controller->showProductList();
        break;

    default:
        echo "<h1>Page non trouvée</h1>";
        break;
}
