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

    <a href="index.php?page=users">Retour à la liste des utilisateurs</a>
</body>

</html>