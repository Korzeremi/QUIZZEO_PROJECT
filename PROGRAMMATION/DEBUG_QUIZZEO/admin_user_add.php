<!-- This page permit admin to add users -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/admin_user_add.css" media="screen" type="text/css" />
    <title>AJOUTER UTILISATEUR</title>
</head>

<body>

    <header>
        <div class="tete">
            <div class="logo">
                <a href="admin_homepage.php"><img src="MEDIA/logo.png" alt="logo"></a>
            </div>
            <div class="connect_btn">
                <div class="connect">
                    <a href="disconnect.php"><input type="button" value="Se déconnecter" class="button_head"></a>
                    <a href="admin_homepage.php"><input type="button" value="Page d'accueil" class="button_head"></a>
                </div>
            </div>
        </div>
    </header>


    <div class="button">
        <a href="admin_panel.php"><input type="button" value="Panneau d'administration" class="button_ajout"></a>
    </div>

    <?php

        session_start();
        if($_SESSION['type'] == 'administrator'){ // if admin

        // Link to DB
        $db = new mysqli("localhost", "root", "root", "quizzeo");

        // If link failed, show error message
        if ($db->connect_error) {
            die("Connexion à la base de données échouée : " . $connexion->connect_error);
        }
    
        // Receiving value from form post method in the page
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Attributing each variable with each value of input wih their name thanks to post method
            $pseudo = $_POST['addusername'];
            $mail = $_POST['addusermail'];
            $passwd = $_POST['adduserpasswd'];
            $role = $_POST['addusertype'];
            $showErrors = array();

            // Sending request to db to create new user
            $req = "INSERT INTO utilisateur(pseudo, email, password, role) VALUES(?,?,?,?)";
            $res = $db->prepare($req);
            $res->bind_param("ssss", $pseudo, $mail, $passwd, $role);
            if($res->execute()){ // If success, redirection
                header('Location: admin_panel.php');
                exit();
                } else { // If not, retry
                    header('Location: admin_user_add.php');
                }
            }

            $db->close();
        } else { // if not redirection
            header('Location: error.html');
        }
        ?>

    <!-- Form post method to send data to PHP  -->
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

    </body>
</html>