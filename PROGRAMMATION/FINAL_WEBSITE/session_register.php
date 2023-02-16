<!-- This page allows the user to validate his registration by transferring his data to the database -->

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
    <title>INSCRIPTION</title>
</head>

<body>
    
    <!-- Php -->
    <?php
        // Data verification and sending request to the database
        if(isset($_POST['subusername']) && isset($_POST['subusermail']))
        {
            $db = mysqli_connect('localhost', 'root','', 'quizzeo') or die('could not connect to database');
            $name = $_POST['subusername'];
            $mail = $_POST['subusermail'];
            $passwd = $_POST['subuserpasswd'];
            $userType = $_POST['subusertype'];
            $req = "INSERT INTO utilisateur(pseudo, email, password, role) VALUES ('$name','$mail','$passwd','$userType')";
            $res = $db->query($req);
            echo "Bonjour " . $_POST['subusername'] .", votre mail est : " . $_POST['subusermail'];
            echo "<br/> Votre type de profil est : " . $_POST["subusertype"];
        }
    ?>

    <form method="GET" action="visitor_homepage.php">
        <h1>Merci de votre inscription</h1>
        <input type="submit" class="btn" value="Déconnexion">
    </form>
    </body>
</html>