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
                    Отличие mysql от sql?
                </div>
                <div class="">
                    <div class="d-flex flex-column justify-content-start text-start">
                        <div>
                            <input type="checkbox" name="Answers[]" value="1-2-1" class="form-check-input">
                            <label>A) SQL - язык запросов для управления СУБД, MySQL - сама СУБД</label>
                        </div>
                        <div>
                            <input type="checkbox" name="Answers[]" value="1-2-2" class="form-check-input">
                            <label>B) Это одно и то же</label>
                        </div>
                        <div>
                            <input type="checkbox" name="Answers[]" value="1-2-3" class="form-check-input">
                            <label>C) MySQL - язык запросов для управления СУБД, SQL - сама СУБД</label>
                        </div>
                        <div>
                            <input type="checkbox" name="Answers[]" value="1-2-4" class="form-check-input">
                            <label>D) Оба являются языками запросов</label>
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
                '1-2-1',
                'A) SQL - язык запросов для управления СУБД, MySQL - сама СУБД',
                true
            );

            $choice2 = new ChoiceDTO(
                '1-2-2',
                'B) Это одно и то же',
                false
            );

            $choice3 = new ChoiceDTO(
                '1-2-3',
                'C) MySQL - язык запросов для управления СУБД, SQL - сама СУБД',
                false
            );

            $choice4 = new ChoiceDTO(
                '1-2-4',
                'D) Оба являются языками запросов',
                false
            );

            $question = new QuestionDTO(
                '1-2',
                'Отличие mysql от sql?'
            );

            $question->addChoice($choice1);
            $question->addChoice($choice2);
            $question->addChoice($choice3);
            $question->addChoice($choice4);

            return $question;
        }

        if(isset($_POST['next']) && !empty($_POST['Answers'])){
            $_SESSION['Answers_2']=$_POST['Answers'];
            $_SESSION['Question_2'] = makeQuestionDTO();
            ?>
                <meta http-equiv="refresh" content="0; url=/question_3">
            <?php
        }
        if(isset($_POST['prev'])){
            ?>
                <meta http-equiv="refresh" content="0; url=/question_1">
            <?php
        }
    ?>
</body>
</html>