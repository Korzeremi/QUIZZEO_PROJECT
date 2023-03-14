<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_quiz_add.css">
    <title>AJOUTER QUIZ</title>
</head>
<body>

    <?php

        session_start();

        if($_SESSION['type'] == 'administrator'){
            echo '
            <header>
            <div class="tete">
                <div class="logo">
                    <a href="admin_homepage.php"><img src="logo.png" alt="logo"></a>
                </div>
                <div class="connect_btn">
                    <div class="connect">
                        <a href="disconnect.php"><input type="button" value="Se déconnecter" class="button_head"></a>
                        <a href="admin_homepage.php"><input type="button" value="Page d accueil" class="button_head"></a>
                    </div>
                    <div class="mode_btn">
                        <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
                        <!-- <input type="checkbox" name="theme-mode" class="checkbox"> -->
                    </div>
                </div>
                </div>
            </header>

            <div class="button">
                <a href="admin_panel.php"><input type="button" value="Panneau d administration" class="button_ajout"></a>
                <a href="admin_homepage.php"><input type="button" value="Page d accueil" class="button_ajout"></a>
            </div>';

            

            echo '
            <h1>Création d un quiz</h1>

            <form action="quiz_add_status.php" method="post">
                <div class="presentation">
                    <div class="inscription">
                        <div class="case">
                            <label>Intitulé du quiz :</label>
                            <input type="text" name="quizname"><br>
                            <label>Catégories</label>
                            <select name="categorie">
                                <!-- <option value="">...</option> -->
                                <option name="categorie" value="France">France</option>
                                <option value="Musique">Musique</option>
                                <option value="Animés">Animés</option>
                                <option value="IPSSI">IPSSI</option>
                                <option value="Autres">Autres</option>
                            </select><br>
                            <label>Difficulté :</label>
                            <input type="number" value="0" max="10" min="0" name="difficulty"><br>
                            <label>Description :</label>
                            <input type="text" name="description"><br>
                            <label>Date de création :</label>
                            <input type="datetime-local" name="date"><br>
                        </div>
                        </div>
                    </div>
                <input type="submit" value="Ajouter le quiz" id="submit"/>
            </form>


            <script>
                const html = document.getElementsByTagName("html")[0];
                const themeSwicth = document.getElementById("themeLogo");
                themeSwicth.addEventListener("click", () => {
                html.classList.toggle("nuit");
                if (html.classList.contains("nuit")) {
                    themeSwicth.innerHTML = "LIGHT".fontsize(4);
                } else {
                    themeSwicth.innerHTML = "DARK".fontsize(4);
                }
            });
            </script>
            ';

        } else {
            Header("Location: error.html");
        }

    ?>
    </body>
</html>