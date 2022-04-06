<?php

namespace Tests\Unit;

use App\DTO\ChoiceDTO;
use App\DTO\QuestionDTO;
use App\DTO\QuizDTO;
use App\DTO\AnswerDTO;
use App\DTO\AnswersDTO;
use App\Service\QuizResultService;
use PHPUnit\Framework\TestCase;

class FifthTest extends TestCase
{
    protected $quizDTO;
    protected $answersDTO;

    protected function setUp(): void
    {
        $this->quizDTO = $this->makeQuizDTO();
        $this->answersDTO = $this->makeAnswersDTO();
    }
    
    public function testBasicTest()
    {
        $quiz = $this->makeQuizDTO();

        $quizResultService = new QuizResultService(
            $this->quizDTO,
            $this->answersDTO
        );
        
        $result = $quizResultService->getResult();

        $this->assertEquals(0.67, $result);
    }

    protected function makeQuizDTO(): QuizDTO
    {
        $choice11 = new ChoiceDTO(
            '1-1-1',
            'an elephant',
            true
        );

        $choice12 = new ChoiceDTO(
            '1-1-2',
            'a mouse',
            false
        );

        $choice13 = new ChoiceDTO(
            '1-1-3',
            'a frog',
            false
        );

        $choice14 = new ChoiceDTO(
            '1-1-4',
            'a cat',
            false
        );

        $question1 = new QuestionDTO(
            '1-1',
            'Who is bigger?'
        );

        $question1->addChoice($choice11);
        $question1->addChoice($choice12);
        $question1->addChoice($choice13);
        $question1->addChoice($choice14);

        $choice21 = new ChoiceDTO(
            '1-2-1',
            'an elephant',
            false
        );

        $choice22 = new ChoiceDTO(
            '1-2-2',
            'a mouse',
            true
        );

        $choice23 = new ChoiceDTO(
            '1-2-3',
            'a frog',
            true
        );
        
        $choice24 = new ChoiceDTO(
            '1-2-4',
            'a cat',
            false
        );

        $question2 = new QuestionDTO(
            '1-2',
            'Who is smaller?'
        );

        $question2->addChoice($choice21);
        $question2->addChoice($choice22);
        $question2->addChoice($choice23);
        $question2->addChoice($choice24);

        $choice31 = new ChoiceDTO(
            '1-3-1',
            'an elephant',
            false
        );

        $choice32 = new ChoiceDTO(
            '1-3-2',
            'a mouse',
            false
        );

        $choice33 = new ChoiceDTO(
            '1-3-3',
            'a frog',
            false
        );

        $choice34 = new ChoiceDTO(
            '1-3-4',
            'a cat',
            true
        );

        $question3 = new QuestionDTO(
            '1-3',
            'Where is a cat?'
        );

        $question3->addChoice($choice31);
        $question3->addChoice($choice32);
        $question3->addChoice($choice33);
        $question3->addChoice($choice34);


        $quiz = new QuizDTO(
            '1',
            'Animals'
        );

        $quiz->addQuestion($question1);
        $quiz->addQuestion($question2);
        $quiz->addQuestion($question3);

        return $quiz;
    }

    protected function makeAnswersDTO(): AnswersDTO
    {
        $answers = new AnswersDTO(
            $this->quizDTO->getUUID()
        );

        $questions = $this->quizDTO->getQuestions();

        //wrong answer
        $answer1 = new AnswerDTO($questions[0]->getUUID());
        $choices1 = $questions[0]->getChoices();
        $answer1->addChoiceUUID($choices1[0]->getUUID());
        $answer1->addChoiceUUID($choices1[3]->getUUID());
        $answers->addAnswer($answer1);

        //correct answer
        $answer2 = new AnswerDTO($questions[1]->getUUID());
        $choices2 = $questions[1]->getChoices();
        $answer2->addChoiceUUID($choices2[1]->getUUID());
        $answer2->addChoiceUUID($choices2[2]->getUUID());
        $answers->addAnswer($answer2);

        //correct answer
        $answer3 = new AnswerDTO($questions[2]->getUUID());
        $choices3 = $questions[2]->getChoices();
        $answer3->addChoiceUUID($choices3[3]->getUUID());
        $answers->addAnswer($answer3);

        return $answers;
    }
}
