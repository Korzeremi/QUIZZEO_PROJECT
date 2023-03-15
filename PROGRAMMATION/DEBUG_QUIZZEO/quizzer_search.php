<!-- This page allows you to search -->
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="quizzer_search.css">
        <title>ACCUEIL QUIZZEO </title>
    </head>

    <body>
        <header>
            <div class="tete">
                <div class="logo">
                    <a href="admin_homepage.php"><img src="logo.png" alt="logo"></a>
                </div>
                <div class="connect_btn">
                    <div class="connect">
                        <a href="disconnect.php"><input type="button" value="Se déconnecter" class="button_head"></a>
                    </div>
                </div>
            </div>
        </header>
            <div class="button">
                <a href="quizzer_homepage.php"><input type="button" value="Page d'accueil" class="button_ajout"></a>
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
            <div class="grid">
                <div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div>
            </div>

        <?php
            // Calling session cookies
            session_start();
            // Infos for db link
            if($_SESSION['user']=='quizzer'){
            $server="localhost";
            $username="root";
            $password="root";
            $db="quizzeo";

            // db link
            $conn = new mysqli($server,$username,$password,$db);

            // If link failed, show message
            if($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }

            if(isset($_POST['searchbar'])){
                $search=$_POST['searchbar'];
            }

            //sendinq request to db to receive all data
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