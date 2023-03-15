<!-- This page permit admin to update and modify users' informations -->
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/admin_quiz_update.css" media="screen" type="text/css" />
        <title>MODIFICATION UTILISATEUR</title>
    </head>

    <body>
        <?php
    
        // Starting sessions cookies
        session_start();
        // If admin, access to page
        if($_SESSION['type'] == 'administrator'){
            // Link to db
            $db = new mysqli("localhost", "root", "root", "quizzeo");
            // Displaying message if link failed
            if ($db->connect_error) {
                die("Connexion à la base de données échouée : " . $connexion->connect_error);
            }

            // Getting user id with GET method
            $userId = $_GET['id'];

            // If user id empty,
            if (!isset($userId)) {
                echo "L'ID de l'utilisateur à modifier n'a pas été spécifié.";
                exit();
            }

            // Sending request to db
            $req = "SELECT * FROM utilisateur WHERE id = " .$userId;
            $res = mysqli_query($db, $req);
            $row = mysqli_fetch_assoc($res);
            if(!$row){ // if request failed
                echo "ERREUR ! L'utilisateur n'a pas pu être trouvé dans la base de données ! ";
                exit();
            }

            // If post method
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // Getting value from imput with their name thanks to post method
                $pseudo = $_POST['pseudo'];
                $mail = $_POST['email'];
                $role = $_POST['role'];
                $showErrors = array();

                // If pseudo empty
                if(empty($pseudo)){
                    $showErrors[] = "Pseudo obligatoire ";
                }

                // if no errors,
                if(empty($showErrors)){
                    // sending request to modify user
                    $req2 = "UPDATE utilisateur SET pseudo = ?, email = ?, role = ? WHERE id = ?";
                    $res2 = $db->prepare($req2);
                    $res2->bind_param("sssi", $pseudo, $mail, $role, $userId);
                    if($res2->execute()){ // If success
                        echo "L'utilisateur a été modifié avec succès";
                        header('Location: admin_panel.php');
                        exit();
                    } else {
                        echo "ERREUR " . $db->error;
                    }
                }
            }

            $db->close();
        } else { // Redirection if not admin
            header('Location: error.html');
        }

        ?>
        <!-- Form post method permit to sending data to page  -->
        <header>
            <div class="tete">
            <div class="logo">
                <a href="admin_homepage.php"><img src="MEDIA/logo.png" alt="logo"></a>
            </div>
            <div class="connect_btn">
                <div class="connect">
                    <a href="disconnect.php"><input class="btn" type="button" value="Se déconnecter" class="button_head"></a>
                    <a href="admin_panel.php"><input class="btn" type="button" value="Panel" class="button_ajout"></a>
                </div>
            </div>
            </div>
        </header>
        <!-- <br><a href="admin_help.php">Aide</a> -->
        <h1>Modifier l'utilisateur sélectionné :</h1>
        <form method="post">
            <div class="presentation">
                <div class="inscription">
                    <div class="case">
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
                </div>

                </div>

            </div>
        </form>
    </body>
</html>