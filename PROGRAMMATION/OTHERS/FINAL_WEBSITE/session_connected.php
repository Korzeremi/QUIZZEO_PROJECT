<!-- This page allows the user to connect if he hits the right username and the right password -->

<!DOCTYPE html>

    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
        <title>CONNEXION</title>
    </head>

    <body>

        <!-- Php -->
        <?php

            // Link to the database
            $db = new mysqli("localhost", "root", "", "quizzeo");
            $name = $_POST['logusername'];
            $passwd = $_POST['loguserpasswd'];

            // Check the connection
            if ($db->connect_errno) {
                echo "Impossible de se connecter à MySQL: " . $db->connect_error . ", veuillez réessayer ultérieurement.";
            } else {
                echo "Connexion réussie à la DB.";
            }

            // Number of registered users
            if ($res = $db->query("SELECT * FROM utilisateur")) {
                echo "Nombre d'utilisateurs enregistrés : " . $res->num_rows;
                // Release the memory associated with the result
                $res->free_result();
            }

            // Check if the user exists in the database
            $reqPseudo = 'SELECT id FROM utilisateur WHERE pseudo = "' .$name. '"';
            $ifConnected = mysqli_query($db, $reqPseudo);
            $row = mysqli_fetch_array($ifConnected, MYSQLI_ASSOC);
            if(mysqli_num_rows($ifConnected) != 0){
                echo "\nL'utilisateur " .$name. " est bien reconnu.";
            } else {
                echo "\nL'utilisateur est inconnu, merci de vous inscrire.";
                exit();
            }
    
            // print_r($row); //Returns the corresponding ID
            $currentId = implode($row);

            $reqPasswd = 'SELECT password FROM utilisateur WHERE id ="' .$currentId. '"';
            $receivePasswd = mysqli_query($db, $reqPasswd);
            $res2 = mysqli_fetch_array($receivePasswd);
            $currentPasswd = $res2['password'];
            // echo $currentPasswd; //Returns the corresponding pseudo password

            // If the password is correct we are connected            
            if($passwd == $currentPasswd){
                echo "\nLe mot de passe du compte est valide ! Vous êtes connecté.";
            } else {
                echo "\nLe mot de passe est incorrect.";
            }

            $db->close();
        ?>

        <form method="GET" action="visitor_homepage.php">
        <input type="submit" class="btn" value="Déconnexion">
        
        </form>
    </body>
</html>