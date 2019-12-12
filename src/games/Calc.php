<?php

namespace BrainGames\games\Calc;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;
use function BrainGames\congratulate;

use const BrainGames\START_RANDOM_NUMBER;
use const BrainGames\END_RANDOM_NUMBER;
use const BrainGames\COUNT_QUESTIONS;

function runCalc()
{
    $name = greetAndGetName('What is the result of the expression?');
    $signs = ['+', '-', '*'];

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $a = rand(START_RANDOM_NUMBER, END_RANDOM_NUMBER);
        $b = rand(START_RANDOM_NUMBER, END_RANDOM_NUMBER);
        $signIndex = rand(START_RANDOM_NUMBER, count($signs) - 1);
        $correctAnswer = calculateAnswer($a, $b, $signs[$signIndex]);
        $question = "{$a} {$signs[$signIndex]} {$b}";
        $resultGameStep = playGameStep($correctAnswer, $question, $name, $i);
        if (!$resultGameStep) {
            break;
        }
    }
}

function calculateAnswer($a, $b, $sign)
{
    switch ($sign) {
        case '+':
            $correctAnswer = $a + $b;
            break;
        case '-':
            $correctAnswer = $a - $b;
            break;
        case '*':
            $correctAnswer = $a * $b;
            break;
    }

    return $correctAnswer;
}
