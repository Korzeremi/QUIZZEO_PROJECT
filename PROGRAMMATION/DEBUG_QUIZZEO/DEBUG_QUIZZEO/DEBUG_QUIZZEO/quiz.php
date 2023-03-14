<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="quiz.css">
    <title>Document</title>
</head>
<body>
<header>
        <section class="tete">
            <!-- <h1>QUIZZEO</h1> -->
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <div class="connect_btn">
                <div class="connect">
                    <a href="subscription.php" ><button class="subscribebtn">s'inscrire</button></a>
                    <a href="connection.php"><button class="subscribebtn">Se connecter</button></a>
                </div>
                <!-- <div class="mode_btn">
                        <button for="themeSwitch" id="themeLogo" style="font-size: 90px;"><h3>DARK</h3></button>
                    <input type="checkbox" name="theme-mode" class="checkbox">
                </div>
            </div> -->
        </section>

    </header>
<?php
    session_start();
    $server="localhost";
    $username="root";
    $password="root";
    $db="quizzeo";

    $conn=new mysqli($server, $username, $password, $db);

    $qId = $_GET['id'];

    $req="SELECT * from quizz WHERE id = '$qId'";
    $req2="SELECT * from question WHERE quiz_id = '$qId'";
    $res=$conn->query($req);
    $res2=$conn->query($req2);
    $row=$res->fetch_assoc();

    echo "Nom du quiz = " . $row['titre'] . "<br>Catégorie = " . $row['categorie'] . "<br>Difficulté = " . $row['difficulte'] . "<br>Description = " . $row['description'];
    $dataQuestions = array();
    while($row2=$res2->fetch_assoc()){
        $question_id = $row2['question_id'];
        $req3="SELECT * from reponse WHERE quiz_id = '$qId' AND question_id = '$question_id'";
        $res3=$conn->query($req3);
        $data1 = array();
        while($row3=$res3->fetch_assoc()){
            $dataReponses[] = array(
                "intituleReponse" => $row3['intituleReponse'],
                "question_id" => $row3['question_id'],
                "numeroReponse" => $row3['numeroReponse']
            );
        }
        $dataQuestions[] = array(
            "intituleQuestion" => $row2['intituleQuestion'],
            "question_id" => $row2['question_id'],
            "reponse" => $row2['reponse'],
        );
    }
    // echo "<br>";
    // print_r($dataQuestions);
    // echo "------------------------";
    // print_r($dataReponses);

    $jsonDataQuestions = json_encode($dataQuestions);
    $jsonDataReponses = json_encode($dataReponses);

    ?>

    <script>
        var queArray = <?php echo $jsonDataQuestions; ?>;
        var repArray = <?php echo $jsonDataReponses; ?>;

        var usrArray = [];

        var currentQuestion = 0;
        var questionNb = 1;

        var score; //100 / nb de questions * nb de bonnes réponses
        var trueNb = 0;
        
        let questionsNB = queArray.length;
        // console.log(questionsNB);
        
        function getNextQuestion(currentQuestion) {
            currentQuestion++;
            questionNb++;

            var correctAnswer = queArray[currentQuestion - 1]['reponse'];
            var usrAnswer = usrArray[currentQuestion - 1];
            console.log(correctAnswer);
            console.log(usrAnswer);

            if(usrAnswer !== correctAnswer) {
                trueNb++;
            }

            // Si on a répondu à toutes les questions
            if (currentQuestion >= queArray.length) {
                score += trueNb;
                alert("Fin du quiz ! Score = " + score + "pts");
                document.location.href="admin_homepage.php";
                return;
            }

            showQuestion(currentQuestion);
        }
      
        function showQuestion(currentQuestion) {
            // console.log(trueNb);
            var div = document.createElement("div");
            div.className = "quiz";
            document.body.appendChild(div);
            var questionElem = document.createElement('h2');
            var question = queArray[currentQuestion]['intituleQuestion'];
            questionElem.innerHTML = "Question " + questionNb + " : " + question;
            div.appendChild(questionElem);
            var answers = queArray[currentQuestion]['reponse'];
            v = 1;
            for (var j = 0; j < repArray.length; j++) {
                if(queArray[currentQuestion]['question_id'] == repArray[j]['question_id']){
                    var answerElem = document.createElement('input');
                    answerElem.type = 'radio';
                    answerElem.name = 'question' + queArray[currentQuestion]['question_id'];
                    answerElem.value = v;
                    var labelElem = document.createElement('label');
                    labelElem.innerHTML = repArray[j]['intituleReponse'];
                    answerElem.onclick = function() {
                        usrArray = [this.value];
                    }
                    div.appendChild(answerElem);
                    div.appendChild(labelElem);
                    div.appendChild(document.createElement('br'));
                    v++;
            }
}

            // Ajoute un bouton de validation pour cette question
            var validateBtn = document.createElement('button');
            validateBtn.innerHTML = "Valider";
            validateBtn.onclick = function() {
                div.remove();
                getNextQuestion(currentQuestion);
            };
            div.appendChild(validateBtn);
        }

        // Affiche la première question
        showQuestion(currentQuestion);

    </script>

</body>
</html>