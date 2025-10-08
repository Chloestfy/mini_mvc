<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>

<body>
    <h1>Liste des utilisateurs :</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?= htmlspecialchars($user->nom, ENT_QUOTES, 'UTF-8') ?>
                <?= htmlspecialchars($user->prenom, ENT_QUOTES, 'UTF-8') ?>

                <!-- Afficher profil -->
                <form action="index.php" method="get" style="display:inline;">
                    <input type="hidden" name="page" value="useraction">
                    <input type="hidden" name="action" value="showProfile">
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <button type="submit">Afficher profil</button>
                </form>

                <!-- Supprimer utilisateur -->
                <form action="index.php" method="post" style="display:inline;">
                    <input type="hidden" name="page" value="useraction">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">Supprimer</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    <h2>Ajouter un nouvel utilisateur</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="page" value="useraction">
        <input type="hidden" name="action" value="add">

        <label>Nom : <input type="text" name="nom" required></label><br>
        <label>Prénom : <input type="text" name="prenom" required></label><br>
        <button type="submit">Ajouter</button>
    </form>
</body>

</html>