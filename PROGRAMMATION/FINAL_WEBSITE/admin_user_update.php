<!-- This page allows you to modify the data of a selected user of the database -->

<!DOCTYPE html>

    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
        <title>USER UPDATE</title>
    </head>

    <body>

        <!-- Php -->
        <?php
    
            // Link to the database
            $db = new mysqli("localhost", "root", "", "quizzeo");

            // Displaying message if the connection failed 
            if ($db->connect_error) {
                die("Connexion à la base de données échouée : " . $connexion->connect_error);
            }

            // Getting the id of the user in the database
            $userId = $_GET['id'];

            if (!isset($userId)) {
                echo "L'ID de l'utilisateur à modifier n'a pas été spécifié.";
                exit();
            }

            // User selection by their ID in the database
            $req = "SELECT * FROM utilisateur WHERE id = " .$userId;
            $res = mysqli_query($db, $req);
            $row = mysqli_fetch_assoc($res);
            // Showing error message if user not found in the database
            if(!$row){
                echo "ERREUR ! L'utilisateur n'a pas pu être trouvé dans la base de données ! ";
                exit();
            }

            // Script allowing the modification of user data thanks to the post and GET method in the database 
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $pseudo = $_POST['pseudo'];
                $mail = $_POST['email'];
                $role = $_POST['role'];
                $showErrors = array();

                if(empty($pseudo)){
                    $showErrors[] = "Pseudo obligatoire ";
                }

                // Sending request to modify user's infos
                if(empty($showErrors)){
                    $req2 = "UPDATE utilisateur SET pseudo = ?, email = ?, role = ? WHERE id = ?";
                    $res2 = $db->prepare($req2);
                    $res2->bind_param("sssi", $pseudo, $mail, $role, $userId);
                    if($res2->execute()){
                        echo "L'utilisateur a été modifié avec succès";
                        header('Location: admin_panel.php');
                        exit();
                    } else {
                        echo "ERREUR " . $db->error;
                    }
                }
            }

            $db->close();

        ?>

        <!-- HTML set to display labels to modify the values of the database by getting them with the post and Get method -->
        <a href="admin_panel.php"><br>Retourner au panneau d'administration</a>
        <br><a href="admin_help.php">Aide</a>
        <h1>Modifier l'utilisateur sélectionné :</h1>
        <form method="post">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php echo $row['pseudo']; ?>"/><br/>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>"/><br/>
            <label for="role">Rôle :</label>
            <select for="role" name="role">
                <option value="Administrateur">Administrateur</option>
                <option value="Utilisateur" default>Utilisateur</option>
                <option value="Quizzeur">Quizzeur</option>
            </select><br>
            <p>ATTENTION ! REGARDEZ BIEN LE ROLE ATTRIBUE !</p>
            <input type="submit" value="Modifier l'utilisateur"/>
        </form>
    </body>
</html>