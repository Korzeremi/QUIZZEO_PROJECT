<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="admin_quiz_remove.css" media="screen" type="text/css" />
        <title>Quizzeo - Suppression de quiz</title>
        <link rel="shortcut icon" href="/MEDIA/logo_final.png">
    </head>

    <body>

        <header>
            <section class="tete">
                <!-- <h1>QUIZZEO</h1> -->
                <div class="logo">
                    <img src="logo.png" alt="logo">
                </div>
                </div>
            </section>
    
        </header>


       <div class="button">
        <a href="admin_panel.php"><button class="subscribebtn" type="button" value="Panneau d'administration" class="button_ajout">Panneau d'administration</button></a>
        </div>
    
        <div class="php">
            <div class="php2">
                <?php

                $db = new mysqli("localhost", "root", "root", "quizzeo");
    
                if ($db->connect_error) {
                    die("Connexion à la base de données échouée : " . $db->connect_error);
                }
    
                $quizId = $_GET['id'];
    
                if (!isset($quizId)) {
                    echo "L'ID de l'utilisateur à supprimer n'a pas été spécifié.";
                    exit();
                }
    
                $req = "DELETE FROM quizz WHERE id = " . $quizId;
                if ($db->query($req) === TRUE) {
                    header('Location: admin_panel.php');
                } else {
                    echo "Erreur lors de la suppression de l'utilisateur : " . $db->error;
                }
        
                $db->close();
    
            ?>
            </div>
        </div>

    </body>
</html>