<!-- Allows you to search in user -->
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="homepage.css">
        <title>ACCUEIL QUIZZEO </title>
    </head>
    <body>
        <navbar>
        <a href="user_homepage.php"><img alt="logo"></a>
        <a href="disconnect.php"><input type="button" value="Se déconnecter"></a>
        <a href="user_homepage.php"><input type="button" value="Page d'accueil"></a>
            <span class="mode_btn">
                <input type="checkbox" name="theme-mode">
                <span class="slider"></span>
            </span>
        </navbar>

        <form method="post">
            <input type="text" id="searchbar" name="searchbar">
            <input type="submit" value="Rechercher"></input>
        </form>

        <?php
            // calling seesion cookies
            session_start();
            // infos for db links
            if($_SESSION['type']=="user"){
            $server="localhost";
            $username="root";
            $password="root";
            $db="quizzeo";
            //db link
            $conn = new mysqli($server,$username,$password,$db);
            // display error if link failed
            if($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }

            if(isset($_POST['searchbar'])){
                $search=$_POST['searchbar'];
            }

            $req="SELECT * FROM quizz WHERE titre LIKE '%$search%'";
            $res=$conn->query($req);

            // if quiz exist, show them in grid
            if($res->num_rows > 0){
                echo '<div class="grid">';
                while($row=$res->fetch_assoc()){
                    echo "<a href='quiz.php?id=". $row1['id'] ."'>";
                    echo '<div class="quiz">';
                    echo '<img style="position: relative; width: 180px;" class="bg" src="MEDIA/quiz.png" alt="IMG_BG">';
                    echo "Nom du quiz: " . $row["titre"];
                    echo " - Difficulté: " . $row["difficulte"];
                    echo '</div>';
                }
                echo "</div>";
            }else{
                echo "Aucun quiz trouvé.";
            }
            
            $conn->close();
        }else{
            header("Location: error.html");
        }
        ?>

        <!-- <script>
            function setDarkMode(Event){
            }
        </script> -->

    </body>
    
</html>