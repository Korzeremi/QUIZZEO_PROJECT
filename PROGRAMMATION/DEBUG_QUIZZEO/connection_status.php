<!-- This page allows the requests to connect -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/connection_status.css">
    <title>CONNEXION</title>
</head>
<body>

    <header>
        <section class="tete">
            <!-- <h1>QUIZZEO</h1> -->
            <div class="logo">
                <img src="MEDIA/logo.png" alt="logo">
            </div>
            </div>
        </section>

    </header>
    
<?php
    // Infos for db link
    $server="localhost";
    $username="root";
    $password="root";
    $db="quizzeo";
    // Link to db
    $conn=new mysqli($server,$username,$password,$db);
    // If link failed, show error messages
    if($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    // Getting infos from connection.php with get form method
    $username=$_POST['username'];
    $password=$_POST['password'];

    // Sending request to db if pseudo AND password correspond and exist
    $req="SELECT * FROM utilisateur WHERE pseudo='$username' AND password='$password'";
    $req2="SELECT role FROM utilisateur WHERE pseudo='$username'";
    $req3="SELECT email FROM utilisateur WHERE pseudo='$username'";
    $res=$conn->query($req);
    $res2=$conn->query($req2);
    $res3=$conn->query($req3);

    // Attributing the role to the userType which will be a session cookie
    if($row = mysqli_fetch_assoc($res2)){
        $usertype=$row['role'];
    }

    // Attributing the email to email which will be a session cookie
    if($row3 = mysqli_fetch_assoc($res3)){
        $email=$row3['email'];
    }

    // If result of request is TRUE
    if(mysqli_num_rows($res) == 1){
        // start session cookies
        session_start();
        // Attributing value to session cookies to reuse them
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['type'] = $usertype;
        // Redirection of visitor thanks to their user type 
        if(session_status() == PHP_SESSION_ACTIVE) {
            if($usertype == "user"){
                header('Location: user_homepage.php');
            }elseif($usertype == "quizzer"){
                header('Location: quizzer_homepage.php');
            }elseif($usertype == "administrator"){
                header('Location: admin_homepage.php');
            }else{
                header('Location: error.php');
            }
        }else{ // If not valid type, retry
            header('Location: connection.php');
        }
    }else{ // If not correct,
        echo "Utilisateur ou mot de passe incorrect !";
    }
    $conn->close();
?>


<div class="button">
    <br><a href="connection.php"><input type="button" value="Retour à la page de connexion"></a>
</div>
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
});
</script>  -->

</body>
</html>