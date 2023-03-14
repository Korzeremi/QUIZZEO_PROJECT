<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="admin_user_add.css" media="screen" type="text/css" />
    <title>Quizzeo - Ajouter un utilisateur</title>
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
        <a href="admin_homepage.php"><button class="subscribebtn" type="button" value="Page d'accueil" class="button_head">Page d'accueil</button></a>
        <a href="admin_panel.php"><button class="subscribebtn" type="button" value="Panneau d'administration" class="button_ajout">Panneau d'administration</button></a>
    </div>


    <form method="post">
        <div class="filtre">
            <div class="presentation">
                <h1>Ajouter utilisateur</h1>
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
                    <button class="subscribebtn" type="submit" value="Ajouter l'utilisateur" id="submit">Ajouter l'utilisateur</button>
                </div>
            </div>
        </div>
    </form>

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

    </body>
</html>

-----