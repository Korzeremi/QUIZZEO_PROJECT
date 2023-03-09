<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin_user_add.css" media="screen" type="text/css" />
    <title>AJOUTER USER</title>
</head>

<body>

    <header>
        <div class="tete">
            <div class="logo">
                <a href="admin_homepage.php"><img src="logo.png" alt="logo"></a>
            </div>
            <div class="connect_btn">
                <div class="connect">
                    <a href="disconnect.php"><input type="button" value="Se déconnecter" class="button_head"></a>
                    <a href="admin_homepage.php"><input type="button" value="Page d'accueil" class="button_head"></a>
                </div>
                <div class="mode_btn">
                    <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
                <!-- <input type="checkbox" name="theme-mode" class="checkbox"> -->
                </div>
            </div>
        </div>
    </header>


    <div class="button">
        <a href="admin_panel.php"><input type="button" value="Panneau d'administration" class="button_ajout"></a>
    </div>

    <?php

        $db = new mysqli("localhost", "root", "root", "quizzeo");

        if ($db->connect_error) {
            die("Connexion à la base de données échouée : " . $connexion->connect_error);
        }
    

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $pseudo = $_POST['addusername'];
            $mail = $_POST['addusermail'];
            $passwd = $_POST['adduserpasswd'];
            $role = $_POST['addusertype'];
            $showErrors = array();

            $req = "INSERT INTO utilisateur(pseudo, email, password, role) VALUES(?,?,?,?)";
            $res = $db->prepare($req);
            $res->bind_param("ssss", $pseudo, $mail, $passwd, $role);
            if($res->execute()){
                header('Location: admin_panel.php');
                exit();
                }
            }

            $db->close();
        ?>


    <form method="post">
        <h1>Ajouter utilisateur</h1>
        <div class="presentation">
            <div class="inscription">
                <div class="case">
                    <label>Adresse mail</label>
                    <input type="text" placeholder="Entre ton email" name="addusermail" required><br>
                    <label>Nom d'utilisateur</label>
                    <input type="text" placeholder="Entre ton nom d'utilisateur" name="addusername" required><br>
                    <label>Mot de passe</label>
                    <input type="password" placeholder="Entrer ton mot de passe" name="adduserpasswd" required><br>
                    <label for="" class="add_choice">Choississez votre type de profil : </label>
                    <select name="addusertype" required>
                        <option value="">Choisir le rôle</option>
                        <option value="user">Utilisateur</option>
                        <option value="administrator">Administrateur</option>
                        <option value="quizzer">Quizzeur</option>
                    </select><br>
                </div>
                <input type="submit" value="Ajouter l'utilisateur" id="submit"/>
            </div>
        </div>
    </form>


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