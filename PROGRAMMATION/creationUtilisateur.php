<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création</title>

    <link rel="stylesheet" href="creationUtilisateur.css">

</head>
    <header>
        <div class="logo">
            <img src="" alt="logo de quiz">
        </div>
        
        <div class="titre">
            <h1>Bienvenue</h1>
        </div>
    </header>
<body>
    <div class="message">
        <p class="message2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt deserunt deleniti quibusdam magni unde suscipit, iure repellendus ad cupiditate quasi quas vel neque eius recusandae distinctio vitae! Repellendus, ullam sed!</p>
    </div>

    <div class="option">
        <label for="" class="choix">Choississez votre mode d'utilisation : </label>
        <select>
            <option value="default">défault</option>
            <option value="user">user</option>
            <option value="quizzeur">quizzeur</option>
        </select>
    </div>

    <div class="name">
        <h2 class="name2">Entrez votre pseudo : </h2>
        <input type="text" class="name3">
    </div>

    <div class="mdp">
        <h2 class="mdp2">entrez votre mot de passe : </h2>
        <input type="text" class="mdp3">
    </div>

    <div class="confirmation">
        <button type="submit" style="height: 50px; width: 150px;" class="confirmation2">Confirmer</button>
    </div>

    <?php
    try 
    {    
        $quezzoDB = new PDO('mysql:host=localhost;dbname=db_quezzo_1;charset=utf8','root','root')
    }

    $userQuery = 'SELECT * FROM utilisateur';
    $userStatement = $quezzoDB->prepare($userQuery);
    $userStatement->execute();
    $user = $userStatement->fetchAll();
    ?>
    
</body>
</html>