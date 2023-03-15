<!-- This page allows you to make the requests to create the quiz -->
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
        // Starting session cookies
        session_start();

        // Infos for db link
        $server="localhost";
        $username="root";
        $password="root";
        $db="quizzeo";

        // Link to db
        $conn=new mysqli($server, $username, $password, $db);

        // If link failed, display error
        if($conn->connect_error){
            echo "Erreur de connexion à la base de données : " . $conn->connect_error;
        }

        // Receiving data from quiz_add.php thanks to POST method
        $quizName=$_POST['quizname'];
        $quizCat=$_POST['categorie'];
        $quizDif=$_POST['difficulty'];
        $quizDescr=$_POST['description'];
        // $quizDate=$_POST['date'];

        // Storing quiz infos into session cookies
        $_SESSION['qName'] = $quizName;
        $_SESSION['qCat'] = $quizCat;
        $_SESSION['qDif'] = $quizDif;
        $_SESSION['qDes'] = $quizDescr;
        
        // Sending request to db to create a new quiz
        $req="INSERT INTO quizz(titre,categorie,difficulte,description) VALUES('$quizName','$quizCat','$quizDif','$quizDescr')";
        $res=$conn->query($req);

        // Displaying id and ques
        $req2="SELECT id FROM quizz WHERE titre='$quizName'";
        echo "quizName = " .$quizName;
        $res2=$conn->query($req2);
        $row2=mysqli_fetch_assoc($res2);
        $quizId=$row2['id'];
        $_SESSION['quizId']=$quizId;
        $_SESSION['ques'] = 0;

        sleep(0.8);

        // redirection
        Header("Location: quiz_create.php");

        // echo '
        //     <form method="POST">
                
        //     </form>
        // ';
    ?>
</body>
</html>