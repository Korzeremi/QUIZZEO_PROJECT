<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin_homepage.css">
    <title>Quizzeo - Accueil </title>
    <link rel="shortcut icon" href="/MEDIA/logo_final.png">
</head>
<body>
<header>
    <section class="tete">
        <div class="logo">
            <img src="logo.png" alt="logo">
        </div>
        <div class="connect_btn">
            <div class="connect">
                <a href="disconnect.php"><button class="subscribebtn">Se déconnecter</button></a>
            </div>
        </div>
    </section>
</header>
<div class="navbar">
        <div class="h2">
            <h2>Nos quizs</h2>
        </div>
        <div class="searchform">
            <form action="homepage_search.php" method="post">
                <input class="searchbar" type="text" id="searchbar" name="searchbar" placeholder="Rechercher par nom">
                <input class="searchbtn" type="submit" value="Rechercher"></input>
            </form>
        </div>
        <div class="sortbyselect">
            <select class="sortby" name="sortby" id="sortbyselectid">
                <option selected="" value="">Trier par</option>
                <option value="a">a</option>
                <option value="b">b</option>
                <option value="c">c</option>
            </select>
        </div>
    </div>
    <div class="grid">
        <div class="quiz"></div>
    </div>
    <!--<?php
        $server="localhost";
        $username="root";
        $password="root";
        $db="quizzeo";
        $conn = new mysqli($server,$username,$password,$db);
        if($conn->connect_error) {
            die("Connexion échouée: " . $conn->connect_error);
        }
        $req="SELECT * FROM quizz";
        $res=$conn->query($req);
        if($res->num_rows > 0){
            echo "<div class='grid'>";
            while($row=$res->fetch_assoc()){
                echo "<div class='quiz'>";
                echo "<br>" . "Nom du quiz : " . $row["titre"];
                echo " - Difficulté : " . $row["difficulte"];
                echo " - Date de création : " . $row['date_creation'] . "<br>";
                echo "</div>";
            }
            echo "</div>";
        }else{
            echo " ";
        }
        $conn->close();
    ?>-->
</body>
</html>