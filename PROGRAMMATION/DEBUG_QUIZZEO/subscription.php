<!-- This page allows a visitor to register -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/subscription.css">
    <title>INSCRIPTION</title>
</head>
    <body>
        <header>
            <div class="tete">
                <div class="logo">
                    <a href="homepage.php"><img src="MEDIA/logo.png" alt="logo"></a>
                </div>
            </div>
        </header>


    <!-- // form POST method to send data to subscription_status.php -->
    <form action="subscription_status.php" method="post">
        <div class="presentation">
            <h1>INSCRIPTION</h1>
        </div>

        <div class="inscription">
            <div class="case">
                <label>Mail :</label>
                <input type="text" name="mail" required><br>
                <label>Nom d'utilisateur :</label>
                <input type="text" name="username" required><br>
                <label>Mot de passe :</label>
                <input type="password" name="password" required><br>
                <label>Type :</label>
        
                <select name="type" required>
                    <option name="type" value="">aucun rôle </option>
                    <!-- <option name="type" value="administrator">Administrateur</option> -->
                    <option name="type" value="user">Utilisateur</option>
                    <option name="type" value="quizzer">Quizzeur</option>
                </select><br>
            </div>
            
            <input type="submit" id="submit">
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