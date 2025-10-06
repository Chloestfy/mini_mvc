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
            <li>
                <?= htmlspecialchars($product->title, ENT_QUOTES, 'UTF-8') ?> -
                <?= htmlspecialchars(number_format($product->price, 2, ',', ' '), ENT_QUOTES, 'UTF-8') ?> €
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>