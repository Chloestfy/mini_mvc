<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Produit</title>
</head>

<body>

    <hr>

    <h1>Produit :</h1>
    <p>
        <?= htmlspecialchars($product->getTitle(), ENT_QUOTES, 'UTF-8') ?> -
        <?= htmlspecialchars(number_format($product->getPrice(), 2, ',', ' '), ENT_QUOTES, 'UTF-8') ?> €
    </p>
</body>

</html>