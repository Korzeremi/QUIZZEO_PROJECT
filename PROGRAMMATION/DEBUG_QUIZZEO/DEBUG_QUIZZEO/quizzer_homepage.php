<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="quizzer_homepage.css">
    <title>QUIZZEO</title>
</head>
<body>
    <header>
        <div class="tete">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <div class="connect_btn">
                <div class="connect">
                    <a href="disconnect.php"><button class="subscribebtn">Se connecter</button></a>
                </div>
                <!-- <div class="mode_btn">
                    <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
                    <input type="checkbox" name="theme-mode" class="checkbox">
                </div> -->
            </div>
        </div>
    </header>

    <div class="button">
        <a href="disconnect.php"><input type="button" value="Gérer mes quizz" class="button_ajout"></a>  
        <a href="disconnect.php"><input type="button" value="Créer un quiz" class="button_ajout"></a> 
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
        <div class="sortbyselect">
            <select class="sortby" name="sortby" id="sortbyselectid">
                <option selected="" value="">Trier par</option>
                <option value="a">a</option>
                <option value="b">b</option>
                <option value="c">c</option>
            </select>
        </div>
    </div>

    <h2>Page d'accueil quizzer</h2>
    <div class="grid">
        <div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div><div class="quiz"></div>
    </div>


    <?php   
        session_start();
        echo "Bienvenue " . $_SESSION['username'] . "<br>";
    
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
                while($row=$res->fetch_assoc()){
                    echo "<br>" . "Nom du quiz: " . $row["titre"];
                    echo " - Difficulté: " . $row["difficulte"];
                    echo " - Date de création: " . $row['date_creation'] . "<br>";
                }
            }else{
                echo " ";
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