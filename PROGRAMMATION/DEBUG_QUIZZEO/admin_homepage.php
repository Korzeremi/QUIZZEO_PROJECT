<!-- This page is the page on which the administrator is redirected when it connects or when it press the home page button -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admin_homepage.css">
    <title>PAGE D'ACCUEIL</title>
</head>
<body>  

    <?php 
        // Call for session cookies containing important information, including the type of user
        session_start();

        // If website visitor is connected as administrator, show the page
        if($_SESSION['type'] == 'administrator'){

            // Writing HTML code with echo method
            echo '
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
                <a href="admin_panel.php"><input type="button" value="Panneau d administration" class="button_ajout"></a>
                <a href="quiz_add.php"><input type="button" value="Ajouter quiz" class="button_ajout"></a>
                <a href="admin_profile.php"><input type="button" value="Mon profil" class="button_ajout"></a>
            </div>

            <div class="navbar">
                <div class="h2">
                <a href="homepage.php"><h2>Nos quizs</h2></a>
            </div>
            <div class="searchform"> 
                <form action="admin_search.php" method="post">
                    <input class="searchbar" type="text" id="searchbar" name="searchbar" placeholder="Rechercher par nom">
                    <input class="searchbtn" type="submit" value="Rechercher"></input>
                </form>
            </div>
            </div>
            <h2>Page d accueil administrateur</h2>';

            // Displaying username
            echo "Bienvenue " . $_SESSION['username'];

            // Variables used to memorise db informations
            $server="localhost";
            $username="root";
            $password="root";
            $db="quizzeo";

            // Using mysqli method to connect to db
            $conn = new mysqli($server,$username,$password,$db);

            // If connection to db failed
            if($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }
    
            // Showing numbers of users
            if ($res0 = $conn->query("SELECT * FROM utilisateur")) {
                $userNb = $res0->num_rows; // Number of rows in the database to show user's number
                echo "<p><b>Nombre d'utilisateurs enregistrés à ce jour : " . $userNb . "</b></p>";
                // Release the memory associated with the result
                $res0->free_result();
            }
    
            echo "<h3>Quizz du jour : </h3>";

            // Sending request to db to display quiz
            $req1="SELECT * FROM quizz";
            $res1=$conn->query($req1);

            $quizNb=$res1->num_rows;
            echo "<b>Nombre de quizz à ce jour : " . $quizNb ."</b><br>";

            // If quiz exist in db, showing them in grid
            if($res1->num_rows > 0){
                echo "<div class='grid'>";
                while($row1=$res1->fetch_assoc()){
                    echo "<a href='quiz.php?id=". $row1['id'] ."'>";
                    echo "<div class='quiz'>";
                    echo '<img style="position: relative; width: 180px;" class="bg" src="MEDIA/quiz.png" alt="IMG_BG">';
                    echo "<br>Nom du quiz: " . $row1["titre"];
                    echo " - Difficulté: " . $row1["difficulte"];
                    echo "</div>";
                }
                echo "</div></a>";
            }else{
                echo " ";
            }
        }else{ // If not, redirection to error.html
            Header("Location: error.html");
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
        </script> -->
</body>
</html>