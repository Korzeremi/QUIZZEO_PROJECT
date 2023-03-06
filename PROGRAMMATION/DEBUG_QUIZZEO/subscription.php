<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
</head>
    <body>
    <a href="homepage.php"><img alt="logo"></a>
    <form action="subscription_status.php" method="post">
        <h1>INSCRIPTION</h1>
        <label>Mail :</label>
        <input type="text" name="mail" required><br>
        <label>Nom d'utilisateur :</label>
        <input type="text" name="username" required><br>
        <label>Mot de passe :</label>
        <input type="password" name="password" required><br>
        <label>Type :</label>
        <select name="type" required>
            <option name="type" value="">aucun rôle </option>
            <option name="type" value="administrator">Administrateur</option>
            <option name="type" value="user">Utilisateur</option>
            <option name="type" value="quizzer">Quizzeur</option>
        </select><br>
        <input type="submit">
    </form>

    </body>
</html>