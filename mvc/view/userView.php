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
                <a href="index.php?page=user&id=<?= urlencode($user->id) ?>">
                    <?= htmlspecialchars($user->nom, ENT_QUOTES, 'UTF-8') ?> <?= htmlspecialchars($user->prenom, ENT_QUOTES, 'UTF-8') ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>