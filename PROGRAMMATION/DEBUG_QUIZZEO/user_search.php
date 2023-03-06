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
            $server="localhost";
            $username="root";
            $password="root";
            $db="quizzeo";

            $conn = new mysqli($server,$username,$password,$db);

            if($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }

            if(isset($_POST['searchbar'])){
                $search=$_POST['searchbar'];
            }

            $req="SELECT * FROM quizz WHERE titre LIKE '%$search%'";
            $res=$conn->query($req);

            if($res->num_rows > 0){
                while($row=$res->fetch_assoc()){
                    echo "Nom du quiz: " . $row["titre"];
                    echo " - Difficulté: " . $row["difficulte"];
                    echo " - Date de création: " . $row['date_creation'] . "<br>";
                }
            }else{
                echo "Aucun quiz trouvé.";
            }
            
            $conn->close();
        ?>

        <script>
            function setDarkMode(Event){
            }
        </script>

    </body>
    
</html>