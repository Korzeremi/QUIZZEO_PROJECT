<!-- This page allows the modification of the quizs -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/admin_quiz_update.css" media="screen" type="text/css" />
    <title>ERROR</title>
</head>
<body>
    <h2>Cette page est en construction</h2>
    <img src='MEDIA/construct.gif'><br>
    <a href="admin_panel.php"><input type='button' value='Panneau d administration' class='button_ajout'></a>

</body>
</html>

    <!-- // PHP PART
    // session_start();
    // $server="localhost";
    // $username="root";
    // $password="root";
    // $db="quizzeo";

    // $conn=new mysqli($server, $username, $password, $db);

    // $qId = $_GET['id'];

    // $req="SELECT * from quizz WHERE id = '$qId'";
    // $req2="SELECT * from question WHERE quiz_id = '$qId'";
    // $res=$conn->query($req);
    // $res2=$conn->query($req2);
    // $row=$res->fetch_assoc();

    // echo "Nom du quiz = " . $row['titre'] . "<br>Catégorie = " . $row['categorie'] . "<br>Difficulté = " . $row['difficulte'] . "<br>Description = " . $row['description'];
    // while($row2=$res2->fetch_assoc()){
    //     $question_id = $row2['question_id'];
    //     $req3="SELECT * from reponse WHERE quiz_id = '$qId' AND question_id = '$question_id'";
    //     $res3=$conn->query($req3);
    //     echo "<table>";
    //     echo "<tr><th>Questions :</th><th>Réponses :</th></tr>";
    //     echo "<tr>";
    //     echo "<td>" . $row2['intituleQuestion'] . "</td>";
    //     $i = 0;
    //     while($row3=$res3->fetch_assoc()){
    //         $i++;
    //         echo "<td>N°" . $i . " : " . $row3['intituleReponse'] . "<br></td>";
            
    //     }
    //     echo "</tr>";
    //     echo "</table>";
    // }

    // // -->