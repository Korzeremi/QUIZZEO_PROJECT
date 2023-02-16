<!-- This page is a user management page for administrator type person. It allows you to see, modify and delete users from the Quizzeo database -->

<!DOCTYPE html>
    
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
        <title>PANNEAU D'ADMINISTRATION</title>
    </head>

    <body>

        <a href="admin_help.php">Aide</a><br>

        <!-- Php -->
        <?php
            // Link of the PHP tab to the Quizzeo database
            $db = new mysqli("localhost", "root", "", "quizzeo");

            // Displaying the number of users recorded in the database
            if ($res = $db->query("SELECT * FROM utilisateur")) {
                $userNb = $res->num_rows; // Number of rows in the database
                echo "Nombre total d'utilisateurs enregistrés : " . $userNb;
                // Release the memory associated with the result
                $res->free_result();
            }

            // MAX ID variable
            $reqMaxId = 'SELECT MAX(id) from utilisateur';
            $resMaxId = mysqli_query($db, $reqMaxId);
            $rowMaxId = mysqli_fetch_assoc($resMaxId);
            $maxId = implode($rowMaxId);

            // Script allowing the display of users and their infos of the database
            if($maxId!=NULL){
                // echo "<br>L'id Max vaut : " .$maxId;
                $reqUserInfo = 'SELECT * FROM utilisateur WHERE id BETWEEN 0 AND ' . $maxId;
                $resUserInfo = mysqli_query($db, $reqUserInfo);
                echo "<table>";
                echo "<tr><th>Id :</th><th>Pseudo :</th><th>Email :</th><th>Password :</th><th>Rôle :</th></tr>";

                foreach ($resUserInfo as $user) {
                    echo "<tr>";
                    echo "<td>" . $user['id'] . "</td>";
                    echo "<td>" . $user['pseudo'] . "</td>";
                    echo "<td>" . $user['email'] . "</td>";
                    echo "<td>" . $user['password'] . "</td>";
                    echo "<td>" . $user['role'] . "</td>";
                    echo "<td><a href=\"admin_user_update.php?id=" . $user['id'] . "\">Modifier</a> ";
                    echo "<a href=\"admin_user_remove.php?id=" . $user['id'] . "\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')\">Supprimer</a></td>";
                    echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<br> Aucun utilisateur dans la base de données";
                }
            
            $db->close();
        ?>
    </body>
</html>
