<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function runEven()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line();
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line();

    $startRandomNumber = 0;
    $endRandomNumber = 100;
    $countQuestions = 3;

    for ($i = 0; $i < $countQuestions; $i++) {
        $number = rand($startRandomNumber, $endRandomNumber);
        line("Question: %d", $number);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $answer = prompt("Your answer");
        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            break;
        }
    }

    if ($answer === $correctAnswer) {
        line("Congratulations, %s!", $name);
    }
}

function isEven($number)
{
    return $number % 2 === 0;
}
