<?php
require_once __DIR__ . '/controller/Usercontroller.php';
require_once __DIR__ . '/controller/ProductController.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);
$test = new Usercontroller();
$test->showUser();


echo '<nav>
    <a href="index.php?page=user">Utilisateur</a> |
    <a href="index.php?page=product">Produit</a> |
</nav><hr>';


$page = $_GET['page'] ?? 'user';

switch ($page) {
    case 'user':
        $controller = new Usercontroller();
        $controller->showUser();
        break;

    case 'product':
        $controller = new ProductController();
        $controller->showProduct();
        break;
}


$pdo = new PDO("mysql:host=localhost;dbname=exo_mvc;", username: "root", password: "");
$quiery = "SELECT * FROM User";
$stmt = $pdo->prepare($quiery);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($data);
