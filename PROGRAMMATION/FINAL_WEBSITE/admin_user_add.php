<!-- This page allows the user to validate his registration by transferring his data to the database -->

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
    <title>AJOUTER USER</title>
</head>

<body>
    <?php

        // Link to the database
        $db = new mysqli("localhost", "root", "", "quizzeo");

        // Displaying message if the connection failed 
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
        <div class="add_title"><h1>S'inscrire</h1></div>
                <div class="add_usermail_title"><label><b>Adresse mail</b></label></div>
                <div class="add_usermail_input"><input type="text" placeholder="Entre ton email" name="addusermail" required></div>
                <div class="add_user_title"><label><b>Nom d'utilisateur</b></label></div>
                <div class="add_user_input"><input type="text" placeholder="Entre ton nom d'utilisateur" name="addusername" required></div>
                <div class="add_userpasswd_title"><label><b>Mot de passe</b></label></div>
                <div class="add_userpasswd_input"><input type="password" placeholder="Entrer ton mot de passe" name="adduserpasswd" required></div>
                <div class="add_option">
                    <label for="" class="add_choice">Choississez votre type de profil : </label>
                    <select name="addusertype">
                        <option value="Utilisateur">Utilisateur</option>
                        <option value="Administrateur">Administrateur</option>
                        <option value="Quizzeur">Quizzeur</option>
                    </select>
                </div>
                <input type="submit" value="Ajouter l'utilisateur"/>
    </form>
    </body>
</html>