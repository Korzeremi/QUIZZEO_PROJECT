<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_homepage.css">
    <title>QUIZZEO</title>
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
                <a href="admin_profile.php"><input type="button" value="Mon profil" class="button_ajout"></a>
            </div>

            <div class="navbar">
                <div class="h2">
                <a href="homepage.php"><h2>Nos quizs</h2></a>
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
            <h2>Page d accueil administrateur</h2>';

            echo "Bienvenue " . $_SESSION['username'];

            $server="localhost";
            $username="root";
            $password="root";
            $db="quizzeo";

            $conn = new mysqli($server,$username,$password,$db);

            if($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }
    
            if ($res0 = $conn->query("SELECT * FROM utilisateur")) {
                $userNb = $res0->num_rows; // Number of rows in the database
                echo "<p><b>Nombre d'utilisateurs enregistrés à ce jour : " . $userNb . "</b></p>";
                // Release the memory associated with the result
                $res0->free_result();
            }
    
            echo "<h3>Quizz du jour : </h3>";

            $req1="SELECT * FROM quizz";
            $res1=$conn->query($req1);

            $quizNb=$res1->num_rows;
            echo "<b>Nombre de quizz à ce jour : " . $quizNb ."</b><br>";

            if($res1->num_rows > 0){
                echo "<div class='grid'>";
                while($row1=$res1->fetch_assoc()){
                    echo "<a href='quiz.php?id=". $row1['id'] ."'>";
                    echo "<div class='quiz'>";
                    echo '<img style="position: relative; width: 180px;" class="bg" src="MEDIA/QUIZ_BG1.jpg" alt="IMG_BG">';
                    echo "<br>Nom du quiz: " . $row1["titre"];
                    echo " - Difficulté: " . $row1["difficulte"];
                    echo " - Date de création: " . $row1['date_creation'] . "<br>";
                    echo "</div>";
                }
                echo "</div></a>";
            }else{
                echo " ";
            }
        }else{
            Header("Location: error.html");
        }
        
    ?>

</body>
</html>