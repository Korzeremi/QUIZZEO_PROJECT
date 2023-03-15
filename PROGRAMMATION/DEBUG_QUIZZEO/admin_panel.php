<!-- This page is the site administration panel for administrators -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admin_panel.css">
    <title>PANNEAU ADMIN</title>
</head>
   
    <?php   
        // Call for session cookies containing important information, including the type of user
        session_start();

        // If the connnected if administrator, give access to page
        if($_SESSION['type'] == 'administrator'){

            echo '
            <body>
            <header>
            <div class="tete">
                <div class="logo">
                    <a href="admin_homepage.php"><img src="MEDIA/logo.png" alt="logo"></a>
                </div>
                <div class="connect_btn">
                    <div class="connect">
                        <a href="disconnect.php"><input type="button" value="Se déconnecter" class="button_head"></a>
                        <a href="admin_homepage.php"><input type="button" value="Page d accueil" class="button_head"></a>
                    </div>
                </div>
            </div>
            </header>

            <div class="button">
                <a href="admin_user_add.php"><input type="button" value="Ajouter utilisateur" class="button_ajout"></a>
                <a href="quiz_add.php"><input type="button" value="Ajouter quiz" class="button_ajout"></a>
                <a href="admin_profile.php"><input type="button" value="Mon profil" class="button_ajout"></a>
            </div>

            <h2>Page d administration</h2>';

            // Informations for db connection
            $server="localhost";
            $username="root";
            $password="root";
            $db="quizzeo";

            // Link to db thanks to mysqli method
            $conn = new mysqli($server,$username,$password,$db);

            // If connection failed, displaying error message
            if($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }
    
            // Showing available quiz on website
            echo "<h3>Quizz disponibles sur le site :</h3>";
            $req="SELECT * FROM quizz";
            $res=$conn->query($req);

            // If quiz exists on website, display them
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

            // Showing users of the website from db
            echo "<h3>Utilisateurs inscrits sur le site :</h3>";
            $req2="SELECT * FROM utilisateur";
            $res2=$conn->query($req2);

            // If users exists, displaying them 
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
        }else{
            Header("Location: error.html");
        }
?>

<!-- 
<script>
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