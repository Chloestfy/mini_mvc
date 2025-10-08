<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détail produit</title>
</head>

<body>
    <h1><?= htmlspecialchars($product->nom, ENT_QUOTES, 'UTF-8') ?></h1>
    <p><strong>ID :</strong> <?= htmlspecialchars($product->id) ?></p>
    <p><strong>Prix :</strong> <?= htmlspecialchars($product->prix) ?> €</p>
    <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($product->description)) ?></p>
</body>

</html>