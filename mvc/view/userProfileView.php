<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Profil utilisateur</title>
</head>

<body>
    <h1>Profil de <?= htmlspecialchars($user->nom, ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($user->prenom, ENT_QUOTES, 'UTF-8') ?></h1>

    <p>ID : <?= htmlspecialchars($user->id) ?></p>
    <p>Nom : <?= htmlspecialchars($user->nom, ENT_QUOTES, 'UTF-8') ?></p>
    <p>Prénom : <?= htmlspecialchars($user->prenom, ENT_QUOTES, 'UTF-8') ?></p>

</body>

</html>
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
                <?= htmlspecialchars($user->nom, ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($user->prenom, ENT_QUOTES, 'UTF-8') ?>

                <!--profil -->
                <form action="index.php" method="get" style="display:inline;">
                    <input type="hidden" name="page" value="useraction">
                    <input type="hidden" name="action" value="showProfile">
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <button type="submit">Afficher profil</button>
                </form>

                <!-- Supprimer -->
                <form action="index.php" method="post" style="display:inline;">
                    <input type="hidden" name="page" value="useraction">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>