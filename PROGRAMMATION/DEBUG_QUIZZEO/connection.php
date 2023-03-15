<!-- This page permit the connection of visitor -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/connection.css">
    <title>CONNEXION</title>
</head>
<body>

    <header>
        <div class="tete">
            <div class="logo">
                <a href="homepage.php"><img src="MEDIA/logo.png" alt="logo"></a>
            </div>
        </div>
    </header>

    <!-- Form POST method used to tranfer data to connection_status.php -->
    <form action="connection_status.php" method="post">
        <div class="presentation">
            <h1>CONNEXION</h1>
        </div>
        <div class="inscription">
            <div class="case">
                <label>Nom d'utilisateur :</label>
                <input type="text" name="username" required><br>
                <label>Mot de passe :</label>
                <input type="password" name="password" required><br>
            </div>
            <input type="submit" value="Se connecter" id="submit">
        </div>
    </form>



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