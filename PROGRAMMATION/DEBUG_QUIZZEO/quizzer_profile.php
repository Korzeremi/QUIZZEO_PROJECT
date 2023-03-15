<!-- This page displays quizzer profile -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/quizzer_profile.css">
    <title>MON PROFIL</title>
</head>
<body>

    <?php
        // Call for session cookies containing important information, including the type of user
        session_start();

        // If connected visitor is quizzer, give access to profile
        if($_SESSION['type'] == 'quizzer'){

            echo '
            <header>
            <div class="tete">
                <div class="logo">
                    <a href="admin_homepage.php"><img src="MEDIA/logo.png" alt="logo"></a>
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
            <a href="quizzer_homepage.php"><input type="button" value="Page d accueil" class="button_ajout"></a>
            <a href="quizzer_profile.php"><input type="button" value="Mon profil" class="button_ajout"></a>
            </div>';

            // Displaying users informations
            echo "<h1>Bienvenue " . $_SESSION['username'] ."</h1>";
            echo '<div class="pic">
                    <img alt="profile_pic.png" style="width: 150px" src="MEDIA/profil_pic.png">
                  </div>';
            echo "<br>Votre adresse email est : " . $_SESSION['email'];
            // echo " " . "<a href=''>Modifier mon adresse mail</a>";
            echo "<br>Votre pseudo est : " . $_SESSION['username'];
            // echo " " . "<a href=''>Modifier mon nom d'utilisateur</a>";
            echo "<br>Votre mot de passe est : " . $_SESSION['password'];
            // echo " " . "<a href=''>Modifier mon mot de passe</a>";
            echo "<br>Votre type de compte est : " . $_SESSION['type'];
        } else { // Redirection if visitor is not admin
            Header("Location: error.html");
        }
    ?>

     <!-- <script>
            const html = document.getElementsByTagName("html")[0];
            const themeSwicth = document.getElementById("themeLogo");
            themeSwicth.addEventListener("click", () => {
            html.classList.toggle("nuit");
            if (html.classList.contains("nuit")) {
                themeSwicth.innerHTML = 'LIGHT'.fontsize(4);
            } else {
                themeSwicth.innerHTML = 'DARK'.fontsize(4);
            }
        });
        </script> -->
</body>
</html>