<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PANEL</title>
</head>
<body>
    <a href="admin_homepage.php"><img alt="logo"></a>
    <a href="disconnect.php"><input type="button" value="Se déconnecter"></a>
    <a href="admin_homepage.php"><input type="button" value="Page d'accueil"></a>
    <a href="admin_user_add.php"><input type="button" value="Ajouter utilisateur"></a>
    <a href="admin_quiz_add.php"><input type="button" value="Ajouter quiz"></a>
    <a href="admin_profile.php"><input type="button" value="Mon profil"></a>

    <h2>Page d'administration</h2>
    <?php   
        session_start();

            $server="localhost";
            $username="root";
            $password="root";
            $db="quizzeo";

            $conn = new mysqli($server,$username,$password,$db);

            if($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }
    
        echo "<h3>Quizz disponibles sur le site :</h3>";

        $req="SELECT * FROM quizz";
        $res=$conn->query($req);

        if($res->num_rows > 0){
            echo "<table>";
            echo "<tr><th>ID :</th><th>Nom du quiz :</th><th>Catégorie :</th><th>Difficulté :</th><th>Date de création :</th><th>Description :</th></tr>";
            while($row=$res->fetch_assoc()){
                echo "<tr>";
                echo "<td>" .$row['id'] . "</td>";
                echo "<td>". $row["titre"] . "</td>";
                echo "<td>". $row['categorie']  . "</td>";
                echo "<td>". $row["difficulte"] . "</td>";
                echo "<td>". $row['date_creation'] . "</td>";
                echo "<td>". $row['description'] . "</td>";
                echo "<td>" . " " . "<a href='admin_quiz_update.php?id=" . $row['id'] . "'>Modifier ce quiz</a>" . "</td>";
                echo "<td>" . " " . "<a href='admin_quiz_remove.php?id=" . $row['id'] . "'>Supprimer ce quiz</a><br>" . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo " ";
        }

    echo "<h3>Utilisateurs inscrits sur le site :</h3>";
    
    $req2="SELECT * FROM utilisateur";
    $res2=$conn->query($req2);

    if($res2->num_rows > 0){
        echo "<table>";
        echo "<tr><th>ID :</th><th>Nom :</th><th>Rôle :</th><th>Mail :</th></tr>";
        while($row2=$res2->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row2["id"] . "</td>";
            echo "<td>" . $row2["pseudo"] . "</td>";
            echo "<td>" . $row2["role"] . "</td>";
            echo "<td>" . $row2['email'] . "</td>";
            echo "<td>" . "<a href='admin_user_update.php?id=" .$row2["id"]. "'>Modifier cet utilisateur</a>" . "</td>";
            echo "<td>" . "<a href='admin_user_remove.php?id=" .$row2["id"]. "'>Supprimer cet utilisateur</a><br>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo " ";
    }
?>
</body>
</html>