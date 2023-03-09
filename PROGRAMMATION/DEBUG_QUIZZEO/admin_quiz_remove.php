<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="admin_quiz_remove.css" media="screen" type="text/css" />
        <title>SUPPRESSION QUIZ</title>
    </head>

    <body>

        <header>
            <section class="tete">
                <!-- <h1>QUIZZEO</h1> -->
                <div class="logo">
                    <img src="logo.png" alt="logo">
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

        <script>
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
        </script> 

    </body>
</html>