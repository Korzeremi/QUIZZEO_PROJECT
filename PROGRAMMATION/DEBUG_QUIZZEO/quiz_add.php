<!-- This page allows quizzers and admins to add quizzes -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admin_quiz_add.css">
    <title>AJOUTER QUIZ</title>
</head>
<body>

    <?php

        // Call for session cookies containing important information, including the type of user
        session_start();

        // If visitor is connected as administrator, access page
        if($_SESSION['type'] == 'administrator'){

            echo '
            <header>
            <div class="tete">
                <div class="logo">
                    <a href="admin_homepage.php"><img src="MEDIA/logo.png" alt="logo"></a>
                </div>
                <div class="connect_btn">
                    <div class="connect">
                        <a href="disconnect.php"><input type="button" value="Se déconnecter" class="button_head"></a>
                        <a href="admin_homepage.php"><input type="button" value="Page d accueil" class="button_head"></a>
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
                                <option name="categorie" value="choisir">...</option>
                                <option value="Culture">Culture</option>
                                <option value="Géographie">Géographie</option>
                                <option value="Histoire">Histoire</option>
                                <option value="Musique">Musique</option>
                                <option value="Sciences et Vie">Sciences et Vie</option>
                                <option value="Autres">Autres</option>
                            </select><br>
                            <label>Difficulté :</label>
                            <input type="number" value="0" max="10" min="0" name="difficulty"><br>
                            <label>Description :</label>
                            <input type="text" name="description"><br>
                        </div>
                        </div>
                    </div>
                <input type="submit" value="Ajouter le quiz" id="submit"/>
            </form>
            ';

        } elseif($_SESSION['type'] == 'quizzer') { // If quizzer, access to :
            echo '
            <header>
            <div class="tete">
                <div class="logo">
                    <a href="quizzer_homepage.php"><img src="MEDIA/logo.png" alt="logo"></a>
                </div>
                <div class="connect_btn">
                    <div class="connect">
                        <a href="disconnect.php"><input type="button" value="Se déconnecter" class="button_head"></a>
                        <a href="quizzer_homepage.php"><input type="button" value="Page d accueil" class="button_head"></a>
                    </div>
                </div>
                </div>
            </header>

            <div class="button">
                <a href="quizzer_homepage.php"><input type="button" value="Page d accueil" class="button_ajout"></a>
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
                                <option name="categorie" value="choisir">...</option>
                                <option value="Culture">Culture</option>
                                <option value="Géographie">Géographie</option>
                                <option value="Histoire">Histoire</option>
                                <option value="Musique">Musique</option>
                                <option value="Sciences et Vie">Sciences et Vie</option>
                                <option value="Autres">Autres</option>
                            </select><br>
                            <label>Difficulté :</label>
                            <input type="number" value="0" max="10" min="0" name="difficulty"><br>
                            <label>Description :</label>
                            <input type="text" name="description"><br>
                        </div>
                        </div>
                    </div>
                <input type="submit" value="Ajouter le quiz" id="submit"/>
            </form>
            ';

        } else { // Redirection if not admin or quizzer
            Header("Location: error.html");
        }

    ?>
    </body>
</html>