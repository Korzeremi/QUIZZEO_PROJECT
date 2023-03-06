<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZZEO</title>
</head>
<body>
    <a href="user_homepage.php"><img alt="logo"></a>
    <a href="disconnect.php"><input type="button" value="Se déconnecter"></a>
    <a href="user_profile.php"><input type="button" value="Mon profil"></a> 
    
    <form action="user_search.php" method="post">
            <input type="text" id="searchbar" name="searchbar">
            <input type="submit" value="Rechercher"></input>
    </form>

    <h2>Page d'accueil utilisateur</h2>

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
</body>
</html>