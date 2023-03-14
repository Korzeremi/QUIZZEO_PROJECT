<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_profile.css">
    <title>Quizzeo - Mon profil</title>
    <link rel="shortcut icon" href="/MEDIA/logo_final.png">
</head>
<body>
    <header>
        <div class="tete">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <div class="connect_btn">
                <div class="connect">
                    <a href="disconnect.php"><button class="subscribebtn" type="button" value="Se déconnecter" class="button_head">Se déconnecter</button></a>
                </div>
            </div>
        </div>
    </header>
    <div class="button">
        <a href="admin_panel.php"><button class="subscribebtn" type="button" value="Panneau d'administration" class="button_ajout">Panneau d'administration</button></a>
        <a href="admin_homepage.php"><button class="subscribebtn" type="button" value="Page d'accueil" class="button_ajout">Page d'accueil</button></a>
        <a href="admin_homepage.php"><button class="subscribebtn" type="button" value="Mon profil" class="button_ajout">Mon profil</button></a>
    </div>

    <div class="php">
        <div class="php2">
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
        </div>
    </div>

</body>
</html>