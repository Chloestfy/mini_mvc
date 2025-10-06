<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
</head>

<body>
    <h1>Nos Produits :</h1>
    <nav>
        <a href="index.php?page=user">Utilisateur</a> |
        <a href="index.php?page=product">Produit</a> |
    </nav>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?= htmlspecialchars($product->getTitle(), ENT_QUOTES, 'UTF-8') ?> -
                <?= htmlspecialchars(number_format($product->getPrice(), 2, ',', ' '), ENT_QUOTES, 'UTF-8') ?> €
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>