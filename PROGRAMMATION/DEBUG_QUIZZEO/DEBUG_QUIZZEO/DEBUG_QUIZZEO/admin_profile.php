<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_profile.css">
    <title>MON PROFIL</title>
</head>
<body>

    <?php
        session_start();

        if($_SESSION['type'] == 'administrator'){

            echo '
            <header>
            <div class="tete">
                <div class="logo">
                    <a href="admin_homepage.php"><img src="logo.png" alt="logo"></a>
                </div>
                <div class="connect_btn">
                    <div class="connect">
                        <a href="disconnect.php"><input type="button" value="Se déconnecter" class="button_head"></a>
                    </div>
                    <div class="mode_btn">
                        <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
                        <!-- <input type="checkbox" name="theme-mode" class="checkbox"> -->
                    </div>
                </div>
            </div>
            </header>

            <div class="button">
            <a href="admin_panel.php"><input type="button" value="Panneau d administration" class="button_ajout"></a>
            <a href="admin_homepage.php"><input type="button" value="Page d accueil" class="button_ajout"></a>
            <a href="admin_profile.php"><input type="button" value="Mon profil" class="button_ajout"></a>
            </div>';

            echo "<h1>Bienvenue " . $_SESSION['username'] ."</h1>";
            echo '<div class="pic">
                    <img alt="profile_pic.png" style="width: 150px" src="MEDIA/profil_pic.png">
                  </div>';
            echo "<br>Votre adresse email est : " . $_SESSION['email'];
            echo " " . "<a href=''>Modifier mon adresse mail</a>";
            echo "<br>Votre pseudo est : " . $_SESSION['username'];
            echo " " . "<a href=''>Modifier mon nom d'utilisateur</a>";
            echo "<br>Votre mot de passe est : " . $_SESSION['password'];
            echo " " . "<a href=''>Modifier mon mot de passe</a>";
            echo "<br>Votre type de compte est : " . $_SESSION['type'];
        } else {
            Header("Location: error.html");
        }
    ?>
</body>
</html>