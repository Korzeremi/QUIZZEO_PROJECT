<!-- This page is the one on which the quizzer arrives when he connects -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/quizzer_homepage.css">
    <title>QUIZZEO</title>
</head>
<body>
    <header>
        <div class="tete">
            <div class="logo">
                <a href="admin_homepage.php"><img src="MEDIA/logo.png" alt="logo"></a>
            </div>
            <div class="connect_btn">
                <div class="connect">
                    <a href="disconnect.php"><input type="button" value="Se déconnecter" class="button_head"></a>
                </div>
            </div>
        </div>
    </header>
    <div class="button">
        <a href="quizzer_homepage.php"><input type="button" value="Gérer mes quizz" class="button_ajout"></a>  
        <a href="quiz_add.php"><input type="button" value="Créer un quiz" class="button_ajout"></a> 
        <a href="quizzer_profile.php"><input type="button" value="Mon profil" class="button_ajout"></a> 
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
    </div>

    <h2>Page d'accueil quizzer</h2>
    <?php   
        // Calling session cookies
        session_start();
        if($_SESSION['type']=="quizzer"){
        echo "Bienvenue " . $_SESSION['username'] . "<br>";
            // Infos for db link
            $server="localhost";
            $username="root";
            $password="root";
            $db="quizzeo";

            // Db link
            $conn = new mysqli($server,$username,$password,$db);

            // If db link failed
            if($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }


            // request to receive all data for quizz
            $req="SELECT * FROM quizz";
            $res=$conn->query($req);

            //Displaying quiz if exists in grid,
            if($res->num_rows > 0){
                echo '<div class="grid">';
                while($row=$res->fetch_assoc()){
                    echo "<a href='quiz.php?id=". $row['id'] ."'>";                    
                    echo '<div class="quiz">';
                    echo '<img style="position: relative; width: 180px;" class="bg" src="MEDIA/quiz.png" alt="IMG_BG">';
                    echo "<br>" . "Nom du quiz: " . $row["titre"];
                    echo " - Difficulté: " . $row["difficulte"];
                    echo "</div>";
                }
                echo "</div>";
            }else{
                echo " ";
            }
            
            $conn->close();
        } else {
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
    }); -->
    </script> 

</body>
</html>