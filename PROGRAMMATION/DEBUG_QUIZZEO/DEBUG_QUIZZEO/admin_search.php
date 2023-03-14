<!DOCTYPE html>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="admin_search.css">
        <title>Quizzeo - Espace administrateur </title>
        <link rel="shortcut icon" href="/MEDIA/logo_final.png">
    </head>

    <body>

        <header>
            <div class="tete">
                <div class="logo">
                    <img src="logo.png" alt="logo">
                </div>
                <div class="connect">

                    <a href="disconnect.php"><button class="subscribebtn" type="button" value="Se déconnecter" class="button_head">Se déconnecter</button></a>
                </div>
            </div>
        </header>

        <div class="button">
            <a href="admin_homepage.php"><button class="subscribebtn" type="button" value="Page d'accueil" class="button_head">Page d'accueil</button></a>
            <a href="admin_panel.php"><button class="subscribebtn" type="button" value="Panneau d'administration" class="button_ajout">Panneau d'administration</button></a>
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

    </body>
    
</html>