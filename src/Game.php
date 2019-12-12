<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

const START_RANDOM_NUMBER = 1;
const END_RANDOM_NUMBER = 100;
const COUNT_QUESTIONS = 3;

function greetAndGetName($task)
{
    line('Welcome to the Brain Game!');
    line($task);
    line();
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);
    line();

    return $name;
}

function playGameStep($correctAnswer, $question, $name, $step)
{
    line("Question: %s", $question);
    $answer = prompt("Your answer");
    if ($answer == $correctAnswer) {
        line("Correct!");
        if ($step === COUNT_QUESTIONS - 1) {
            line("Congratulations, %s!", $name);
        }
    }
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
    line("Let's try again, %s!", $name);
}
