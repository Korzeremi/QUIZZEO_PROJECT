<!-- This page is displayed when the user is not registered -->
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="CSS/homepage_search.css">
        <title>ACCUEIL QUIZZEO </title>
    </head>

    <body>
        <header>
            <section class="tete">
                <!-- <h1>QUIZZEO</h1> -->
                <div class="logo">
                    <img src="MEDIA/logo.png" alt="logo">
                </div>
                <div class="connect_btn">
                    <div class="connect">
                        <a href="subscription.php" ><button class="subscribebtn">s'inscrire</button></a>
                        <a href="connection.php"><button class="subscribebtn">Se connecter</button></a>
                    </div>
                </div>
            </section>
    
        </header>

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

        <?php
            // Infos for link to db
            $server="localhost";
            $username="root";
            $password="root";
            $db="quizzeo";

            // Link to db
            $conn = new mysqli($server,$username,$password,$db);

            // If link failed, show errors messages
            if($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }

            // If search value is not empty
            if(isset($_POST['searchbar'])){
                $search=$_POST['searchbar'];
            }

            // Sending request to db to search quiz
            $req="SELECT * FROM quizz WHERE titre LIKE '%$search%'";
            $res=$conn->query($req);

            // If quiz exists, display them in grid
            if($res->num_rows > 0){
                echo '<div class="grid">';
                while($row=$res->fetch_assoc()){
                    echo '<div class="quiz">';
                    echo '<img style="position: relative; width: 180px;" class="bg" src="MEDIA/quiz.png" alt="IMG_BG">';
                    echo "Nom du quiz: " . $row["titre"];
                    echo " - Difficulté: " . $row["difficulte"];
                    echo '</div>';
                }
                echo '</div>';
            }else{
                echo "Aucun quiz trouvé.";
            }
            
            $conn->close();
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
        </script>  -->

    </body>
    
</html>