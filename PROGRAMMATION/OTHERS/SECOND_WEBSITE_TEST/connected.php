<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="account.css" media="screen" type="text/css" />
    <title>CONNECTÉ !</title>
</head>
<body>
    <form method="GET" action="menu_final.php">
    <input type="submit" class="btn" value="Déconnexion">
    </form>
</body>
</html>
<?php
if(isset($_POST['logusername']) && isset($_POST['loguserpasswd']))
{
 $db = mysqli_connect('localhost', 'root','', 'quizzeo') or die('could not connect to database');
 $name = $_POST['logusername'];
 $passwd = $_POST['loguserpasswd'];
 $req = "SELECT COUNT(*) FROM utilisateur WHERE pseudo='$name'";
 $res = $db->query($req);   
 
}
?>