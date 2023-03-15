<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/subscription_status.css">
    <title>INSCRIPTION</title>
</head>
<body>

    <header>
        <section class="tete">
            <!-- <h1>QUIZZEO</h1> -->
            <div class="logo">
                <img src="MEDIA/logo.png" alt="logo">
            </div>
        </section>

    </header>

<?php
    // infos for db link
    $server="localhost";
    $username="root";
    $password="root";
    $db="quizzeo";
    // db link
    $conn=new mysqli($server,$username,$password,$db);
    // if link failed,
    if($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    // receiving data from subscription.php thanks to POST form method
    $username=$_POST['username'];
    $mail=$_POST['mail'];
    $password=$_POST['password'];
    $type=$_POST['type'];

    // request to aff user to db
    $req="INSERT INTO utilisateur(pseudo, email, password, role) VALUES ('$username','$mail','$password','$type')";
    $res=$conn->query($req);
    echo "L'utilisateur " . $_POST['username'] . " a bien été inscrit !";
    echo "<br> Merci de vous connecter pour valider l'inscription !<br>";
    $conn->close();
?>

<div class="button">
    <a href="homepage.php"><input type="button" value="Retourner à l'accueil" class="button_ajout"></a>
</div>

<!-- <script>
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
</script>  -->

</body>
</html>