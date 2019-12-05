<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

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

function playGameStep($correctAnswer, $question, $name)
{
    line("Question: %s", $question);
    $answer = prompt("Your answer");
    if ($answer == $correctAnswer) {
        line("Correct!");
        return true;
    }
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
    line("Let's try again, %s!", $name);
    
    return false;
}

function congratulate($name)
{
    line("Congratulations, %s!", $name);
}
