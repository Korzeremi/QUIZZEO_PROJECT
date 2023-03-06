<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MON PROFIL</title>
</head>
<body>
<navbar>
        <a href="quizzer_homepage.php"><img alt="logo"></a>
        <a href="disconnect.php"><input type="button" value="Se déconnecter"></a>
        <a href="disconnect.php"><input type="button" value="Gérer mes quizz"></a>  
        <a href="disconnect.php"><input type="button" value="Créer un quiz"></a> 
        <a href="quizzer_homepage.php"><input type="button" value="Page d'accueil"></a>
        <span class="mode_btn">
                <input type="checkbox" name="theme-mode">
                <span class="slider"></span>
        </span>
    </navbar>
    <?php
        session_start();
        echo "<h1>Bienvenue " . $_SESSION['username'] ."</h1>";
        echo "<img alt='profile_pic.png'>";
        echo "<br>Votre adresse email est : " . $_SESSION['email'];
        echo " " . "<a href=''>Modifier mon adresse mail</a>";
        echo "<br>Votre pseudo est : " . $_SESSION['username'];
        echo " " . "<a href=''>Modifier mon nom d'utilisateur</a>";
        echo "<br>Votre mot de passe est : " . $_SESSION['password'];
        echo " " . "<a href=''>Modifier mon mot de passe</a>";
        echo "<br>Votre type de compte est : " . $_SESSION['type'];
    ?>
</body>
</html>