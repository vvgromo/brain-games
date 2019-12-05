<?php

namespace BrainGames\Games\Calc;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;
use function BrainGames\congratulate;

function runCalc()
{
    $name = greetAndGetName('What is the result of the expression?');
    $startRandomNumber = 0;
    $endRandomNumber = 100;
    $countQuestions = 3;
    $signs = ['+', '-', '*'];

    for ($i = 0; $i < $countQuestions; $i++) {
        $a = rand($startRandomNumber, $endRandomNumber);
        $b = rand($startRandomNumber, $endRandomNumber);
        $signIndex = rand($startRandomNumber, count($signs) - 1);
        $correctAnswer = calculateAnswer($a, $b, $signs[$signIndex]);
        $question = "{$a} {$signs[$signIndex]} {$b}";
        $resultGameStep = playGameStep($correctAnswer, $question, $name);
        if (!$resultGameStep) {
            break;
        }
    }

    if ($resultGameStep) {
        congratulate($name);
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
