# PHP  
- ?php  
- $connexion = mysqli_connect('localhost','root','','quezzeo'); 
    - Permet de relier le PHP à la base de données.
- $req = "DELETE FROM utilisateur WHERE pseudo='TATATATATA'";
    - Permet de créer une requête qui va supprimer un élément du tableau utilisateur.
- $req = "INSERT INTO utilisateur(pseudo) VALUES ('TATATATATA')";
    - Permet de créer une requête qui va insérer une valeur dans le tableau utilisateur et la colonne pseudo.
- $res = $connexion->query($req);
    - Permet d'envoyer la requête à la base de données.