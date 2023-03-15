<!-- This page permit visitor to disconnect -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DECONNEXION</title>
</head>
<?php
    // Starting session cookies
    session_start();
    // Destroying actual session cookies
    session_destroy();
    // Redirecting to homepage.php
    header('location: homepage.php');
?>
</html>