<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
        <title>SUPPRESSION UTILISATEUR</title>
    </head>

    <body>

       <a href="admin_panel.php"><br>Retourner au panneau d'administration</a>;
    
        <?php

            $db = new mysqli("localhost", "root", "root", "quizzeo");

            if ($db->connect_error) {
                die("Connexion à la base de données échouée : " . $db->connect_error);
            }

            $userId = $_GET['id'];

            if (!isset($userId)) {
                echo "L'ID de l'utilisateur à supprimer n'a pas été spécifié.";
                exit();
            }

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