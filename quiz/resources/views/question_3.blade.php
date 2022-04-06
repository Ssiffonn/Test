<?php   
    use App\DTO\ChoiceDTO;
    use App\DTO\QuestionDTO;
    use App\DTO\QuizDTO;
    use App\DTO\AnswerDTO;
    use App\DTO\AnswersDTO;

    require '../vendor/autoload.php';
    
    session_start();
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
            <div class="border border-secondary rounded-3 d-flex flex-row justify-content-evenly text-center align-items-center p-3 bg-secondary" style="width: 50%;">
                <div class="">
                    Как называется проблема одновременного доступа к данным, <br>когда при повторном чтении в рамках одной транзакции одна и та же выборка дает разные множества строк?
                </div>
                <div class="">
                    <div class="d-flex flex-column justify-content-start text-start">
                        <div>
                            <input type="checkbox" name="Answers[]" value="1-3-1" class="form-check-input">
                            <label>A) Фантомное чтение</label>
                        </div>
                        <div>
                            <input type="checkbox" name="Answers[]" value="1-3-2" class="form-check-input">
                            <label>B) "Грязное" чтение</label>
                        </div>
                        <div>
                            <input type="checkbox" name="Answers[]" value="1-3-3" class="form-check-input">
                            <label>C) Неповторяющееся чтение</label>
                        </div>
                        <div>
                            <input type="checkbox" name="Answers[]" value="1-3-4" class="form-check-input">
                            <label>D) Потерянное обновление</label>
                        </div>
                    </div>
                    <div id="butts">
                        <input type="submit" value="Предыдущий вопрос" name="prev" class="rounded-pill btn btn-outline-light mt-3">
                        <input type="submit" value="Следующий вопрос" name="next" class="rounded-pill btn btn-outline-light mt-3">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
        function makeQuestionDTO(): QuestionDTO
        {
            $choice1 = new ChoiceDTO(
                '1-3-1',
                'A) Фантомное чтение',
                true
            );

            $choice2 = new ChoiceDTO(
                '1-3-2',
                'B) "Грязное" чтение',
                false
            );

            $choice3 = new ChoiceDTO(
                '1-3-3',
                'C) Неповторяющееся чтение',
                false
            );

            $choice4 = new ChoiceDTO(
                '1-3-4',
                'D) Потерянное обновление',
                false
            );

            $question = new QuestionDTO(
                '1-3',
                'Как называется проблема одновременного доступа к данным, когда при повторном чтении в рамках одной транзакции одна и та же выборка дает разные множества строк?'
            );

            $question->addChoice($choice1);
            $question->addChoice($choice2);
            $question->addChoice($choice3);
            $question->addChoice($choice4);

            return $question;
        }

        if(isset($_POST['next']) && !empty($_POST['Answers'])){
            $_SESSION['Answers_3']=$_POST['Answers'];
            $_SESSION['Question_3'] = makeQuestionDTO();
            ?>
                <meta http-equiv="refresh" content="0; url=/question_4">
            <?php
        }
        if(isset($_POST['prev'])){
            ?>
                <meta http-equiv="refresh" content="0; url=/question_2">
            <?php
        }
    ?>
</body>
</html>