<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

const START_RANDOM = 1;
const END_RANDOM = 100;
const QUESTIONS_COUNT = 3;

function playGame($makeData, $task)
{
    line('Welcome to the Brain Game!');
    line($task);
    line();
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, %s!", $name);
    line();

    for ($i = 0; $i < QUESTIONS_COUNT; $i++) {
        [$correctAnswer, $question] = $makeData();
        line("Question: %s", $question);
        $answer = prompt("Your answer");
        if ($answer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}
