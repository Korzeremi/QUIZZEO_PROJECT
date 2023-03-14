<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
        $server="localhost";
        $username="root";
        $password="root";
        $db="quizzeo";

        $conn=new mysqli($server, $username, $password, $db);

        if($conn->connect_error){
            echo "Erreur de connexion à la base de données : " . $conn->connect_error;
        }

        $quizName=$_POST['quizname'];
        $quizCat=$_POST['categorie'];
        $quizDif=$_POST['difficulty'];
        $quizDescr=$_POST['description'];
        $quizDate=$_POST['date'];

        $_SESSION['qName'] = $quizName;
        $_SESSION['qCat'] = $quizCat;
        $_SESSION['qDif'] = $quizDif;
        $_SESSION['qDes'] = $quizDescr;
        
        $req="INSERT INTO quizz(titre,categorie,difficulte,date_creation,description) VALUES('$quizName','$quizCat','$quizDif','$quizDate','$quizDescr')";
        $res=$conn->query($req);

        $req2="SELECT id FROM quizz WHERE titre='$quizName'";
        echo "quizName = " .$quizName;
        $res2=$conn->query($req2);
        $row2=mysqli_fetch_assoc($res2);
        $quizId=$row2['id'];
        $_SESSION['quizId']=$quizId;
        $_SESSION['ques'] = 0;

        sleep(0.8);
        Header("Location: quiz_create.php");

        // echo '
        //     <form method="POST">
                
        //     </form>
        // ';
    ?>
</body>
</html>