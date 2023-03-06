<!-- This page allows the deletion of a user on the quizzeo database -->

<!DOCTYPE html>

    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
        <title>SUPPRESSION UTILISATEUR</title>
    </head>

    <body>

       <a href="admin_panel.php"><br>Retourner au panneau d'administration</a>;
    
        <!-- Php -->
        <?php

            // Link of the database
            $db = new mysqli("localhost", "root", "", "quizzeo");

            // Displaying a message if the connection to the database failed
            if ($db->connect_error) {
                die("Connexion à la base de données échouée : " . $db->connect_error);
            }

            // Getting id of the user in the database
            $userId = $_GET['id'];

            // Displaying a message if the id is not specified
            if (!isset($userId)) {
                echo "L'ID de l'utilisateur à supprimer n'a pas été spécifié.";
                exit();
            }

            // Script used to delete user from the database
            $req = "DELETE FROM utilisateur WHERE id = " . $userId;
            if ($db->query($req) === TRUE) {
                header('Location: admin_panel.php');
            } else {
                echo "Erreur lors de la suppression de l'utilisateur : " . $db->error;
            }
    
            $db->close();

        ?>
    </body>
</html>