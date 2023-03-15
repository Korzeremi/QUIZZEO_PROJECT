<!-- This page allows you to delete a quiz -->
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/admin_quiz_remove.css" media="screen" type="text/css" />
        <title>SUPPRESSION QUIZ</title>
    </head>

    <body>

        <header>
            <section class="tete">
                <!-- <h1>QUIZZEO</h1> -->
                <div class="logo">
                    <img src="MEDIA/logo.png" alt="logo">
                </div>
                <div class="mode_btn">
                            <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
                        <!-- <input type="checkbox" name="theme-mode" class="checkbox"> -->
                </div>
                </div>
            </section>
    
        </header>


       <div class="button">
        <a href="homepage.php"><input type="button" value="Retourner au panneau d'administration" class="button_ajout"></a>
        </div>
    
        <?php

        // Call for session cookies containing important information, including the type of user
        session_start();

            if($_SESSION['type'] == 'administrator'){
            // Link to db
            $db = new mysqli("localhost", "root", "root", "quizzeo");

            // If link failed, show error message
            if ($db->connect_error) {
                die("Connexion à la base de données échouée : " . $db->connect_error);
            }

            // Getting quizId with Get method (row)
            $quizId = $_GET['id'];

            // If quizId is not set, show error messsage
            if (!isset($quizId)) {
                echo "L'ID de l'utilisateur à supprimer n'a pas été spécifié.";
                exit();
            }

            // Request sending to db
            $req = "DELETE FROM quizz WHERE id = " . $quizId;
            if ($db->query($req) === TRUE) { // If user is deleted, redirect to
                header('Location: admin_panel.php');
            } else { // Else showing error message
                echo "Erreur lors de la suppression de l'utilisateur : " . $db->error;
            }
    
            $db->close();
        } else {
            Header("Location: error.html");
        }

        ?>

    </body>
</html>