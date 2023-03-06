<!DOCTYPE html>
<html lang="fr">
<!-- HEAD -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZZEO HOMEPAGE</title>
    <link rel="stylesheet" href="visitor_homepage.css">
</head>
<!-- HEAD_END -->

<!-- HEADER -->
<header>
    <div class="header_box">
        <div class="home_btn">
            <button class="home" onclick="window.location.href = 'visitor_homepage.php';"></button>
            <img alt="quizzeo_logo" class="quizzeo_logo" src="MEDIA/logo_final.png">
        </div>
        <div class="nav_part">
            <h1 class="quizzeo_title">QUIZZEO</h1>
            <div class="nav_btns">
                <div class="account_btns">
                    <a class="pnl_btn" href="admin_panel.php"><button class="adm_btn">ADMIN TEST</button></a>
                    <button class="sub_btn">S'inscrire</button>
                    <button class="log_btn">Se connecter</button>
                </div>
                <button class="dark_mode"></button>
            </div>
            <script>                /* mettre  script dark_mode */
            </script>
        </div>
    </div>
</header>
<!-- HEADER_END -->

<!-- BODY -->
<body>

    <div class="btn_section">
        <div class="searchbar_section"><input class="searchbar" onkeyup="Rechercher_ici()" type="text" name="search" placeholder="Rechercher ici..."></div>
        <div class="filter">
            <div class="filter_options">
                <select class="filter_selection">
                    <option value="default">Trier ...</option>
                    <option value="alphabétique">Alphabétique</option>
                    <option value="favoris">Favoris</option>
                    <option value="nonFait">Non fait</option>
                </select>
            </div>
            <div class="add_btn"><img src="MEDIA/logoPlus.png" alt="logoPlus"></div>
        </div>
    </div>

    <div class="quiz_section">
        <div class="theme_txt"><h2>Nos quizz</h2></div>
    </div>

    <form action="session_connected.php" method="POST">
        <div class="log_popup">
            <div class="log_part">
                <div class="log_title"><h1>Se connecter</h1></div>
                <div class="log_user_title"><label><b>Nom d'utilisateur</b></label></div>
                <div class="log_user_input"><input type="text" placeholder="Entre ton nom d'utilisateur" name="logusername" required></div>
                <div class="log_userpasswd_title"><label><b>Mot de passe</b></label></div>
                <div class="log_userpasswd_input"><input type="password" placeholder="Entrer ton mot de passe" name="loguserpasswd" required></div>
                <div class="log_submit_btn"><input type="submit" id='submit' value="SE CONNECTER"></div>
                <div class="log_cancel_btn"><input type="submit" id='submit' value="ANNULER"></div>
            </div>
        </div>
    </form>

    <form action="session_register.php" method="POST">
        <div class="sub_popup">
            <div class="sub_part">
                <div class="sub_title"><h1>S'inscrire</h1></div>
                <div class="sub_usermail_title"><label><b>Adresse mail</b></label></div>
                <div class="sub_usermail_input"><input type="text" placeholder="Entre ton email" name="subusermail" required></div>
                <div class="sub_user_title"><label><b>Nom d'utilisateur</b></label></div>
                <div class="sub_user_input"><input type="text" placeholder="Entre ton nom d'utilisateur" name="subusername" required></div>
                <div class="sub_userpasswd_title"><label><b>Mot de passe</b></label></div>
                <div class="sub_userpasswd_input"><input type="password" placeholder="Entrer ton mot de passe" name="subuserpasswd" required></div>
                <div class="sub_option">
                    <label for="" class="sub_choice">Choississez votre type de profil : </label>
                    <select name="subusertype">
                        <option value="Utilisateur">Utilisateur</option>
                        <option value="Administrateur">Administrateur</option>
                        <option value="Quizzeur">Quizzeur</option>
                    </select>
                </div>
                <div class="sub_submit_btn"><input type="submit" id='submit' value="SE CONNECTER"></div>
                <div class="sub_cancel_btn"><input type="submit" id='submit' value="ANNULER"></div>
            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="visitor_homepage.js"></script>

</body>
<!-- BODY_END -->

</html>
<!-- HTML_END -->
