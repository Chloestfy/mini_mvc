<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
</head>

<body>
    <h1>Nos Produits :</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li><?= $product->getName() ?> - <?= $product->getPrice() ?> €</li>
        <?php endforeach; ?>
    </ul>
</body>

</html>