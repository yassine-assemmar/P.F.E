<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Authentification requise</title>
</head>

<body>
    <form method="post" action="scripts/login.php">
        <p><input type="text" name="champ_identifiant" placeholder="Identifiant" required /></p>
        <p><input type="password" name="champ_motdepasse" placeholder="Mot de passe" required /></p>
        <p><input type="submit" value="S'identifier" /></p>
    </form>
</body>

</html>