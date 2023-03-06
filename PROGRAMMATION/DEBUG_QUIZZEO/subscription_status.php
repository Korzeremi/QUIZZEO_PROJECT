<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
</head>
<body>
<?php
    $server="localhost";
    $username="root";
    $password="root";
    $db="quizzeo";

    $conn=new mysqli($server,$username,$password,$db);

    if($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    $username=$_POST['username'];
    $mail=$_POST['mail'];
    $password=$_POST['password'];
    $type=$_POST['type'];

    $req="INSERT INTO utilisateur(pseudo, email, password, role) VALUES ('$username','$mail','$password','$type')";
    $res=$conn->query($req);
    echo "L'utilisateur " . $_POST['username'] . " a bien été inscrit !";
    echo "<br> Merci de vous connecter pour valider l'inscription !<br>";
    $conn->close();
?>
<a href="homepage.php"><input type="button" value="Retourner à l'accueil"></a>
</body>
</html>