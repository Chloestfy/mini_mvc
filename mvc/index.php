<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'DataBase.php';
require_once 'model/dao/UserDao.php';
require_once 'model/dao/ProductDao.php';
require_once 'controller/UserController.php';
require_once 'controller/ProductController.php';

$pdo = DataBase::getConnection();

$userDao = new UserDao($pdo);
$productDao = new ProductDao($pdo);

$users = $userDao->getAllUsers();
//var_dump($users);

$userController = new UserController($userDao);
$productController = new ProductController($productDao);

$page = $_GET['page'] ?? 'users';

switch ($page) {
    case 'users':
        $userController->displayAllUsers();
        break;

    case 'user':
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "Identifiant utilisateur invalide.";
        } else {
            $userController->displayUserProfile((int)$_GET['id']);
        }
        break;

    case 'products':
        $productController->displayProductList();
        break;

    case 'product':
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "Identifiant du produit invalide.";
        } else {
            $productController->displayProduct((int)$_GET['id']);
        }
        break;

    default:
        echo "Page non trouvée.";
        break;
}


// $page = $_GET['page'] ?? '';

// switch ($page) {
//     case 'product':
//         $controller = new ProductController();
//         $controller->showProduct();
//         break;
//     case 'products':  // <- note le "s"
//         $controller = new ProductController();
//         $controller->showProductList();
//         break;
//     case 'user':
//         echo "Utilisateur : Nom d'utilisateur.";
//         break;
//     default:
//         echo "Page non trouvée.";
//         break;
// }


//http://localhost/mini_mvc/mvc/index.php?page=products
