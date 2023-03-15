<!-- This page allows you to create questions and answers from the quiz -->
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

    if($_SESSION['type'] == 'administrator'){

    // Infos for db link
    $server="localhost";
    $username="root";
    $password="root";
    $db="quizzeo";

    // Db link
    $conn=new mysqli($server, $username, $password, $db);

    // Displaying quiz id and question number
    echo "quizID = " . $_SESSION['quizId'];
    echo "<br>ques = " .$_SESSION['ques'];
    // Storing them to session cookies
    $id = $_SESSION['quizId'];
    $qId = $_SESSION['ques'];
    $_SESSION['ques']++;

    // Receiving questions and answers infos from POST method
    $name = $_POST['questionTitle'];
    $qName1= $_POST['reponse1'];
    $qName2= $_POST['reponse2'];
    $qName3= $_POST['reponse3'];
    $qName4= $_POST['reponse4'];
    $answer = $_POST['answer'];

    // Sending question and each answers to db
    $req="INSERT INTO question(question_id,intituleQuestion,quiz_id,reponse) VALUES('$qId','$name','$id','$answer')";
    $req2="INSERT INTO reponse(quiz_id,question_id,intituleReponse,numeroReponse) VALUES('$id','$qId','$qName1','1')";
    $req3="INSERT INTO reponse(quiz_id,question_id,intituleReponse,numeroReponse) VALUES('$id','$qId','$qName2','2')";
    $req4="INSERT INTO reponse(quiz_id,question_id,intituleReponse,numeroReponse) VALUES('$id','$qId','$qName3','3')";
    $req5="INSERT INTO reponse(quiz_id,question_id,intituleReponse,numeroReponse) VALUES('$id','$qId','$qName4','4')";
    $res=$conn->query($req);
    $res2=$conn->query($req2);
    $res3=$conn->query($req3);
    $res4=$conn->query($req4);
    $res5=$conn->query($req5);

                echo '
                <form method="POST">
                    <h1>Questions - Réponses :</h1>
                    <div class="question">
                    <label>Intitulé de la question :</label> 
                    <input type="text" name="questionTitle"><br>
                    <label>Réponse 1</label>
                    <input type="text" name="reponse1"><br>
                    <label>Réponse 2</label>
                    <input type="text" name="reponse2"><br>
                    <label>Réponse 3</label>
                    <input type="text" name="reponse3"><br>
                    <label>Réponse 4</label>
                    <input type="text" name="reponse4"><br>
                    <label>Numéro de la réponse correcte</label>
                    <input name="answer" type="number" min=1 max=4 required><br>
                    </div>
                    <a href="quiz_create.php"><input type="submit" value="Enregitrer la question"/></a>
                    <a href="admin_homepage.php"><input type="button" value="Quitter la création quiz"/></a>
                </form>';
                    

    } elseif($_SESSION['type'] == 'quizzer'){
        // Infos for db link
    $server="localhost";
    $username="root";
    $password="root";
    $db="quizzeo";

    // Db link
    $conn=new mysqli($server, $username, $password, $db);

    // Displaying quiz id and question number
    echo "quizID = " . $_SESSION['quizId'];
    echo "<br>ques = " .$_SESSION['ques'];
    // Storing them to session cookies
    $id = $_SESSION['quizId'];
    $qId = $_SESSION['ques'];
    $_SESSION['ques']++;

    // Receiving questions and answers infos from POST method
    $name = $_POST['questionTitle'];
    $qName1= $_POST['reponse1'];
    $qName2= $_POST['reponse2'];
    $qName3= $_POST['reponse3'];
    $qName4= $_POST['reponse4'];
    $answer = $_POST['answer'];

    // Sending question and each answers to db
    $req="INSERT INTO question(question_id,intituleQuestion,quiz_id,reponse) VALUES('$qId','$name','$id','$answer')";
    $req2="INSERT INTO reponse(quiz_id,question_id,intituleReponse,numeroReponse) VALUES('$id','$qId','$qName1','1')";
    $req3="INSERT INTO reponse(quiz_id,question_id,intituleReponse,numeroReponse) VALUES('$id','$qId','$qName2','2')";
    $req4="INSERT INTO reponse(quiz_id,question_id,intituleReponse,numeroReponse) VALUES('$id','$qId','$qName3','3')";
    $req5="INSERT INTO reponse(quiz_id,question_id,intituleReponse,numeroReponse) VALUES('$id','$qId','$qName4','4')";
    $res=$conn->query($req);
    $res2=$conn->query($req2);
    $res3=$conn->query($req3);
    $res4=$conn->query($req4);
    $res5=$conn->query($req5);

                echo '
                <form method="POST">
                    <h1>Questions - Réponses :</h1>
                    <div class="question">
                    <label>Intitulé de la question :</label> 
                    <input type="text" name="questionTitle"><br>
                    <label>Réponse 1</label>
                    <input type="text" name="reponse1"><br>
                    <label>Réponse 2</label>
                    <input type="text" name="reponse2"><br>
                    <label>Réponse 3</label>
                    <input type="text" name="reponse3"><br>
                    <label>Réponse 4</label>
                    <input type="text" name="reponse4"><br>
                    <label>Numéro de la réponse correcte</label>
                    <input name="answer" type="number" min=1 max=4 required><br>
                    </div>
                    <a href="quiz_create.php"><input type="submit" value="Enregitrer la question"/></a>
                    <a href="quizzer_homepage.php"><input type="button" value="Quitter la création quiz"/></a>
                </form>';
    }
        ?>
</body>
</html>