<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connection.css">
    <title>CONNEXION</title>
</head>
<body>

    <header>
        <div class="tete">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <div class="mode_btn">
                <!-- <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
            <input type="checkbox" name="theme-mode" class="checkbox">
            </div> -->
        </div>
    </header>


    <form action="connection_status.php" method="post">
        <div class="filtre">
            <div class="presentation">
                <h1>CONNEXION</h1>
            </div>
            <div class="inscription">
                <div class="case">
                    <label>Nom d'utilisateur :</label>
                    <input type="text" name="username" required><br>
                    <div class="ligne"></div>
                    <label>Mot de passe :</label>
                    <input type="password" name="password" required><br>
                </div>
                <input type="submit" value="Se connecter" id="submit">
            </div>
        </div>
    </form>

    <!-- <footer>
            <div class="messagedefilant">
                <div data-text="---Site créé dans le cadre d'un projet développement web par Loris LAURENTI, Rémi KORZENIOWSKI et Théo MENANT--FERRY pour l'école Ipssi.---"><span>---Site créé dans le cadre d'un projet développement web par Loris LAURENTI, Rémi KORZENIOWSKI et Théo MENANT--FERRY pour l'école Ipssi.---</span></div>
              </div>
    </footer> -->


    <script>
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
    </script> 

</body>
</html>