<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_quiz_add.css">
    <title>Quizzeo - Créer un quiz</title>
    <link rel="shortcut icon" href="/MEDIA/logo_final.png">
</head>
<body>
    <header>
        <div class="tete">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <div class="connect_btn">
                <div class="connect">
                    
                    <a href="disconnect.php"><button class="subscribebtn" type="button" value="Se déconnecter" class="button_head">Se déconnecter</button></a>
                </div>
            </div>
        </div>
    </header>
    <div class="button">
        <a href="admin_homepage.php"><button class="subscribebtn" type="button" value="Page d'accueil" class="button_head">Page d'accueil</button></a>
        <a href="admin_panel.php"><button class="subscribebtn" type="button" value="Panneau d'administration" class="button_ajout">Panneau d'administration</button></a>
    </div>

    <?php
        $server="localhost";
        $username="root";
        $password="root";
        $db="quizzeo";

        $conn=new mysqli($server, $username, $password, $db);

        if($conn->connect_error){
            echo "Erreur de connexion à la base de données : " . $conn->connect_error;
        }

        $quizName=$_POST['quizname'];
        $quizCat=$_POST['categorie'];
        $quizDif=$_POST['difficulty'];
        $quizDescr=$_POST['description'];
        $quizDate=$_POST['date'];

        $req="INSERT INTO quizz(titre,categorie,difficulte,date_creation,description) VALUES('$quizName','$quizCat','$quizDif','$quizDate','$quizDescr')";
        $res=$conn->query($req);
    ?>

            

            <form method="post">
                <div class="filtre">
                <div class="presentation">
                    <h1>Création d'un quiz</h1>
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
                        <input type="submit" value="Ajouter le quiz" id="submit"/>
                    </div>
        
                </div>
                </div>
            </form>


    </body>
</html>