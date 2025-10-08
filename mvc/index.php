<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'DataBase.php';
require_once 'model/dao/UserDao.php';
require_once 'model/dao/ProductDao.php';
require_once 'model/User.php';
require_once 'model/Product.php';
require_once 'controller/UserController.php';
require_once 'controller/ProductController.php';

$pdo = DataBase::getConnection();

$userDao = new UserDao($pdo);
$productDao = new ProductDao($pdo);

$userController = new UserController($userDao);
$productController = new ProductController($productDao);

$request = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : $_GET;

$page = $request['page'] ?? 'users';
$action = $request['action'] ?? null;
$id = isset($request['id']) && is_numeric($request['id']) ? (int)$request['id'] : null;

switch ($page) {
    case 'users':
        $userController->displayAllUsers();
        break;

    case 'useraction':
        if ($action === 'showProfile' && $id !== null) {
            $userController->displayUserProfile($id);
        } elseif ($action === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST' && $id !== null) {
            $userController->deleteUser($id);
        } elseif ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->addUser($_POST);
        } else {
            echo "Action utilisateur inconnue ou ID manquant.";
        }
        break;

    case 'products':
        $productController->displayProductList();
        break;

    case 'productaction':
        if ($action === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST' && $id !== null) {
            $productController->deleteProduct($id);
        } elseif ($action === 'show' && $_SERVER['REQUEST_METHOD'] === 'GET' && $id !== null) {
            $productController->displayProduct($id);
        } elseif ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $productController->addProduct($_POST);
        } else {
            echo "Action produit inconnue ou ID manquant.";
        }
        break;

    default:
        echo "Page non trouvée.";
        break;
}





//http://localhost/mini_mvc/mvc/index.php?page=products
