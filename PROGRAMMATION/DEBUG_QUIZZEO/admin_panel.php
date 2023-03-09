<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_panel.css">
    <title>ADMIN PANEL</title>
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
                    <a href="admin_homepage.php"><input type="button" value="Page d'accueil" class="button_head"></a>
                </div>
                <div class="mode_btn">
                    <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
                <!-- <input type="checkbox" name="theme-mode" class="checkbox"> -->
                </div>
            </div>
        </div>
    </header>

    <div class="button">
        <a href="admin_user_add.php"><input type="button" value="Ajouter utilisateur" class="button_ajout"></a>
        <a href="admin_quiz_add.php"><input type="button" value="Ajouter quiz" class="button_ajout"></a>
        <a href="admin_profile.php"><input type="button" value="Mon profil" class="button_ajout"></a>
    </div>

    <h2>Page d'administration</h2>
    
    <!-- <?php   
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
?> -->


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
});
</script>  
</body>
</html>