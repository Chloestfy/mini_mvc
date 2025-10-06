<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/controller/UserController.php';


require_once __DIR__ . '/controller/ProductController.php';

$test = new UserController();
$test->showUser();
// $controller = new ProductController();
// $controller->showProductList();

$page = $_GET['page'] ?? '';

switch ($page) {
    case 'product':
        $controller = new ProductController();
        $controller->showProduct();
        break;
    case 'products':  // <- note le "s"
        $controller = new ProductController();
        $controller->showProductList();
        break;
    case 'user':
        echo "Utilisateur : Nom d'utilisateur.";
        break;
    default:
        echo "Page non trouvée.";
        break;
}

$pdo = new PDO("mysql:host=localhost;dbname=exo_mvc;", username: "root", password: "");
$quiery = "SELECT * FROM User";
$stmt = $pdo->prepare($quiery);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($data);
