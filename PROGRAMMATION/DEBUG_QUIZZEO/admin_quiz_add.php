<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJOUTER QUIZ</title>
</head>
<body>
    <navbar>
        <a href="admin_homepage.php"><img alt="logo"></a>
        <a href="disconnect.php"><input type="button" value="Se déconnecter"></a>
        <a href="admin_panel.php"><input type="button" value="Panneau d'administration"></a>
        <a href="admin_homepage.php"><input type="button" value="Page d'accueil"></a>
        <span class="mode_btn">
                <input type="checkbox" name="theme-mode">
                <span class="slider"></span>
        </span>
    </navbar>
    
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

    <h1>Création d'un quiz</h1>
    <form method="post">
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
        <input type="submit" value="Ajouter le quiz"/>
    </form>
    </body>
</html>