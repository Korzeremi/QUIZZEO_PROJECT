<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connection_status.css">
    <title>CONNEXION</title>
</head>
<body>

    <header>
        <section class="tete">
            <!-- <h1>QUIZZEO</h1> -->
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <!-- <div class="mode_btn">
                        <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
                    <input type="checkbox" name="theme-mode" class="checkbox">
            </div> -->
            </div>
        </section>

    </header>

    <div class="button">
        <a href="admin_homepage.php"><button class="subscribebtn" type="button" value="Page d'accueil" class="button_head">Page d'accueil</button></a>
    </div>
    
<div class="php">
    <div class="php2">
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
    $password=$_POST['password'];

    $req="SELECT * FROM utilisateur WHERE pseudo='$username' AND password='$password'";
    $req2="SELECT role FROM utilisateur WHERE pseudo='$username'";
    $req3="SELECT email FROM utilisateur WHERE pseudo='$username'";
    $res=$conn->query($req);
    $res2=$conn->query($req2);
    $res3=$conn->query($req3);

    if($row = mysqli_fetch_assoc($res2)){
        $usertype=$row['role'];
    }

    if($row3 = mysqli_fetch_assoc($res3)){
        $email=$row3['email'];
    }

    if(mysqli_num_rows($res) == 1){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['type'] = $usertype;
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
        }else{
            header('Location: connection.php');
        }
    }else{
        echo "Utilisateur ou mot de passe incorrect !";
    }
    $conn->close();
?>
    </div>
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