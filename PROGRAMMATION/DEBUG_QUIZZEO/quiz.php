<!-- This page is the page that allows users to play -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/quiz.css">
    <title>JEU</title>
</head>
<body>
<header>
        <section class="tete">
            <!-- <h1>QUIZZEO</h1> -->
            <div class="logo">
                <img src="MEDIA/logo.png" alt="logo">
            </div>
        </section>

    </header>

<?php
    
    // Calling session cookies
    session_start();
    // Infos for db links
    $server="localhost";
    $username="root";
    $password="root";
    $db="quizzeo";

    // Db link
    $conn=new mysqli($server, $username, $password, $db);

    // Getting quiz_id from homepage thanks to GET method
    $qId = $_GET['id'];

    // Sending request to receive all questions and answers of selected quiz
    $req="SELECT * from quizz WHERE id = '$qId'";
    $req2="SELECT * from question WHERE quiz_id = '$qId'";
    $res=$conn->query($req);
    $res2=$conn->query($req2);
    $row=$res->fetch_assoc();

    // Displaying quiz infos
    echo "<h3>Quiz : " . $row['titre'] . ", " . $row['categorie'] . "<br>Difficulté : " . $row['difficulte'] . "<br>Description : " . $row['description'] . "</h3>";
    // Storing answers and questions to two arrays
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


    // Encode arrays with json to use PHP arrays in JS
    $jsonDataQuestions = json_encode($dataQuestions);
    $jsonDataReponses = json_encode($dataReponses);

    ?>

    <!-- JAVASCRIPT -->
    <script>

        // Declaring all variables
        var queArray = <?php echo $jsonDataQuestions; ?>; // PHP questions arrays 
        var repArray = <?php echo $jsonDataReponses; ?>; // PHP answers arrays

        var usrArray = []; // user array (user choices)

        var currentQuestion = 0; // currentQuestion Index to determine question position in array
        var questionNb = 1; // questionNb variable to display to user the question number

        // var correctAnswerTxt = "test";

        var trueNb = 0; // score of true answers by user
        
        let questionsNB = queArray.length; // number of questions in the quiz
        // console.log(questionsNB);
        
        //getNextQuestion function that verifying answer, quiz state and going to the next question
        function getNextQuestion(currentQuestion) {
            currentQuestion++;
            questionNb++;

            var correctAnswer = queArray[currentQuestion - 1]['reponse']; // current correctAnswer
            var usrAnswer = usrArray[currentQuestion - 1]; // current user answer selected

            if(usrAnswer == correctAnswer) { // if user answer correct
                trueNb++;
                alert("Réponse correcte ! +1 point");
            }else{
                alert("Réponse incorrecte !");
            }

            // If we answered all the questions
            if (currentQuestion >= queArray.length) {
                alert("Fin du quiz ! Score = " + trueNb + "pts / " + questionsNB); // showing score
                document.location.href="homepage.php"; // redirection
                return;
            }

            showQuestion(currentQuestion); // showing next question
        }
      
        // showQuestion function displaying question
        function showQuestion(currentQuestion) {
            // console.log(trueNb);
            var div = document.createElement("div"); // creation of div
            div.className = "quiz";
            document.body.appendChild(div); // adding div to body
            var questionElem = document.createElement('h2'); 
            var question = queArray[currentQuestion]['intituleQuestion']; // question value (txt)
            questionElem.innerHTML = "Question " + questionNb + " : " + question; // adding h2 question with question variable value
            div.appendChild(questionElem); // adding the question to the div
            var answers = queArray[currentQuestion]['reponse']; // answer value (txt)
            v = 1; // v is answer value used in verification
            for (var j = 0; j < repArray.length; j++) { // for answers numbers
                if(queArray[currentQuestion]['question_id'] == repArray[j]['question_id']){ // if answers corresponds to current quiz id
                    var answerElem = document.createElement('input'); // create input radio
                    answerElem.type = 'radio';
                    answerElem.name = 'question' + queArray[currentQuestion]['question_id']; 
                    answerElem.value = v; // Value for answer
                    answerElem.onclick = function() { // when user clicks, adding current value to user Array
                        usrArray.push(this.value);
                    }
                    var labelElem = document.createElement('label'); // showing label (txt)
                    labelElem.innerHTML = repArray[j]['intituleReponse']; 
                    //adding them to the div
                    div.appendChild(answerElem);
                    div.appendChild(labelElem);
                    div.appendChild(document.createElement('br'));
                    v++; //+1 v
            }
}

            // Add a validation button for this question
            var validateBtn = document.createElement('button');
            validateBtn.innerHTML = "Valider";
            validateBtn.onclick = function() {
                div.remove();
                getNextQuestion(currentQuestion);
            };
            div.appendChild(validateBtn);
        }

        // Showing the first question
        showQuestion(currentQuestion);

    </script>

</body>
</html>