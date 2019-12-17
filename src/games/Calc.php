<?php

namespace BrainGames\games\Calc;

use function BrainGames\playGame;

use const BrainGames\START_RANDOM;
use const BrainGames\END_RANDOM;

const SIGNS = ['+', '-', '*'];
const TASK = 'What is the result of the expression?';

function runCalc()
{
    playGame(function () {
        $a = rand(START_RANDOM, END_RANDOM);
        $b = rand(START_RANDOM, END_RANDOM);
        $sign = SIGNS[array_rand(SIGNS)];
        $correctAnswer = calculateAnswer($a, $b, $sign);
        $question = "{$a} {$sign} {$b}";

        return [$correctAnswer, $question];
    }, TASK);
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
