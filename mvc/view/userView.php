<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Utilisateur</title>
</head>

<body>
    <h1>Utilisateur : <?= htmlspecialchars($user->name, ENT_QUOTES, 'UTF-8') ?></h1>
</body>

</html>