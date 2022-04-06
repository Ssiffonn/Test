<?php
    use App\DTO\ChoiceDTO;
    use App\DTO\QuestionDTO;
    use App\DTO\QuizDTO;
    use App\DTO\AnswerDTO;
    use App\DTO\AnswersDTO;
    use App\Service\QuizResultService;

    require '../vendor/autoload.php';
    
    session_start();

    class Quiz{
        protected $quizDTO;
        protected $answersDTO;

        function __construct()
        {
            $this->quizDTO = $this->makeQuizDTO();
            $this->answersDTO = $this->makeAnswersDTO();
        }

        public function Quiz()
        {
            $quizResultService = new QuizResultService(
                $this->quizDTO,
                $this->answersDTO
            );
            
            $result = $quizResultService->getResult();

            return $result;
        }

        protected function makeQuizDTO(): QuizDTO{

            $quiz = new QuizDTO(
                '1',
                'Quiz'
            );

            for($i=1;$i<=5;$i++){
                $quiz->addQuestion($_SESSION['Question_'.$i]);
            }

            return $quiz;
        } 
        
        protected function makeAnswersDTO(): AnswersDTO
        {
            $answers = new AnswersDTO(
                $this->quizDTO->getUUID()
            );

            $questions = $this->quizDTO->getQuestions();

            $k=1;

            for($i=0;$i<sizeof($questions);$i++){
                $answer = new AnswerDTO($questions[$i]->getUUID());

                for($j=0;$j<sizeof($_SESSION['Answers_'.$k]);$j++){
                    $answer->addChoiceUUID($_SESSION['Answers_'.$k][$j]);
                }

                $answers->addAnswer($answer);
                $k++;
            }

            return $answers;
        }
    }

    $a=new Quiz;
    $res=$a->Quiz();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="p-3 mb-2 bg-dark text-white">
    <form method="POST" action="">
        @csrf
        <div class="d-flex justify-content-center text-center align-items-center" style="height: 40vw;">
            <div class="border border-secondary rounded-3 d-flex flex-column justify-content-center text-center align-items-center bg-secondary text-white" style="height: 70%; width: 40%;">
                <h1>Вы прошли тест на: <?php echo $res*100?>%</h1>
                <input type="submit" name="res" value="Заново" class="rounded-pill btn btn-outline-light mt-3">
            </div>
        </div>
    </form>

    <?php
        if(isset($_POST['res'])){
            ?>
                <meta http-equiv="refresh" content="0; url=/">
            <?php
        }
    ?>
</body>
</html>