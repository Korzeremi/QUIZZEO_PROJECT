<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="login.css" media="screen" type="text/css" />
        <title>QUIZZEO CONNEXION</title>
    </head>
    <body>
        <header>
            <div class="header_box">
                <img alt="quizzeo_logo" class="quizzeo_logo" src="logo_final.png">
                <div class="nav_part">
                    <h1 class="quizzeo_title">QUIZZEO</h1>
                    <button class="dark_mode"></button>
                    <script>
                        //mettre script dark_mode
                    </script>
                </div>
            </div>
        </header>
        <div id="container">
        <form action="account.php" method="POST">
            <h1>CONNEXION</h1>
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entre ton nom d'utilisateur" name="username" required>
            <label><b>Mot de passe</b></label>
            <input type="text" placeholder="Entrer ton mot de passe" name="userpasswd" required>
            <input type="submit" id='submit' value="SE CONNECTER" >
        </form>
        </div>
    </body>
</html>