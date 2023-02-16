const startButton = document.getElementById('start-btn')
const nextButton = document.getElementById('next-btn')
const questionContainerElement = document.getElementById('question-container')
const questionElement = document.getElementById('question')
const answerButtonElement = document.getElementById('answer-buttons')

let shuffledQuestions, CurrentQuestionIndex

startButton.addEventListener('click', startGame)
nextButton.addEventListener('click', () => {
    CurrentQuestionIndex++
    setNextQuestion()
})

function startGame() {
    console.log('oui')
    startButton.classList.add('hide') // when we click on button start he hidenn
    shuffledQuestions = questions.sort(() => Math.random() - .5) // .sort trie les éléments d'un tableau et les renvoie dans le tableau
    CurrentQuestionIndex = 0
    questionContainerElement.classList.remove('hide') // when start button as active the div question as visible
    setNextQuestion()
}

function setNextQuestion() {
    resetState()
    showQuestion(shuffledQuestions[CurrentQuestionIndex])
}

function showQuestion(question) {
    questionElement.innerText = question.question // .innerText permet de mettre a la place de question la question defini dans la constante
    question.answers.forEach(answer => {
        const button = document.createElement('button')
        button.innerText = answer.text
        button.classList.add('btn')
        if (answer.correct) {
            button.dataset.correct = answer.correct
        }
        button.addEventListener('click', selectAnswer)
        answerButtonElement.appendChild(button)
    })
}

function resetState() {
    clearStatusClass(document.body)
    nextButton.classList.add('hide')
    while (answerButtonElement.firstChild) {
        answerButtonElement.removeChild(answerButtonElement.firstChild)
    }
}

function selectAnswer(e) {
    const selectedButton = e.target
    const correct = selectedButton.dataset.correct
    setStatutClass(document.body, correct)
    Array.from(answerButtonElement.children).forEach(button => {
        setStatutClass(button, button.dataset.correct)
    })
    if (shuffledQuestions.length > CurrentQuestionIndex + 1) {
        nextButton.classList.remove('hide')
    } else {
        startButton.innerText = 'Restart'
        startButton.classList.remove('hide')
    }

}

function setStatutClass(element, correct) {
    clearStatusClass(element)
    if (correct) {
        element.classList.add('correct')
    } else {
        element.classList.add('wrong')
    }
}

function clearStatusClass(element) {
    element.classList.remove('correct')
    element.classList.remove('wrong')
}


// all question

const questions = [
  {
    question: 'q1',
    answers: [
      { text: '4', correct: true },
      { text: '22', correct: false }
    ]
  },
  {
    question: 'Who is the best YouTuber?',
    answers: [
      { text: 'Web Dev Simplified', correct: true },
      { text: 'Traversy Media', correct: true },
      { text: 'Dev Ed', correct: true },
      { text: 'Fun Fun Function', correct: true }
    ]
  },
  {
    question: 'Is web development fun?',
    answers: [
      { text: 'Kinda', correct: false },
      { text: 'YES!!!', correct: true },
      { text: 'Um no', correct: false },
      { text: 'IDK', correct: false }
    ]
  },
  {
    question: 'What is 4 * 2?',
    answers: [
      { text: '6', correct: false },
      { text: '8', correct: true }
    ]
  }
]