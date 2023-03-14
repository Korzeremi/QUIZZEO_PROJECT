<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user_profile.css">
    <title>MON PROFIL</title>
</head>
<body>

    <header>
        <div class="tete">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <div class="connect_btn">
                <div class="connect">
                    <a href="disconnect.php"><button class="subscribebtn">se déconnecter</button></a>
                </div>
                <!-- <div class="mode_btn">
                    <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
                    <input type="checkbox" name="theme-mode" class="checkbox">
                </div> -->
            </div>
        </div>
    </header>

        <div class="button">
            <a href="user_homepage.php"><input type="button" value="Page d'accueil" class="button_ajout"></a>
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
    </script>  -->
    
</body>
</html>