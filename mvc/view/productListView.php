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
                <!-- Bouton Afficher Détail -->
                <form action="index.php" method="get" style="display:inline;">
                    <input type="hidden" name="page" value="productaction">
                    <input type="hidden" name="action" value="show">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($product->id) ?>">
                    <button type="submit">Afficher détail</button>
                </form>
                <!-- Bouton Supprimer -->
                <form action="index.php" method="post" style="display:inline;">
                    <input type="hidden" name="page" value="productaction">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($product->id) ?>">
                    <button type="submit" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <h2>Ajouter un nouveau produit</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="page" value="productaction">
        <input type="hidden" name="action" value="add">

        <label>Nom : <input type="text" name="nom" required></label><br>
        <label>Description : <textarea name="description" required></textarea></label><br>
        <label>Prix (€) : <input type="number" step="0.01" name="prix" required></label><br>
        <button type="submit">Ajouter</button>
    </form>

</body>

</html>