<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="register.css" media="screen" type="text/css" />
        <title>QUIZZEO INSCRIPTION</title>
    </head>
    <body>
        <header>
            <div class="header_box">
                <img alt="quizzeo_logo" class="quizzeo_logo" src="logo_final.png">
                <div class="nav_part">
                    <h1 class="quizzeo_title">QUIZZEO</h1>
                    <button class="dark_mode"></button>
                    <script>
                        //mettre  script dark_mode
                    </script>
                </div>
            </div>
        </header>
        <div id="container">
        <form action="account.php" method="POST">
            <h1>INSCRIPTION</h1>
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entre ton nom d'utilisateur" name="username" required>
            <label><b>Prénom</b></label>
            <input type="text" placeholder="Entrer ton prénom" name="firstname" required>
            <label><b>Mot de passe</b></label>
            <input type="text" placeholder="Entrer ton mot de passe" name="userpasswd" required>
            <div class="option">
                <label for="" class="choix">Choississez votre type de profil : </label>
                <select name="userType">
                    <option value="Utilisateur">Utilisateur</option>
                    <option value="Administrateur">Administrateur</option>
                    <option value="Quizzeur">Quizzeur</option>
                </select>
            </div>
            <input type="submit" id='submit' value="S'INSCRIRE" >
        </form>
        </div>
    </body>
</html>