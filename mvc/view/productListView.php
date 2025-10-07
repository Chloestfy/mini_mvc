<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des produits</title>
</head>

<body>
    <h1>Liste des produits :</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?= htmlspecialchars($product->nom, ENT_QUOTES, 'UTF-8') ?> - <?= htmlspecialchars($product->prix, ENT_QUOTES, 'UTF-8') ?> €
                <a href="index.php?page=product&id=<?= urlencode($product->id) ?>">Voir la description</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>