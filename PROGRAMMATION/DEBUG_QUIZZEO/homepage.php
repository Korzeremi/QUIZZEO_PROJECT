<!DOCTYPE html>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="homepage.css">
        <title>ACCUEIL QUIZZEO </title>
        <link rel="stylesheet" href="homepage.css">
    </head>

    <header>
        <navbar>
            <a href="homepage.php"><img src="MEDIA/logo_final.pngg" alt="logo"></a>
            <a href="subscription.php"><button>S'inscrire</button></a>
            <a href="connection.php"><button>Se connecter</button></a>
            <span class="mode_btn">
                <input type="checkbox" name="theme-mode">
                <span class="slider"></span>
            </span>
        </navbar>
        
    </header>

    <body>


        <form action="homepage_search.php" method="post">
            <input type="text" id="searchbar" name="searchbar">
            <input type="submit" value="Rechercher"></input>
        </form>

        <h2>Page d'accueil visiteur</h2>

        <?php
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
                    echo "<br>" . "Nom du quiz : " . $row["titre"];
                    echo " - Difficulté : " . $row["difficulte"];
                    echo " - Date de création : " . $row['date_creation'] . "<br>";
                }
            }else{
                echo " ";
            }
            
            $conn->close();
        ?>

        <script>
            function setDarkMode(Event){
            }
        </script>

    </body>
    
</html>