<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
    <title>INSCRIT !</title>
</head>
<body>
    <form method="GET" action="menu_final.php">
        <h1>Merci de votre inscription</h1>
    <input type="submit" class="btn" value="Déconnexion">
    </form>
</body>
</html>
<?php
if(isset($_POST['subusername']) && isset($_POST['subusermail']))
{
 $db = mysqli_connect('localhost', 'root','', 'quizzeo') or die('could not connect to database');
 $name = $_POST['subusername'];
 $mail = $_POST['subusermail'];
 $passwd = $_POST['subuserpasswd'];
 $userType = $_POST['subusertype'];
 $req = "INSERT INTO utilisateur(pseudo, email, password, role) VALUES ('$name','$mail','$passwd','$userType')";
//  $req = "DELETE FROM quezzeo WHERE nom='TEST'";
//  $req2 = "DELETE FROM quezzeo WHERE prenom='TEST'";
 $res = $db->query($req);
//  $res2 = $db->query($req2);
 echo "Bonjour " . $_POST['subusername'] .", votre mail est : " . $_POST['subusermail'];
 echo "<br/> Votre type de profil est : " . $_POST["subusertype"];
}
?>