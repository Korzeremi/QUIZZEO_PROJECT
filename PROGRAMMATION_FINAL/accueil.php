<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil QUIZZEO</title>
    <link rel="stylesheet" href="accueil.css">
</head>
<header>
    <div class="logo">
        <img src="" alt="logo de quiz">
    </div>

    <div class="titre">
        <h1 class="titre2">QUIZZEO</h1>
    </div>

    <!-- <div class="button">
        <button for="themeSwitch" id="themeLogo" style="width: 100px; height: 100px;">
            <img for="themeSwitch" src="moon.png" alt="moon" id="themeLogo"> Dark Mode
        </button>
    </div> -->

    <div class="button">
        <button for="themeSwitch" id="themeLogo">&#9789;</button>
    </div>

</header>
<body>
    <div class="quiz">
        <h2 class="quiz2">QUIZ</h2>
    </div>

    <div class="creation">
        <h2 class="creation2">Création QUIZZEO</h2>
    </div>

    <div class="info">
        <h2 class="pseudo">Pseudo : </h2>
        <h2 class="lvl">LVL : </h2>
    </div>


    <script>
        const html = document.getElementsByTagName("html")[0];
        const themeSwicth = document.getElementById("themeLogo");
        themeSwicth.addEventListener("click", () => {
        html.classList.toggle("nuit");
        if (html.classList.contains("nuit")) {
            themeSwicth.innerHTML = "&#9788;";
        } else {
            themeSwicth.innerHTML = "&#9789;";
        }
    });
    </script>   
    
</body>
</html>