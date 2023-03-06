<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION</title>
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
<br><a href="connection.php"><input type="button" value="Retour à la page de connexion"></a>
</body>
</html>