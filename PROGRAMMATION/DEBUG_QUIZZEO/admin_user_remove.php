<!-- This page permit admin to remove users -->
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/admin_user_remove.css" media="screen" type="text/css" />
        <title>SUPPRESSION UTILISATEUR</title>
    </head>

    <body>

        <header>
            <section class="tete">
                <!-- <h1>QUIZZEO</h1> -->
                <div class="logo">
                    <img src="MEDIA/logo.png" alt="logo">
                </div>
                </div>
            </section>
    
        </header>

       <div class="button">
        <a href="homepage.php"><input type="button" value="Retourner au panneau d'administration" class="button_ajout"></a>
    </div>
    
        <?php

            // Starting sessions cookies
            session_start();
            //If admin, access page
            if($_SESSION['type'] == 'administrator'){
            // Link to db
            $db = new mysqli("localhost", "root", "root", "quizzeo");
            // If link to db failed
            if ($db->connect_error) {
                die("Connexion à la base de données échouée : " . $db->connect_error);
            }

            // Getting if of user to delete with GET method
            $userId = $_GET['id'];

            // If userId empty, 
            if (!isset($userId)) {
                echo "L'ID de l'utilisateur à supprimer n'a pas été spécifié.";
                exit();
            }

            // Sending request to delete user to db
            $req = "DELETE FROM utilisateur WHERE id = " . $userId;
            if ($db->query($req) === TRUE) { // If success
                header('Location: admin_panel.php');
            } else {
                echo "Erreur lors de la suppression de l'utilisateur : " . $db->error;
            }
    
            $db->close();
        }else{ // Redirection if not admin
            header("Location: error.html");
        }

        ?>

        <!-- <script>
            const html = document.getElementsByTagName("html")[0];
            const themeSwicth = document.getElementById("themeLogo");
            themeSwicth.addEventListener("click", () => {
            html.classList.toggle("nuit");
            if (html.classList.contains("nuit")) {
                themeSwicth.innerHTML = 'LIGHT'.fontsize(4);
            } else {
                themeSwicth.innerHTML = 'DARK'.fontsize(4);
            }
        });
        </script>  -->


    </body>
</html>