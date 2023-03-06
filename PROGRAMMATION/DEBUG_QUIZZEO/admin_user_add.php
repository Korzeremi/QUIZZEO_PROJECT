<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
    <title>AJOUTER USER</title>
</head>

<body>
    <a href="admin_panel.php">Retourner au panneau d'administration</a>
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
            <input type="submit" value="Ajouter l'utilisateur"/>
    </form>
    </body>
</html>