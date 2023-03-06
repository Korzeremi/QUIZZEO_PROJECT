<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZZEO</title>
</head>
<body>
    <navbar>
        <a href="admin_homepage.php"><img alt="logo"></a>
        <a href="disconnect.php"><input type="button" value="Se déconnecter"></a>
        <a href="admin_panel.php"><input type="button" value="Panneau d'administration"></a>
        <a href="admin_profile.php"><input type="button" value="Mon profil"></a>
        <span class="mode_btn">
                <input type="checkbox" name="theme-mode">
                <span class="slider"></span>
        </span>
    </navbar>
    
    <form action="admin_search.php" method="post">
            <input type="text" id="searchbar" name="searchbar">
            <input type="submit" value="Rechercher"></input>
    </form>

    <h2>Page d'accueil administrateur</h2>
    <?php   
        session_start();
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
            while($row1=$res1->fetch_assoc()){
                echo "<br>Nom du quiz: " . $row1["titre"];
                echo " - Difficulté: " . $row1["difficulte"];
                echo " - Date de création: " . $row1['date_creation'] . "<br>";
            }
        }else{
            echo " ";
        }
    ?>
</body>
</html>