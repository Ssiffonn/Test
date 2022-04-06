<?php

namespace App\Service;

use App\DTO\QuizDTO;
use App\DTO\QuestionDTO;
use App\DTO\ChoiceDTO;
use App\DTO\AnswersDTO;
use App\DTO\AnswerDTO;
use Exception;

class QuizResultService
{
    private QuizDTO $quiz;
    private AnswersDTO $answers;

    public function __construct(QuizDTO $quiz, AnswersDTO $answers)
    {
        $this->quiz  =  $quiz;
        $this->answers  =  $answers;
    }

    public function getResult(): float
    {
        $vopr  =  $this->quiz->getQuestions();
        $vibor  =  $this->answers->getAnswers();
        $o  =  0;

        for ($i  =  0; $i < sizeof($vopr); $i++) {
            $otvety  =  $vopr[$i]->getChoices();
            $allChoices = $vibor[$i]->getСhoices();
            $t = 0;
            $tneg = 0;
            $sumCor = 0;

            for ($j = 0; $j < sizeof($otvety); $j++) {
                $correct = $otvety[$j]->isCorrect();

                if ($correct  ==  true) {
                    $sumCor++;
                }
            }

            for ($j = 0; $j < sizeof($otvety); $j++) {
                $correct = $otvety[$j]->isCorrect();
                $myChoice = $otvety[$j]->getUUID();

                for ($l = 0; $l < sizeof($allChoices); $l++) {
                    if ($correct == true && $allChoices[$l] == $myChoice) {
                        $t++;
                    } elseif ($correct == false && $allChoices[$l] == $myChoice) {
                        $tneg++;
                    }
                }
            }

            if ($t == $sumCor && $tneg == 0) {
                $o++;
            }
        }

        $o = $o / sizeof($vopr);
        return number_format($o, 2);
    }
}
