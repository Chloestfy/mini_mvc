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

    <hr>
    <!-- modifier produit -->
    <h2>Modifier ce produit</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="page" value="productaction">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="id" value="<?= htmlspecialchars($product->id) ?>">

        <label>Nom : <input type="text" name="nom" value="<?= htmlspecialchars($product->nom) ?>" required></label><br>
        <label>Description : <textarea name="description" required><?= htmlspecialchars($product->description) ?></textarea></label><br>
        <label>Prix (€) : <input type="number" step="0.01" name="prix" value="<?= htmlspecialchars($product->prix) ?>" required></label><br>

        <button type="submit">Modifier produit</button>
    </form>

</body>

</html>