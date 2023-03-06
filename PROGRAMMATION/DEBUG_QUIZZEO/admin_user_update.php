<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
        <title>USER UPDATE</title>
    </head>

    <body>
        <?php
    
            $db = new mysqli("localhost", "root", "root", "quizzeo");

            if ($db->connect_error) {
                die("Connexion à la base de données échouée : " . $connexion->connect_error);
            }

            $userId = $_GET['id'];

            if (!isset($userId)) {
                echo "L'ID de l'utilisateur à modifier n'a pas été spécifié.";
                exit();
            }

            $req = "SELECT * FROM utilisateur WHERE id = " .$userId;
            $res = mysqli_query($db, $req);
            $row = mysqli_fetch_assoc($res);
            if(!$row){
                echo "ERREUR ! L'utilisateur n'a pas pu être trouvé dans la base de données ! ";
                exit();
            }

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $pseudo = $_POST['pseudo'];
                $mail = $_POST['email'];
                $role = $_POST['role'];
                $showErrors = array();

                if(empty($pseudo)){
                    $showErrors[] = "Pseudo obligatoire ";
                }

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

        <a href="admin_panel.php"><br>Retourner au panneau d'administration</a>
        <br><a href="admin_help.php">Aide</a>
        <h1>Modifier l'utilisateur sélectionné :</h1>
        <form method="post">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php echo $row['pseudo']; ?>" required/><br/>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" required/><br/>
            <label for="role">Rôle :</label>
            <select for="role" name="role" required>
                <option value="">Choisir un rôle</option>
                <option value="administrator">Administrateur</option>
                <option value="user" default>Utilisateur</option>
                <option value="quizzer">Quizzeur</option>
            </select><br>
            <input type="submit" value="Modifier l'utilisateur"/>
        </form>
    </body>
</html>